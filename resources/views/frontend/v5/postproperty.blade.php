@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")

{{-- @section('pageHeading')
    {{ $project->title }}
@endsection --}}

{{-- @section('metaKeywords')
    @if (!empty($project))
        {{ $project->meta_keyword }}
@endif
@endsection --}}

{{-- @section('metaDescription')
    @if (!empty($project))
        {{ $project->meta_description }}
@endif
@endsection --}}
@section('content')

<style>
    .formBorderBox .form-input-title label {
        margin-bottom: 0;
        text-transform: capitalize;
        font-size: 16px;
        text-align: left;
        display: block;
        font-weight: 500;
        color: var(--bd-black);
        position: relative;
        top: -5px;
    }
</style>

<!-- Breadcrumb area start -->
<section class="bd-breadcrumb-area p-relative fix">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png") }} "></div>
    <div class="bd-breadcrumb-wrapper p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="bd-breadcrumb">
                        <div class="bd-breadcrumb-content text-center">
                            <h1 class="bd-breadcrumb-title">Post Property</h1>
                            <div class="bd-breadcrumb-list">
                                <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                <span>Post Property</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area end -->
<div class="app-content-wrapper">
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-xl-8 col-lg-6">
                <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                    <span class="section-subtitle uppercase">
                        <i class="icon-home"></i>
                        Property
                    </span>
                    <h2 class="section-title title-animation">Add New Property</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-md-10">
            <div class="card p-5 formBorderBox" style="border-radius: 10px !important;border: 1px solid #D30952;">
                <div class="card-body">
                    <form id="carForm" action="{{ route('public.submit.property') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- number exist checker--->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row mb-20">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="title">Mobile Number<span>*</span></label>
                                    </div>
                                    <div class="form-input">
                                        <input name="phone" id="vendor_phone_number" type="text" placeholder="Enter Phone Number" value="">
                                        <div id="vendor_phone_number_messasge" class="mt-10"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-12 col-12" id="loginPasswordBlock" style="display: hidden;">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="title">Login Password<span>*</span></label>
                                    </div>
                                    <div class="form-input">
                                        <input name="loginpass" id="vendor_loginpass" type="password" placeholder="Enter Phone Number" value="">
                                        <div id="vendor_loginpass_messasge" class="mt-10"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- sign up form if number not exist--->
                        <div id="mainSignUpDataForm" style="display: block;">
                            <div class="row mb-20">
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="title">Vendor Name</label>
                                        </div>
                                        <div class="form-input">
                                            <input name="vendor_name" type="text" placeholder="Enter Your Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="title">Email</label>
                                        </div>
                                        <div class="form-input">
                                            <input name="email" id="vendor_phone_number" type="text" placeholder="Enter email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="title">User-Name</label>
                                        </div>
                                        <div class="form-input">
                                            <input name="username" id="vendor_user_name" type="text" placeholder="Enter username" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="title">Password</label>
                                        </div>
                                        <div class="form-input">
                                            <input name="password" type="password" placeholder="Enter password" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- propertyform -->
                        <div class="property-details-wrapper">
                            <div class="property-details mb-25">
                                <div class="row">
                                    <div class="property-details-content">
                                        <div class="form-input-box mb-20">
                                            <div class="form-input-title">
                                                <label for="title">Property Title <span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="title" id="title" type="text">
                                            </div>
                                        </div>
                                        <div class="property-pricing mb-20">
                                            <div class="row g-5">
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="exact_location">{{ __('Google Area Location') }} * </label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input type="text" value="" class="form-control" id='location-search' name="location-search1" placeholder="Enter Location">
                                                        </div>
                                                    </div>
                                                </div>
                                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWCfqnOzQVhONMaKbh7CAjga3pdhxMxg&libraries=places&callback=initAutocomplete" async defer></script>
                                                <script type="text/javascript">
                                                    let autocomplete;
                                                    let geocoder = new google.maps.Geocoder();

                                                    function initAutocomplete() {
                                                        // Initialize the Autocomplete object on the input field
                                                        autocomplete = new google.maps.places.Autocomplete(document.getElementById('location-search'), {
                                                            types: ['geocode'], // Allow autocomplete to show all geocode results, including localities
                                                            componentRestrictions: {
                                                                country: "IN"
                                                            } // Optional: Restrict to India for more relevant results
                                                        });

                                                        autocomplete.addListener('place_changed', onPlaceChanged);
                                                    }

                                                    function onPlaceChanged() {
                                                        const place = autocomplete.getPlace();

                                                        if (!place.geometry) {
                                                            console.log("No details available for the input location.");
                                                            return;
                                                        }

                                                        // Get latitude and longitude of the selected location
                                                        const latitude = place.geometry.location.lat();
                                                        const longitude = place.geometry.location.lng();

                                                        console.log("Latitude: " + latitude + ", Longitude: " + longitude);
                                                        if (latitudeField && longitudeField) {
                                                            latitudeField.value = latitude;
                                                            longitudeField.value = longitude;
                                                        } else {
                                                            console.error("Input fields with IDs 'this_lati' and 'this_long' not found.");
                                                        }
                                                        // Optionally, you can store these values in hidden input fields or use them for further API calls
                                                        getPropertiesWithinRadius(latitude, longitude);
                                                    }

                                                    function getPropertiesWithinRadius(latitude, longitude) {
                                                        const radius = 10000; // 5km radius

                                                        // Example of how you could query your database for properties near this location
                                                        // Here you can make an API call to your server or use AJAX to query properties
                                                        // For demonstration, I'll just log the values
                                                        console.log("Searching for properties within " + radius + " meters from Lat: " + latitude + " and Lng: " + longitude);

                                                        // You can send the latitude and longitude to your backend to filter properties within a 5km radius
                                                    }
                                                </script>


                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="Latitude">{{ __('Latitude') }} * </label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input type="text" value="" id='latitudeField' class="form-control" name="latitude" placeholder="Enter Latitude">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="Longitude">{{ __('Longitude') }} * </label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input type="text" value="" class="form-control" id='longitudeField' name="longitude" placeholder="Enter Longitude">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Category') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="category_id" class="form-control category">
                                                                <option disabled selected>
                                                                    {{ __('Select a Category') }}
                                                                </option>

                                                                @foreach ($propertyCategories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->categoryContent->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Purpose') }} *</label>
                                                        </div>
                                                        <div class="form-input">

                                                            <select name="purpose" class="form-control">
                                                                <option selected="" disabled="" value=""> Select a Purpose
                                                                </option>
                                                                <option value="rent">Rent</option>
                                                                <option value="sale">Sale</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Available For') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="AvailableFor" id="" class="form-control">
                                                                <option value="Family">{{ __('Family') }}</option>
                                                                <option value="Single Women">{{ __('Single Women') }}</option>
                                                                <option value="Single Men">{{ __('Single Men') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Available From') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="AvailableFrom" id="" class="form-control">
                                                                <option value="Any Time">{{ __('Any Time') }}</option>
                                                                <option value="Immediately">{{ __('Immediately') }}</option>
                                                                <option value="Within 15 Days">{{ __('Within 15 Days') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Status') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="status" id="" class="form-control">
                                                                <option value="1">{{ __('Active') }}</option>
                                                                <option value="0">{{ __('Inactive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="property-details-meta mb-20">
                                            <h4 class="property-details-title-two">Property Details</h4>
                                            <div class="row g-5">
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="homearea">Super Buildup Area:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="homearea" id="homearea" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Buildup Area unit') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="BuildupUnit" id="" class="form-control">
                                                                <option value="SqFeet">{{ __('SqFeet') }}</option>
                                                                <option value="SqMeter">{{ __('SqMeter') }}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="property-details-price">
                                                        <div class="form-input-box">
                                                            <div class="form-input-title">
                                                                <label for="expectedprice">Expected
                                                                    Price<span>*</span></label>
                                                            </div>
                                                            <div class="form-input">
                                                                <input name="expectedPrice" id="expectedPrice" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="propertystatus">Construction Status:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="propertystatus" class="form-control js-example-basic-single2">

                                                                <option value="Ready to move">{{ __('Ready to move') }}</option>
                                                                <option value="New Launch">{{ __('New Launch') }}</option>
                                                                <option value="Under Construction">{{ __('Under Construction') }}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="furnishedStatus">Furnished Status:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="furnishedStatus" class="form-control js-example-basic-single2">
                                                                <option value="Non funrnished">{{ __('Non funrnished') }}</option>
                                                                <option value="Furnished">{{ __('Furnished') }}</option>
                                                                <option value="Semi funrnished">{{ __('Semi funrnished') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="builtyear">Year built:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="builtyear" id="builtyear" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="rooms">Rooms:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="rooms" id="rooms" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="verandabalcony">Veranda/Balcony:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="verandabalcony" id="verandabalcony" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="TotalFloor">Total Floor:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">

                                                            <input type="text" id="TotalFloor" name="TotalFloor"
                                                                placeholder="Enter number of total floor">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="FloorNo">Floor Number:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="FloorNo" id="FloorNo" type="text" placeholder="Enter floor number">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="property-details-features mb-20">
                                            <h4 class="property-details-title-two">Property Features</h4>
                                            <div class="row g-5">
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="livingroom">Living
                                                                Room<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="livingroom" id="livingroom" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="garage">Garage <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="garage" id="garage" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="diningarea">Dining
                                                                Area<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="diningarea" id="diningarea" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="bedroom">Bedroom <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="bedroom" id="bedroom" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="bathroom">Bathroom <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="bathroom" id="bathroom" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="property-details-features mb-20">
                                            <h4 class="property-details-title-two">{{ __('Facilities') }} *</h4>
                                            <div class="row gy-5">
                                                @foreach ($amenities as $amenity)

                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input value='{{ $amenity->id }}' style='display:block;float: left;' name="amenities[]" id="amenities{{ $amenity->id }}" type="checkbox">
                                                            <label for="amenities{{ $amenity->id }}">{{ $amenity->amenityContent->name }}</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="property-details-features mb-20">
                                            <h4 class="property-details-title-two">{{ __('Extra') }} *</h4>
                                            <div class="row gy-5">

                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input id="smokingallowed" value="Smoking allowed" style='display:block;float: left;' name="extras[]" type="checkbox">
                                                            <label for="smokingallowed">Smoking allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input style='display:block;float: left;' name="extras[]" id="drinkingallowed" value="Drinking allowed" type="checkbox">
                                                            <label for="drinkingallowed">Drinking allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input id="petsallowed" value="Pets allowed" style='display:block;float: left;' name="extras[]" type="checkbox">
                                                            <label for="petsallowed">Pets allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input id="nonvegallowed" value="Non veg allowed" style='display:block;float: left;' name="extras[]" type="checkbox">
                                                            <label for="nonvegallowed">Non veg allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input id="independedallowed" value="Independed allowed" style='display:block;float: left;' name="extras[]" type="checkbox">
                                                            <label for="independedallowed">Independed allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <input style='display:block;float: left;' name="extras[]" id="colivingallowed" value="Coliving allowed" type="checkbox">
                                                            <label for="colivingallowed">Coliving allowed</label>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="property-details-content mb-20">
                                            <h4 class="property-details-title-two">Property Meta Keywords</h4>
                                            <div class="form-input">
                                                <input name="meta_keyword"
                                                    placeholder="Enter Meta Keywords"
                                                    data-role="tagsinput">
                                            </div>
                                        </div>
                                        <div class="property-details-content mb-20">
                                            <h4 class="property-details-title-two">Meta Description</h4>
                                            <div class="form-input">
                                                <textarea name="meta_description" id="meta_description"></textarea>
                                            </div>
                                        </div>

                                        <div class="property-details-content mb-20">
                                            <div class="form-input">
                                                <textarea name="propertycontent" id="tinymce_simple_textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn bd-btn btn-style hover-white btn-style btn-hover-x hover-white" data-toggle="modal" data-target="#exampleModal">
                                    Post Property for free
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInput = document.getElementById("vendor_phone_number");
        const mainSignUpDataForm = document.getElementById("mainSignUpDataForm");
        const loginPasswordBlock = document.getElementById("loginPasswordBlock");

        mainSignUpDataForm.style.display = "none";
        loginPasswordBlock.style.display = "none";
        phoneInput.addEventListener("input", function() {
            const phoneNumber = phoneInput.value.trim();

            // Check if the input is a valid 10-digit number
            if (/^\d{10}$/.test(phoneNumber)) {
                // Make the AJAX request
                checkVendor(phoneNumber);
            } else {
                vendor_phone_number_messasge.textContent = "";
            }
        });

        function checkVendor(phoneNumber) {

            const mainSignUpDataForm = document.getElementById("mainSignUpDataForm");
            const loginPasswordBlock = document.getElementById("loginPasswordBlock");
            mainSignUpDataForm.style.display = "none";

            const bsaeUrl = "<?php echo env('APP_URL'); ?>";
            const xhr = new XMLHttpRequest();
            const url = bsaeUrl + `/public-r/check-vendor/${phoneNumber}`;

            xhr.open("GET", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.exists) {
                        vendor_phone_number_messasge.textContent = `Phone number exists. OTP sent: ${response.otp}`;
                        vendor_phone_number_messasge.style.color = "green";
                        mainSignUpDataForm.style.display = "none";
                        loginPasswordBlock.style.display = "block";

                    } else {
                        vendor_phone_number_messasge.textContent = "Phone number does not exist. No OTP sent.";
                        vendor_phone_number_messasge.style.color = "orange";
                        mainSignUpDataForm.style.display = "block";
                        loginPasswordBlock.style.display = "none";
                    }
                } else {
                    vendor_phone_number_messasge.textContent = "Something went wrong. Please try again.";
                    vendor_phone_number_messasge.style.color = "red";
                }
            };

            xhr.onerror = function() {
                vendor_phone_number_messasge.textContent = "Error connecting to the server.";
                vendor_phone_number_messasge.style.color = "red";
            };

            xhr.send();
        }
    });

    function verifyOtp() {
        alert(0);

        // Fetch values from the modal and input fields
        const baseUrl = "<?php echo env('APP_URL'); ?>";
        const phoneNumber = document.getElementById('vendor_phone_number').value;
        const otp = document.getElementById('otp_modal').value;


        // Prepare the XHR request
        const xhr = new XMLHttpRequest();
        const url = `${baseUrl}/public-r/verify-otp`;

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content')); // CSRF Token for security

        // Handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    alert("OTP Verified Successfully!");
                    const carForm = document.getElementById('carForm');
                    if (carForm) {
                        carForm.submit();
                    }
                } else {
                    const errorMsgModal = document.getElementById('errorMsgModal');
                    errorMsgModal.textContent = "Wrong OTP entered. Please try again.";
                    errorMsgModal.style.color = "red";

                    // Show the modal
                    $('#exampleModal').modal('show');
                }
            }
        };

        // Send the request with the OTP and phone number
        xhr.send(JSON.stringify({
            otp: otp,
            phone: phoneNumber
        }));
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12">
                    <div class="sign-form-wrapper text-center">
                        <h4 class="title mb-30">Verify OTP</h4>
                        <p class="">We have sent OTP to your given Mobile number.</p>


                        <div class="form-group">
                            <input type="text" class="form-control" id="otp_modal" name="otp" placeholder="Enter OTP">
                        </div>

                        <div class="col-xl-12">
                            <div class="agent-details-btn">
                                <div class="bd-btn btn-style btn-hover-x w-100 btn-black" type="button" onclick="verifyOtp()">Verify
                                    & Post</div>
                            </div>
                        </div>
                        <div id="errorMsgModal"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection