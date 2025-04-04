<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentGateway\OnlineGateway;
use App\Models\Property\City;
use App\Models\Property\Content;
use App\Models\Property\Country;
use App\Models\Property\FeaturedProperty;
use App\Models\Property\Property;
use App\Models\Property\PropertyAmenity;
use App\Models\Property\PropertyCategory;
use App\Models\Property\Spacification;
use App\Models\Property\SpacificationCotent;
use App\Models\Property\State;
use App\Models\PropertyAssets;
use App\Models\BasicSettings\Basic;


class SwapController extends BaseController
{
    public function checkVendor($num)
    {
        $otp = 123456;
        $vendor = Vendor::where('phone', $num)->first();
        //send sms logic here
        if ($vendor) {
            $phone = $num;
            $vendor->otp = $otp;
            $vendor->otp_expires_at = Carbon::now()->addMinutes(10); // OTP expires in 30 minutes
            $vendor->save();

            return response()->json([
                'exists' => true,
                'otp' => $otp,
                'message' => 'Phone number exists. OTP sent.'
            ]);
        } else {
            // Phone number does not exist
            $otpText = md5($num . $otp);
            Session::put('otp', $otpText);
            Session::put('otp_expires_at', Carbon::now()->addMinutes(30)); // Set OTP expiry time in session

            return response()->json([
                'exists' => false,
                'message' => 'Phone number does not exist.'
            ]);
        }
    }

    public function checkUsername($username)
    {
        // Check if the username exists in the 'vendors' table
        $exists = DB::table('vendors')->where('username', $username)->exists();

        // Return a JSON response
        return response()->json(['exists' => $exists]);
    }

    public function verifyOtp(Request $request)
    {
        $phone = $request->input('phone');
        $otp = $request->input('otp');

        // First, check the vendor table
        $vendor = Vendor::where('phone', $phone)->first();

        if ($vendor) {
            // Vendor exists, check the OTP and expiration
            if ($vendor->otp === $otp && Carbon::now()->lte($vendor->otp_expires_at)) {
                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid OTP or OTP expired.'
                ]);
            }
        } else {
            // Check OTP from session
            $otpText = md5($phone . $otp);

            $sessionOtp = Session::get('otp');
            $sessionOtpExpiresAt = Session::get('otp_expires_at');

            if ($sessionOtp === $otpText && Carbon::now()->lte($sessionOtpExpiresAt)) {
                //Session::flush(); // Clears all session data
                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully (from session).'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid OTP or OTP expired.'
                ]);
            }
        }
    }
    public function submitNewProperty(Request $request)
    {
        try {
            $phone = $request->phone;
            $vendor = Vendor::where('phone', $phone)->first();

            $vednorId = null;

            if (!$vendor) {
                $new_vendor_data = [
                    'phone' => $phone,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'name' => $request->vendor_name,
                ];
                $newVendor = Vendor::updateOrCreate(['phone' => $phone], $new_vendor_data);
                $vednorId = $newVendor->id;
            } else {
                $vednorId = $vendor->id;
            }

            // Start the transaction
            $property = DB::transaction(function () use ($request, $vednorId) {
                $vendor = Vendor::findOrFail($vednorId);

                $nextPrimaryKey = DB::table('properties')->max('id') + 1;
                $uniquePropertyId = '#OS1000' . $nextPrimaryKey;

                $property = Property::create([
                    'vendor_id' => $vendor->id,
                    'country_id' => $request->country_id ?? 7,
                    'state_id' => $request->state_id ?? 10,
                    'city_id' => $request->city_id ?? 36,
                    'price' => $request->expectedPrice,
                    'status' => $request->status ?? 1,
                    'latitude' => $request->latitude,
                    'balcony' => $request->verandabalcony,
                    'longitude' => $request->longitude,
                    'livingroom' => $request->livingroom,
                    'type' => $request->type,
                    'bedroom' => $request->bedroom,
                    'bathroom' => $request->bathroom,
                    'builtyear' => $request->builtyear,
                    'rooms' => $request->rooms,
                    'furnishedStatus' => $request->furnishedStatus,
                    'availability' => $request->propertystatus,
                    'TotalFloor' => $request->TotalFloor,
                    'FloorNo' => $request->FloorNo,
                    'diningarea' => $request->diningarea,
                    'garage' => $request->garage,
                    'BuildupUnit' => $request->homearea,
                    'homearea' => $request->homearea,
                    'lotarea' => $request->lotarea,
                    'AvailableFrom' => $request->AvailableFrom,
                    'AvailableFor' => $request->AvailableFor,
                    'propertyid' => $uniquePropertyId,
                    'extras' => json_encode($request->extras),
                ]);

                if ($request->has('amenities')) {
                    foreach ($request->amenities as $amenity) {
                        PropertyAmenity::create([
                            'property_id' => $property->id,
                            'amenity_id' => $amenity,
                        ]);
                    }
                }

                $language = Language::where('is_default', 1)->first();

                $propertyContent = new Content();
                $propertyContent->language_id = $language->id;
                $propertyContent->property_id = $property->id;
                $propertyContent->title = $request->title;
                $propertyContent->slug = createSlug($request->title);
                $propertyContent->address = $request->location_search1 ?? '';
                $propertyContent->description = $request->propertycontent;
                $propertyContent->save();

                return $property;
            });

            // Clear OTP and log in the vendor
            $vendor = Vendor::findOrFail($vednorId);
            $vendor->otp = null;
            $vendor->otp_expires_at = null;
            $vendor->save();

            auth('vendor')->login($vendor);
            Session::put('vendor_login_status', true);
            Session::put('vendor_id', $vednorId);

            // Set success message
            Session::flash('success', 'New Property added successfully!');

            return redirect()->route('vendor.index');
        } catch (\Throwable $e) {
            // Log the error for debugging
            \Log::error('Transaction failed: ' . $e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Database error occurred. Please try again.']);
        }
    }
}
