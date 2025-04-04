<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\MiscellaneousController;
use App\Models\BasicSettings\Basic;
use App\Models\CounterSection;
use App\Models\HomePage\AboutSection;
use App\Models\HomePage\BrandSection;
use App\Models\HomePage\CategorySection;
use App\Models\HomePage\CitySection;
use App\Models\HomePage\ProjectSection;
use App\Models\HomePage\PropertySection;
use App\Models\HomePage\Section;
use App\Models\HomePage\VendorSection;
use App\Models\HomePage\WhyChooseUs;
use App\Models\Package;
use App\Models\Amenity;
use App\Models\AmenityContent;
use App\Models\Planpackages;
use App\Models\Service;
use App\Models\Service_content;
use App\Models\CareersJob;
use App\Models\CareersJob_content;
use App\Models\Project\Project;
use App\Models\Prominence\FeatureSection;
use App\Models\Property\City;
use App\Models\Property\Country;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyCategoryContent;
use App\Models\Property\State;
use App\Models\Vendor;
use App\Models\CareersJob_apply;
use App\Models\PropertyEnquiry;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Validation\Rule;
use App\Rules\MatchEmailRule;
use App\Rules\MatchOldPasswordRule;
use App\Models\Property\Wishlist;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\PropertyAssets;
use App\Models\FeaturedPricing;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function index(Request $request)
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $secInfo = Section::query()->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['language'] = $language;

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_home', 'meta_description_home')->first();

        if ($secInfo->counter_section_status == 1) {
            $queryResult['counterSectionImage'] = Basic::query()->pluck('counter_section_image')->first();
            $queryResult['counterSectionInfo'] = CounterSection::where('language_id', $language->id)->first();
            $queryResult['counters'] = $language->counterInfo()->orderByDesc('id')->get();
        }

        $queryResult['counter_informations'] = DB::table('counter_informations')
            ->where('amount', '>', 0)
            ->get();

        $queryResult['currencyInfo'] = $this->getCurrencyInfo();

        $queryResult['secInfo'] = $secInfo;

        // for real estate query

        if ($themeVersion == 2) {
            $queryResult['sliderInfos'] = $language->sliderInfo()->orderByDesc('id')->get();
            $queryResult['packages'] = Package::where([['status', 1], ['is_featured', 1]])->get();
            $queryResult['pricingSecInfo'] = $language->pricingSection()->first();
        }

        if ($themeVersion != 2) {
            $queryResult['heroStatic'] = $language->heroStatic()->first();
            $queryResult['heroImg'] = Basic::query()->pluck('hero_static_img')->first();
        }

        if ($secInfo->property_section_status == 1) {
            $queryResult['propertySecInfo'] = PropertySection::where('language_id', $language->id)->first();
        }

        if ($themeVersion != 3) {
            $queryResult['featuredSecInfo'] = FeatureSection::where('language_id', $language->id)->first();
        }
        if ($themeVersion == 2 || $themeVersion == 3) {
            $queryResult['catgorySecInfo'] = CategorySection::where('language_id', $language->id)->first();
        }
        if ($themeVersion == 1) {
            $queryResult['citySecInfo'] = CitySection::where('language_id', $language->id)->first();
        }

        if ($secInfo->testimonial_section_status == 1) {
            $queryResult['testimonialSecInfo'] = $language->testimonialSection()->first();
            $queryResult['testimonials'] = $language->testimonial()->orderByDesc('id')->get();
            $queryResult['testimonialSecImage'] = Basic::query()->pluck('testimonial_section_image')->first();
        }

        if ($themeVersion == 2 && $secInfo->call_to_action_section_status == 1) {
            $queryResult['callToActionSectionImage'] = Basic::query()->pluck('call_to_action_section_image')->first();
            $queryResult['callToActionSecInfo'] = $language->callToActionSection()->first();
        }

        if ($themeVersion == 1 && $secInfo->subscribe_section_status == 1) {
            $queryResult['subscribeSectionImage'] = Basic::query()->pluck('subscribe_section_img')->first();
            $queryResult['subscribeSecInfo'] = $language->subscribeSection()->first();
        }

        if ($secInfo->work_process_section_status == 1 && ($themeVersion == 2 || $themeVersion == 3)) {
            $queryResult['workProcessSecInfo'] = $language->workProcessSection()->first();
            $queryResult['processes'] = $language->workProcess()->orderBy('serial_number', 'asc')->get();
        }

        $proeprty_categories = PropertyCategory::where([['status', 1], ['featured', 1]])->with([
            'categoryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->orderBy('serial_number', 'asc')->get();

        $all_proeprty_categories = PropertyCategory::where('status', 1)->with([
            'categoryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->orderBy('serial_number', 'asc')->get();

        $queryResult['all_cities'] = City::where('status', 1)->with([
            'cityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['amenities'] = Amenity::where('status', 1)->with([
            'amenityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->orderBy('serial_number')->get();
        $queryResult['all_states'] = State::with([
            'stateContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['all_countries'] = Country::with([
            'countryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['property_categories'] = $proeprty_categories;
        $queryResult['all_proeprty_categories'] = $all_proeprty_categories;

        $properties = Property::where([['properties.status', 1], ['properties.approve_status', 1]])
            ->where('property_contents.language_id', $language->id)
            ->join('property_contents', 'property_contents.property_id', 'properties.id')
            ->join('property_categories', 'property_categories.id', 'properties.category_id')
            ->when('properties.vendor_id' != 0, function ($query) {

                $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                    ->where(function ($query) {
                        $query->where([
                            ['memberships.status', '=', 1],
                            ['memberships.start_date', '<=', now()->format('Y-m-d')],
                            ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                        ])->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->when('properties.vendor_id' != 0, function ($query) {
                return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                    ->where(function ($query) {
                        $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->select('properties.*', 'property_contents.language_id', 'property_contents.slug', 'property_contents.title', 'property_contents.address', 'property_contents.language_id')->latest()->take(8)->get();

        $queryResult['properties'] = $properties;
        $timezone = Basic::pluck('timezone')->first();

        $queryResult['featured_properties'] = Property::where([['properties.status', 1], ['properties.approve_status', 1]])->leftJoin('featured_properties', 'featured_properties.property_id', 'properties.id')
            ->leftJoin('property_contents', 'property_contents.property_id', 'properties.id')
            ->leftJoin('property_categories', 'property_categories.id', 'properties.category_id')
            ->when('properties.vendor_id' != 0, function ($query) {

                $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                    ->where(function ($query) {
                        $query->where([
                            ['memberships.status', '=', 1],
                            ['memberships.start_date', '<=', now()->format('Y-m-d')],
                            ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                        ])->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->when('properties.vendor_id' != 0, function ($query) {
                return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                    ->where(function ($query) {
                        $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->where([
                ['featured_properties.status', 1],
                ['featured_properties.start_date', '<=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
                ['featured_properties.end_date', '>=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
            ])
            ->where('property_contents.language_id', $language->id)
            ->select(
                'properties.*',
                'featured_properties.id as featured_id',
                'property_contents.slug',
                'property_contents.title',
                'property_contents.address',
                'property_contents.language_id'
            )
            ->inRandomOrder()
            ->take(10)
            ->get();

        if ($themeVersion == 3 && $secInfo->project_section_status == 1) {

            $queryResult['projects'] = Project::where('projects.approve_status', 1)->leftJoin('project_contents', 'project_contents.project_id', 'projects.id')
                ->when('projects.vendor_id' != 0, function ($query) {

                    $query->leftJoin('memberships', 'projects.vendor_id', '=', 'memberships.vendor_id')
                        ->where(function ($query) {
                            $query->where([
                                ['memberships.status', '=', 1],
                                ['memberships.start_date', '<=', now()->format('Y-m-d')],
                                ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                            ])->orWhere('projects.vendor_id', '=', 0);
                        });
                })
                ->when('projects.vendor_id' != 0, function ($query) {
                    return $query->leftJoin('vendors', 'projects.vendor_id', '=', 'vendors.id')
                        ->where(function ($query) {
                            $query->where('vendors.status', '=', 1)->orWhere('projects.vendor_id', '=', 0);
                        });
                })
                ->where('projects.featured', 1)
                ->where('project_contents.language_id', $language->id)
                ->select('projects.*', 'project_contents.slug', 'project_contents.title', 'project_contents.address')->inRandomOrder()->latest()->take(8)->get();
            $queryResult['projectInfo'] = ProjectSection::where('language_id', $language->id)->first();
        }

        $queryResult['aboutImg'] = Basic::query()->select('about_section_image1', 'about_section_image2', 'about_section_video_link')->first();
        $queryResult['aboutInfo'] = AboutSection::where('language_id', $language->id)->first();

        if ($themeVersion == 1 && $secInfo->vendor_section_status == 1) {

            $queryResult['vendorInfo'] = VendorSection::where('language_id', $language->id)->first();

            $queryResult['vendors'] = Vendor::join('memberships', 'memberships.vendor_id', 'vendors.id')
                ->where([
                    ['memberships.status', 1],
                    ['memberships.start_date', '<=', Carbon::now()->format('Y-m-d')],
                    ['memberships.expire_date', '>=', Carbon::now()->format('Y-m-d')],
                ])->where([['vendors.status', 1], ['vendors.id', '!=', 0]])
                ->with([
                    'properties' => function ($q) {
                        $q->where([['approve_status', 1], ['status', 1]]);
                    },
                    'projects' => function ($q) {
                        $q->where('approve_status', 1);
                    },
                    'agents',
                ])
                ->select('vendors.*')->inRandomOrder()->take(5)->get();
        }

        if ($themeVersion == 1 && $secInfo->why_choose_us_section_status == 1) {
            $queryResult['whyChooseUsImg'] = Basic::query()->select('why_choose_us_section_img1', 'why_choose_us_section_img2', 'why_choose_us_section_video_link')->first();
            $queryResult['whyChooseUsInfo'] = WhyChooseUs::where('language_id', $language->id)->first();
        }

        if ($themeVersion == 1 && $secInfo->cities_section_status == 1) {
            $cities = City::where([['status', 1], ['featured', 1]])->limit(6)->orderBy('serial_number', 'asc')->get();
            $cities->map(function ($city) use ($language) {
                $city['propertyCount'] = $city->properties()->count();
                $city['name'] = $city->getContent($language->id)->name;
            });

            $queryResult['cities'] = $cities;
        }

        if (($themeVersion == 2 || $themeVersion == 3) && $secInfo->brand_section_status == 1) {
            $queryResult['brands'] = BrandSection::get();
        }
        $min = Property::where([['status', 1], ['approve_status', 1]])->min('price');
        $max = Property::where([['status', 1], ['approve_status', 1]])->max('price');
        $queryResult['min'] = intval($min);
        $queryResult['max'] = intval($max);

        $queryResult['medias'] = DB::table('insta_post_links')->orderByDesc('id')->get();
        // dd($queryResult);
        if ($themeVersion == 1) {
            return view('frontend.home.index-v1', $queryResult);
        } elseif ($themeVersion == 2) {
            return view('frontend.home.index-v2', $queryResult);
        } elseif ($themeVersion == 3) {
            return view('frontend.home.index-v3', $queryResult);
        } elseif ($themeVersion == 4) {
            return view('frontend.home.index-v4', $queryResult);
        } elseif ($themeVersion == 5) {
            return view('frontend.home.index-v5', $queryResult);
        }
    }
    public function secondIndex(Request $request)
    {
        $themeVersion = 2;

        $secInfo = Section::query()->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['language'] = $language;

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_home', 'meta_description_home')->first();

        if ($secInfo->counter_section_status == 1) {
            $queryResult['counterSectionImage'] = Basic::query()->pluck('counter_section_image')->first();
            $queryResult['counterSectionInfo'] = CounterSection::where('language_id', $language->id)->first();
            $queryResult['counters'] = $language->counterInfo()->orderByDesc('id')->get();
        }

        $queryResult['currencyInfo'] = $this->getCurrencyInfo();

        $queryResult['secInfo'] = $secInfo;

        // for real estate query

        if ($themeVersion == 2) {
            $queryResult['sliderInfos'] = $language->sliderInfo()->orderByDesc('id')->get();
            $queryResult['packages'] = Package::where([['status', 1], ['is_featured', 1]])->get();
            $queryResult['pricingSecInfo'] = $language->pricingSection()->first();
        }

        if ($themeVersion != 2) {
            $queryResult['heroStatic'] = $language->heroStatic()->first();
            $queryResult['heroImg'] = Basic::query()->pluck('hero_static_img')->first();
        }

        if ($secInfo->property_section_status == 1) {
            $queryResult['propertySecInfo'] = PropertySection::where('language_id', $language->id)->first();
        }

        if ($themeVersion != 3) {
            $queryResult['featuredSecInfo'] = FeatureSection::where('language_id', $language->id)->first();
        }
        if ($themeVersion == 2 || $themeVersion == 3) {
            $queryResult['catgorySecInfo'] = CategorySection::where('language_id', $language->id)->first();
        }
        if ($themeVersion == 1) {
            $queryResult['citySecInfo'] = CitySection::where('language_id', $language->id)->first();
        }

        if ($secInfo->testimonial_section_status == 1) {
            $queryResult['testimonialSecInfo'] = $language->testimonialSection()->first();
            $queryResult['testimonials'] = $language->testimonial()->orderByDesc('id')->get();
            $queryResult['testimonialSecImage'] = Basic::query()->pluck('testimonial_section_image')->first();
        }

        if ($themeVersion == 2 && $secInfo->call_to_action_section_status == 1) {
            $queryResult['callToActionSectionImage'] = Basic::query()->pluck('call_to_action_section_image')->first();
            $queryResult['callToActionSecInfo'] = $language->callToActionSection()->first();
        }

        if ($themeVersion == 1 && $secInfo->subscribe_section_status == 1) {
            $queryResult['subscribeSectionImage'] = Basic::query()->pluck('subscribe_section_img')->first();
            $queryResult['subscribeSecInfo'] = $language->subscribeSection()->first();
        }

        if ($secInfo->work_process_section_status == 1 && ($themeVersion == 2 || $themeVersion == 3)) {
            $queryResult['workProcessSecInfo'] = $language->workProcessSection()->first();
            $queryResult['processes'] = $language->workProcess()->orderBy('serial_number', 'asc')->get();
        }

        $proeprty_categories = PropertyCategory::where([['status', 1], ['featured', 1]])->with([
            'categoryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->orderBy('serial_number', 'asc')->get();

        $all_proeprty_categories = PropertyCategory::where('status', 1)->with([
            'categoryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->orderBy('serial_number', 'asc')->get();

        $queryResult['all_cities'] = City::where('status', 1)->with([
            'cityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['all_states'] = State::with([
            'stateContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['all_countries'] = Country::with([
            'countryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            },
        ])->get();
        $queryResult['property_categories'] = $proeprty_categories;
        $queryResult['all_proeprty_categories'] = $all_proeprty_categories;

        $properties = Property::where([['properties.status', 1], ['properties.approve_status', 1]])
            ->where('property_contents.language_id', $language->id)
            ->join('property_contents', 'property_contents.property_id', 'properties.id')
            ->join('property_categories', 'property_categories.id', 'properties.category_id')
            ->when('properties.vendor_id' != 0, function ($query) {

                $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                    ->where(function ($query) {
                        $query->where([
                            ['memberships.status', '=', 1],
                            ['memberships.start_date', '<=', now()->format('Y-m-d')],
                            ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                        ])->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->when('properties.vendor_id' != 0, function ($query) {
                return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                    ->where(function ($query) {
                        $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->select('properties.*', 'property_contents.language_id', 'property_contents.slug', 'property_contents.title', 'property_contents.address', 'property_contents.language_id')->latest()->take(8)->get();

        $queryResult['properties'] = $properties;
        $timezone = Basic::pluck('timezone')->first();

        $queryResult['featured_properties'] = Property::where([['properties.status', 1], ['properties.approve_status', 1]])->leftJoin('featured_properties', 'featured_properties.property_id', 'properties.id')
            ->leftJoin('property_contents', 'property_contents.property_id', 'properties.id')
            ->leftJoin('property_categories', 'property_categories.id', 'properties.category_id')
            ->when('properties.vendor_id' != 0, function ($query) {

                $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                    ->where(function ($query) {
                        $query->where([
                            ['memberships.status', '=', 1],
                            ['memberships.start_date', '<=', now()->format('Y-m-d')],
                            ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                        ])->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->when('properties.vendor_id' != 0, function ($query) {
                return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                    ->where(function ($query) {
                        $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                    });
            })
            ->where([
                ['featured_properties.status', 1],
                ['featured_properties.start_date', '<=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
                ['featured_properties.end_date', '>=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
            ])
            ->where('property_contents.language_id', $language->id)
            ->select(
                'properties.*',
                'featured_properties.id as featured_id',
                'property_contents.slug',
                'property_contents.title',
                'property_contents.address',
                'property_contents.language_id'
            )
            ->inRandomOrder()
            ->take(10)
            ->get();

        if ($themeVersion == 3 && $secInfo->project_section_status == 1) {

            $queryResult['projects'] = Project::where('projects.approve_status', 1)->leftJoin('project_contents', 'project_contents.project_id', 'projects.id')
                ->when('projects.vendor_id' != 0, function ($query) {

                    $query->leftJoin('memberships', 'projects.vendor_id', '=', 'memberships.vendor_id')
                        ->where(function ($query) {
                            $query->where([
                                ['memberships.status', '=', 1],
                                ['memberships.start_date', '<=', now()->format('Y-m-d')],
                                ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                            ])->orWhere('projects.vendor_id', '=', 0);
                        });
                })
                ->when('projects.vendor_id' != 0, function ($query) {
                    return $query->leftJoin('vendors', 'projects.vendor_id', '=', 'vendors.id')
                        ->where(function ($query) {
                            $query->where('vendors.status', '=', 1)->orWhere('projects.vendor_id', '=', 0);
                        });
                })
                ->where('projects.featured', 1)
                ->where('project_contents.language_id', $language->id)
                ->select('projects.*', 'project_contents.slug', 'project_contents.title', 'project_contents.address')->inRandomOrder()->latest()->take(8)->get();
            $queryResult['projectInfo'] = ProjectSection::where('language_id', $language->id)->first();
        }

        $queryResult['aboutImg'] = Basic::query()->select('about_section_image1', 'about_section_image2', 'about_section_video_link')->first();
        $queryResult['aboutInfo'] = AboutSection::where('language_id', $language->id)->first();

        if ($themeVersion == 1 && $secInfo->vendor_section_status == 1) {

            $queryResult['vendorInfo'] = VendorSection::where('language_id', $language->id)->first();

            $queryResult['vendors'] = Vendor::join('memberships', 'memberships.vendor_id', 'vendors.id')
                ->where([
                    ['memberships.status', 1],
                    ['memberships.start_date', '<=', Carbon::now()->format('Y-m-d')],
                    ['memberships.expire_date', '>=', Carbon::now()->format('Y-m-d')],
                ])->where([['vendors.status', 1], ['vendors.id', '!=', 0]])
                ->with([
                    'properties' => function ($q) {
                        $q->where([['approve_status', 1], ['status', 1]]);
                    },
                    'projects' => function ($q) {
                        $q->where('approve_status', 1);
                    },
                    'agents',
                ])
                ->select('vendors.*')->inRandomOrder()->take(5)->get();
        }

        if ($themeVersion == 1 && $secInfo->why_choose_us_section_status == 1) {
            $queryResult['whyChooseUsImg'] = Basic::query()->select('why_choose_us_section_img1', 'why_choose_us_section_img2', 'why_choose_us_section_video_link')->first();
            $queryResult['whyChooseUsInfo'] = WhyChooseUs::where('language_id', $language->id)->first();
        }

        if ($themeVersion == 1 && $secInfo->cities_section_status == 1) {
            $cities = City::where([['status', 1], ['featured', 1]])->limit(6)->orderBy('serial_number', 'asc')->get();
            $cities->map(function ($city) use ($language) {
                $city['propertyCount'] = $city->properties()->count();
                $city['name'] = $city->getContent($language->id)->name;
            });

            $queryResult['cities'] = $cities;
        }

        if (($themeVersion == 2 || $themeVersion == 3) && $secInfo->brand_section_status == 1) {
            $queryResult['brands'] = BrandSection::get();
        }
        $min = Property::where([['status', 1], ['approve_status', 1]])->min('price');
        $max = Property::where([['status', 1], ['approve_status', 1]])->max('price');
        $queryResult['min'] = intval($min);
        $queryResult['max'] = intval($max);

        return view('frontend.home.index-v4', $queryResult);
    }

    public function propertylisting($type = null, Request $request)
    {
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;
        $type = explode("-", $type);
        if (is_array($type)) {
            $proeprty_categories = PropertyCategory::where([['status', 1], ['featured', 1]])->with([
                'categoryContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                },
            ])->orderBy('serial_number', 'asc')->get();

            $all_proeprty_categories = PropertyCategory::where('status', 1)->with([
                'categoryContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                },
            ])->orderBy('serial_number', 'asc')->get();

            $queryResult['all_cities'] = City::where('status', 1)->with([
                'cityContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                },
            ])->get();
            $queryResult['all_states'] = State::with([
                'stateContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                },
            ])->get();
            $queryResult['all_countries'] = Country::with([
                'countryContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                },
            ])->get();
            $queryResult['property_categories'] = $proeprty_categories;
            $queryResult['all_proeprty_categories'] = $all_proeprty_categories;
            $queryResult['amenities'] = Amenity::where('status', 1)->with([
                'amenityContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                }
            ])->orderBy('serial_number')->get();

            $categories = PropertyCategory::where('status', 1)->with([
                'categoryContent' => function ($q) use ($language) {
                    $q->where('language_id', $language->id);
                }
            ])->get();
            $categories->map(function ($category) {
                $category['propertiesCount'] = $category->properties()->where([['status', 1], ['approve_status', 1]])->count();
            });
            $queryResult['categories'] = $categories;
            $propertyCategory = null;
            $category = null;
            if ($request->filled('category') && $request->category != 'all') {
                $category = $request->category;
                $propertyCategory = PropertyCategoryContent::where([['language_id', $language->id], ['slug', $category]])->first();
            }
            $amenities = [];
            $amenityInContentId = [];
            if ($request->filled('amenities')) {
                $amenities = $request->amenities;
                foreach ($amenities as $amenity) {
                    $amenConId = AmenityContent::where('name', $amenity)->where('language_id', $language->id)->pluck('amenity_id')->first();
                    array_push($amenityInContentId, $amenConId);
                }
            }

            $amenityInContentId = array_unique($amenityInContentId);
            $propertytype = null;
            if ($request->filled('type') && $request->type != 'all') {
                $propertytype = $request->type;
            }


            $latitude  = null;
            if ($request->filled('latitude ')) {
                $latitude  = $request->latitude;
            }
            $longitude  = null;
            if ($request->filled('longitude ')) {
                $longitude  = $request->longitude;
            }

            $radius  = 5;
            if ($request->filled('radius ')) {
                $radius  = $request->radius;
            }

            $price = null;
            if ($request->filled('price') && $request->price != 'all') {
                $price = $request->price;
            }


            $purpose = null;
            if ($request->filled('purpose') && $request->purpose != 'all') {
                $purpose = $request->purpose;
            }
            // dd( $purpose);


            $min = $max = null;
            if ($request->filled('min') && $request->filled('max')) {
                $min = intval($request->min);
                $max = intval(($request->max));
            }
            if ($request->filled('priceRange') && $request->priceRange != 'all') {
                $priceRange = explode('-', $request->priceRange);
                $min = $priceRange[0];
                $max = $priceRange[1];
            }
            $title = $location = $beds = $baths = $area = $countryId = $stateId = $cityId = null;
            if ($request->filled('country') && $request->filled('country')) {

                $country = CountryContent::where([['name', $request->country], ['language_id', $language->id]])->first();
                if ($country) {
                    $countryId = $country->country_id;
                }
            }
            if ($request->filled('state') && $request->filled('state')) {

                $state = StateContent::where([['name', $request->state], ['language_id', $language->id]])->first();
                if ($state) {
                    $stateId = $state->state_id;
                }
            }
            if ($request->filled('city') && $request->filled('city')) {

                $city = CityContent::where([['name', $request->city], ['language_id', $language->id]])->first();
                if ($city) {
                    $cityId = $city->city_id;
                }
            }
            if ($request->filled('title') && $request->filled('title')) {
                $title = $request->title;
            }

            if ($request->filled('location') && $request->filled('location')) {
                $location = $request->location;
            }
            if ($request->filled('beds') && $request->filled('beds')) {
                $beds = $request->beds;
            }
            if ($request->filled('baths') && $request->filled('baths')) {
                $baths = $request->baths;
            }
            if ($request->filled('area') && $request->filled('area')) {
                $area = $request->area;
            }
            $areaRangemin = "";
            $areaRangemax = "";
            if ($request->filled('areaRange') && $request->areaRange != 'all') {
                $priceRange1 = str_replace('.00sft', '', $request->areaRange);
                $priceRange = explode(' - ', $request->areaRange);
                $areaRangemin = $priceRange[0];
                $areaRangemin = $priceRange[1];
            }
            $AvailableFor = "";
            if ($request->filled('AvailableFor') && $request->filled('AvailableFor')) {
                $AvailableFor = $request->AvailableFor;
            }
            $AvailableFrom = "";
            if ($request->filled('AvailableFrom') && $request->filled('AvailableFrom')) {
                $AvailableFrom = $request->AvailableFrom;
            }
            $availability = "";
            if ($request->filled('availability') && $request->filled('availability')) {
                $availability = $request->availability;
            }

            if ($request->filled('sort')) {
                if ($request['sort'] == 'new') {
                    $order_by_column = 'properties.id';
                    $order = 'desc';
                } elseif ($request['sort'] == 'old') {
                    $order_by_column = 'properties.id';
                    $order = 'asc';
                } elseif ($request['sort'] == 'high-to-low') {
                    $order_by_column = 'properties.price';
                    $order = 'desc';
                } elseif ($request['sort'] == 'low-to-high') {
                    $order_by_column = 'properties.price';
                    $order = 'asc';
                } else {
                    $order_by_column = 'properties.id';
                    $order = 'desc';
                }
            } else {
                $order_by_column = 'properties.id';
                $order = 'desc';
            }

            // \DB::enableQueryLog();

            $properties = Property::where([
                ['properties.status', 1],
                ['properties.approve_status', 1],
                ['properties.purpose', $type[0]],
                ['properties.type', $type[1]],
            ])
                ->where('property_contents.language_id', $language->id)
                ->join('property_contents', 'property_contents.property_id', 'properties.id')
                ->join('property_categories', 'property_categories.id', 'properties.category_id')
                ->when('properties.vendor_id' != 0, function ($query) {
                    $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                        ->where(function ($query) {
                            $query->where([
                                ['memberships.status', '=', 1],
                                ['memberships.start_date', '<=', now()->format('Y-m-d')],
                                ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                            ])->orWhere('properties.vendor_id', '=', 0);
                        });
                })

                ->when('properties.vendor_id' != 0, function ($query) {
                    return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                        ->where(function ($query) {
                            $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                        });
                })
                ->when($propertytype, function ($query) use ($propertytype) {
                    return $query->where('properties.type', $propertytype);
                })
                ->when($purpose, function ($query) use ($purpose) {
                    return $query->where('properties.purpose', $purpose);
                })
                ->when($countryId, function ($query) use ($countryId) {
                    return $query->where('properties.country_id', $countryId);
                })
                ->when($stateId, function ($query) use ($stateId) {
                    return $query->where('properties.state_id', $stateId);
                })
                ->when($cityId, function ($query) use ($cityId) {
                    return $query->where('properties.city_id', $cityId);
                })
                ->when($category && $propertyCategory, function ($query) use ($propertyCategory) {
                    return $query->where('properties.category_id', $propertyCategory->category_id);
                })
                ->when(!empty($amenityInContentId), function ($query) use ($amenityInContentId) {
                    $query->whereHas(
                        'proertyAmenities',
                        function ($q) use ($amenityInContentId) {
                            $q->whereIn('amenity_id', $amenityInContentId);
                        },
                        '=',
                        count($amenityInContentId)
                    );
                })
                ->when($price, function ($query) use ($price) {
                    if ($price == 'negotiable') {
                        return $query->where('properties.price', null);
                    } elseif ($price == 'fixed') {

                        return $query->where('properties.price', '!=', null);
                    } else {
                        return $query;
                    }
                })

                ->when($min, function ($query) use ($min, $max, $price) {
                    if ($price == 'fixed' || empty($price)) {
                        return $query->where('properties.price', '>=', $min)
                            ->where('properties.price', '<=', $max);
                    } else {
                        return $query;
                    }
                })
                ->when($areaRangemin, function ($query) use ($areaRangemin, $areaRangemax, $price) {
                    if ($price == 'fixed' || empty($price)) {
                        return $query->where('properties.area', '>=', $areaRangemin)
                            ->where('properties.area', '<=', $areaRangemax);
                    } else {
                        return $query;
                    }
                })

                ->when($beds, function ($query) use ($beds) {
                    return $query->where('properties.beds', $beds);
                })
                ->when($AvailableFrom, function ($query) use ($AvailableFrom) {
                    return $query->where('properties.AvailableFrom', $AvailableFrom);
                })
                ->when($AvailableFor, function ($query) use ($AvailableFor) {
                    return $query->where('properties.AvailableFor', $AvailableFor);
                })
                ->when($availability, function ($query) use ($availability) {
                    return $query->where('properties.availability', $availability);
                })
                ->when($baths, function ($query) use ($baths) {
                    return $query->where('properties.bath', $baths);
                })
                ->when($area, function ($query) use ($area) {
                    return $query->where('properties.area', $area);
                })
                ->when($title, function ($query) use ($title) {
                    return $query->where('property_contents.title', 'LIKE', '%' . $title . '%');
                })
                ->when($location, function ($query) use ($location) {
                    return $query->where('property_contents.address', 'LIKE', '%' . $location . '%');
                })
                ->with([
                    'categoryContent' => function ($q) use ($language) {
                        $q->where('language_id', $language->id);
                    }
                ])

                ->select('properties.*', 'property_contents.language_id', 'property_contents.slug', 'property_contents.title', 'property_contents.address', 'property_contents.language_id')->latest()->take(8)->get();
            // dd(\DB::getQueryLog());

            $queryResult['properties'] = $properties;
            $timezone = Basic::pluck('timezone')->first();
            $min = Property::where([['status', 1], ['approve_status', 1]])->min('price');
            $max = Property::where([['status', 1], ['approve_status', 1]])->max('price');
            $queryResult['min'] = intval($min);
            $queryResult['max'] = intval($max);

            $queryResult['featured_properties'] = Property::where(

                [
                    ['properties.status', 1],
                    ['properties.approve_status', 1],
                    ['properties.purpose', $type[0]],
                    ['properties.type', $type[1]],
                ]

            )
                ->leftJoin('featured_properties', 'featured_properties.property_id', 'properties.id')
                ->leftJoin('property_contents', 'property_contents.property_id', 'properties.id')
                ->leftJoin('property_categories', 'property_categories.id', 'properties.category_id')
                ->when('properties.vendor_id' != 0, function ($query) {

                    $query->leftJoin('memberships', 'properties.vendor_id', '=', 'memberships.vendor_id')
                        ->where(function ($query) {
                            $query->where([
                                ['memberships.status', '=', 1],
                                ['memberships.start_date', '<=', now()->format('Y-m-d')],
                                ['memberships.expire_date', '>=', now()->format('Y-m-d')],
                            ])->orWhere('properties.vendor_id', '=', 0);
                        });
                })
                ->when('properties.vendor_id' != 0, function ($query) {
                    return $query->leftJoin('vendors', 'properties.vendor_id', '=', 'vendors.id')
                        ->where(function ($query) {
                            $query->where('vendors.status', '=', 1)->orWhere('properties.vendor_id', '=', 0);
                        });
                })
                ->where([
                    ['featured_properties.status', 1],
                    ['featured_properties.start_date', '<=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
                    ['featured_properties.end_date', '>=', Carbon::now()->timezone($timezone)->format('Y-m-d H:i:s')],
                ])
                ->where('property_contents.language_id', $language->id)
                ->select(
                    'properties.*',
                    'featured_properties.id as featured_id',
                    'property_contents.slug',
                    'property_contents.title',
                    'property_contents.address',
                    'property_contents.language_id'
                )
                ->inRandomOrder()
                ->take(10)
                ->get();
            // $queryResult['properties'] = array_merge(
            //     $queryResult['properties']->toArray(),
            //     $queryResult['featured_properties']->toArray()
            // );
            // echo"<pre>";print_r($queryResult);die;
            // dd($queryResult);

        }
        if ($request->ajax()) {
            if ($themeVersion == 5) {
                $viewContent = View::make('frontend.v5.Property', $queryResult);
                $viewContent = $viewContent->render();
            } else {
                $viewContent = View::make('frontend.property.property', $queryResult);
                $viewContent = $viewContent->render();
            }
            return response()->json(['propertyContents' => $viewContent, 'properties' => $property_contents])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        }
        return view('frontend.v5.propertylisting', $queryResult);
    }
    public function propertymanagement()
    {
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;
        $queryResult['planpackages'] =  FeaturedPricing::where('status', 1)
            ->whereIn('for', ['seller', 'owner'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $services = Service::where([
            ['services.status', 1],
            // ['properties.approve_status', 1],
            // ['properties.purpose', $type[0]],
            // ['properties.type', $type[1]],
        ])
            ->where('service_contents.language_id', $language->id)
            ->where('service_contents.type', 'propertymanagement')
            ->join('service_contents', 'service_contents.service_id', 'services.id')

            ->get();

        $queryResult['services'] = $services;
        $timezone = Basic::pluck('timezone')->first();


        // echo"<pre>";print_r($queryResult);die;


        return view('frontend.v5.propertymanagement', $queryResult);
    }

    public function postproperty(Request $request)
    {
        //echo "<pre>";
        $information = [];
        $information['type'] = $request->type;
        $themeVersion = Basic::query()->pluck('theme_version')->first();
        $language = Language::where('is_default', 1)->first();
        $languages = Language::get();
        $information['languages'] = $languages;
        $information['vendors'] = Vendor::where('id', '!=', 0)->where('status', 1)->get();

        $information['propertyCategories'] = PropertyCategory::where([['status', 1]])->with([
            'categoryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->get();


        $information['Categories'] = Category::query()->where('status', 1)->orderByDesc('id')->get();
        $information['SubCategories'] = SubCategory::query()->where('status', 1)->orderByDesc('id')->get();

        $information['propertyCountries'] = Country::with([
            'countryContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->get();
        $information['states'] = State::with([
            'stateContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->get();
        $information['cities'] = City::where('status', 1)->with([
            'cityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->get();
        $information['propertySettings'] = Basic::select('property_state_status', 'property_country_status')->first();

        $information['amenities'] = Amenity::with([
            'amenityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->where('status', 1)->get();


        $information['settings'] = Basic::select('property_state_status', 'property_country_status')->first();


        if ($themeVersion == 5) {
            return view('frontend.v5.postproperty', $information);
        }

        return view('vendors.property.create', $information);
    }

    public function service($type = null)
    {
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;
        $queryResult['type'] = ucwords($type);

        // $planpackages = Planpackages::where([['status', 1]])->get();
        // $queryResult['planpackages'] = $planpackages;

        $queryResult['planpackages'] =  FeaturedPricing::where('status', 1)
            ->whereIn('for', [$type])
            ->orderBy('created_at', 'DESC')
            ->get();


        if ($type) {
            $services = Service::where([
                ['services.status', 1],
                // ['properties.approve_status', 1],
                // ['properties.purpose', $type[0]],
                // ['properties.type', $type[1]],
            ])
                ->where('service_contents.language_id', $language->id)
                ->where('service_contents.type', $type)
                ->join('service_contents', 'service_contents.service_id', 'services.id')

                ->get();

            $queryResult['services'] = $services;
        }
        $timezone = Basic::pluck('timezone')->first();


        // return view('frontend.v5.service', $queryResult);
        return view('frontend.v5.' . $type . 'service', $queryResult);
    }
    public function ourprocess()
    {
        $type = "seller";
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;
        $queryResult['type'] = ucwords($type);

        // $planpackages = Planpackages::where([['status', 1]])->get();
        // $queryResult['planpackages'] = $planpackages;

        $queryResult['planpackages'] =  FeaturedPricing::where('status', 1)
            ->whereIn('for', [$type])
            ->orderBy('created_at', 'DESC')
            ->get();


        if ($type) {
            $services = Service::where([
                ['services.status', 1],
                // ['properties.approve_status', 1],
                // ['properties.purpose', $type[0]],
                // ['properties.type', $type[1]],
            ])
                ->where('service_contents.language_id', $language->id)
                ->where('service_contents.type', $type)
                ->join('service_contents', 'service_contents.service_id', 'services.id')

                ->get();

            $queryResult['services'] = $services;
        }
        $timezone = Basic::pluck('timezone')->first();


        return view('frontend.v5.ourprocess', $queryResult);
    }

    public function career()
    {
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();
        $careers_jobs = CareersJob::where([['careers_jobs.status', 1]])
            ->where('careers_jobs_content.language_id', $language->id)
            ->join('careers_jobs_content', 'careers_jobs_content.jobs_id', 'careers_jobs.id')
            ->select('careers_jobs_content.*')->get();

        $queryResult['careers_jobs'] = $careers_jobs;
        // echo"<pre>";print_r($queryResult);die;
        return view('frontend.v5.career', $queryResult);
    }
    public function career_apply(Request $request)
    {
        // dd($request);
        $careersJob_apply = new CareersJob_apply();
        $careersJob_apply->name = $request->name;
        $careersJob_apply->jobs_id = $request->jobs_id;
        $careersJob_apply->email = $request->email;
        $careersJob_apply->number = $request->number;
        $careersJob_apply->jobtitle = $request->jobtitle;
        $careersJob_apply->message = $request->message;

        if ($request->hasFile('resume')) {
            $destinationPath = '/uploads/app/';
            $file = $request->file('resume');
            $filename = $file->getClientOriginalName();
            $file->move(public_path() . $destinationPath, $filename);
            $careersJob_apply->resume = $destinationPath . $filename;
        }
        // dd($careersJob_apply);

        $careersJob_apply->save();
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();
        $careers_jobs = CareersJob::where([['careers_jobs.status', 1]])
            ->where('careers_jobs_content.language_id', $language->id)
            ->join('careers_jobs_content', 'careers_jobs_content.jobs_id', 'careers_jobs.id')
            ->select('careers_jobs_content.*')->get();

        $queryResult['careers_jobs'] = $careers_jobs;
        $queryResul['success'] = true;
        // echo"<pre>";print_r($queryResult);die;
        return view('frontend.v5.career', $queryResult);
    }

    public function contact_enquiry(Request $request)
    {
        $rules = [
            'property_id' => [
                'required',
            ],
            'email' => [
                'required',
            ]

        ];

        $validator = Validator::make($request->all(), $rules, []);
        // dd($validator->getMessageBag());
        if ($validator->fails()) {
            // return Response::json([
            //     'errors' => $validator->getMessageBag()
            // ], 400);
            return redirect()->back()->with('error', 'Validation Error');
        }
        // dd($request);
        $property_enquiry = new PropertyEnquiry();
        $property_enquiry->property_id = $request->property_id;
        $property_enquiry->user_id = $request->user_id ? $request->user_id : 0;
        $property_enquiry->name = $request->name;
        $property_enquiry->email = $request->email;
        $property_enquiry->phone = $request->phone;
        $property_enquiry->message = "Clicked on whatsapp icon";
        $property_enquiry->enquiry_mode = $request->enquiry_mode ? $request->enquiry_mode : "contact";
        $property_enquiry->user_type = "Tenant";
        $property_enquiry->save();

        if ($request->user_id > 0) {
            $wishlist = new Wishlist();
            $wishlist->property_id = $request->property_id;
            $wishlist->user_id = $request->user_id;
            $wishlist->save();
        }


        $queryResult['property_enquiry'] = $property_enquiry;
        $queryResul['success'] = true;
        return redirect()->back()->with('success', 'Enquiry Submitted.!');
        // echo"<pre>";print_r($queryResult);die;
        // return view('frontend.v5.career', $queryResult);

    }

    public function contact_us(Request $request)
    {
        $rules = [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'subject' => [
                'required',
            ],
            'message' => [
                'required',
            ],
        ];

        $validator = Validator::make($request->all(), $rules, []);
        // dd($validator->getMessageBag());
        if ($validator->fails()) {
            // return Response::json([
            //     'errors' => $validator->getMessageBag()
            // ], 400);
            return redirect()->back()->with('error', 'Validation Error');
        }
        // dd($request);
        $contact_us = new ContactUs();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->phone = $request->phone;
        $contact_us->subject = $request->subject;
        $contact_us->message = $request->message;
        $contact_us->save();
        $queryResul['success'] = true;
        return redirect()->back()->with('success', 'Enquiry Submitted.!');
        // echo"<pre>";print_r($queryResult);die;
        // return view('frontend.v5.career', $queryResult);

    }

    //about
    public function about()
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keywords_about_page', 'meta_description_about_page')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();
        $secInfo = Section::query()->first();
        $queryResult['secInfo'] = $secInfo;

        if ($secInfo->about_section_status == 1) {
            $queryResult['aboutImg'] = Basic::query()->select('about_section_image1', 'about_section_image2', 'about_section_video_link')->first();
            $queryResult['aboutInfo'] = AboutSection::where('language_id', $language->id)->first();
        }
        if ($secInfo->property_section_status == 1) {
            $queryResult['whyChooseUsImg'] = Basic::query()->select('why_choose_us_section_img1', 'why_choose_us_section_img2', 'why_choose_us_section_video_link')->first();
            $queryResult['whyChooseUsInfo'] = WhyChooseUs::where('language_id', $language->id)->first();
        }

        if ($secInfo->work_process_section_status == 1) {
            $queryResult['workProcessSecInfo'] = $language->workProcessSection()->first();
            $queryResult['processes'] = $language->workProcess()->orderBy('serial_number', 'asc')->get();
        }

        if ($secInfo->testimonial_section_status == 1) {
            $queryResult['testimonialSecInfo'] = $language->testimonialSection()->first();
            $queryResult['testimonials'] = $language->testimonial()->orderByDesc('id')->get();
            $queryResult['testimonialSecImage'] = Basic::query()->pluck('testimonial_section_image')->first();
        }
        // echo"<pre>";print_r($queryResult);die;
        if ($themeVersion == 5) {
            return view('frontend.v5.about', $queryResult);
        }
        return view('frontend.about', $queryResult);
    }
    public function pricing()
    {
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keywords_pricing_page', 'meta_description_pricing_page')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();
        $queryResult['packages'] = Package::where('status', 1)->get();
        return view('frontend.pricing', $queryResult);
    }
    //offline
    public function offline()
    {
        return view('frontend.offline');
    }
    public function termsconditions()
    {

        return view('frontend.v5.termsconditions', array());
    }
    public function privacypolicy()
    {

        return view('frontend.v5.privacypolicy', array());
    }
    public function faq()
    {

        return view('frontend.v5.faq', array());
    }

    public function agentdetail($agentid = null)
    {
        $misc = new MiscellaneousController();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;

        $queryResult['agents'] = Agent::where([
            ['agents.status', 1],
            ['agents.id', $agentid],

        ])
            ->where('agent_infos.language_id', $language->id)

            ->join('agent_infos', 'agent_infos.agent_id', 'agents.id')

            ->first();
        //    dd($queryResult['agents']);
        return view('frontend.v5.agentdetail', $queryResult);
    }
}
