<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function sendLoginOTP(Request $request, $userType)
    {
        // Validate phone input
        $request->validate(['phone' => 'required']);

        // Initialize the model based on user type
        if ($userType == "tenant") {
            $model = User::class;
        } elseif ($userType == "vendor") {
            $model = Vendor::class; // Assuming vendors are stored in a separate model
        } else {
            return response()->json(['message' => 'Invalid user type'], 400);
        }

        // Find existing user/vendor
        $user = $model::where('phone', $request->phone)->first();

        // If user doesn't exist, create a new one
        if (!$user) {
            $user = $model::create([
                'phone' => $request->phone,
                'status' => 1,
                'password' => Hash::make($request->phone), // Secure hashed password
                'email' => $request->phone . "@gmail.com"
            ]);
        }

        // Generate a 6-digit OTP
        $otp = 000000;//rand(100000, 999999);

        // Update OTP in the database
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10)
        ]);

        // Send OTP via SMS
        $this->sendSms($user->phone, "Your OTP is: $otp");

        return response()->json(['message' => 'OTP sent successfully!', 'ToNumber' => $request->phone, 'userType' => $userType], 200);
    }

    public function verifyOTP(Request $request, $userType)
    {
        // Validate request
        $request->validate([
            'phone' => 'required',
            'otp' => 'required|digits:6'
        ]);

        // Determine the model (User or Vendor)
        if ($userType == "tenant") {
            $model = User::class;
        } elseif ($userType == "vendor") {
            $model = Vendor::class;
        } else {
            return response()->json(['message' => 'Invalid user type'], 400);
        }

        // Find the user
        $user = $model::where('phone', $request->phone)->first();

        // If user not found
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Check if OTP is valid and not expired
        if ($user->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 401);
        }

        if (Carbon::now()->gt($user->otp_expires_at)) {
            return response()->json(['message' => 'OTP has expired'], 401);
        }

        // Mark OTP as used
        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        // Generate Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'OTP verified successfully!',
            'token' => $token,
            'user' => $user
        ], 200);
    }


    // Dummy function for sending SMS (replace with actual SMS API)
    private function sendSms($phone, $message)
    {
        \Log::info("OTP sent to $phone: $message");
    }
}
