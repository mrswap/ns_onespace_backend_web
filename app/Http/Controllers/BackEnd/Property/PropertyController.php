<?php

namespace App\Http\Controllers\BackEnd\Property;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Http\Helpers\VendorPermissionHelper;
use App\Http\Requests\Property\PropertyStoreRequest;
use App\Http\Requests\Property\PropertyUpdateRequest;
use App\Models\Agent;
use App\Models\Amenity;
use App\Models\BasicSettings\Basic;
use App\Models\FeaturedPricing;
use App\Models\Language;
use App\Models\PaymentGateway\OfflineGateway;
use App\Models\PaymentGateway\OnlineGateway;
use App\Models\Property\City;
use App\Models\Property\Content;
use App\Models\Property\Country;
use App\Models\Property\FeaturedProperty;
use App\Models\Property\Property;
use App\Models\Property\PropertyAmenity;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertySliderImage;
use App\Models\Property\PropertyoutdoorImage;
use App\Models\Property\PropertylivingroomImage;
use App\Models\Property\PropertybedroomImage;
use App\Models\Property\PropertykitchenImage;
use App\Models\Property\PropertywashroomImage;
use App\Models\Property\PropertybalconyImage;
use App\Models\Property\PropertyterraceImage;
use App\Models\Property\PropertystairsImage;
use App\Models\Property\PropertyotherImage;
use App\Models\Property\Spacification;
use App\Models\Property\SpacificationCotent;
use App\Models\Property\State;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\PropertyAssets;
use App\Models\Vendor;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Purifier;
use Response;
use Validator;

class PropertyController extends Controller
{
    public function getAgent(Request $request)
    {
        $agents = Agent::where('vendor_id', $request->vendor_id)->where('status', 1)->get();
        if (!empty($agents)) {
            return Response::json(['agents' => $agents], 200);
        } else {
            return Response::json('error',   404);
        }
    }
    public function type(Request $request)
    {
        $data['commertialCount'] = Property::where('type', 'commercial')->count();
        $data['residentialCount'] = Property::where('type', 'residential')->count();
        return view('backend.property.type', $data);
    }

    public function settings()
    {
        $content = Basic::select('property_country_status', 'property_state_status')->first();
        return view('backend.property.settings', compact('content'));
    }
    public function propertSettings()
    {
        $content = Basic::select('property_approval_status')->first();
        return view('backend.property.property-settings', compact('content'));
    }

