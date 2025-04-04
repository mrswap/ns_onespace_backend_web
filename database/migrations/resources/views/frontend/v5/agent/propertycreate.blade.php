@php
$version = $basicInfo->theme_version;

@endphp
@extends("frontend.layouts.layout-dashboard-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>

    <!-- app body content start -->
    <div class="app-content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-10">
                <div class="card-wrapper">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <label for="" class="mb-2"><strong>{{ __('Gallery Images') }} **</strong></label>
                            <form action="{{ route('vendor.property.imagesstore') }}" id="my-dropzone" enctype="multipart/form-data" class="dropzone create">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                            <p class="em text-danger mb-0" id="errslider_images"></p>
                        </div>
                        <form id="carForm" action="{{ route('vendor.property_management.storeproperty') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="property-details-wrapper">
                                <div class="property-details mb-25">
                                    <div class="property-details-thumb details-slide-full mb-30">
                                        <div class="property-thumb-chnage">
                                            <div class="property-thumb-preview">
                                                <div class="property-thumb-preview-box" id="imagePreview" style="background-image: url('{{ asset('assets/images/blog/image-mockup.png') }}');">
                                                </div>
                                            </div>
                                            <div class="property-thumb-edit">
                                                <input type='file' name="featured_image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload">Click images here</label>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="property-details-price">
                                                        <div class="form-input-box">
                                                            <div class="form-input-title">
                                                                <label for="expectedprice">Property
                                                                    Price<span>*</span></label>
                                                            </div>
                                                            <div class="form-input">
                                                                <input name="expectedprice" id="expectedprice" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="propertydiscount">Discount</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="propertydiscount" id="propertydiscount" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="propertytag">Property Tag
                                                                <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="propertytag" id="propertytag" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-details-content mb-20">
                                            <h4 class="property-details-title-two">Property Content</h4>
                                            <div class="form-input">
                                                <textarea name="propertycontent" id="tinymce_simple_textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="property-details-meta mb-20">
                                            <h4 class="property-details-title-two">Property Details</h4>
                                            <div class="row g-5">
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="propertyid">Property ID:
                                                                <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="propertyid" id="propertyid" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="lotarea">Lot Area:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="lotarea" id="lotarea" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="homearea">Home Area:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="homearea" id="homearea" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="lotdimensions">Lot
                                                                dimensions:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="lotdimensions" id="lotdimensions" type="text">
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
                                                            <label for="beds">Beds:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="beds" id="beds" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="bath">Baths:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="bath" id="bath" type="text">
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
                                                            <label for="propertystatus">Property
                                                                Status:<span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="propertystatus" id="propertystatus" type="text">
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
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="gymarea">Gym Area <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="gymarea" id="gymarea" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="garden">Garden <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="garden" id="garden" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="parking">Parking <span>*</span></label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="parking" id="parking" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-details-gallery mb-20">
                                            <h4 class="property-details-title-two">Property Gallery</h4>
                                            <div class="property-gallery-dropzone">
                                                <div class="dropzone dz-clickable" id="myDropzone">
                                                    <div class="dz-default dz-message"><i class="fa-thin fa-cloud-arrow-up"></i>
                                                        <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo
                                                            dropzone. Selected files are
                                                            not actually uploaded.)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="property-details-features mb-20">
                                            <h4 class="property-details-title-two">Benefits</h4>
                                            <div class="row gy-5">
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList1">Advantages List Item
                                                                1</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList2">Advantages List Item
                                                                2</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList2" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList3">Advantages List Item
                                                                3</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList3" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList4">Advantages List Item
                                                                4</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList4" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList5">Advantages List Item
                                                                5</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList5" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList6">Advantages List Item
                                                                6</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList6" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList7">Advantages List Item
                                                                7</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList7" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList8">Advantages List Item
                                                                8</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList8" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList9">Advantages List Item
                                                                9</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList9" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList10">Advantages List Item
                                                                10</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList10" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList11">Advantages List Item
                                                                11</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList11" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label for="advantagesList12">Advantages List Item
                                                                12</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <input name="advantagesList" id="advantagesList12" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <button type="submit" class="bd-half-outline-btn"><span class="text">Add More
                                                            Benefits </span></button>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="property-details-features mb-20">
                                            <h4 class="property-details-title-two">Benefits</h4>
                                            <div class="row gy-5">
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
                                                                    {{ $category->categoryContent->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($settings->property_country_status == 1)
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('Country') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="country_id" class="form-control country js-example-basic-single3">
                                                                <option disabled selected>{{ __('Select Country') }}
                                                                </option>

                                                                @foreach ($propertyCountries as $country)
                                                                <option value="{{ $country->id }}">
                                                                    {{ $country->countryContent->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($settings->property_state_status == 1)
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('State') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select onchange="getCities(event)" name="state_id" class="form-control state_id states js-example-basic-single3">
                                                                <option selected disabled>{{ __('Select State') }}
                                                                </option>
                                                                @foreach ($states as $state)
                                                                <option value="{{ $state->id }}">
                                                                    {{ $state->stateContent->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="form-input-box">
                                                        <div class="form-input-title">
                                                            <label>{{ __('City') }} *</label>
                                                        </div>
                                                        <div class="form-input">
                                                            <select name="city_id" class="form-control city_id js-example-basic-single3">
                                                                <option disabled selected>{{ __('Select City') }}
                                                                </option>
                                                                @if ($settings->property_state_status == 0 && $settings->property_country_status == 0)
                                                                @foreach ($cities as $city)
                                                                <option value="{{ $city->id }}">
                                                                    {{ $city->cityContent->name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-details-location mb-20">
                                            <h4 class="property-details-title-two">Location</h4>
                                            <div class="property-details-location-map">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89245.36062680863!2d25.596462799999998!3d45.652478099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b35b862aa214f1%3A0x6cf5f2ef54391e0f!2sBra%C8%99ov%2C%20Romania!5e0!3m2!1sen!2sbd!4v1707640089632!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                        <div class="property-details-plans mb-20">
                                            <h4 class="property-details-title-two">Apartment Plans</h4>
                                            <div class="property-gallery-dropzone">
                                                <div class="dropzone dz-clickable" id="newMyDropzone">
                                                    <div class="dz-default dz-message"><i class="fa-thin fa-cloud-arrow-up"></i>
                                                        <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo
                                                            dropzone. Selected files are
                                                            not actually uploaded.)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-details-location mb-20">
                                            <h4 class="property-details-title-two">Apartment Video</h4>
                                            <div class="apartment-video-link">
                                                <div class="form-input-box">
                                                    <div class="form-input-title">
                                                        <label for="apartmentvideolink">Apartment Video
                                                            Link<span>*</span></label>
                                                    </div>
                                                    <div class="form-input">
                                                        <input name="apartmentvideolink" id="apartmentvideolink" type="url">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- <button type="submit" class="bd-btn btn-style btn-hover-x hover-white">Submit</button> --}}
                                <button type="submit" id="PropertySubmit" class="bd-btn btn-style btn-hover-x hover-white">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- app body content end -->

</main>
<!-- Body main wrapper end -->
@endsection

@php
$languages = App\Models\Language::get();
$labels = '';
$values = '';
foreach ($languages as $language) {
$label_name = $language->code . '_label[]';
$value_name = $language->code . '_value[]';
if ($language->direction == 1) {
$direction = 'form-group rtl text-right';
} else {
$direction = 'form-group';
}

$labels .=
"<div class='$direction'><input type='text' name='" .
            $label_name .
            "' class='form-control' placeholder='Label ($language->name)'></div>";
$values .= "<div class='$direction'><input type='text' name='$value_name' class='form-control' placeholder='Value ($language->name)'></div>";
}
@endphp

@section('script')
<script>
    'use strict';

    var labels = "{!! $labels !!}";
    var values = "{!! $values !!}";
    var storeUrl = "{{ route('vendor.property.imagesstore') }}";
    var removeUrl = "{{ route('vendor.property.imagermv') }}";
    var stateUrl = "{{ route('vendor.property_specification.get_state_cities') }}";
    var cityUrl = "{{ route('vendor.property_specification.get_cities') }}";

</script>

<script type="text/javascript" src="{{ asset('assets/js/admin-dropzone.js') }}"></script>
<script src="{{ asset('assets/js/property.js') }}"></script>
@endsection
