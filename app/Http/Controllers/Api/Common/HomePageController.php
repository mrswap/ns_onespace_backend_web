<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\MiscellaneousController;
use App\Models\BasicSettings\Basic;
use App\Models\CounterSection;
use App\Models\HomePage\AboutSection;
use App\Models\HomePage\CategorySection;
use App\Models\HomePage\CitySection;
use App\Models\HomePage\PropertySection;
use App\Models\HomePage\Section;
use App\Models\HomePage\WhyChooseUs;
use App\Models\Package;
use App\Models\Amenity;
use App\Models\Property\City;
use App\Models\Property\Country;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\State;
use App\Models\Prominence\FeatureSection;
use App\Models\Project\Project;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function homeData(Request $request)
    {
        $secInfo = Section::first();
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $data = [];

        $data['seoInfo'] = $language->seoInfo()->select('meta_keyword_home', 'meta_description_home')->first();



        $data['propertySecInfo'] = PropertySection::where('language_id', $language->id)->first();
        $data['featuredSecInfo'] = FeatureSection::where('language_id', $language->id)->first();
        $data['categorySecInfo'] = CategorySection::where('language_id', $language->id)->first();
        $data['citySecInfo'] = CitySection::where('language_id', $language->id)->first();

        $data['property_categories'] = PropertyCategory::with('categoryContent')->where('status', 1)->get();
        $data['amenities'] = Amenity::with('amenityContent')->where('status', 1)->orderBy('serial_number')->get();

        $properties = Property::where([['status', 1], ['approve_status', 1]])
            ->join('property_contents', 'property_contents.property_id', 'properties.id')
            ->where('property_contents.language_id', $language->id)
            ->select('properties.*', 'property_contents.title', 'property_contents.slug')
            ->latest()
            ->take(8)
            ->get();

        $data['properties'] = $properties;

        $timezone = Basic::pluck('timezone')->first();
        $data['featured_properties'] = Property::where([['properties.status', 1], ['properties.approve_status', 1]])
            ->leftJoin('featured_properties', 'featured_properties.property_id', 'properties.id')
            ->leftJoin('property_contents', 'property_contents.property_id', 'properties.id')
            ->where([
                ['featured_properties.status', 1],
                ['featured_properties.start_date', '<=', Carbon::now()->timezone($timezone)],
                ['featured_properties.end_date', '>=', Carbon::now()->timezone($timezone)],
                ['property_contents.language_id', $language->id],
            ])
            ->select('properties.*', 'property_contents.title', 'property_contents.slug')
            ->inRandomOrder()
            ->take(10)
            ->get();

        $data['price_range'] = [
            'min' => Property::where([['status', 1], ['approve_status', 1]])->min('price'),
            'max' => Property::where([['status', 1], ['approve_status', 1]])->max('price')
        ];

        $data['medias'] = DB::table('insta_post_links')->orderByDesc('id')->get();

        return response()->json([
            'status' => true,
            'message' => 'Home data fetched successfully.',
            'data' => $data
        ]);
    }
    public function propertiesData(Request $request, $type, $value,$limit)
    {

        $properties = Property::where([['status', 1], ['approve_status', 1]])
            ->join('property_contents', 'property_contents.property_id', 'properties.id')
            ->where("properties.$type", $value)
            ->select('properties.*', 'property_contents.title', 'property_contents.slug')
            ->latest()
            ->take($limit)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Filtered properties fetched successfully.',
            'data' => $properties,
        ]);
    }
}