    //update_setting
    public function update_settings(Request $request)
    {
        $status = Basic::first();
        $status->property_country_status = $request->property_country_status ?? $status->property_country_status;
        $status->property_state_status = $request->property_state_status ?? $status->property_state_status;
        $status->property_approval_status = $request->property_approval_status ?? $status->property_approval_status;
        $status->save();
        Session::flash('success', 'Property Settings Updated Successfully!');
        return back();
    }
    public function index(Request $request)
    {
        $data['langs'] = Language::all();
        if ($request->has('language')) {
            $language = Language::where('code', $request->language)->firstOrFail();
        } else {
            $language = Language::where('is_default', 1)->first();
        }

        $data['language'] = $language;

        $language_id = $language->id;
        $vendor_id = $title = null;
        if (request()->filled('vendor_id')) {
            $vendor_id = $request->vendor_id;
        }



        if (request()->filled('title')) {
            $title = $request->title;
        }

        $data['properties'] = Property::join('property_contents', 'properties.id', 'property_contents.property_id')->with([
            'propertyContents' => function ($q) use ($language_id) {
                $q->where('language_id', $language_id);
            },
            'vendor',
            'cityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])
            ->when($vendor_id, function ($query) use ($vendor_id) {
                if ($vendor_id == 'admin') {
                    return $query->where('vendor_id', '0');
                } else {
                    return $query->where('vendor_id', $vendor_id);
                }
            })
            ->when($title, function ($query) use ($title, $language_id) {
                return $query->where('property_contents.title', 'LIKE', '%' . $title . '%');
            })
            ->where('property_contents.language_id', $language_id)
            ->select('properties.*')
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['vendors'] = Vendor::where('id', '!=', 0)->get();

        $data['featurePricing'] =  FeaturedPricing::where('status', 1)->get();
        $data['onlineGateways'] = OnlineGateway::query()->where('status', '=', 1)->get();
        $data['offlineGateways'] = OfflineGateway::query()->where('status', '=', 1)->orderBy('serial_number', 'asc')->get();


        // dd( $data);

        return view('backend.property.index', $data);
    }
    public function create(Request $request)
    {
        $information = [];
        $language = Language::where('is_default', 1)->first();
        $languages = Language::get();
        $information['languages'] = $languages;

        $information['vendors'] = Vendor::where('id', '!=', 0)->where('status', 1)->get();
        $information['propertyCategories'] = PropertyCategory::where([['type', $request->type], ['status', 1]])->with(['categoryContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();
        $information['Categories'] = Category::query()->where('status', 1)->orderByDesc('id')->get();
        $information['SubCategories'] = SubCategory::query()->where('status', 1)->orderByDesc('id')->get();

        $information['propertyCountries'] = Country::with(['countryContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();
        $information['amenities'] = Amenity::with(['amenityContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->where('status', 1)->get();

        $information['propertySettings'] = Basic::select('property_state_status', 'property_country_status')->first();
        $information['states'] = State::with(['stateContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();
        $information['cities'] = City::where('status', 1)->with(['cityContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();

        $information['uniqueId']  = DB::table('properties')->max('id') + 1;


        return view('backend.property.create', $information);
    }
    public function updateFeatured(Request $request)
    {
        $property = FeaturedProperty::findOrFail($request->requestId);

        if ($request->status == 1) {
            $property->update(['status' => 1]);
            Session::flash('success', 'Property featured successfully!');
        } else {
            $property->update(['status' => 0]);
            Session::flash('success', 'Property remove from featured successfully!');
        }

        return redirect()->back();
    }
    /////////////////////////////////slider images
    public function imagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/'), $request->file('file'));

        $pi = new PropertySliderImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function imagermv(Request $request)
    {
        $pi = PropertySliderImage::findOrFail($request->fileid);
        $imageCount = PropertySliderImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function imagedbrmv(Request $request)
    {
        $pi = PropertySliderImage::findOrFail($request->fileid);
        $imageCount = PropertySliderImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }

    /////////////////////////////////slider images outdoor,
    public function outdoorimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/outdoor/'), $request->file('file'));

        $pi = new PropertyoutdoorImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function outdoorimagermv(Request $request)
    {
        $pi = PropertyoutdoorImage::findOrFail($request->fileid);
        $imageCount = PropertyoutdoorImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/outdoor/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function outdoorimagedbrmv(Request $request)
    {
        $pi = PropertyoutdoorImage::findOrFail($request->fileid);
        $imageCount = PropertyoutdoorImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/outdoor/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider image sliving room,
    public function livingroomimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/livingroom/'), $request->file('file'));

        $pi = new PropertylivingroomImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function livingroomimagermv(Request $request)
    {
        $pi = PropertylivingroomImage::findOrFail($request->fileid);
        $imageCount = PropertylivingroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/livingroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function livingroomimagedbrmv(Request $request)
    {
        $pi = PropertylivingroomImage::findOrFail($request->fileid);
        $imageCount = PropertylivingroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/livingroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider image sbedroom,
    public function bedroomimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/bedroom/'), $request->file('file'));

        $pi = new PropertybedroomImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function bedroomimagermv(Request $request)
    {
        $pi = PropertybedroomImage::findOrFail($request->fileid);
        $imageCount = PropertybedroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/bedroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function bedroomimagedbrmv(Request $request)
    {
        $pi = PropertybedroomImage::findOrFail($request->fileid);
        $imageCount = PropertybedroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/bedroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images kitchen,
    public function kitchenimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/kitchen/'), $request->file('file'));

        $pi = new PropertykitchenImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function kitchenimagermv(Request $request)
    {
        $pi = PropertykitchenImage::findOrFail($request->fileid);
        $imageCount = PropertykitchenImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/kitchen/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function kitchenimagedbrmv(Request $request)
    {
        $pi = PropertykitchenImage::findOrFail($request->fileid);
        $imageCount = PropertykitchenImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/kitchen/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images washroom,
    public function washroomimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/washroom/'), $request->file('file'));

        $pi = new PropertywashroomImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function washroomimagermv(Request $request)
    {
        $pi = PropertywashroomImage::findOrFail($request->fileid);
        $imageCount = PropertywashroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/washroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function washroomimagedbrmv(Request $request)
    {
        $pi = PropertywashroomImage::findOrFail($request->fileid);
        $imageCount = PropertywashroomImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/washroom/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images balcony,
    public function balconyimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/balcony/'), $request->file('file'));

        $pi = new PropertybalconyImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function balconyimagermv(Request $request)
    {
        $pi = PropertybalconyImage::findOrFail($request->fileid);
        $imageCount = PropertybalconyImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/balcony/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function balconyimagedbrmv(Request $request)
    {
        $pi = PropertybalconyImage::findOrFail($request->fileid);
        $imageCount = PropertybalconyImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/balcony/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images terrace,
    public function terraceimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/terrace/'), $request->file('file'));

        $pi = new PropertyterraceImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function terraceimagermv(Request $request)
    {
        $pi = PropertyterraceImage::findOrFail($request->fileid);
        $imageCount = PropertyterraceImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/terrace/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function terraceimagedbrmv(Request $request)
    {
        $pi = PropertyterraceImage::findOrFail($request->fileid);
        $imageCount = PropertyterraceImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/terrace/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images stairs,
    public function stairsimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/stairs/'), $request->file('file'));

        $pi = new PropertystairsImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function stairsimagermv(Request $request)
    {
        $pi = PropertystairsImage::findOrFail($request->fileid);
        $imageCount = PropertystairsImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/stairs/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function stairsimagedbrmv(Request $request)
    {
        $pi = PropertystairsImage::findOrFail($request->fileid);
        $imageCount = PropertystairsImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/stairs/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    /////////////////////////////////slider images other,
    public function otherimagesstore(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $imageName = UploadFile::store(public_path('assets/img/property/slider-images/other/'), $request->file('file'));

        $pi = new PropertyotherImage();
        if (!empty($request->property_id)) {
            $pi->property_id = $request->property_id;
        }
        $pi->image = $imageName;
        $pi->save();
        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }
    public function otherimagermv(Request $request)
    {
        $pi = PropertyotherImage::findOrFail($request->fileid);
        $imageCount = PropertyotherImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/other/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }
    //imagedbrmv
    public function otherimagedbrmv(Request $request)
    {
        $pi = PropertyotherImage::findOrFail($request->fileid);
        $imageCount = PropertyotherImage::where('property_id', $pi->property_id)->get()->count();
        if ($imageCount > 1) {
            @unlink(public_path('assets/img/property/slider-images/other/') . $pi->image);
            $pi->delete();
            return $pi->id;
        } else {
            return 'false';
        }
    }


    public function videoImgrmv(Request $request)
    {
        $pi = Property::select('video_image', 'id')->findOrFail($request->fileid);

        if (!empty($pi->video_image)) {
            @unlink(public_path('assets/img/property/video/') . $pi->video_image);
            $pi->video_image = null;
            $pi->save();
            return 'success';
        } else {
            return 'false';
        }
    }

    public function floorImgrmv(Request $request)
    {
        $pi = Property::select('floor_planning_image', 'id')->findOrFail($request->fileid);

        if (!empty($pi->floor_planning_image)) {
            @unlink(public_path('assets/img/property/plannings/') . $pi->floor_planning_image);
            $pi->floor_planning_image = null;
            $pi->save();
            return 'success';
        } else {
            return 'false';
        }
    }
    public function store(PropertyStoreRequest $request)
    {
        DB::transaction(function () use ($request) {

            $featuredImgURL = $request->featured_image;
            if (request()->hasFile('featured_image')) {
                $featuredImgName = UploadFile::store(public_path('assets/img/property/featureds'), $featuredImgURL);
            }

            $languages = Language::all();
            $floorPlanningImage = null;
            $videoImage = null;
            $video = null;
            if (request()->hasFile('floor_planning_image')) {
                $floorPlanningImage = UploadFile::store(public_path('assets/img/property/plannings'), $request->floor_planning_image);
            }

            if ($request->hasFile('video_image')) {
                $videoImage = UploadFile::store(public_path('assets/img/property/video/'), $request->video_image);
            }
            if ($request->hasFile('video')) {
                $video = UploadFile::store(public_path('assets/img/property/shortvideo/'), $request->video);
            }
            $nextPrimaryKey = DB::table('properties')->max('id') + 1;
            $prefix = "#OS";


            if ($nextPrimaryKey >= 1 && $nextPrimaryKey <= 9) {
                $myLatestPropertyId =  $prefix . "100" . $nextPrimaryKey;
            } elseif ($nextPrimaryKey >= 10 && $nextPrimaryKey <= 99) {
                $myLatestPropertyId =  $prefix . "10" . $nextPrimaryKey;
            } elseif ($nextPrimaryKey >= 100 && $nextPrimaryKey <= 1999) {
                $myLatestPropertyId =  $prefix . "1" . $nextPrimaryKey;
            } else {
                $myLatestPropertyId = $prefix . $nextPrimaryKey;
            }
            $property = Property::create([
                'vendor_id' => $request->vendor_id ?? 0,

                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'featured_image' => $featuredImgName,
                'floor_planning_image' => $floorPlanningImage,
                'video_image' => $videoImage,
                'video' => $video,
                'price' => $request->price,
                'purpose' => $request->purpose,
                'type' => $request->type,
                'beds' => $request->beds,
                'bath' => $request->bath,
                'area' => $request->area,
                'video_url' => $request->video_url,
                'status' => $request->status,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'approve_status' => 1,
                'balcony' => $request->balcony,
                'verandabalcony' => $request->balcony,
                'carpetArea' => $request->carpetArea,
                'furnishedStatus' => $request->furnishedStatus,
                'extras' => json_encode($request->extras),
                'TotalFloor' => $request->TotalFloor,
                'FloorNo' => $request->FloorNo,
                'availability' => $request->availability,
                'expectedPrice' => $request->expectedPrice,
                'sqrPrice' => $request->sqrPrice,
                'AvailableFor' => $request->AvailableFor,
                'AvailableFrom' => $request->AvailableFrom,
                'lotarea' => $request->carpetArea,
                'homearea' => $request->area,
                'BuildupUnit' => $request->BuildupUnit,
                'carpetUnit' => $request->carpetUnit,
                'propertycontent' => $request['en_description'],
                'rooms' => $request->rooms,
                'livingroom' => $request->livingroom,
                'garage' => $request->garage,
                'diningarea' => $request->diningarea,
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'gymarea' => $request->gymarea,
                'garden' => $request->garden,
                'parking' => $request->parking,
                'apartmentvideolink' => $request->video_url,
                'propertydiscount' => $request->propertydiscount,
                'propertytag' => $request->propertytag,
                'propertyid' => $myLatestPropertyId,
                'builtyear' => $request->builtyear,
                'lotdimensions' => $request->lotdimensions,
                'propertystatus' => $request->availability,
            ]);

            $slders = $request->slider_images;
            if ($slders) {
                $pis = PropertySliderImage::findOrFail($slders);
                foreach ($pis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }

            ////// outdoor,
            $outdoorslders = $request->slider_imagesoutdoor;
            if ($outdoorslders) {
                $outdoorpis = PropertyoutdoorImage::findOrFail($outdoorslders);
                foreach ($outdoorpis as $key1 => $pi1) {
                    $pi1->property_id = $property->id;
                    $pi1->save();
                }
            }
            //////livingroom,
            $livingroomslders = $request->slider_imageslivingroom;
            if ($livingroomslders) {
                $livingroompis = PropertylivingroomImage::findOrFail($livingroomslders);
                foreach ($livingroompis as $key2 => $pi2) {
                    $pi2->property_id = $property->id;
                    $pi2->save();
                }
            }
            ////// bedroom,
            $bedroomslders = $request->slider_imagesbedroom;
            if ($bedroomslders) {
                $bedroompis = PropertybedroomImage::findOrFail($bedroomslders);
                foreach ($bedroompis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// kitchen,
            $kitchenslders = $request->slider_imageskitchen;
            if ($kitchenslders) {
                $kitchenpis = PropertykitchenImage::findOrFail($kitchenslders);
                foreach ($kitchenpis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// washroom,
            $washroomslders = $request->slider_imageswashroom;
            if ($washroomslders) {
                $washroompis = PropertywashroomImage::findOrFail($washroomslders);
                foreach ($washroompis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// balcony,
            $balconyslders = $request->slider_imagesbalcony;
            if ($balconyslders) {
                $balconypis = PropertybalconyImage::findOrFail($balconyslders);
                foreach ($balconypis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// terrace,
            $terraceslders = $request->slider_imagesterrace;
            if ($terraceslders) {
                $terracepis = PropertyterraceImage::findOrFail($terraceslders);
                foreach ($terracepis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// stairs,
            $stairsslders = $request->slider_imagesstairs;
            if ($stairsslders) {
                $stairspis = PropertystairsImage::findOrFail($stairsslders);
                foreach ($stairspis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }
            ////// other,
            $otherslders = $request->slider_imagesother;
            if ($otherslders) {
                $otherpis = PropertyotherImage::findOrFail($otherslders);
                foreach ($otherpis as $key => $pi) {
                    $pi->property_id = $property->id;
                    $pi->save();
                }
            }

            if ($request->has('amenities')) {
                foreach ($request->amenities as $amenity) {
                    PropertyAmenity::create([
                        'property_id' => $property->id,
                        'amenity_id' => $amenity
                    ]);
                }
            }
            foreach ($languages as $language) {
                $propertyContent = new Content();
                $propertyContent->language_id = $language->id;
                $propertyContent->property_id = $property->id;
                $propertyContent->title = $request[$language->code . '_title'];
                $propertyContent->slug = createSlug($request[$language->code . '_title']);
                $propertyContent->address = $request[$language->code . '_address'];
                $propertyContent->description = Purifier::clean($request[$language->code . '_description'], 'youtube');
                $propertyContent->meta_keyword = $request[$language->code . '_meta_keyword'];
                $propertyContent->meta_description = $request[$language->code . '_meta_description'];
                $propertyContent->save();


                $label_datas = $request[$language->code . '_label'];
                foreach ($label_datas as $key => $data) {
                    if (!empty($request[$language->code . '_value'][$key])) {
                        $property_specification = Spacification::where([['property_id', $property->id], ['key', $key]])->first();
                        if (is_null($property_specification)) {
                            $property_specification = new Spacification();
                            $property_specification->property_id = $property->id;
                            $property_specification->key  = $key;
                            $property_specification->save();
                        }
                        $property_specification_content = new SpacificationCotent();
                        $property_specification_content->language_id = $language->id;
                        $property_specification_content->property_spacification_id = $property_specification->id;
                        $property_specification_content->label = $data;
                        $property_specification_content->value = $request[$language->code . '_value'][$key];
                        $property_specification_content->save();
                    }
                }

                $category_datas = $request[$language->code . '_category'];
                foreach ($category_datas as $key => $data) {
                    if (!empty($request[$language->code . '_subcategory'][$key])) {
                        $subcategory_datas = $request[$language->code . '_subcategory'];
                        $asset_datas = $request[$language->code . '_asset'];
                        $assetQuantity_datas = $request[$language->code . '_quantity'];

                        $property_Assets = PropertyAssets::where([['property_id', $property->id], ['name', $asset_datas[$key]]])->first();
                        if (is_null($property_Assets)) {
                            $property_Assets = new PropertyAssets();
                            $property_Assets->property_id = $property->id;
                            $property_Assets->category  = $data;
                            $property_Assets->subcategory = $subcategory_datas[$key];
                            $property_Assets->name  = $asset_datas[$key];
                            $property_Assets->quantity  = $assetQuantity_datas[$key];
                            $property_Assets->save();
                        }
                    }
                }
            }
        });
        Session::flash('success', 'New Property added successfully!');

        return Response::json(['status' => 'success'], 200);
    }

    public function updateStatus(Request $request)
    {
        $property = Property::findOrFail($request->propertyId);

        if ($request->status == 1) {
            $property->update(['status' => 1]);

            Session::flash('success', 'Property Active successfully!');
        } else {
            $property->update(['status' => 0]);

            Session::flash('success', 'Property Inactive  successfully!');
        }

        return redirect()->back();
    }

    public function approveStatus(Request $request)
    {
        $property = Property::findOrFail($request->property);

        if ($request->approve_status == 1) {
            $property->update(['approve_status' => 1]);

            Session::flash('success', 'Property Approved Successfully!');
        } else {
            $property->update(['approve_status' => 2]);

            Session::flash('success', 'Property Reject Successfully!');
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $property = Property::with('galleryImages')->findOrFail($id);
        $information['property'] = $property;
        $information['galleryImages'] = $property->galleryImages;

        $information['outdoorgalleryImages'] = $property->outdoorgalleryImages;

        $information['livingroomgalleryImages'] = $property->livingroomgalleryImages;

        $information['bedroomgalleryImages'] = $property->bedroomgalleryImages;

        $information['kitchengalleryImages'] = $property->kitchengalleryImages;
        $information['washroomgalleryImages'] = $property->washroomgalleryImages;

        $information['balconygalleryImages'] = $property->balconygalleryImages;

        $information['terracegalleryImages'] = $property->terracegalleryImages;

        $information['stairsgalleryImages'] = $property->stairsgalleryImages;

        $information['othergalleryImages'] = $property->othergalleryImages;
        $language = Language::where('is_default', 1)->first();
        $information['languages'] = Language::all();
        $information['vendors'] = Vendor::with('agents')->where('status', 1)->get();
        $information['propertyAmenities'] = PropertyAmenity::where('property_id', $property->id)->get();
        $information['propertyAssets'] = PropertyAssets::where('property_id', $property->id)->get();
        $information['amenities'] = Amenity::with(['amenityContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->where('status', 1)->get();

        $information['propertyCategories'] = PropertyCategory::where([['type', $property->type], ['status', 1]])->with(['categoryContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();
        $information['propertyCountries'] = Country::with(['countryContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();
        $information['propertyStates'] = State::where('country_id', $property->country_id)->with(['stateContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();

        $information['propertyCities'] = City::where('state_id', $property->state_id)->with(['cityContent' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->get();

        $information['propertySettings'] = Basic::select('property_state_status', 'property_country_status')->first();
        $information['specifications'] = Spacification::where('property_id', $property->id)->get();
        $information['Categories'] = Category::query()->where('status', 1)->orderByDesc('id')->get();
        $information['SubCategories'] = SubCategory::query()->where('status', 1)->orderByDesc('id')->get();

        // if ($property->vendor_id != 0) {
        if (false) {

            $package = VendorPermissionHelper::currentPackagePermission($property->vendor_id);
            $uploadGImg = $package->number_of_property_gallery_images -  count($information['galleryImages']);

            $uploadGImgoutdoor = $package->number_of_property_gallery_images -  count($information['outdoorgalleryImages']);

            $uploadGImglivingroom = $package->number_of_property_gallery_images -  count($information['livingroomgalleryImages']);

            $uploadGImgbedroom = $package->number_of_property_gallery_images -  count($information['bedroomgalleryImages']);

            $uploadGImgkitchen = $package->number_of_property_gallery_images -  count($information['kitchengalleryImages']);

            $uploadGImgwashroom = $package->number_of_property_gallery_images -  count($information['washroomgalleryImages']);

            $uploadGImgbalcony = $package->number_of_property_gallery_images -  count($information['balconygalleryImages']);

            $uploadGImgterrace = $package->number_of_property_gallery_images -  count($information['terracegalleryImages']);

            $uploadGImgstairs = $package->number_of_property_gallery_images -  count($information['stairsgalleryImages']);

            $uploadGImgother = $package->number_of_property_gallery_images -  count($information['othergalleryImages']);
        } else {
            $uploadGImg = 999999;
            $uploadGImgoutdoor = 999999;

            $uploadGImglivingroom = 999999;

            $uploadGImgbedroom = 999999;

            $uploadGImgkitchen = 999999;

            $uploadGImgwashroom = 999999;

            $uploadGImgbalcony = 999999;

            $uploadGImgterrace = 999999;

            $uploadGImgstairs = 999999;

            $uploadGImgother  = 999999;
        }
        $information['uploadGImg'] = $uploadGImg;
        $information['uploadGImgoutdoor'] = $uploadGImgoutdoor;

        $information['uploadGImglivingroom'] = $uploadGImglivingroom;

        $information['uploadGImgbedroom'] = $uploadGImgbedroom;

        $information['uploadGImgkitchen'] = $uploadGImgkitchen;

        $information['uploadGImgwashroom'] = $uploadGImgwashroom;

        $information['uploadGImgbalcony'] = $uploadGImgbalcony;

        $information['uploadGImgterrace'] = $uploadGImgterrace;

        $information['uploadGImgstairs'] = $uploadGImgstairs;

        $information['uploadGImgother'] = $uploadGImgother;
        //    dd($information);die;
        return view('backend.property.edit', $information);
    }

    public function update(PropertyUpdateRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $languages = Language::all();

            $property = Property::findOrFail($request->property_id);

            $featuredImgName = $property->featured_image;
            $floorPlanningImage = $property->floor_planning_image;
            $videoImage = $property->video_image;
            $video = $property->video;
            if ($request->hasFile('featured_image')) {
                $featuredImgName = UploadFile::update(public_path('assets/img/property/featureds/'), $request->featured_image, $property->featured_image);
            }
            if ($request->hasFile('floor_planning_image')) {
                $floorPlanningImage = UploadFile::update(public_path('assets/img/property/plannings/'), $request->floor_planning_image, $property->floor_planning_image);
            }
            if ($request->hasFile('video_image')) {
                $videoImage = UploadFile::update(public_path('assets/img/property/video/'), $request->video_image, $property->video_image);
            }
            if ($request->hasFile('video')) {
                $video = UploadFile::update(public_path('assets/img/property/shortvideo/'), $request->video, $property->video);
            }
            $property->update([
                'vendor_id' => $request->vendor_id ?? 0,

                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'featured_image' => $featuredImgName,
                'floor_planning_image' => $floorPlanningImage,
                'video_image' => $videoImage,
                'video' => $video,
                'price' => $request->price,
                'purpose' => $request->purpose,
                'type' => $request->type,
                'beds' => $request->beds,
                'bath' => $request->bath,
                'area' => $request->area,
                'video_url' => $request->video_url,
                'status' => $request->status,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'balcony' => $request->balcony,
                'carpetArea' => $request->carpetArea,
                'furnishedStatus' => $request->furnishedStatus,
                'extras' => json_encode($request->extras),
                'TotalFloor' => $request->TotalFloor,
                'FloorNo' => $request->FloorNo,
                'availability' => $request->availability,
                'expectedPrice' => $request->expectedPrice,
                'AvailableFor' => $request->AvailableFor,
                'AvailableFrom' => $request->AvailableFrom,
                'sqrPrice' => $request->sqrPrice,

                'BuildupUnit' => $request->BuildupUnit,
                'carpetUnit' => $request->carpetUnit,
                'propertycontent' => $request['en_description'],
                'lotarea' => $request->carpetArea,
                'homearea' => $request->area,
                'rooms' => $request->rooms,
                'livingroom' => $request->livingroom,
                'garage' => $request->garage,
                'diningarea' => $request->diningarea,
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'gymarea' => $request->gymarea,
                'garden' => $request->garden,
                'parking' => $request->parking,
                'apartmentvideolink' => $request->video_url,
                'propertydiscount' => $request->propertydiscount,
                'propertytag' => $request->propertytag,
                'propertyid' => $request->propertyid,
                'builtyear' => $request->builtyear,
                'lotdimensions' => $request->lotdimensions,
                'propertystatus' => $request->availability,
            ]);
            if ($request->has('amenities')) {
                $property->proertyAmenities()->delete();
                foreach ($request->amenities as $amenity) {
                    PropertyAmenity::create([
                        'property_id' => $property->id,
                        'amenity_id' => $amenity
                    ]);
                }
            }

            $d_property_specifications = Spacification::where('property_id', $request->property_id)->get();
            foreach ($d_property_specifications as $d_property_specification) {
                $d_property_specification_contents = SpacificationCotent::where('property_spacification_id', $d_property_specification->id)->get();
                foreach ($d_property_specification_contents as $d_property_specification_content) {
                    $d_property_specification_content->delete();
                }
                $d_property_specification->delete();
            }

            foreach ($languages as $language) {
                $propertyContent =  Content::where('property_id', $request->property_id)->where('language_id', $language->id)->first();
                if (empty($propertyContent)) {
                    $propertyContent = new Content();
                }
                $propertyContent->language_id = $language->id;
                $propertyContent->property_id = $property->id;

                $propertyContent->title = $request[$language->code . '_title'];
                $propertyContent->slug = createSlug($request[$language->code . '_title']);

                $propertyContent->address = $request[$language->code . '_address'];
                $propertyContent->description = Purifier::clean($request[$language->code . '_description'], 'youtube');
                $propertyContent->meta_keyword = $request[$language->code . '_meta_keyword'];
                $propertyContent->meta_description = $request[$language->code . '_meta_description'];
                $propertyContent->save();

                $label_datas = $request[$language->code . '_label'];
                foreach ($label_datas as $key => $data) {
                    if (!empty($request[$language->code . '_value'][$key])) {
                        $property_specification = Spacification::where([['property_id', $property->id], ['key', $key]])->first();
                        if (is_null($property_specification)) {
                            $property_specification = new Spacification();
                            $property_specification->property_id = $property->id;
                            $property_specification->key  = $key;
                            $property_specification->save();
                        }
                        $property_specification_content = new SpacificationCotent();
                        $property_specification_content->language_id = $language->id;
                        $property_specification_content->property_spacification_id = $property_specification->id;
                        $property_specification_content->label = $data;
                        $property_specification_content->value = $request[$language->code . '_value'][$key];
                        $property_specification_content->save();
                    }
                }
                $category_datas = $request[$language->code . '_category'];
                foreach ($category_datas as $key => $data) {
                    if (!empty($request[$language->code . '_subcategory'][$key])) {
                        $subcategory_datas = $request[$language->code . '_subcategory'];
                        $asset_datas = $request[$language->code . '_asset'];
                        $assetQuantity_datas = $request[$language->code . '_quantity'];

                        $property_Assets = PropertyAssets::where([['property_id', $property->id], ['name', $asset_datas[$key]]])->first();
                        if (is_null($property_Assets)) {
                            $property_Assets = new PropertyAssets();
                            $property_Assets->property_id = $property->id;
                            $property_Assets->category  = $data;
                            $property_Assets->subcategory = $subcategory_datas[$key];
                            $property_Assets->name  = $asset_datas[$key];
                            $property_Assets->quantity  = $assetQuantity_datas[$key];
                            $property_Assets->save();
                        }
                    }
                }
            }
        });
        Session::flash('success', 'Property Updated successfully!');

        return Response::json(['status' => 'success'], 200);
    }


    public function featuredPayment(Request $request)
    {

        $featuredPricing = FeaturedPricing::findOrFail($request->featured_pricing_id);
        $request['amount'] = $featuredPricing->price;
        $request['number_of_days'] = $featuredPricing->number_of_days;
        $request['gateway'] == 'flutterwave';
        $bs = Basic::select('timezone')->first();
        $property = Property::findOrFail($request->property_id);

        FeaturedProperty::create([
            'featured_pricing_id' => $featuredPricing->id,
            'property_id' =>  $property->id,
            'vendor_id' =>  $property->vendor_id,
            'number_of_days' => $featuredPricing->number_of_days,
            'amount' => $featuredPricing->price,
            'transaction_id' => VendorPermissionHelper::uniqidReal(8),
            'transaction_details' => 'from admin',
            'payment_method' => 'from admin',
            'gateway_type' => $request->gateway,
            'payment_status' => 'complete',
            'status' => 1,
            'attachment' => $request->attachmen ?? null,
            'start_date' => Carbon::now()->timezone($bs->timezone)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->timezone($bs->timezone)->addDays($featuredPricing->number_of_days)->format('Y-m-d H:i:s'),
        ]);

        Session::flash('success', 'Porperty featured sucessfully.');
        return redirect()->back();
    }

    public function specificationDelete(Request $request)
    {

        $d_project_specification = Spacification::find($request->spacificationId);
        $d_project_specification_contents = SpacificationCotent::where('property_spacification_id', $d_project_specification->id)->get();
        foreach ($d_project_specification_contents as $d_project_specification_content) {
            $d_project_specification_content->delete();
        }
        $d_project_specification->delete();
        return Response::json(['status' => 'success'], 200);
    }

    public function delete(Request $request)
    {

        try {
            $this->deleteProperty($request->property_id);
        } catch (\Exception $e) {
            Session::flash('warning', 'Something went wrong!');

            return redirect()->back();
        }

        Session::flash('success', 'Property deleted successfully!');
        return redirect()->back();
    }

    public function deleteProperty($id)
    {

        $property = Property::find($id);

        if (!is_null($property->featured_image)) {
            @unlink(public_path('assets/img/property/featureds/' . $property->featured_image));
        }

        if (!is_null($property->floor_planning_image)) {
            @unlink(public_path('assets/img/property/plannings/' . $property->floor_planning_image));
        }
        if (!is_null($property->video_image)) {
            @unlink(public_path('assets/img/property/video/' . $property->video_image));
        }
        $property->proertyAmenities()->delete();
        $propertySliderImages  = $property->galleryImages()->get();
        foreach ($propertySliderImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/' . $image->image));
            $image->delete();
        }

        ////////////outdoor,
        $propertyoutdoorImages  = $property->outdoorgalleryImages()->get();
        foreach ($propertyoutdoorImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/outdoor/' . $image->image));
            $image->delete();
        }
        ////////////livingroom,
        $propertylivingroomImages  = $property->livingroomgalleryImages()->get();
        foreach ($propertylivingroomImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/livingroom/' . $image->image));
            $image->delete();
        }
        ////////////bedroom,
        $propertybedroomImages  = $property->bedroomgalleryImages()->get();
        foreach ($propertybedroomImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/bedroom/' . $image->image));
            $image->delete();
        }
        ////////////kitchen,
        $propertykitchenImages  = $property->kitchengalleryImages()->get();
        foreach ($propertykitchenImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/kitchen/' . $image->image));
            $image->delete();
        }
        ////////////washroom,
        $propertywashroomImages  = $property->washroomgalleryImages()->get();
        foreach ($propertywashroomImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/washroom/' . $image->image));
            $image->delete();
        }
        ////////////balcony,
        $propertybalconyImages  = $property->balconygalleryImages()->get();
        foreach ($propertybalconyImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/balcony/' . $image->image));
            $image->delete();
        }
        ////////////terrace,
        $propertyterraceImages  = $property->terracegalleryImages()->get();
        foreach ($propertyterraceImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/terrace/' . $image->image));
            $image->delete();
        }
        ////////////stairs,
        $propertystairsImages  = $property->stairsgalleryImages()->get();
        foreach ($propertystairsImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/stairs/' . $image->image));
            $image->delete();
        }
        ////////////other,
        $propertyotherImages  = $property->othergalleryImages()->get();
        foreach ($propertyotherImages  as  $image) {

            @unlink(public_path('assets/img/property/slider-images/other/' . $image->image));
            $image->delete();
        }


        $specifications = $property->specifications()->get();
        foreach ($specifications as $specification) {
            $specificationContents = $specification->specificationContents()->get();
            foreach ($specificationContents as $sContent) {

                $sContent->delete();
            }
            $specification->delete();
        }

        $propertyContents = $property->propertyContents()->get();

        foreach ($propertyContents as $content) {

            $content->delete();
        }
        $property->propertyMessages()->delete();
        $property->featuredProperties()->delete();
        // delete wishlists 
        $property->wishlists()->delete();
        $property->delete();


        return;
    }

    public function bulkDelete(Request $request)
    {

        $propertyIds = $request->ids;
        try {
            foreach ($propertyIds as $id) {
                $this->deleteProperty($id);
            }
        } catch (\Exception $e) {
            Session::flash('warning', 'Something went wrong!');

            return redirect()->back();
        }
        Session::flash('success', 'Properties deleted successfully!');
        return response()->json(['status' => 'success'], 200);
    }
}
