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
<meta property="og:image" content="{{ asset('{{asset(" assets/front/v5/img/project/featured/' . $project->
featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<section class="bd-breadcrumb-area p-relative fix">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg" data-background="{{asset(" assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png"
        ) }} "></div>
    <div class=" bd-breadcrumb-wrapper p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="bd-breadcrumb">
                        <div class="bd-breadcrumb-content text-center">
                            <h1 class="bd-breadcrumb-title">Property Listing</h1>
                            <div class="bd-breadcrumb-list">
                                <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                <span>Property listing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property area start -->
<section class="bd-property-inner-area section-space">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-4 col-lg-4">
                <div class="property-sidebar-wrapper bd-sidebar-sticky">
                    <!-- type -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Property Type</h3>
                        <div class="property-widget-content">
                            <div class="bd-property-widget-checkbox">
                                <ul class="filter-items filter-checkbox">
                                    <li class="filter-item checkbox">
                                        <input id="villa" type="checkbox">
                                        <label for="villa">Villa</label>
                                        <span>100</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="studio" type="checkbox">
                                        <label for="studio">Studio</label>
                                        <span>50</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="apartment" type="checkbox">
                                        <label for="apartment">Apartment</label>
                                        <span>80</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="office" type="checkbox">
                                        <label for="office">Office</label>
                                        <span>90</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="house" type="checkbox">
                                        <label for="house">Luxury House</label>
                                        <span>150</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="flat" type="checkbox">
                                        <label for="flat">Flat</label>
                                        <span>200</span>
                                    </li>
                                </ul><!-- .filter-items -->
                            </div>
                        </div>
                    </div>
                    <!-- benefits -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Benefits</h3>
                        <div class="property-widget-content">
                            <div class="bd-property-widget-checkbox">
                                <ul class="filter-items filter-checkbox">
                                    <li class="filter-item checkbox">
                                        <input id="modern_house" type="checkbox">
                                        <label for="modern_house">Modern House</label>
                                        <span>100</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="car_parking" type="checkbox">
                                        <label for="car_parking"> Car Parking</label>
                                        <span>50</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="dining_area" type="checkbox">
                                        <label for="dining_area">Dining Area</label>
                                        <span>10</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="bedroom" type="checkbox">
                                        <label for="bedroom">Bedroom</label>
                                        <span>20</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="sports_area" type="checkbox">
                                        <label for="sports_area">Sports Area</label>
                                        <span>30</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="security_camera" type="checkbox">
                                        <label for="security_camera">Security Camera</label>
                                        <span>60</span>
                                    </li>
                                </ul><!-- .filter-items -->
                            </div>
                        </div>
                    </div>
                    <!-- Price Range -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Price Range</h3>
                        <div class="property-widget-content">
                            <div class="bd-property-widget-checkbox">
                                <ul class="filter-items filter-checkbox">
                                    <li class="filter-item checkbox">
                                        <input id="low_bugdet" type="checkbox">
                                        <label for="low_bugdet">Low Budget</label>
                                        <span>$5,000 - $10,000</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="medium_budget" type="checkbox">
                                        <label for="medium_budget">Medium</label>
                                        <span>$10,00 - $30,000</span>
                                    </li>
                                    <li class="filter-item checkbox">
                                        <input id="high_budget" type="checkbox">
                                        <label for="high_budget">High Budget</label>
                                        <span>$40,0000</span>
                                    </li>
                                </ul><!-- .filter-items -->
                            </div>
                        </div>
                    </div>
                    <!-- filter -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Price Filter</h3>
                        <div class="property-widget-content">
                            <div class="sidebar-widget-range">
                                <div id="slider-range"></div>
                                <div class="price-filter mt-10"><input type="text" id="amount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- categories -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Categories</h3>
                        <div class="bd-property-widget-content">
                            <div class="bd-property-widget-categories">
                                <ul>
                                    <li><a href="#">Buying <span>10</span></a></li>
                                    <li><a href="#">Renting <span>18</span></a></li>
                                    <li><a href="#">Market Update <span>22</span></a></li>
                                    <li><a href="#">House Construction <span>17</span></a></li>
                                    <li><a href="#">Selling <span>22</span></a></li>
                                    <li><a href="#">Investment<span>14</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- product rating -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Top Rated Products</h3>
                        <div class="product-widget-content">
                            <div class="property-widget-product">
                                <div class="property-widget-product-item">
                                    <div class="property-widget-product-thumb">
                                        <a href="property-details.html">
                                            <img src="{{asset(" assets/front/v5/images/blog/sidebar/blog-sm-01.png" )
                                                }} " alt="">
                                        </a>
                                    </div>
                                    <div class=" property-product-content">
                                            <div class="property-widget-product-rating-wrapper">
                                                <div class="property-widget-product-rating">
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="property-widget-product-rating-number">
                                                    <span>(4.2)</span>
                                                </div>
                                            </div>
                                            <h4 class="property-widget-product-title">
                                                <a href="property-details.html">Luxury Home in Greenvilla</a>
                                            </h4>
                                            <div class="property-widget-product-price-wrapper">
                                                <span class="property-widget-product-price">$150.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="property-widget-product-item">
                                    <div class="property-widget-product-thumb">
                                        <a href="property-details.html">
                                            <img src="{{asset(" assets/front/v5/images/blog/sidebar/blog-sm-02.png" )
                                                }} " alt="">
                                        </a>
                                    </div>
                                    <div class=" property-widget-product-content">
                                            <div class="property-widget-product-rating-wrapper">
                                                <div class="property-widget-product-rating">
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="property-widget-product-rating-number">
                                                    <span>(4.5)</span>
                                                </div>
                                            </div>
                                            <h4 class="property-widget-product-title">
                                                <a href="property-details.html">Decoration for House.</a>
                                            </h4>
                                            <div class="property-widget-product-price-wrapper">
                                                <span class="property-widget-product-price">$120.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="property-widget-product-item">
                                    <div class="property-widget-product-thumb">
                                        <a href="property-details.html">
                                            <img src="{{asset(" assets/front/v5/images/blog/sidebar/blog-sm-03.png")
                                                }} " alt="">
                                        </a>
                                    </div>
                                    <div class=" property-widget-product-content">
                                            <div class="property-widget-product-rating-wrapper">
                                                <div class="property-widget-product-rating">
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="property-widget-product-rating-number">
                                                    <span>(3.5)</span>
                                                </div>
                                            </div>
                                            <h4 class="property-widget-product-title">
                                                <a href="property-details.html">Apartment With Suitable</a>
                                            </h4>
                                            <div class="property-widget-product-price-wrapper">
                                                <span class="property-widget-product-price">$99.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="property-widget-product-item">
                                    <div class="property-widget-product-thumb">
                                        <a href="property-details.html">
                                            <img src="{{asset(" assets/front/v5/images/blog/sidebar/blog-sm-04.png" )
                                                }} " alt="">
                                        </a>
                                    </div>
                                    <div class=" property-widget-product-content">
                                            <div class="property-widget-product-rating-wrapper">
                                                <div class="property-widget-product-rating">
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="property-widget-product-rating-number">
                                                    <span>(4.8)</span>
                                                </div>
                                            </div>
                                            <h4 class="property-widget-product-title">
                                                <a href="property-details.html">Property with Booking</a>
                                            </h4>
                                            <div class="property-widget-product-price-wrapper">
                                                <span class="property-widget-product-price">$165.00</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- brand -->
                    <div class="property-widget">
                        <h3 class="property-widget-title">Popular Brands</h3>
                        <div class="property-widget-content ">
                            <div class="property-widget-brand-wrapper">
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-13.png" )
                                            }} " alt=" image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-14.png" )
                                            }} " alt=" image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-15.png" )
                                            }} " alt=" image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-16.png") }} " alt="
                                            image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-17.png") }} " alt="
                                            image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-18.png") }} " alt="
                                            image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-19.png") }} " alt="
                                            image">
                                    </a>
                                </div>
                                <div class="property-widget-brand-item">
                                    <a href="#">
                                        <img src="{{asset(" assets/front/v5/images/brand/brand-thumb-20.png" )
                                            }} " alt=" image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="bd-property-main-wrapper">
                    <div class="bd-property-top mb-45">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="bd-property-top-left d-flex align-items-center ">
                                    <div class="bd-property-top-tab bd-tab">
                                        <ul class="nav nav-tabs" id="productTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                    data-bs-target="#grid-tab-pane" type="button" role="tab"
                                                    aria-controls="grid-tab-pane" aria-selected="true">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-tab" data-bs-toggle="tab"
                                                    data-bs-target="#list-tab-pane" type="button" role="tab"
                                                    aria-controls="list-tab-pane" aria-selected="false">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M15 1H1" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
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
                            <div class="col-xl-6">
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
                            <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel"
                                aria-labelledby="grid-tab" tabindex="0">
                                <div class="row g-5">
                                    @php

                                    @endphp
                                    @foreach ($properties as $property)

                                    @if($property)
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".3s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Top</span>
                                                    <span class="bd-badge">Featured</span>
                                                    <span class="bd-badge">For {{$property->purpose}}</span>
                                                </div>
                                                <div class="price">
                                                    <span>{{$property->price}}</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>

                                                            <img src="{{asset("
                                                                assets/img/property/featureds/$property->featured_image")}}"
                                                            alt="image">

                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a
                                                        href="property-details.html">{{$property->title}}</a></h3>
                                                <span class="info">{{$property->address}}</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">{{$property->beds}}
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">{{$property->bath}}
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">{{$property->area}} sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-01.png")
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">{{$property->agent_name;}} </a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    {{-- <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".4s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">For Sale</span>
                                                </div>
                                                <div class="price">
                                                    <span>$82,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-09.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Tranquil Oaks</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">4
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">2
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">1500 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-02.png")
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".5s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Top</span>
                                                    <span class="bd-badge">For Sale</span>
                                                </div>
                                                <div class="price">
                                                    <span>$18,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-10.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Whispering Pines
                                                        Retreat</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">6
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">4
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">2000 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-03.png" )
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".6s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Featured</span>
                                                </div>
                                                <div class="price">
                                                    <span>$14,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-11.png" )
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Meadow view Manor</a>
                                                </h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">7
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">5
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">2200 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-01.png")
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".7s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Top</span>
                                                    <span class="bd-badge">Featured</span>
                                                    <span class="bd-badge">For Sale</span>
                                                </div>
                                                <div class="price">
                                                    <span>$16,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-12.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Sunset Ridge
                                                        Cottage</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">7
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">5
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">2500 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-02.png")
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".8s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Featured</span>
                                                    <span class="bd-badge">For Sale</span>
                                                </div>
                                                <div class="price">
                                                    <span>$55,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-13.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Willow brook
                                                        Estate</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">7
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">4
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">2600 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-03.png")
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay=".9s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Featured</span>
                                                    <span class="bd-badge">For Sale</span>
                                                </div>
                                                <div class="price">
                                                    <span>$55,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-14.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Decorate room
                                                        state</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">8
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">5
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">2700 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-03.png" )
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="featured-item style-three wow bdFadeInUp" data-wow-delay="1s"
                                            data-wow-duration="1s">
                                            <div class="thumb-wrapper">
                                                <div class="badge-wrap">
                                                    <span class="bd-badge">Featured</span>
                                                </div>
                                                <div class="price">
                                                    <span>$55,000/mo</span>
                                                </div>
                                                <div class="thumb">
                                                    <a href="property-details.html">
                                                        <figure>
                                                            <img src="{{asset("
                                                                assets/front/v5/images/featured/featured-thumb-15.png")
                                                                }} " alt=" image">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"><a href="property-details.html">Most inspiring
                                                        interior</a></h3>
                                                <span class="info">California, CA, USA</span>
                                                <div class="bd-meta">
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-bed-front"></i></span><span
                                                            class="title">9
                                                            bad</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-duotone fa-shower"></i></span><span
                                                            class="title">5
                                                            bath</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                            class="title">3000 sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bd-meta-profile">
                                                <div class="bd-profile-info">
                                                    <div class="thumb">
                                                        <a href="agent-details.html">
                                                            <img src="{{asset("
                                                                assets/front/v5/images/user/user-thumb-03.png" )
                                                                }} " alt=" Profile image not found">
                                                        </a>
                                                    </div>
                                                    <h6 class="profile-title"><span>By </span><a
                                                            href="agent-details.html">Tomas D.</a>
                                                    </h6>
                                                </div>
                                                <div class="profile-arrow">
                                                    <a class="link" href="agent-details.html"><span><i
                                                                class="fa-regular fa-arrow-right-long"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab"
                                tabindex="0">
                                <div class="bd-property-list-wrapper bd-property-item-primary mb-70">
                                    <div class="row g-5">
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Top</span>
                                                        <span class="bd-badge">Featured</span>
                                                        <span class="bd-badge">For Sale</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$14,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-08.png")
                                                                    }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Equestrian family
                                                            home</a></h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">3
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">4
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">1200 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-01.png" )
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">For Sale</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$82,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-09.png")
                                                                    }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Tranquil Oaks</a>
                                                    </h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">5
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">2
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">1500 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-02.png" )
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Top</span>
                                                        <span class="bd-badge">For Sale</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$18,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-10.png"
                                                                    ) }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Whispering Pines
                                                            Retreat</a></h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">6
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">4
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">1600 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-03.png")
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Featured</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$14,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-11.png"
                                                                    ) }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Meadow view
                                                            Manor</a></h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">7
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">3
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">1800 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-01.png")
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Top</span>
                                                        <span class="bd-badge">Featured</span>
                                                        <span class="bd-badge">For Sale</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$16,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-12.png"
                                                                    ) }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Sunset Ridge
                                                            Cottage</a></h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">8
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">5
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">2000 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-02.png" )
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="featured-item style-four">
                                                <div class="thumb-wrapper">
                                                    <div class="badge-wrap">
                                                        <span class="bd-badge">Featured</span>
                                                        <span class="bd-badge">For Sale</span>
                                                    </div>
                                                    <div class="price">
                                                        <span>$55,000/mo</span>
                                                    </div>
                                                    <div class="thumb">
                                                        <a href="property-details.html">
                                                            <figure>
                                                                <img src="{{asset("
                                                                    assets/front/v5/images/featured/featured-thumb-14.png")
                                                                    }} " alt=" image">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title"><a href="property-details.html">Decorate room
                                                            state</a></h3>
                                                    <span class="info">California, CA, USA</span>
                                                    <div class="bd-meta">
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-bed-front"></i></span><span
                                                                class="title">9
                                                                bad</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-duotone fa-shower"></i></span><span
                                                                class="title">5
                                                                bath</span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-arrows-maximize"></i></span><span
                                                                class="title">2600 sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="bd-meta-profile">
                                                        <div class="bd-profile-info">
                                                            <div class="thumb">
                                                                <a href="agent-details.html">
                                                                    <img src="{{asset("
                                                                        assets/front/v5/images/user/user-thumb-03.png" )
                                                                        }} " alt=" Profile image not found">
                                                                </a>
                                                            </div>
                                                            <h6 class="profile-title"><span>By </span><a
                                                                    href="agent-details.html">Tomas D.</a>
                                                            </h6>
                                                        </div>
                                                        <div class="profile-arrow">
                                                            <a class="link" href="agent-details.html"><span><i
                                                                        class="fa-regular fa-arrow-right-long"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
@endsection
