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
{{-- @section('og:tag')
    <meta property="og:title" content="{{ $project->title }}">
<meta property="og:image" content="{{asset('front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<main>
    <section class="bd-breadcrumb-area p-relative fix property-management-map-sec">
        <div id="map1" style="height: 500px; width: 100%;"></div>
        <button type="button" class="View-large-map-btn" id="hideLargeMap"  style="margin-top: 55px !important;">Hide map</button>
    </section>
    <!-- Property area start -->
    <section class="bd-property-inner-area pt-60 pb-60">
        <div class="container">
            <!-- <div class="row g-5">
                    <div class="col-xl-12 col-lg-12 mb-20">
                        <a id="toggleButton" href="#!" class="bd-half-outline-btn post-property-btn">
                            <span class="text show-hide-sidebar-txt">Hide Sidebar</span>
                        </a>                        
                    </div>
                </div> -->
            <div class="row g-5">
                <div class="col-xl-4 col-lg-4 listing-left-sidebar" style="display: block;">
                    <div class="property-sidebar-wrapper bd-sidebar-sticky">
                        <!-- type -->

                        <div class="property-widget">
                            <div class="google-map property-management-map property-widget-map position-relative">
                                <button type="button" class="View-large-map-btn" id="largeMap"  style="margin-top: 55px !important;">View larger
                                    map</button>
                                <div id="map2" style="height: 500px; width: 100%;"></div>
                            </div>
                        </div>
                        <form action="{{ route('frontend.properties') }}" method="get" id="searchForm"
                            class="w-100">
                            <div class="property-widget">
                                <h3 class="property-widget-title">Property Type</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox">
                                            <li class="filter-item checkbox">
                                                <input id="all1" name="priceRange" type="radio" value="all" onclick="updateURL('type=all');">
                                                <label for="all1">{{ __('All') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="residential" name="priceRange" type="radio" value="residential" onclick="updateURL('type=residential');">
                                                <label for="residential">{{ __('Residential') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="commercial" name="priceRange" type="radio" value="commercial" onclick="updateURL('type=commercial');">
                                                <label for="commercial">{{ __('Commercial') }}</label>
                                            </li>


                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- benefits -->

                            <!-- categories -->
                            <div class="property-widget">
                                <h3 class="property-widget-title">Categories</h3>
                                <div class="bd-property-widget-content">
                                    <div class="bd-property-widget-categories">
                                        <ul>
                                            @foreach ($categories as $category)
                                            @if ($category->categoryContent)

                                            <li class="filter-item checkbox">
                                                <input id="checkbox{{ $category->categoryContent?->category_id }}" type="checkbox" onchange="updateURL('category={{ $category->categoryContent?->slug }}',this)" name="category" value="{{ $category->categoryContent?->slug }}">
                                                <label for="checkbox{{ $category->categoryContent?->category_id }}">{{ $category->categoryContent?->name }}</label>



                                            </li>
                                            @endif
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="property-widget">
                                <h3 class="property-widget-title">Benefits</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox">
                                            @php
                                            if (!empty(request()->input('amenities'))) {
                                            $selected_amenities = [];
                                            if (is_array(request()->input('amenities'))) {
                                            $selected_amenities = request()->input('amenities');
                                            } else {
                                            array_push(
                                            $selected_amenities,
                                            request()->input('amenities'),
                                            );
                                            }
                                            } else {
                                            $selected_amenities = [];
                                            }
                                            @endphp
                                            @foreach ($amenities as $amenity)
                                            @if ($amenity->amenityContent)
                                            <li class="filter-item checkbox">
                                                <input type="checkbox"
                                                    name="amenities[]" id="checkbox{{ $amenity->id }}"
                                                    value="{{ $amenity->id }}"
                                                    {{ in_array($amenity->amenityContent?->name, $selected_amenities) ? 'checked' : '' }}
                                                    onchange="updateAmenities('amenities[]={{ $amenity->amenityContent?->name }}',this)">

                                                <label for="checkbox{{ $amenity->id }}">{{ $amenity->amenityContent?->name }}</label>
                                            </li>


                                            @endif
                                            @endforeach




                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range -->
                            <div class="property-widget">
                                <h3 class="property-widget-title">Price Type</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='pricetype'>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="price"
                                                    {{ request()->input('price') == 'all' ? 'checked' : '' }}
                                                    onchange="updateURL('price=all',this)" id="exampleRadios"
                                                    value="all" checked>
                                                <label class="form-check-label" for="exampleRadios">
                                                    {{ __('All') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="price"
                                                    {{ request()->input('price') == 'fixed' ? 'checked' : '' }}
                                                    onchange="updateURL('price=fixed',this)"
                                                    id="exampleRadios1" value="fixed">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    {{ __('Fixed Price') }}
                                                </label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input class="form-check-input" type="radio" name="price"
                                                    {{ request()->input('price') == 'negotiable' ? 'checked' : '' }}
                                                    onchange="updateURL('price=negotiable',this)"
                                                    id="exampleRadios2" value="negotiable">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    {{ __('Negotiable') }}
                                                </label>
                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- filter -->
                            <div class="property-widget " id="price">
                                <h3 class="property-widget-title">Price Range</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='price'>
                                            <li class="filter-item checkbox">
                                                <input id="low_bugdet" name="priceRange" type="radio" value="5000-100000" onclick="updateURL('priceRange=5000-100000');">
                                                <label for="low_bugdet">Low Budget</label>
                                                <span>₹5,000 - ₹1,00,000</span>

                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="medium_budget" type="radio" name="priceRange" value="100000-3000000" onclick="updateURL('priceRange=100000-3000000');">
                                                <label for="medium_budget">Medium</label>
                                                <span>₹1,00,000 - ₹3,000,000</span>

                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="high_budget" type="radio" name="priceRange" value="3000000-9000000" onclick="updateURL('priceRange=3000000-9000000');">
                                                <label for="high_budget">High Budget</label>
                                                <span>₹3,000,000 - ₹9,000,000</span>


                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="custom_budget" type="radio" id='custom' name="priceRange" value="" onclick="$('.customprice').toggle();">


                                                <label for="custom_budget">Custom Budget</label>

                                                <input type="text" value="{{ $min }}" class='customprice'
                                                    id="o_min">
                                                <input type="text" value="{{ $max }}"
                                                    id="o_max" class='customprice'>
                                                <input type="button" class='customprice' value='Set' onclick="updateURL('priceRange='+$('#o_min').val()+'-'+$('#o_max').val());">



                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range -->

                            <!-- filter -->
                            <div class="property-widget " id="price">
                                <h3 class="property-widget-title">Area Range</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='price'>
                                            <li class="filter-item checkbox">
                                                <input id="low_bugdet" name="areaRange" type="radio" value="100-1000" onclick="updateURL('areaRange=100-1000');">
                                                <label for="low_bugdet">Small Size</label>
                                                <span>100 sqr - 1000 sqr</span>

                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="medium_budget" type="radio" name="areaRange" value="1000-3000" onclick="updateURL('areaRange=1000-3000');">
                                                <label for="medium_budget">Medium Size</label>
                                                <span>1000 sqr - 3000 sqr</span>

                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="high_budget" type="radio" name="areaRange" value="3000-10000" onclick="updateURL('areaRange=3000-10000');">
                                                <label for="high_budget">Big Size</label>
                                                <span>3000 sqr - 10000 sqr</span>


                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="custom_area" type="radio" id='custom' name="areaRange" value="" onclick="$('.customarea').toggle();">


                                                <label for="custom_area">Custom area in sqr</label>

                                                <input type="number" value="{{ $min1 }}" class='customarea'
                                                    id="o_min1">
                                                <input type="number" value="{{ $max1 }}"
                                                    id="o_max1" class='customarea'>
                                                <input type="button" class='customarea' value='Set Area' onclick="updateURL('areaRange='+$('#o_min1').val()+'-'+$('#o_max1').val());">



                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range -->
                            <div class="property-widget">
                                <h3 class="property-widget-title">Available For</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='AvailableFor'>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="AvailableFor"
                                                    {{ request()->input('AvailableFor') == 'Family' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFor=Family',this)" id="AvailableFor1"
                                                    value="Family">
                                                <label class="form-check-label" for="AvailableFor1">
                                                    {{ __('Family') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="AvailableFor"
                                                    {{ request()->input('AvailableFor') == 'Single Women' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFor=Single Women',this)"
                                                    id="AvailableFor2" value="Single Women">
                                                <label class="form-check-label" for="AvailableFor2">
                                                    {{ __('Single Women') }}
                                                </label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input class="form-check-input" type="radio" name="AvailableFor"
                                                    {{ request()->input('AvailableFor') == 'Single Men' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFor=Single Men',this)"
                                                    id="AvailableFor3" value="Single Men">
                                                <label class="form-check-label" for="AvailableFor3">
                                                    {{ __('Single Men') }}
                                                </label>
                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- filter -->
                            <!-- Price Range -->
                            <div class="property-widget">
                                <h3 class="property-widget-title">Available From</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='AvailableFrom'>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="AvailableFrom"
                                                    {{ request()->input('AvailableFrom') == 'Any Time' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFrom=Any Time',this)" id="AvailableFrom1"
                                                    value="Any Time">
                                                <label class="form-check-label" for="AvailableFrom1">
                                                    {{ __('Any Time') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="AvailableFrom"
                                                    {{ request()->input('AvailableFrom') == 'Immediately' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFrom=Immediately',this)"
                                                    id="AvailableFrom2" value="Immediately">
                                                <label class="form-check-label" for="AvailableFrom2">
                                                    {{ __('Immediately') }}
                                                </label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input class="form-check-input" type="radio" name="AvailableFrom"
                                                    {{ request()->input('AvailableFrom') == 'Within 15 Days' ? 'checked' : '' }}
                                                    onchange="updateURL('AvailableFrom=Within 15 Days',this)"
                                                    id="AvailableFrom3" value="Within 15 Days">
                                                <label class="form-check-label" for="AvailableFrom3">
                                                    {{ __('Within 15 Days') }}
                                                </label>
                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- filter -->


                            <!-- Price Range -->
                            <div class="property-widget">
                                <h3 class="property-widget-title">Construction status</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='availability'>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="availability"
                                                    {{ request()->input('availability') == 'Ready to move' ? 'checked' : '' }}
                                                    onchange="updateURL('availability=Ready to move',this)" id="availability1"
                                                    value="Ready to move">
                                                <label class="form-check-label" for="availability1">
                                                    {{ __('Ready to move') }}</label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input type="radio"
                                                    name="availability"
                                                    {{ request()->input('availability') == 'Under Construction' ? 'checked' : '' }}
                                                    onchange="updateURL('availability=Under Construction',this)"
                                                    id="availability2" value="Under Construction">
                                                <label class="form-check-label" for="availability2">
                                                    {{ __('Under Construction') }}
                                                </label>
                                            </li>
                                            <li class="filter-item checkbox">

                                                <input class="form-check-input" type="radio" name="availability"
                                                    {{ request()->input('availability') == 'New Launch' ? 'checked' : '' }}
                                                    onchange="updateURL('availability=New Launch',this)"
                                                    id="availability3" value="New Launch">
                                                <label class="form-check-label" for="availability3">
                                                    {{ __('New Launch') }}
                                                </label>
                                            </li>
                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>
                            <!-- filter -->


                            <!-- filter -->
                            <div class="property-widget " id="bed">
                                <h3 class="property-widget-title">NO. Bed</h3>
                                <div class="property-widget-content">
                                    <div class="bd-property-widget-checkbox">
                                        <ul class="filter-items filter-checkbox" id='bedul'>
                                            <li class="filter-item checkbox">
                                                <input type="text" class="form-control" name="beds" style='display:block!important'
                                                    placeholder="{{ __('No. of bed') }}"
                                                    onkeydown="if (event.keyCode == 13) updateURL('beds='+$(this).val())">
                                                <!--<label for="low_bugdet">Low Budget</label>-->
                                                <!--<span>₹5,000 - ₹1,00,000</span>-->

                                            </li>

                                        </ul><!-- .filter-items -->
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!-- product rating -->
                        @if(isset($featured_properties))
                        <div class="property-widget">
                            <h3 class="property-widget-title">Top Rated Products</h3>
                            <div class="product-widget-content">
                                <div class="property-widget-product">
                                    @foreach ($featured_properties as $property)

                                    @php
                                    $property_content = $property->getContent($language->id);
                                    if (is_null($property_content)) {
                                    $property_content = $property
                                    ->propertyContents()
                                    ->first();
                                    }
                                    @endphp
                                    <div class="property-widget-product-item">
                                        <div class="property-widget-product-thumb">
                                            <a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">
                                                <img src="{{asset('assets/img/property/featureds/' . $property->featured_image) }}" alt />
                                            </a>
                                        </div>
                                        <div class="property-product-content">
                                            <div class="property-widget-product-rating-wrapper">
                                                <div class="property-widget-product-rating">
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="property-widget-product-rating-number">
                                                    <span>(4.2)</span>
                                                </div>
                                            </div>
                                            <h4 class="property-widget-product-title">
                                                <a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">{{$property_content->title}}</a>
                                            </h4>
                                            <div class="property-widget-product-price-wrapper">
                                                <span class="property-widget-product-price">${{$property->expectedPrice}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- brand -->
                        <div class="property-widget">
                            <h3 class="property-widget-title">Popular Brands</h3>
                            <div class="property-widget-content">
                                <div class="property-widget-brand-wrapper">
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-13.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-14.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-15.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-16.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-17.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-18.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-19.png")}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="property-widget-brand-item">
                                        <a href="#">
                                            <img src="{{asset("assets/front/v5/images/brand/brand-thumb-20.png")}}" alt="image" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 listing-right-content">
                    <div class="bd-property-main-wrapper">
                        <div class="bd-property-top mb-45">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="bd-property-top-left d-flex align-items-center ">
                                        <div class="bd-property-top-tab bd-tab">
                                            <ul class="nav nav-tabs" id="productTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link sidebarToggleButton" id="toggleButton" href="#!">
                                                        <span class="text show-hide-sidebar-txt"><i class="fa fa-angle-double-left m-0 " aria-hidden="true"></i></span>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bd-property-top-result">
                                            <p>Showing 1–10 of 16 results</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="bd-property-top-right d-sm-flex align-items-center justify-content-xl-end">
                                        <div class="bd-property-top-select">
                                            <select>
                                                <option>Default Sorting</option>
                                                <option>Low to Hight</option>
                                                <option>High to Low</option>
                                                <option>New Added</option>
                                                <option>On Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bd-property-items-wrapper bd-property-item-primary">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                    <div class="row g-5 properties">

                                        @foreach ($properties as $property)

                                        @if($property)
                                        @php

                                        $property_content = $property->getContent($language->id);
                                        if (is_null($property_content)) {
                                        $property_content = $property
                                        ->propertyContents()
                                        ->first();

                                        }
                                        @endphp
                                        <div class="col-xl-6 col-md-6">
                                            <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Featured</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>{{$property->price}}/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">
                                                            <figure>
                                                                <img src="{{asset("assets/front/v5/images/featured/featured-thumb-15.png")}}" alt="image" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">{{$property_content->title}}</a>
                                                    </h3>
                                                    <span class="info">{{$property_content->address}}</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">{{$property->bedroom}} bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">{{$property->bathroom}} bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">{{$property->carpetArea}} sqft</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bd-meta-profile">
                                                    <div class="bd-profile-info">
                                                        <h6 class="profile-title text-black"><span>Contact Us</span>
                                                        </h6>
                                                    </div>
                                                    <div class="profile-icons d-flex align-items-center">
                                                        <a class="link" target="_blank" href="https://api.whatsapp.com/send?phone=9752777721&text=Hi" ">
                                                            <span><i class=" fa-regular fa-whatsapp"></i></span>
                                                        </a>
                                                        <a class="link" href="tel:+4733378901">
                                                            <span><i class="fa-regular fa-phone"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                                    <div class="bd-property-list-wrapper bd-property-item-primary mb-70">
                                        <div class="row g-5 properties">
                                            @foreach ($properties as $property)

                                            @if($property)
                                            @php
                                            $property_content = $property->getContent($language->id);
                                            if (is_null($property_content)) {
                                            $property_content = $property
                                            ->propertyContents()
                                            ->first();
                                            }
                                            @endphp
                                            <div class="col-12">
                                                <div class="featured-item style-four">
                                                    <div class="thumb-wrapper">
                                                        <div class="badge-wrap">
                                                            <span class="bd-badge">Top</span>
                                                            <span class="bd-badge">Featured</span>
                                                            <span class="bd-badge">For {{$property->purpose}}</span>
                                                        </div>
                                                        <div class="price">
                                                            <span>{{$property->price}}/mo</span>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">
                                                                <figure>
                                                                    <img src="{{asset("assets/img/property/featureds/$property->featured_image")}}" alt="image">
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title"><a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">{{$property_content->title}}</a></h3>
                                                        <span class="info">California, CA, USA</span>
                                                        <div class="bd-meta">
                                                            <div class="meta-item">
                                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">{{$property->bedroom}}
                                                                    bad</span>
                                                            </div>
                                                            <div class="meta-item">
                                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">{{$property->bathroom}}
                                                                    bath</span>
                                                            </div>
                                                            <div class="meta-item">
                                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">{{$property->carpetArea}} sqft</span>
                                                            </div>
                                                        </div>
                                                        <div class="bd-meta-profile">
                                                            <div class="bd-profile-info">
                                                                <div class="thumb">
                                                                    <a href="agent-details.html">
                                                                        <img src="assets/images/user/user-thumb-01.png" alt="Profile image not found">
                                                                    </a>
                                                                </div>
                                                                <h6 class="profile-title"><span>By </span><a href="agent-details.html">Tomas D.</a>
                                                                </h6>
                                                            </div>
                                                            <div class="profile-arrow">
                                                                <a class="link" href="agent-details.html"><span><i class="fa-regular fa-arrow-right-long"></i></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="infinite-pagination d-none">
                            <a href="shop.html" class="infinite-next-link">Next</a>
                        </div>
                        <div class="pagination__wrapper mt-50">
                            <div class="basic-pagination">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa-regular fa-arrow-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a class="current" href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-regular fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property area end -->


    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            const sidebar = document.querySelector('.listing-left-sidebar');
            const rightContent = document.querySelector('.listing-right-content');
            const icon = document.querySelector('.show-hide-sidebar-txt i');

            // Check if the sidebar is currently visible
            if (sidebar.style.display === 'none' || sidebar.style.display === '') {
                // Show the sidebar and reset right content class
                sidebar.style.display = 'block';
                rightContent.classList.remove('col-xl-12', 'col-lg-12');
                rightContent.classList.add('col-xl-8', 'col-lg-8');

                // Change icon to "Hide Sidebar" (left arrow)
                icon.className = 'fa fa-angle-double-left m-0';
            } else {
                // Hide the sidebar and make right content full width
                sidebar.style.display = 'none';
                rightContent.classList.remove('col-xl-8', 'col-lg-8');
                rightContent.classList.add('col-xl-12', 'col-lg-12');

                // Change icon to "Show Sidebar" (right arrow)
                icon.className = 'fa fa-angle-double-right m-0';
            }
        });


        document.getElementById("largeMap").addEventListener("click", function() {
            document.querySelector(".property-management-map-sec").style.display = "block";
        });

        document.getElementById("hideLargeMap").addEventListener("click", function() {
            document.querySelector(".property-management-map-sec").style.display = "none";
        });
    </script>


    <script>
        class PropertyMap {
            constructor(mapId, properties, featuredProperties, customIconUrl) {
                this.mapId = mapId;
                this.properties = properties;
                this.featuredProperties = featuredProperties;
                this.customIconUrl = customIconUrl;
                this.map = null;
            }

            // Initialize map
            initMap() {
                this.map = new google.maps.Map(document.getElementById(this.mapId), {
                    center: {
                        lat: 22.7196,
                        lng: 75.8577
                    }, // Indore City Coordinates
                    zoom: 12, // Set zoom level to focus on Indore
                });

                this.addMarkers(this.properties);
            }

            // Add markers to the map
            addMarkers(properties) {
                properties.forEach((property) => {
                    const latitude = parseFloat(property.latitude);
                    const longitude = parseFloat(property.longitude);

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        // Check if the property is featured
                        const isFeatured = this.featuredProperties.some((featured) => featured.id === property.id);

                        // Define the custom icon with a PNG image URL
                        const customIcon = {
                            url: this.customIconUrl, // Custom icon image URL
                            scaledSize: new google.maps.Size(96, 96), // Adjust size of the icon
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(48, 96), // Anchor the marker at the bottom center
                        };

                        const marker = new google.maps.Marker({
                            position: {
                                lat: latitude,
                                lng: longitude
                            },
                            map: this.map,
                            icon: customIcon, // Use custom icon for all markers
                            title: property.title,
                        });

                        // Add info window for the marker
                        const infoWindow = new google.maps.InfoWindow({
                            content: `<strong>${property.title}</strong><br>${property.address}`,
                        });

                        marker.addListener("click", () => {
                            infoWindow.open(this.map, marker);
                        });
                    }
                });
            }
        }

        // Initialize multiple maps on the page
        document.addEventListener("DOMContentLoaded", function() {
            //alert("1");
            const properties = @json($properties); // Pass the properties from backend (Laravel)
            console.log(properties);
            const featuredProperties = @json($properties); // Pass the featured properties from backend (Laravel)

            const transformedProperties = properties.data.map((property) => ({
                id: property.id,
                vendor_id: property.vendor_id,
                agent_id: property.agent_id,
                category_id: property.category_id,
                country_id: property.country_id,
                state_id: property.state_id,
                city_id: property.city_id,
                featured_image: property.featured_image,
                floor_planning_image: property.floor_planning_image,
                video_image: property.video_image,
                price: property.price,
                purpose: property.purpose,
                type: property.type,
                beds: property.beds,
                bath: property.bath,
                area: property.area,
                video_url: property.video_url,
                status: property.status,
                latitude: property.latitude,
                longitude: property.longitude,
                created_at: property.created_at,
                updated_at: property.updated_at,
                approve_status: property.approve_status,
                balcony: property.balcony,
                carpetArea: property.carpetArea,
                furnishedStatus: property.furnishedStatus,
                extras: property.extras,
                TotalFloor: property.TotalFloor,
                FloorNo: property.FloorNo,
                availability: property.availability,
                expectedPrice: property.expectedPrice,
                sqrPrice: property.sqrPrice,
                video: property.video,
                propertycontent: property.propertycontent,
                propertyid: property.propertyid,
                lotarea: property.lotarea,
                homearea: property.homearea,
                lotdimensions: property.lotdimensions,
                rooms: property.rooms,
                verandabalcony: property.verandabalcony,
                propertytag: property.propertytag,
                propertydiscount: property.propertydiscount,
                builtyear: property.builtyear,
                propertystatus: property.propertystatus,
                apartmentvideolink: property.apartmentvideolink,
                livingroom: property.livingroom,
                garage: property.garage,
                diningarea: property.diningarea,
                bedroom: property.bedroom,
                bathroom: property.bathroom,
                gymarea: property.gymarea,
                garden: property.garden,
                parking: property.parking,
                AvailableFor: property.AvailableFor,
                AvailableFrom: property.AvailableFrom,
                BuildupUnit: property.BuildupUnit,
                carpetUnit: property.carpetUnit,
                language_id: property.language_id,
                slug: property.slug,
                title: property.title,
                address: property.address,
            }));

            console.log(transformedProperties);
            const customIconUrl = "https://netswaptech.com/onespace-development/public/assets/images/onespace-map-marker.png"; // Custom marker icon URL

            // Initialize multiple PropertyMap instances
            const map1 = new PropertyMap('map1', transformedProperties, transformedProperties, customIconUrl);
            map1.initMap();

            const map2 = new PropertyMap('map2', transformedProperties, transformedProperties, customIconUrl);
            map2.initMap();
        });
    </script>




    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWCfqnOzQVhONMaKbh7CAjga3pdhxMxg&callback=initMap" async defer></script>


</main>
@endsection