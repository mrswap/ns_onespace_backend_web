@php
$version = 5;
@endphp
@extends('frontend.layouts.layout-v' . $version)

@section('pageHeading')
{{ __('Home') }}
@endsection

@section('metaKeywords')
@if (!empty($seoInfo))
{{ $seoInfo->meta_keyword_home }}
@endif
@endsection

@section('metaDescription')
@if (!empty($seoInfo))
{{ $seoInfo->meta_description_home }}
@endif
@endsection


@section('content')

<main>
    <!-- filter search form modal start -->
    <div id="searchFilter" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header pl-30 pr-30">
                    <h5 class="modal-title">Advanced Search</h5>
                    <button type="button" class="btn-close " id="AdvancedSearch-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- filter-search-form-start -->
                <div class="filter-search-form show">
                    <div class="datafor">

                    </div>
                    <!--<div class="filter-grid-2 filter-group-box group-price mb-20">-->
                    <!--    <div class="filter-range-box">-->
                    <!--        <h6 class="title-price mb-20">Price Range</h6>-->
                    <!--        <div class="sidebar-widget-range">-->
                    <!--            <div id="slider-range"></div>-->
                    <!--            <div class="price-filter mt-10"><input name="price_range" type="text" id="amount">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <div class="filter-range-box">
                        <h6 class="title-price mb-20">Size Range</h6>
                        <div class="sidebar-widget-range">
                            <div id="slider-range-2"></div>
                            <div class="price-filter mt-10"><input name="size_range" type="text" id="amount-2">
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                    <div class="filter-group-box filter-grid-2 mb-20">
                        <div class="filter-grid-2">
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Bedrooms</label>
                                </div>
                                <select name="beds" id="beds">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Bathrooms</label>
                            </div>
                            <select name="baths" id="baths">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="filter-grid-2">
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Available For</label>
                                </div>
                                <select name="AvailableFor" id="AvailableFor">
                                    <option value="Family" selected>Family</option>
                                    <option value="Single Women">Single Women</option>
                                    <option value="Single Men">Single Men</option>
                                </select>
                            </div>
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Available From</label>
                                </div>
                                <select name="AvailableFrom" id="AvailableFrom">
                                    <option value="Any Time" selected>Any Time</option>
                                    <option value="Immediately">Immediately</option>
                                    <option value="Within 15 Days">Within 15 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group-box filter-grid-2 mb-20">
                        <div class="filter-grid-2">
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Construction status</label>
                                </div>
                                <select name="availability" id="availability">
                                    <option value="Ready to move" selected>Ready to move</option>
                                    <option value="New Launch">New Launch</option>
                                    <option value="Under Construction">Under Construction</option>
                                </select>
                            </div>
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Posted by</label>
                                </div>
                                <select id="postedby">
                                    <option value="1" selected>Owner</option>
                                    <option value="2">Dealer</option>
                                    <option value="3">Builder</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-grid-2">
                            <div class="booking-select">
                                <div class="form-input-title">
                                    <label>Furnishing status</label>
                                </div>
                                <select id="furnishedStatus">
                                    <option value="Non funrnished">Non funrnished</option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Semi funrnished">Semi funrnished</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group-checkbox">
                        <h6 class="mb-10">facilities:</h6>
                        <div class="facilities-group filter-grid-6">
                            @php
                            // $count=0;
                            $chunkedItems = array_chunk($amenities->toArray(), 4); // Chunk data into groups of 4
                            // dd($chunkedItems);
                            @endphp

                            @foreach ($chunkedItems as $key1=>$row)


                            <div class="facilities-box">
                                @foreach ($row as $key=>$amenity)
                                @php

                                //$count++;
                                //dd($amenity['amenity_content']['name']);
                                @endphp
                                <fieldset class="facilities-items">
                                    <input type="checkbox" id="fac{{ $key1 }}{{ $key }}" value='{{ $amenity['id'] }}'
                                        class='amenities'>
                                    <label for="fac{{ $key1 }}{{ $key }}"
                                        class="facilities-title">{{ $amenity['amenity_content']['name'] }}</label>
                                </fieldset>
                                @endforeach
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <!-- filter-search-form-end -->
            </div>
        </div>
    </div>
    <!-- filter search form modal end -->

    <!-- Banner area start -->
    <section class="bd-banner-area banner-style-one p-relative z-index-11 top-header-banner"
        data-background="{{ env('APP_URL') }}public/assets/img/own/banner/banner.png">

        <div class="swiper banner-active overflow-visible p-relative">
        <div class="swiper-wrapper">
            <!-- if ypu active slider then duplicate "swiper-slide" -->
            <div class="swiper-slide banner_more_item">
                <div class="banner-inner p-relative">
                    <div class="banner-bg">
                    </div>
                    <div class="container p-relative">
                        <div class="row justify-content-between">
                            <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-5">
                                <div class="banner-content p-relative wow bdFadeInLeft" data-wow-delay=".3s"
                                    data-wow-duration=".7s">
                                    <!-- <h1 class="banner-title">
                                                <span>We Have</span>
                                                <span><img class="arrow-shape" src="assets/images/shapes/banner-arrow.svg"
                                          alt="banner-arrow"><b class="strock-text">Full </b></span>
                                                <span class="text-gradient">Cooperation</span>
                                            </h1>
                                            <div class="text-dark mt-4"><strong> Helping You Sell for the Best Price and Save Thousands!
                                            </strong></div> -->
                                </div>
                            </div>
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7">

                                <div class="banner-from-wrapper wow bdFadeInUp" data-wow-delay=".5s"
                                    data-wow-duration=".9s">
                                    <div class="bd-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#property-buy-tab-pane" type="button" role="tab"
                                                    aria-controls="property-buy-tab-pane"
                                                    aria-selected="true">Buy</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="rent-tab" data-bs-toggle="tab"
                                                    data-bs-target="#property-rent-tab-pane" type="button"
                                                    role="tab" aria-controls="property-rent-tab-pane"
                                                    aria-selected="false">Rent</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent1">

                                            <div class="tab-pane fade show active" id="property-buy-tab-pane"
                                                role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                <form action="{{ route('frontend.properties') }}" method="get"
                                                    id='buy'>
                                                    <input type="hidden" name="purpose" value="buy">
                                                    <div id='hidden'>

                                                    </div>

                                                    <!-- <input type="hidden" name="request_type" value="search"> -->
                                                    <input type="hidden" name="request_type" value="search">
                                                    <input type="hidden" name="latitude" id='latitude' value="">
                                                    <input type="hidden" name="longitude" id='longitude' value="">
                                                    <div class="banner-booking-select">
                                                        <div class="booking-select">
                                                            <select name="type">
                                                                <option value="all">Property type</option>
                                                                <option value="residential">Residential</option>
                                                                <option value="commercial">Commercial</option>
                                                                <option value="industrial">Industrial</option>
                                                            </select>
                                                        </div>


                                                        <!--<div class="location-select mb-10">-->
                                                        <!--    <select class="location-dropdown" name="city" id="city"-->
                                                        <!--        style="width: 100%;">-->
                                                        <!--        <option value="">Location</option>-->
                                                        <!--        @foreach ($all_cities as $city)-->
                                                        <!--        <option data-id="{{ $city->id }}"-->
                                                        <!--            value="{{ $city->cityContent?->name }}">-->
                                                        <!--            {{ $city->cityContent?->name }}</option>-->
                                                        <!--        @endforeach-->
                                                        <!--    </select>-->
                                                        <!--</div>-->
                                                        <div class="location-select mb-10">
                                                            <input type="text" id="location-search" class="location-dropdown" placeholder="Type location..." style="width:100%;">
                                                        </div>
                                                        <div class="booking-select">
                                                            <select name="priceRange">
                                                                <option value="">Price</option>
                                                                <option value="0-2500000">₹0 - ₹25,00,000</option>
                                                                <option value="2600000-5000000">₹26,00,000 -
                                                                    ₹50,00,000</option>
                                                                <option value="5100000-7500000">₹51,00,000 -
                                                                    ₹75,00,000</option>
                                                                <option value="7600000-10000000">₹76,00,000 -
                                                                    ₹1,00,00,000</option>
                                                            </select>
                                                        </div>
                                                        <div class="booking-select">
                                                            <select id="category" name="category">
                                                                <option value="all">Real Estate Category</option>
                                                                @foreach ($all_proeprty_categories as $category)
                                                                <option
                                                                    value="{{ $category?->categoryContent?->slug }}">
                                                                    {{ $category?->categoryContent?->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="booking-advanced">
                                                            <button type="button" class="title advance"
                                                                data-for='buy' id="advance"> <span><svg width="16"
                                                                        height="18" viewBox="0 0 16 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M5 2.00001C4.73478 2.00001 4.48043 2.10537 4.29289 2.2929C4.10536 2.48044 4 2.73479 4 3.00001C4 3.26523 4.10536 3.51958 4.29289 3.70712C4.48043 3.89465 4.73478 4.00001 5 4.00001C5.26522 4.00001 5.51957 3.89465 5.70711 3.70712C5.89464 3.51958 6 3.26523 6 3.00001C6 2.73479 5.89464 2.48044 5.70711 2.2929C5.51957 2.10537 5.26522 2.00001 5 2.00001ZM2.17 2.00001C2.3766 1.41448 2.75974 0.907443 3.2666 0.548799C3.77346 0.190154 4.37909 -0.00244141 5 -0.00244141C5.62091 -0.00244141 6.22654 0.190154 6.7334 0.548799C7.24026 0.907443 7.6234 1.41448 7.83 2.00001H15C15.2652 2.00001 15.5196 2.10537 15.7071 2.2929C15.8946 2.48044 16 2.73479 16 3.00001C16 3.26523 15.8946 3.51958 15.7071 3.70712C15.5196 3.89465 15.2652 4.00001 15 4.00001H7.83C7.6234 4.58554 7.24026 5.09258 6.7334 5.45122C6.22654 5.80986 5.62091 6.00246 5 6.00246C4.37909 6.00246 3.77346 5.80986 3.2666 5.45122C2.75974 5.09258 2.3766 4.58554 2.17 4.00001H1C0.734784 4.00001 0.48043 3.89465 0.292893 3.70712C0.105357 3.51958 0 3.26523 0 3.00001C0 2.73479 0.105357 2.48044 0.292893 2.2929C0.48043 2.10537 0.734784 2.00001 1 2.00001H2.17ZM11 8.00001C10.7348 8.00001 10.4804 8.10537 10.2929 8.2929C10.1054 8.48044 10 8.73479 10 9.00001C10 9.26523 10.1054 9.51958 10.2929 9.70712C10.4804 9.89465 10.7348 10 11 10C11.2652 10 11.5196 9.89465 11.7071 9.70712C11.8946 9.51958 12 9.26523 12 9.00001C12 8.73479 11.8946 8.48044 11.7071 8.2929C11.5196 8.10537 11.2652 8.00001 11 8.00001ZM8.17 8.00001C8.3766 7.41448 8.75974 6.90744 9.2666 6.5488C9.77346 6.19015 10.3791 5.99756 11 5.99756C11.6209 5.99756 12.2265 6.19015 12.7334 6.5488C13.2403 6.90744 13.6234 7.41448 13.83 8.00001H15C15.2652 8.00001 15.5196 8.10537 15.7071 8.2929C15.8946 8.48044 16 8.73479 16 9.00001C16 9.26523 15.8946 9.51958 15.7071 9.70712C15.5196 9.89465 15.2652 10 15 10H13.83C13.6234 10.5855 13.2403 11.0926 12.7334 11.4512C12.2265 11.8099 11.6209 12.0025 11 12.0025C10.3791 12.0025 9.77346 11.8099 9.2666 11.4512C8.75974 11.0926 8.3766 10.5855 8.17 10H1C0.734784 10 0.48043 9.89465 0.292893 9.70712C0.105357 9.51958 0 9.26523 0 9.00001C0 8.73479 0.105357 8.48044 0.292893 8.2929C0.48043 8.10537 0.734784 8.00001 1 8.00001H8.17ZM5 14C4.73478 14 4.48043 14.1054 4.29289 14.2929C4.10536 14.4804 4 14.7348 4 15C4 15.2652 4.10536 15.5196 4.29289 15.7071C4.48043 15.8947 4.73478 16 5 16C5.26522 16 5.51957 15.8947 5.70711 15.7071C5.89464 15.5196 6 15.2652 6 15C6 14.7348 5.89464 14.4804 5.70711 14.2929C5.51957 14.1054 5.26522 14 5 14ZM2.17 14C2.3766 13.4145 2.75974 12.9074 3.2666 12.5488C3.77346 12.1902 4.37909 11.9976 5 11.9976C5.62091 11.9976 6.22654 12.1902 6.7334 12.5488C7.24026 12.9074 7.6234 13.4145 7.83 14H15C15.2652 14 15.5196 14.1054 15.7071 14.2929C15.8946 14.4804 16 14.7348 16 15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8947 15.2652 16 15 16H7.83C7.6234 16.5855 7.24026 17.0926 6.7334 17.4512C6.22654 17.8099 5.62091 18.0025 5 18.0025C4.37909 18.0025 3.77346 17.8099 3.2666 17.4512C2.75974 17.0926 2.3766 16.5855 2.17 16H1C0.734784 16 0.48043 15.8947 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15C0 14.7348 0.105357 14.4804 0.292893 14.2929C0.48043 14.1054 0.734784 14 1 14H2.17Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <span>Advanced</span>
                                                            </button>
                                                        </div>
                                                        <div class="banner-submit">
                                                            <button
                                                                class="bd-btn btn-style btn-hover-x btn-black w-100"
                                                                type="submit">
                                                                <span>
                                                                    <svg width="17" height="18" viewBox="0 0 17 18"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M3.58 13.92L0.5 17M1.389 8.581C1.389 12.768 4.772 16.162 8.944 16.162C13.117 16.162 16.5 12.768 16.5 8.582C16.5 4.393 13.117 1 8.945 1C4.772 1 1.389 4.394 1.389 8.581Z"
                                                                            stroke="white" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                            <div class="tab-pane fade" id="property-rent-tab-pane" role="tabpanel"
                                                aria-labelledby="rent-tab" tabindex="0">
                                                <form action="{{ route('frontend.properties') }}" method="get"
                                                    id="rent">
                                                    <input type="hidden" name="purpose" value="rent">
                                                    <input type="hidden" name="request_type" value="search">
                                                    <div id='hidden'>

                                                    </div>
                                                    <input type="hidden" name="latitude" id='latitude' value="">
                                                    <input type="hidden" name="longitude" id='longitude' value="">
                                                    <div class="banner-booking-select">
                                                        <div class="booking-select">
                                                            <select name="type" id="type">
                                                                <option value="all">Property type</option>
                                                                <option value="residential">Residential</option>
                                                                <option value="commercial">Commercial</option>
                                                                <option value="industrial">Industrial</option>
                                                                <option value="personal">Personal Property</option>
                                                            </select>
                                                        </div>

                                                        <!--<div class="location-select mb-10">-->
                                                        <!--    <select class="location-dropdown-second" name="city"-->
                                                        <!--        style="width: 100%;">-->
                                                        <!--        <option value="">Location</option>-->
                                                        <!--        @foreach ($all_cities as $city)-->
                                                        <!--        <option data-id="{{ $city->id }}"-->
                                                        <!--            value="{{ $city->cityContent?->name }}">-->
                                                        <!--            {{ $city->cityContent?->name }}</option>-->
                                                        <!--        @endforeach-->
                                                        <!--    </select>-->
                                                        <!--</div>-->
                                                        <div class="location-select mb-10">
                                                            <input type="text" id="location-search" class="location-dropdown" placeholder="Type location..." style="width:100%;">
                                                        </div>
                                                        <div class="booking-select">
                                                            <select name='priceRange'>
                                                                <option value="">Price</option>
                                                                <<option value="0-2500000">₹0 - ₹25,00,000</option>
                                                                    <option value="2600000-5000000">₹26,00,000 -
                                                                        ₹50,00,000</option>
                                                                    <option value="5100000-7500000">₹51,00,000 -
                                                                        ₹75,00,000</option>
                                                                    <option value="7600000-10000000">₹76,00,000 -
                                                                        ₹1,00,00,000</option>
                                                            </select>
                                                        </div>
                                                        <div class="booking-select">
                                                            <select id="category1" name="category">
                                                                <option value="all">Real Estate Category</option>
                                                                @foreach ($all_proeprty_categories as $category)
                                                                <option
                                                                    value="{{ $category?->categoryContent?->slug }}">
                                                                    {{ $category?->categoryContent?->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="booking-advanced">
                                                            <button type="button" class="title advance"
                                                                data-for='rent' id="advance"> <span><svg width="16"
                                                                        height="18" viewBox="0 0 16 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M5 2.00001C4.73478 2.00001 4.48043 2.10537 4.29289 2.2929C4.10536 2.48044 4 2.73479 4 3.00001C4 3.26523 4.10536 3.51958 4.29289 3.70712C4.48043 3.89465 4.73478 4.00001 5 4.00001C5.26522 4.00001 5.51957 3.89465 5.70711 3.70712C5.89464 3.51958 6 3.26523 6 3.00001C6 2.73479 5.89464 2.48044 5.70711 2.2929C5.51957 2.10537 5.26522 2.00001 5 2.00001ZM2.17 2.00001C2.3766 1.41448 2.75974 0.907443 3.2666 0.548799C3.77346 0.190154 4.37909 -0.00244141 5 -0.00244141C5.62091 -0.00244141 6.22654 0.190154 6.7334 0.548799C7.24026 0.907443 7.6234 1.41448 7.83 2.00001H15C15.2652 2.00001 15.5196 2.10537 15.7071 2.2929C15.8946 2.48044 16 2.73479 16 3.00001C16 3.26523 15.8946 3.51958 15.7071 3.70712C15.5196 3.89465 15.2652 4.00001 15 4.00001H7.83C7.6234 4.58554 7.24026 5.09258 6.7334 5.45122C6.22654 5.80986 5.62091 6.00246 5 6.00246C4.37909 6.00246 3.77346 5.80986 3.2666 5.45122C2.75974 5.09258 2.3766 4.58554 2.17 4.00001H1C0.734784 4.00001 0.48043 3.89465 0.292893 3.70712C0.105357 3.51958 0 3.26523 0 3.00001C0 2.73479 0.105357 2.48044 0.292893 2.2929C0.48043 2.10537 0.734784 2.00001 1 2.00001H2.17ZM11 8.00001C10.7348 8.00001 10.4804 8.10537 10.2929 8.2929C10.1054 8.48044 10 8.73479 10 9.00001C10 9.26523 10.1054 9.51958 10.2929 9.70712C10.4804 9.89465 10.7348 10 11 10C11.2652 10 11.5196 9.89465 11.7071 9.70712C11.8946 9.51958 12 9.26523 12 9.00001C12 8.73479 11.8946 8.48044 11.7071 8.2929C11.5196 8.10537 11.2652 8.00001 11 8.00001ZM8.17 8.00001C8.3766 7.41448 8.75974 6.90744 9.2666 6.5488C9.77346 6.19015 10.3791 5.99756 11 5.99756C11.6209 5.99756 12.2265 6.19015 12.7334 6.5488C13.2403 6.90744 13.6234 7.41448 13.83 8.00001H15C15.2652 8.00001 15.5196 8.10537 15.7071 8.2929C15.8946 8.48044 16 8.73479 16 9.00001C16 9.26523 15.8946 9.51958 15.7071 9.70712C15.5196 9.89465 15.2652 10 15 10H13.83C13.6234 10.5855 13.2403 11.0926 12.7334 11.4512C12.2265 11.8099 11.6209 12.0025 11 12.0025C10.3791 12.0025 9.77346 11.8099 9.2666 11.4512C8.75974 11.0926 8.3766 10.5855 8.17 10H1C0.734784 10 0.48043 9.89465 0.292893 9.70712C0.105357 9.51958 0 9.26523 0 9.00001C0 8.73479 0.105357 8.48044 0.292893 8.2929C0.48043 8.10537 0.734784 8.00001 1 8.00001H8.17ZM5 14C4.73478 14 4.48043 14.1054 4.29289 14.2929C4.10536 14.4804 4 14.7348 4 15C4 15.2652 4.10536 15.5196 4.29289 15.7071C4.48043 15.8947 4.73478 16 5 16C5.26522 16 5.51957 15.8947 5.70711 15.7071C5.89464 15.5196 6 15.2652 6 15C6 14.7348 5.89464 14.4804 5.70711 14.2929C5.51957 14.1054 5.26522 14 5 14ZM2.17 14C2.3766 13.4145 2.75974 12.9074 3.2666 12.5488C3.77346 12.1902 4.37909 11.9976 5 11.9976C5.62091 11.9976 6.22654 12.1902 6.7334 12.5488C7.24026 12.9074 7.6234 13.4145 7.83 14H15C15.2652 14 15.5196 14.1054 15.7071 14.2929C15.8946 14.4804 16 14.7348 16 15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8947 15.2652 16 15 16H7.83C7.6234 16.5855 7.24026 17.0926 6.7334 17.4512C6.22654 17.8099 5.62091 18.0025 5 18.0025C4.37909 18.0025 3.77346 17.8099 3.2666 17.4512C2.75974 17.0926 2.3766 16.5855 2.17 16H1C0.734784 16 0.48043 15.8947 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15C0 14.7348 0.105357 14.4804 0.292893 14.2929C0.48043 14.1054 0.734784 14 1 14H2.17Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <span>Advanced</span>
                                                            </button>
                                                        </div>
                                                        <div class="banner-submit">
                                                            <button
                                                                class="bd-btn btn-style btn-hover-x btn-black w-100"
                                                                type="submit">
                                                                <span>
                                                                    <svg width="17" height="18" viewBox="0 0 17 18"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M3.58 13.92L0.5 17M1.389 8.581C1.389 12.768 4.772 16.162 8.944 16.162C13.117 16.162 16.5 12.768 16.5 8.582C16.5 4.393 13.117 1 8.945 1C4.772 1 1.389 4.394 1.389 8.581Z"
                                                                            stroke="white" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
        <!-- if you active slider then remove "d-none" -->
        <div class="banner-nav-btn banner-one-navigation d-none">
            <div class="banner-pagination">
                <div class="swiper-pagination bd-pagination justify-content-center"></div>
            </div>
            <div class="banner-navigation-btn">
                <button class="onespace-navigation-prev"><i class="fa-regular fa-angle-left"></i></button>
                <button class="onespace-navigation-next"><i class="fa-regular fa-angle-right"></i></button>
            </div>
        </div>
        </div>
        <!-- <div class="banner-bg-thumb jarallax">
                <div class="banner-thumb include-bg jarallax-img" data-background="assets/images/banner/banner-thumb-01.png">
                </div>
            </div> -->
    </section>
    <!-- Banner area end -->

    <section class="bd-featured-area section-space theme-bg-primary">
        <div class="container">
            <div class="row g-5 section-title-space align-items-center justify-content-between">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Featured Property
                            Management</span>
                        <h2 class="section-title title-animation">Discover our Property Management listings</h2>
                    </div>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6">
                    <div class="common-nav-pre">
                        <!-- If we need navigation buttons -->
                        <div class="common-navigation justify-content-lg-end justify-content-start">
                            <button class="common-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                            <button class="common-slider-button-next"><i
                                    class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="swiper common-carousel-active wow bdFadeInUp" data-wow-delay=".3s"
                        data-wow-duration="1s">

                        <div class="swiper-wrapper">
                            @foreach ($properties as $property)

                            @php
                            $property_content = $property->getContent($language->id);
                            if (is_null($property_content)) {
                            $property_content = $property
                            ->propertyContents()
                            ->first();
                            }
                            @endphp
                            <div class="swiper-slide">
                                <div class="featured-item style-one">
                                    <div class="thumb-wrapper imgPropertySlider">
                                        <div class="swiper featured__properties">
                                            <div class="swiper-wrapper ">

                                                @php
                                                $slider_images= \DB::table('property_slider_images')
                                                ->where('property_id', $property->id)->get();
                                                @endphp
                                                @foreach($slider_images as $key => $slider_image)
                                                <div class="swiper-slide">
                                                    <div class="sidebar-widget p-0">
                                                        <div class="sidebar-slider">
                                                            <div class="sidebar-thumb-wrapper">
                                                                <div class="sidebar-thumb">
                                                                    <figure><img
                                                                            src="{{asset("assets/img/property/slider-images/$slider_image->image")}}"
                                                                            alt="agent-sidebar thumb not found">
                                                                    </figure>
                                                                </div>
                                                                <div class="badge-wrap agent-badge">
                                                                    <a href="#" class="bd-badge-blue"><img
                                                                            src="assets/front/v5/images/blueTick.png"
                                                                            alt="blue-tick" width="30px"
                                                                            height="30px"></a>
                                                                    <a href="#" class="bd-badge">For Rent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                            <div class="agent-nav-pag mb-20">
                                                <!-- If we need navigation buttons -->
                                                <div class="common-navigation">
                                                    <button class="properties-slider-button-prev"><i
                                                            class="fa-regular fa-arrow-left"></i></button>
                                                    <button class="properties-slider-button-next"><i
                                                            class="fa-regular fa-arrow-right"></i></button>
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="properties-pagination">
                                                    <div class="bd-swiper-dot text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>₹{{$property->price}} / {{$property->expectedPrice}}/mo</span>
                                        </div>
                                        <h3 class="title"><a
                                                href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Equestrian
                                                family home</a></h3>
                                        <span class="info">{{$property_content->address}}</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                                    class="title">{{$property->bedroom}} bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span
                                                    class="title">{{$property->bathroom}}
                                                    bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i
                                                        class="fa-regular fa-arrows-maximize"></i></span><span
                                                    class="title">{{$property->carpetArea}} sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bd-about-area section-space p-relative ">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                Quality Services at Competitive Prices
                            </span>
                            <h2 class="section-title title-animation is-br-none">Why Pay More?</h2>
                        </div>
                        <div class="about-tab">
                            <div class="bd-tab">
                                <div class="tab-contents" id="myTabContent">
                                    <div class="tab-pane fade show active" id="expertise-tab-pane" role="tabpanel"
                                        aria-labelledby="expertise-tab" tabindex="0">
                                        <div class="about-tab-contnent">
                                            <p class="description">Enjoy lower brokerage costs on property deals,
                                                helping you save money while ensuring a smooth and efficient buying or
                                                renting process.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-7">
                    <div class="about-thumb-wrap style-one">
                        <div class="round-box-inner">
                            <div class="round-box">
                                <span class="round one"></span>
                                <span class="round two"></span>
                                <span class="round three"></span>
                            </div>
                            <div class="round-icon">
                                <figure class="p-2"><img src="assets/front/v5/images/logo/ONESPACE-favicon.png"
                                        alt="image" width="60px"></figure>
                            </div>
                        </div>
                        <div class="thumb-one">
                            <figure> <img src="assets/front/v5/images/about/about-thumb-01.png" alt="image"></figure>
                        </div>
                        <div class="thumb-two-inner">
                            <div class="thumb-two">
                                <figure><img src="https://netswaptech.com/onespace-development/public/assets/img/own/coin_hand.jpg" alt="image"></figure>
                            </div>
                            <div class="thumb-two">
                                <figure> <img src="assets/front/v5/images/about/about-thumb-03.png" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area Start -->
    {{-- <section class="bd-about-area section-space p-relative">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                Value added services
                            </span>
                            <h2 class="section-title title-animation is-br-none">Why Pay More?</h2>
                        </div>
                        <div class="about-tab">
                            <div class="bd-tab">
                                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="expertise-tab" data-bs-toggle="tab" data-bs-target="#expertise-tab-pane" type="button" role="tab" aria-controls="expertise-tab-pane" aria-selected="true">Brokerage</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="results-tab" data-bs-toggle="tab" data-bs-target="#results-tab-pane" type="button" role="tab" aria-controls="results-tab-pane" aria-selected="false">Listings</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="quality-tab" data-bs-toggle="tab" data-bs-target="#quality-tab-pane" type="button" role="tab" aria-controls="quality-tab-pane" aria-selected="false">Affordable</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="expertise-tab-pane" role="tabpanel" aria-labelledby="expertise-tab" tabindex="0">
                                        <div class="about-tab-contnent">
                                            <p class="description">Enjoy lower brokerage costs on property deals, helping you save money while ensuring a smooth and efficient buying or renting process.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="results-tab-pane" role="tabpanel" aria-labelledby="results-tab" tabindex="0">
                                        <div class="about-tab-contnent">
                                            <p class="description">Explore an extensive range of properties, from homes to commercial spaces, catering to diverse needs and preferences, ensuring you find the perfect fit.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="quality-tab-pane" role="tabpanel" aria-labelledby="quality-tab" tabindex="0">
                                        <div class="about-tab-contnent">
                                            <p class="description">Find budget-friendly properties without compromising on quality or location, making home ownership or investment accessible to all at reasonable rates.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="about-btn">
                        <a class="bd-half-outline-btn" href="about.html"><span class="text">know More</span></a>
                    </div> -->
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-7">
                    <div class="about-thumb-wrap style-one">
                        <div class="round-box-inner">
                            <div class="round-box">
                                <span class="round one"></span>
                                <span class="round two"></span>
                                <span class="round three"></span>
                            </div>
                            <div class="round-icon">
                                <figure class="p-2"><img src="assets/front/v5/images/logo/ONESPACE-favicon.png" alt="image" width="60px"></figure>
                            </div>
                        </div>
                        <div class="thumb-one">
                            <figure> <img src="assets/front/v5/images/about/about-thumb-01.png" alt="image"></figure>
                        </div>
                        <div class="thumb-two-inner">
                            <div class="thumb-two">
                                <figure><img src="assets/front/v5/images/about/about-thumb-02.png" alt="image"></figure>
                            </div>
                            <div class="thumb-two">
                                <figure> <img src="assets/front/v5/images/about/about-thumb-03.png" alt="image"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- About area end -->


    <section class="bd-services-item section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Bringing You Closer to Your
                            Dream Home</span>
                        <h2 class="section-title title-animation">Our Services</h2>
                        <p>Selling your property is easy with our expert support and tailored marketing strategies</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-md-7">

                    <ul class="nav nav-tabs gap-4 ourservice-tab" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link active apartment-type-highlighted-card"
                                id="buyProperty-tab" data-bs-toggle="tab" data-bs-target="#buyProperty-tab-pane"
                                type="button" role="tab" aria-controls="buyProperty-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><i class="icon-buy-home"></i></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">Buy a property</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link apartment-type-highlighted-card"
                                data-bs-toggle="tab" data-bs-target="#sellProperty-tab-pane" type="button" role="tab"
                                aria-controls="sellProperty-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><i class="icon-home-sell"></i></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">Sell a property</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link apartment-type-highlighted-card"
                                data-bs-toggle="tab" data-bs-target="#rentProperty-tab-pane" type="button" role="tab"
                                aria-controls="rentProperty-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><i class="icon-rent-property"></i></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">Rent a property</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link apartment-type-highlighted-card"
                                data-bs-toggle="tab" data-bs-target="#propertyManagement-tab-pane" type="button"
                                role="tab" aria-controls="propertyManagement-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><i class="icon-trusted-property"></i></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">Property Management</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link apartment-type-highlighted-card"
                                data-bs-toggle="tab" data-bs-target="#propertyMantainance-tab-pane" type="button"
                                role="tab" aria-controls="propertyMantainance-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><i class="fa fa-tools"></i></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">Property Maintenance Made Easy</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="javascript:void(0)"
                                class="apartment-type-card wow fadeIn nav-link apartment-type-highlighted-card"
                                data-bs-toggle="tab" data-bs-target="#virtualView-tab-pane" type="button" role="tab"
                                aria-controls="virtualView-tab-pane" aria-selected="false">
                                <span class="apartment-type-icon is-orange"><svg viewBox="0 0 100 100"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        class="HomepageAnonHeader_glyph-Oxxoz" fill="#fff" width="34px">
                                        <path
                                            d="M100 34.2c-.4-2.6-3.3-4-5.3-5.3-3.6-2.4-7.1-4.7-10.7-7.1-8.5-5.7-17.1-11.4-25.6-17.1-2-1.3-4-2.7-6-4-1.4-1-3.3-1-4.8 0-5.7 3.8-11.5 7.7-17.2 11.5L5.2 29C3 30.4.1 31.8 0 34.8c-.1 3.3 0 6.7 0 10v16c0 2.9-.6 6.3 2.1 8.1 6.4 4.4 12.9 8.6 19.4 12.9 8 5.3 16 10.7 24 16 2.2 1.5 4.4 3.1 7.1 1.3 2.3-1.5 4.5-3 6.8-4.5 8.9-5.9 17.8-11.9 26.7-17.8l9.9-6.6c.6-.4 1.3-.8 1.9-1.3 1.4-1 2-2.4 2-4.1V37.3c.1-1.1.2-2.1.1-3.1 0-.1 0 .2 0 0zM54.3 12.3 88 34.8 73 44.9 54.3 32.4zm-8.6 0v20L27.1 44.8 12 34.8zM8.6 42.8 19.3 50 8.6 57.2zm37.1 44.9L12 65.2l15-10.1 18.6 12.5v20.1zM50 60.2 34.8 50 50 39.8 65.2 50zm4.3 27.5v-20l18.6-12.5 15 10.1zm37.1-30.5L80.7 50l10.8-7.2z">
                                        </path>
                                    </svg></span>
                                <div class="apartment-name-details">
                                    <h6 class="apartment-name">3D Virtual View</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xxl-5 col-xl-5 col-md-5">

                    <div class="tab-content shadow bg-white p-5" id="myTabContent">
                        <div class="tab-pane fade active show" id="buyProperty-tab-pane" role="tabpanel"
                            aria-labelledby="buyProperty-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">Your Perfect Home Awaits</p>
                                <h4 class="section-title">Find Your Dream Property</h4>
                                <p class="description pt-2">Looking to buy a property? We simplify the process, offering
                                    a wide range of listings to suit your needs. Whether you're searching for a cozy
                                    home or a great investment, our platform connects you with the best options on the
                                    market.</p>
                                <p class="description">With expert advice and personalized assistance, we guide you
                                    through every step, from property search to final purchase. Start your journey to
                                    homeownership with confidence and ease.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sellProperty-tab-pane" role="tabpanel"
                            aria-labelledby="sellProperty-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">Get the Best Value, Fast and Easy</p>
                                <h4 class="section-title">Sell Your Property with Confidence</h4>
                                <p class="description pt-2">Ready to sell your property? Our platform makes it simple
                                    and efficient. We provide accurate valuations, professional marketing, and access to
                                    a network of qualified buyers. From listing to closing, our team handles every
                                    detail, ensuring a smooth process from start to finish. </p>
                                <p class="description">Maximize your property’s value with our expert guidance and
                                    personalized support. Sell with confidence and ease today!
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rentProperty-tab-pane" role="tabpanel"
                            aria-labelledby="rentProperty-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">Your Ideal Home, Just a Click Away</p>
                                <h4 class="section-title">Find the Perfect Rental</h4>
                                <p class="description pt-2">Looking for a rental property? Our platform offers a diverse
                                    range of options to suit your lifestyle and budget. Whether you're searching for a
                                    cozy apartment or a spacious house, we make finding the right rental easy and
                                    stress-free.</p>
                                <p class="description">
                                    With detailed property listings, transparent pricing, and personalized support, we
                                    help you navigate the rental market with confidence. Start exploring today and find
                                    a place you’ll love to call home.
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="propertyManagement-tab-pane" role="tabpanel"
                            aria-labelledby="propertyManagement-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">We Take Care of Your Property, So You Don’t Have To</p>
                                <h4 class="section-title">Expert Property Management Services</h4>
                                <p class="description pt-2">Managing your property doesn’t have to be a hassle. Our
                                    professional property management services ensure your investment is in good hands.
                                    From tenant screening and rent collection to maintenance and repairs, we handle
                                    every detail with care and efficiency.</p>
                                <p class="description">With our experienced team, you can trust that your property will
                                    be well-maintained, providing you peace of mind and maximizing your return on
                                    investment. Let us simplify property management for you.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="propertyMantainance-tab-pane" role="tabpanel"
                            aria-labelledby="propertyMantainance-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">Keep Your Property in Top Shape</p>
                                <h4 class="section-title">Property Maintenance Made Easy</h4>
                                <p class="description pt-2">Our comprehensive property maintenance services ensure your property stays in perfect condition, hassle-free. From plumbing and electrical repairs to regular upkeep, we handle everything with expertise and care. Whether you’re a property owner or tenant, our team provides reliable and cost-effective solutions to preserve the value and functionality of your property.</p>
                                <p class="description">knowing your property is always well-maintained, with services tailored to your specific needs. Let us take care of the details while you focus on what matters most!.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="virtualView-tab-pane" role="tabpanel"
                            aria-labelledby="virtualView-tab" tabindex="0">
                            <div class="about-tab-contnent">
                                <p class="section-subtitle mb-0">Experience Every Detail from Anywhere</p>
                                <h4 class="section-title">Explore Properties with 3D Virtual Views</h4>
                                <p class="description pt-2">Discover your future property without leaving your home! Our
                                    3D Virtual View feature allows you to explore properties in stunning detail,
                                    offering a fully immersive experience. Walk through every room, examine finishes,
                                    and visualize the space as if you were there in person.</p>
                                <p class="description">Whether you're buying or renting, our virtual tours give you the
                                    convenience of viewing properties from anywhere, anytime. Experience a new level of
                                    property exploration with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services area end -->

    <!-- Filter area start -->
    <section class="bd-filter-area pt-120 pb-0">
        <div class="container">
            <div class="row g-5 section-title-space align-items-center justify-content-between">
                <div class="col-xxl-12 col-xl-12 col-lg-12 text-center">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Protecting your privacy while
                            bridging the gap.</span>
                        <h2 class="section-title title-animation">Your Privacy, Our Priority</h2>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="content">
                        <p class="description">At the initial stages of our process, we do not share landlords’ or
                            property owners’ contact details with potential tenants or buyers. Instead, we act as an
                            intermediary to manage inquiries, ensuring you don’t have to deal with unwanted or fake
                            calls.</p>
                        <p class="description">This approach not only saves you from wasting time and energy but also
                            protects your privacy. Our dedicated team will handle all negotiations and deal closures on
                            your behalf, without charging any additional fees for this service. Let us do the hard work
                            while you enjoy the peace of mind that your property transactions are in safe hands.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bd-filter-area section-space">
        <div class="swiper swiper-width-auto filter-active">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="31" viewBox="0 0 40 31" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M38.2735 26.5967H37.1977V12.6726H37.6379C38.0108 12.6726 38.3521 12.4685 38.5285 12.1399C38.705 11.8113 38.6866 11.4141 38.4806 11.1031L31.422 0.452577C31.2342 0.169218 30.9192 7.80819e-05 30.5792 7.80819e-05H27.0216C26.7071 7.80819e-05 26.4524 0.254922 26.4524 0.569374C26.4524 0.883827 26.7072 1.13867 27.0216 1.13867H30.5107L37.4003 11.5343H16.6922L9.80248 1.13859H23.4353C23.7497 1.13859 24.0046 0.883749 24.0046 0.569296C24.0046 0.254843 23.7497 0 23.4353 0H8.74225C8.55139 0 8.37319 0.0957031 8.26772 0.254765L0.970311 11.2658C0.970311 11.2658 0.970233 11.2659 0.970154 11.2661L0.904139 11.3657C0.732655 11.6247 0.717421 11.9554 0.864373 12.2291C1.01133 12.5027 1.29554 12.6726 1.60609 12.6726H1.72578H2.36109V26.5967H1.7264C0.774452 26.5967 0 27.3713 0 28.3232C0 29.2752 0.774452 30.0496 1.7264 30.0496H38.2736C39.2256 30.0496 40 29.2752 40 28.3232C39.9999 27.3713 39.2255 26.5967 38.2735 26.5967ZM15.9708 12.6726H36.0592V26.5967H15.9708V12.6726ZM2.15836 11.5341L8.74225 1.59976L15.3262 11.5341H2.15836ZM11.5915 16.824H6.17546C5.76218 16.824 5.42585 17.1603 5.42585 17.5736V26.5967H3.4996V12.6726H14.8323V26.5967H12.3411V17.5736C12.3411 17.1602 12.0047 16.824 11.5915 16.824ZM11.2026 17.9625V26.5967H6.56444V17.9625H11.2026ZM38.2735 28.9111H1.7264C1.40226 28.9111 1.13851 28.6474 1.13851 28.3232C1.13851 27.999 1.40226 27.7353 1.7264 27.7353H38.2735C38.5977 27.7353 38.8614 27.999 38.8614 28.3232C38.8614 28.6474 38.5977 28.9111 38.2735 28.9111Z"
                                            fill="black" />
                                        <path
                                            d="M10.3107 21.3278C9.99624 21.3278 9.74139 21.5826 9.74139 21.8971V23.0735C9.74147 23.388 9.99632 23.6428 10.3107 23.6428C10.6251 23.6428 10.88 23.388 10.88 23.0735V21.8971C10.88 21.5825 10.6251 21.3278 10.3107 21.3278Z"
                                            fill="#D30952" />
                                        <path
                                            d="M33.0554 17.4977H28.0869C27.675 17.4977 27.3397 17.8328 27.3397 18.2449V23.6137C27.3397 24.0256 27.6749 24.3608 28.0869 24.3608H33.0554C33.4674 24.3608 33.8025 24.0257 33.8025 23.6137V18.2449C33.8025 17.8329 33.4674 17.4977 33.0554 17.4977ZM32.664 23.2222H28.4783V18.6362H32.664V23.2222Z"
                                            fill="#D30952" />
                                        <path
                                            d="M23.4135 17.4977H18.445C18.033 17.4977 17.6979 17.8328 17.6979 18.2449V23.6137C17.6979 24.0256 18.033 24.3608 18.445 24.3608H23.4135C23.8254 24.3608 24.1606 24.0257 24.1606 23.6137V18.2449C24.1605 17.8329 23.8254 17.4977 23.4135 17.4977ZM23.022 23.2222H18.8364V18.6362H23.022V23.2222Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=apartment")}}">Apartments</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.2406 5.6167H7.92819C7.551 5.6167 7.2442 5.92357 7.2442 6.30068V9.44865C7.24412 9.82576 7.551 10.1326 7.92819 10.1326H10.2406C10.6178 10.1326 10.9246 9.82576 10.9246 9.44865V6.30068C10.9246 5.92357 10.6178 5.6167 10.2406 5.6167ZM9.786 8.99412H8.38264V6.75522H9.786V8.99412Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.316 5.6167H13.0035C12.6263 5.6167 12.3195 5.92357 12.3195 6.30068V9.44865C12.3194 9.82576 12.6263 10.1326 13.0035 10.1326H15.316C15.6932 10.1326 16 9.82576 16 9.44865V6.30068C16 5.92357 15.6932 5.6167 15.316 5.6167ZM14.8614 8.99412H13.458V6.75522H14.8614V8.99412Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 5.6167H18.0788C17.7016 5.6167 17.3948 5.92357 17.3948 6.30068V9.44865C17.3948 9.82576 17.7016 10.1326 18.0788 10.1326H20.3912C20.7684 10.1326 21.0752 9.82576 21.0752 9.44865V6.30068C21.0752 5.92357 20.7684 5.6167 20.3912 5.6167ZM19.9367 8.99412H18.5334V6.75522H19.9367V8.99412Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 14.1809H7.92806C7.55088 14.1809 7.24408 14.4878 7.24408 14.8649V18.0129C7.24408 18.39 7.55088 18.6969 7.92806 18.6969H10.2405C10.6177 18.6969 10.9245 18.39 10.9245 18.0129V14.8649C10.9245 14.4878 10.6177 14.1809 10.2405 14.1809ZM9.78603 17.5584H8.38267V15.3194H9.78603V17.5584Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.3159 14.1809H13.0034C12.6263 14.1809 12.3195 14.4878 12.3195 14.8649V18.0129C12.3195 18.39 12.6263 18.6969 13.0034 18.6969H15.3159C15.6931 18.6969 15.9999 18.39 15.9999 18.0129V14.8649C15.9999 14.4878 15.6931 14.1809 15.3159 14.1809ZM14.8614 17.5584H13.458V15.3194H14.8614V17.5584Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 14.1809H18.0788C17.7016 14.1809 17.3948 14.4878 17.3948 14.8649V18.0129C17.3948 18.39 17.7016 18.6969 18.0788 18.6969H20.3912C20.7684 18.6969 21.0752 18.39 21.0752 18.0129V14.8649C21.0752 14.4878 20.7684 14.1809 20.3912 14.1809ZM19.9367 17.5584H18.5334V15.3194H19.9367V17.5584Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 22.7454H7.92806C7.55088 22.7454 7.24408 23.0522 7.24408 23.4293V26.5773C7.24408 26.9544 7.55088 27.2613 7.92806 27.2613H10.2405C10.6177 27.2613 10.9245 26.9544 10.9245 26.5773V23.4293C10.9245 23.0522 10.6177 22.7454 10.2405 22.7454ZM9.78603 26.1228H8.38267V23.8839H9.78603V26.1228Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.3159 22.7454H13.0034C12.6263 22.7454 12.3195 23.0522 12.3195 23.4293V26.5773C12.3195 26.9544 12.6263 27.2613 13.0034 27.2613H15.3159C15.6931 27.2613 15.9999 26.9544 15.9999 26.5773V23.4293C15.9999 23.0522 15.6931 22.7454 15.3159 22.7454ZM14.8614 26.1228H13.458V23.8839H14.8614V26.1228Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 22.7454H18.0788C17.7016 22.7454 17.3948 23.0522 17.3948 23.4293V26.5773C17.3948 26.9544 17.7016 27.2613 18.0788 27.2613H20.3912C20.7684 27.2613 21.0752 26.9544 21.0752 26.5773V23.4293C21.0752 23.0522 20.7684 22.7454 20.3912 22.7454ZM19.9367 26.1228H18.5334V23.8839H19.9367V26.1228Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 31.3096H7.92806C7.55088 31.3096 7.24408 31.6164 7.24408 31.9936V35.1415C7.24408 35.5186 7.55088 35.8255 7.92806 35.8255H10.2405C10.6177 35.8255 10.9245 35.5186 10.9245 35.1415V31.9936C10.9245 31.6164 10.6177 31.3096 10.2405 31.3096ZM9.78603 34.687H8.38267V32.4481H9.78603V34.687Z"
                                            fill="#D30952" />
                                        <path
                                            d="M20.3912 31.3096H18.0788C17.7016 31.3096 17.3948 31.6164 17.3948 31.9936V35.1415C17.3948 35.5186 17.7016 35.8255 18.0788 35.8255H20.3912C20.7684 35.8255 21.0752 35.5186 21.0752 35.1415V31.9936C21.0752 31.6164 20.7684 31.3096 20.3912 31.3096ZM19.9367 34.687H18.5334V32.4481H19.9367V34.687Z"
                                            fill="#D30952" />
                                        <path
                                            d="M36.5569 36.8882H34.957L34.9527 27.8429C34.9525 27.5286 34.6977 27.2739 34.3834 27.2739H34.3831C34.0688 27.2741 33.814 27.5291 33.8142 27.8434L33.8185 36.8881H30.7342V34.0573C30.7342 33.6093 30.3697 33.2448 29.9216 33.2448H27.3027C26.8546 33.2448 26.4901 33.6093 26.4901 34.0573V36.8881H23.4154L23.4078 18.7982H33.8099L33.8125 24.2934C33.8127 24.6077 34.0675 24.8624 34.3818 24.8624H34.382C34.6964 24.8623 34.9512 24.6073 34.951 24.2929L34.9485 18.7983H35.8678C36.1822 18.7983 36.4371 18.5434 36.4371 18.229V16.2915C36.4371 15.977 36.1823 15.7222 35.8678 15.7222H23.4064L23.401 2.87297H23.9667C24.3719 2.87297 24.7015 2.54336 24.7015 2.1382V0.734766C24.7015 0.329609 24.3719 0 23.9667 0H4.29768C3.89252 0 3.56291 0.329609 3.56291 0.734766V2.13828C3.56291 2.54344 3.89252 2.87305 4.29768 2.87305H4.84854L4.85908 27.6513C4.85924 27.9657 5.11408 28.2204 5.42838 28.2204H5.42861C5.74299 28.2202 5.99775 27.9652 5.9976 27.6509L5.98705 2.87305H22.2624L22.2769 36.8882H16.6117V31.1935C16.6117 30.7341 16.238 30.3605 15.7787 30.3605H12.4858C12.0265 30.3605 11.6528 30.7342 11.6528 31.1935V36.8882H6.00158L5.99916 31.1877C5.999 30.8734 5.74416 30.6187 5.42986 30.6187H5.42963C5.11525 30.6188 4.86049 30.8738 4.86064 31.1881L4.86307 36.8881H3.44314C2.58525 36.8881 1.88721 37.5861 1.88721 38.4441C1.88721 39.302 2.58518 40 3.44314 40H36.557C37.4149 40 38.1129 39.302 38.1129 38.4441C38.1128 37.5861 37.4149 36.8882 36.5569 36.8882ZM27.6286 34.3833H29.5957V36.8882H27.6286V34.3833ZM35.2985 16.8608V17.6598H23.4072L23.4068 16.8608H35.2985ZM4.7015 1.73453V1.13852H23.563V1.73453H4.7015ZM12.7913 31.4991H15.4731V36.8882H12.7913V31.4991ZM36.5569 38.8614H3.44314C3.21299 38.8614 3.02572 38.6741 3.02572 38.4441C3.02572 38.214 3.21299 38.0267 3.44314 38.0267H36.5569C36.7871 38.0267 36.9742 38.214 36.9742 38.4441C36.9742 38.6741 36.787 38.8614 36.5569 38.8614Z"
                                            fill="black" />
                                        <path
                                            d="M27.1952 20.9156H25.0579C24.6855 20.9156 24.3826 21.2186 24.3826 21.591V24.5006C24.3826 24.873 24.6855 25.1759 25.0579 25.1759H27.1953C27.5677 25.1759 27.8706 24.8729 27.8706 24.5006V21.591C27.8706 21.2185 27.5676 20.9156 27.1952 20.9156ZM26.7321 24.0374H25.5212V22.0542H26.7321V24.0374Z"
                                            fill="#D30952" />
                                        <path
                                            d="M31.8863 20.9156H29.749C29.3766 20.9156 29.0737 21.2186 29.0737 21.591V24.5006C29.0737 24.873 29.3766 25.1759 29.749 25.1759H31.8863C32.2587 25.1759 32.5616 24.8729 32.5616 24.5006V21.591C32.5616 21.2185 32.2587 20.9156 31.8863 20.9156ZM31.4231 24.0374H30.2122V22.0542H31.4231V24.0374Z"
                                            fill="black" />
                                        <path
                                            d="M27.1953 26.8671H25.0579C24.6855 26.8671 24.3826 27.17 24.3826 27.5424V30.4521C24.3826 30.8244 24.6856 31.1273 25.0579 31.1273H27.1953C27.5677 31.1273 27.8706 30.8243 27.8706 30.4521V27.5424C27.8706 27.17 27.5676 26.8671 27.1953 26.8671ZM26.7321 29.9889H25.5211V28.0057H26.7321V29.9889Z"
                                            fill="black" />
                                        <path
                                            d="M31.8863 26.8671H29.749C29.3766 26.8671 29.0737 27.17 29.0737 27.5424V30.4521C29.0737 30.8244 29.3766 31.1273 29.749 31.1273H31.8863C32.2587 31.1273 32.5616 30.8243 32.5616 30.4521V27.5424C32.5616 27.17 32.2587 26.8671 31.8863 26.8671ZM31.4231 29.9889H30.2122V28.0057H31.4231V29.9889Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=house")}}">Houses</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.3343 31.3202C33.0032 31.3202 32.7348 31.5885 32.7348 31.9196V32.7189C32.7349 33.05 33.0033 33.3184 33.3343 33.3184C33.6654 33.3184 33.9338 33.05 33.9338 32.7189V31.9196C33.9338 31.5885 33.6654 31.3202 33.3343 31.3202Z"
                                            fill="#D30952" />
                                        <path
                                            d="M38.4747 35.2715H37.492V16.4361C37.492 16.1051 37.2237 15.8367 36.8926 15.8367C36.5615 15.8367 36.2931 16.1051 36.2931 16.4361V20.2147H33.71V14.0925C33.71 13.4361 33.1759 12.902 32.5195 12.902H22.5752C21.9188 12.902 21.3848 13.4361 21.3848 14.0925V20.2147H18.8016V5.5049L36.2931 10.3761V12.7117C36.2931 13.0428 36.5615 13.3111 36.8926 13.3111C37.2237 13.3111 37.492 13.0428 37.492 12.7117V10.7099L38.3163 10.9394C38.3889 10.9597 38.4625 10.9696 38.5354 10.9696C38.7093 10.9695 38.8794 10.913 39.0225 10.8043C39.2256 10.65 39.3421 10.4153 39.3421 10.1602V8.60615C39.3421 8.24443 39.0987 7.92404 38.7503 7.82701L16.7784 1.7081C16.5329 1.63974 16.2754 1.68896 16.0723 1.84318C15.8691 1.99748 15.7527 2.23224 15.7527 2.48724V4.04131C15.7527 4.40302 15.996 4.72342 16.3445 4.82045L17.6027 5.17084V7.3492H6.00344C5.52625 7.3492 5.13797 7.73748 5.13797 8.21467V9.71935C5.13797 10.1965 5.52625 10.5848 6.00344 10.5848H6.73539V22.1312H2.77156C1.91461 22.1312 1.21734 22.8284 1.21734 23.6854V35.3026C0.523437 35.4455 0 36.0611 0 36.7968C0 37.6379 0.684219 38.3221 1.52531 38.3221H38.4747C39.3158 38.3221 40 37.6379 40 36.7968C40 35.9557 39.3158 35.2715 38.4747 35.2715ZM36.2932 23.3304V35.2715H35.3309V27.8867C35.3309 27.3815 34.9198 26.9704 34.4147 26.9704H30.4054C29.9002 26.9704 29.4892 27.3815 29.4892 27.8866V35.2714H18.8017V23.3304H36.2932ZM34.132 28.1694V35.2715H30.688V28.1694H34.132ZM22.5837 14.1009H32.511V20.2147H22.5837V14.1009ZM36.2931 21.4136V22.1315H7.93422V21.4136H36.2931ZM11.7133 20.2147V15.0014H15.1823V20.2147H11.7133ZM16.9516 3.74521V3.00099L38.1432 8.90263V9.64685L16.9516 3.74521ZM17.6028 10.5851V20.2147H16.3812V14.7907C16.3812 14.2458 15.9379 13.8025 15.393 13.8025H11.5027C10.9577 13.8025 10.5144 14.2458 10.5144 14.7907V20.2147H7.9343V10.5851H17.6028ZM6.3368 9.38615V8.54826H17.6027V9.38615H6.3368ZM2.41625 23.6856C2.41625 23.4897 2.57563 23.3303 2.77156 23.3303H17.6027V35.2714H15.6151V27.8194C15.6151 27.3198 15.2086 26.9133 14.709 26.9133H5.2225C4.72289 26.9133 4.31641 27.3198 4.31641 27.8194V35.2714L4.37 35.2715H4.31641H2.41625V23.6856ZM6.56547 29.1534H5.51531V28.1122H14.4162V29.1534H10.2898C9.95875 29.1534 9.69039 29.4218 9.69039 29.7529C9.69039 30.084 9.95875 30.3523 10.2898 30.3523H14.4162V31.3935H5.51531V30.3523H6.56547C6.89656 30.3523 7.16492 30.084 7.16492 29.7529C7.16492 29.4218 6.89656 29.1534 6.56547 29.1534ZM14.4162 32.5923V33.6335H5.51531V32.5923H14.4162ZM14.4162 34.8324V35.2714H5.51531V34.8324H14.4162ZM38.4747 37.1233H1.52531C1.34531 37.1233 1.19891 36.9768 1.19891 36.7968C1.19891 36.6168 1.34531 36.4703 1.52531 36.4703H38.4747C38.6547 36.4703 38.8011 36.6168 38.8011 36.7968C38.8011 36.9768 38.6547 37.1233 38.4747 37.1233Z"
                                            fill="black" />
                                        <path
                                            d="M28.1325 31.7998H27.8037V28.1117C27.8037 27.6065 27.3926 27.1953 26.8873 27.1953H21.2387C20.7334 27.1953 20.3223 27.6064 20.3223 28.1117V31.7998H20C19.6689 31.7998 19.4005 32.0681 19.4005 32.3992C19.4005 32.7303 19.6689 32.9987 20 32.9987H20.9218H27.2042H28.1325C28.4636 32.9987 28.732 32.7303 28.732 32.3992C28.732 32.0681 28.4635 31.7998 28.1325 31.7998ZM26.6048 31.7998H21.5212V28.3942H26.6048V31.7998Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=hotel")}}">Hotel</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_301_12045)">
                                            <path
                                                d="M21.6399 18.7241C21.3255 18.7241 21.0706 18.979 21.0706 19.2934V20.5321C21.0706 20.8465 21.3254 21.1014 21.6399 21.1014C21.9543 21.1014 22.2092 20.8465 22.2092 20.5321V19.2934C22.2092 18.979 21.9543 18.7241 21.6399 18.7241Z"
                                                fill="#D30952" />
                                            <path
                                                d="M39.604 16.9578C39.2453 16.5952 38.7195 16.4628 38.2318 16.6117V16.6118C37.828 16.7352 37.4084 17.1039 37.2341 17.4884L35.7362 20.7932L33.7531 23.1838L33.2554 23.4264L33.2618 23.4148C33.6509 22.7005 33.4153 21.8027 32.7252 21.3708C32.1128 20.9877 31.296 21.0948 30.7829 21.6255L30.6565 21.7561V19.3864C30.6565 19.072 30.4017 18.8171 30.0872 18.8171C29.7729 18.8171 29.5179 19.072 29.5179 19.3864V22.9338L28.0737 24.4276H24.0194V15.0682C24.0194 14.5049 23.5612 14.0466 22.9979 14.0466H17.002C16.4387 14.0466 15.9805 14.5049 15.9805 15.0682V24.4277H11.9262L10.482 22.9338V19.39C10.482 19.0755 10.2271 18.8207 9.91268 18.8207C9.59822 18.8207 9.34338 19.0755 9.34338 19.39V21.7562L9.21713 21.6256C8.704 21.0949 7.8872 20.9877 7.2747 21.3709C6.58478 21.8029 6.34907 22.7006 6.73829 23.4149L6.7447 23.4266L6.24696 23.1838L4.26376 20.7933L2.76586 17.4885C2.59157 17.104 2.17203 16.7352 1.76821 16.6118C1.28047 16.463 0.754687 16.5954 0.396015 16.9579C0.0372641 17.3205 -0.0897674 17.8476 0.0644517 18.3338L1.31719 22.2818C1.69641 23.4767 2.30032 24.567 3.11219 25.5224L4.35165 26.981C5.22845 28.0126 6.33501 28.8549 7.5515 29.4164C8.56416 29.8839 10.0224 30.6264 10.991 31.6734C11.6324 32.3667 11.9492 33.3081 11.873 34.2503C11.3899 34.4384 11.0462 34.9074 11.0462 35.4562V36.3242C11.0462 37.0382 11.6271 37.619 12.341 37.619H18.9455C19.4589 37.619 19.9021 37.3179 20.1114 36.8836C20.3206 37.3179 20.7639 37.619 21.2772 37.619H27.8817C28.5956 37.619 29.1765 37.0382 29.1765 36.3242V35.4562C29.1765 34.8246 28.7215 34.2979 28.1223 34.1846C28.0658 33.2646 28.3823 32.3507 29.0088 31.6734C29.9774 30.6264 31.4356 29.8839 32.4483 29.4164C33.6648 28.8549 34.7712 28.0128 35.6481 26.9809L36.8876 25.5224C37.6995 24.567 38.3034 23.4767 38.6826 22.2818L39.9353 18.3338C40.0898 17.8476 39.9627 17.3204 39.604 16.9578ZM17.119 15.1852H22.8808V24.4277H17.119V15.1852ZM25.4201 25.5663L24.584 25.8556C24.5807 25.8567 24.5775 25.8581 24.5743 25.8593C24.5092 25.882 24.4448 25.9062 24.3809 25.9313C24.3596 25.9397 24.3383 25.9484 24.3171 25.957C24.2678 25.9771 24.2189 25.998 24.1704 26.0195C24.1499 26.0286 24.1293 26.0374 24.1089 26.0467C24.0497 26.0738 23.9911 26.1019 23.9332 26.1311C23.8989 26.1483 23.865 26.1664 23.8311 26.1843C23.8077 26.1967 23.7843 26.2092 23.7611 26.222C23.7359 26.2358 23.7103 26.2486 23.6853 26.2628H16.3147C16.2899 26.2487 16.2644 26.236 16.2393 26.2223C16.2157 26.2093 16.1919 26.1966 16.1681 26.1839C16.1345 26.1662 16.101 26.1483 16.0671 26.1313C16.0089 26.102 15.95 26.0737 15.8907 26.0464C15.8709 26.0374 15.851 26.0289 15.8311 26.0202C15.7816 25.9982 15.7317 25.977 15.6814 25.9564C15.661 25.9481 15.6408 25.9399 15.6204 25.9319C15.5528 25.9053 15.4849 25.8796 15.416 25.8558L14.5799 25.5663H25.4201ZM11.8267 30.9002C10.7206 29.7045 9.12939 28.8907 8.02876 28.3826C6.96134 27.8899 5.98978 27.1502 5.21923 26.2435L3.97977 24.785C3.26633 23.9455 2.73563 22.9874 2.40243 21.9373L1.14969 17.9894C1.1132 17.8744 1.16883 17.7955 1.20531 17.7586C1.24172 17.7218 1.32 17.6656 1.43531 17.7005C1.52727 17.7287 1.68914 17.8709 1.72883 17.9585L3.25829 21.3329C3.27922 21.3791 3.30626 21.4223 3.33868 21.4613L5.44899 24.0052C5.50063 24.0674 5.56493 24.1179 5.63767 24.1534L7.72525 25.1713L9.2351 27.1745C9.34697 27.3231 9.51752 27.4012 9.69017 27.4012C9.80947 27.4012 9.92978 27.3638 10.0324 27.2865C10.2835 27.0973 10.3335 26.7403 10.1443 26.4893L8.57759 24.4106L7.73806 22.8699C7.63642 22.6835 7.6983 22.4489 7.87869 22.336C8.0383 22.2363 8.25681 22.2702 8.39853 22.4168L11.5217 25.6474C11.5367 25.6627 11.5525 25.6772 11.5689 25.6908C11.5696 25.6913 11.5702 25.692 11.5709 25.6926C11.5757 25.6966 11.5812 25.6999 11.5862 25.7037C11.6342 25.7403 11.6874 25.7699 11.7448 25.7897L15.0436 26.9317C15.0467 26.9327 15.0496 26.934 15.0526 26.935C15.1292 26.9617 15.2048 26.991 15.2793 27.0219C15.3035 27.0319 15.3272 27.043 15.3512 27.0535C15.4064 27.0776 15.4613 27.1024 15.5153 27.1289C15.538 27.14 15.5606 27.1517 15.5832 27.1631C15.6425 27.1935 15.7012 27.225 15.7589 27.2581C15.7724 27.2658 15.7858 27.2734 15.7991 27.2811C16.803 27.8717 17.5425 28.8631 17.8032 30.0155L18.1864 34.1611H13.0195C13.0681 32.9652 12.6436 31.7832 11.8267 30.9002ZM18.9455 36.4803H12.341C12.2549 36.4803 12.1848 36.4101 12.1848 36.324V35.456C12.1848 35.3699 12.2549 35.2998 12.341 35.2998H12.3817H18.8107H18.9454C19.0316 35.2998 19.1017 35.37 19.1017 35.456V36.324C19.1017 36.4102 19.0317 36.4803 18.9455 36.4803ZM21.0663 29.875L20.6554 34.321C20.4192 34.4509 20.2289 34.6529 20.1114 34.8966C19.9575 34.5772 19.6776 34.3298 19.3354 34.2215L18.9336 29.875C18.9314 29.8519 18.9279 29.829 18.923 29.8063C18.7267 28.9047 18.2993 28.0795 17.7046 27.4013H22.2954C21.7007 28.0795 21.2733 28.9047 21.077 29.8063C21.072 29.829 21.0685 29.8519 21.0663 29.875ZM28.038 36.324C28.038 36.4102 27.9679 36.4803 27.8817 36.4803H21.2773C21.1911 36.4803 21.1211 36.4101 21.1211 36.324V35.456C21.1211 35.3699 21.1911 35.2998 21.2773 35.2998H27.6181H27.8818C27.9679 35.2998 28.038 35.37 28.038 35.456V36.324ZM38.8502 17.9894L37.5975 21.9373C37.2644 22.9874 36.7337 23.9455 36.0201 24.785L34.7807 26.2435C34.0101 27.1502 33.0387 27.8899 31.9712 28.3826C30.8705 28.8907 29.2792 29.7045 28.1732 30.9002C27.3563 31.7832 26.9318 32.9652 26.9804 34.1613H21.8135L22.1967 30.0156C22.4575 28.8631 23.1971 27.8717 24.2011 27.2811C24.2143 27.2735 24.2275 27.266 24.2407 27.2585C24.2986 27.2252 24.3576 27.1935 24.4172 27.163C24.4396 27.1516 24.4618 27.1402 24.4843 27.1292C24.5388 27.1024 24.5942 27.0774 24.65 27.053C24.6734 27.0428 24.6966 27.032 24.7202 27.0221C24.7979 26.9899 24.8765 26.9592 24.9565 26.9316L28.2553 25.7897C28.3105 25.7706 28.3617 25.7424 28.4083 25.7077C28.4329 25.6894 28.4568 25.6697 28.4783 25.6474L31.6015 22.4169C31.7433 22.2703 31.9618 22.2361 32.1212 22.336C32.3018 22.449 32.3637 22.6836 32.262 22.87L31.4233 24.4091L29.8555 26.4894C29.6663 26.7405 29.7165 27.0974 29.9675 27.2866C30.0701 27.364 30.1904 27.4013 30.3097 27.4013C30.4823 27.4013 30.6528 27.3231 30.7647 27.1746L32.2744 25.1716L34.3625 24.1534C34.4351 24.118 34.4994 24.0674 34.5512 24.0052L36.6615 21.4613C36.6939 21.4223 36.7209 21.3791 36.7419 21.333L38.2713 17.9585C38.311 17.8709 38.4728 17.7288 38.5648 17.7007C38.6801 17.6652 38.7584 17.7219 38.7948 17.7587C38.8311 17.7955 38.8867 17.8744 38.8502 17.9894Z"
                                                fill="black" />
                                            <path
                                                d="M33.3859 11.1096L20.4857 2.52829C20.1907 2.33188 19.8093 2.33188 19.5142 2.52829L6.614 11.1096C6.17822 11.3996 5.91806 11.8851 5.91814 12.4085C5.91814 12.9319 6.17829 13.4174 6.614 13.7071C6.87642 13.8817 7.1772 13.969 7.47798 13.969C7.77877 13.969 8.07955 13.8817 8.34189 13.7071L9.3433 13.041V15.8437C9.3433 16.1582 9.59814 16.413 9.9126 16.413C10.2271 16.413 10.4819 16.1582 10.4819 15.8437V12.2837L20 5.95228L29.518 12.2837V15.8494C29.518 16.1639 29.7729 16.4187 30.0873 16.4187C30.4017 16.4187 30.6566 16.1639 30.6566 15.8494V13.041L31.658 13.7071C32.1828 14.0564 32.8611 14.0564 33.3859 13.7071C33.8217 13.4173 34.0819 12.9318 34.0819 12.4085C34.0819 11.8851 33.8218 11.3995 33.3859 11.1096ZM32.7552 12.7593C32.6135 12.8536 32.4303 12.8536 32.2885 12.7593L20.4857 4.90798C20.2465 4.74868 19.9505 4.7186 19.6896 4.81767C19.6289 4.84079 19.57 4.87079 19.5141 4.90798L7.71142 12.7592C7.7115 12.7592 7.71134 12.7592 7.71142 12.7592C7.56962 12.8536 7.38642 12.8535 7.24462 12.7592C7.07501 12.6464 7.05665 12.4763 7.05665 12.4084C7.05665 12.3405 7.07494 12.1704 7.24462 12.0575L20 3.57259L32.7553 12.0575C32.925 12.1704 32.9433 12.3406 32.9433 12.4085C32.9433 12.4764 32.925 12.6464 32.7552 12.7593Z"
                                                fill="#D30952" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_301_1204">
                                                <rect width="40" height="40" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=pent-house")}}">Pent House</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M31.3241 16.9595H27.7787C27.4643 16.9595 27.2094 17.2143 27.2094 17.5288C27.2094 17.8432 27.4643 18.0981 27.7787 18.0981H29.9512L25.2067 22.8426L23.9477 21.5832C23.8409 21.4765 23.6962 21.4165 23.5451 21.4165C23.3941 21.4165 23.2494 21.4765 23.1426 21.5832L19.2312 25.4947L17.3357 23.5991C17.229 23.4924 17.0841 23.4324 16.9332 23.4324C16.7823 23.4324 16.6374 23.4924 16.5307 23.5991L9.52241 30.6074C9.30007 30.8297 9.30007 31.1901 9.52241 31.4125C9.63358 31.5236 9.77921 31.5792 9.92491 31.5792C10.0706 31.5792 10.2163 31.5236 10.3274 31.4125L16.9332 24.8067L18.8287 26.7024C18.9354 26.8091 19.0802 26.8691 19.2312 26.8691C19.3821 26.8691 19.5269 26.8091 19.6337 26.7024L23.5451 22.7909L24.8042 24.0501C25.0265 24.2723 25.3869 24.2723 25.6093 24.0501L30.7548 18.9046V21.0883C30.7548 21.4028 31.0097 21.6576 31.3241 21.6576C31.6386 21.6576 31.8934 21.4028 31.8934 21.0883V17.5288C31.8934 17.2143 31.6386 16.9595 31.3241 16.9595Z"
                                            fill="#D30952" />
                                        <path
                                            d="M31.8785 32.1779H8.69072V16.15C8.69072 15.8357 8.43587 15.5808 8.12142 15.5808C7.80705 15.5808 7.55212 15.8357 7.55212 16.1501V32.7472C7.55212 33.0617 7.80697 33.3165 8.12142 33.3165H31.8785C32.193 33.3165 32.4478 33.0617 32.4478 32.7472C32.4478 32.4328 32.193 32.1779 31.8785 32.1779Z"
                                            fill="black" />
                                        <path
                                            d="M38.2736 34.7615H35.038V16.3669L36.8586 17.578C37.5283 18.0236 38.3935 18.0235 39.0632 17.5781C39.6191 17.2083 39.951 16.5888 39.951 15.921C39.951 15.2532 39.6191 14.6338 39.0632 14.264L34.6917 11.356C34.4299 11.1817 34.0766 11.2529 33.9025 11.5146C33.7283 11.7764 33.7994 12.1298 34.0611 12.3038L38.4326 15.2119C38.6741 15.3724 38.8125 15.6308 38.8125 15.9209C38.8125 16.211 38.6741 16.4694 38.4326 16.6301C38.146 16.8208 37.7758 16.8207 37.4892 16.6301L20.5598 5.36843C20.2197 5.14233 19.7802 5.14226 19.4402 5.36858L2.51078 16.6301C2.22422 16.8208 1.85391 16.8208 1.56734 16.6301C1.32586 16.4695 1.18742 16.2111 1.18742 15.921C1.18742 15.6309 1.32594 15.3725 1.56734 15.2119L20 2.95038L31.1169 10.3455C31.3786 10.5196 31.732 10.4485 31.9061 10.1869C32.0803 9.92507 32.0092 9.57171 31.7475 9.39765L20.5598 1.95522C20.2197 1.72913 19.7802 1.72905 19.4402 1.95538L13.9093 5.63452V5.14155H14.0737C14.4816 5.14155 14.8134 4.80968 14.8134 4.40187V2.67483C14.8134 2.26702 14.4815 1.93515 14.0737 1.93515H8.05148C7.64359 1.93515 7.3118 2.26702 7.3118 2.67483V4.40194C7.3118 4.80976 7.64359 5.14163 8.05148 5.14163H8.21586V9.42186L0.936797 14.264C0.380781 14.6338 0.0489062 15.2533 0.0489062 15.9211C0.0489062 16.5889 0.380859 17.2083 0.936797 17.5781C1.27164 17.8009 1.65531 17.9123 2.03914 17.9123C2.42281 17.9123 2.80664 17.8008 3.14141 17.5781L4.96195 16.3671V26.5174C4.96195 26.8319 5.2168 27.0867 5.53125 27.0867C5.84563 27.0867 6.10055 26.8319 6.10055 26.5174V15.6096L20 6.36351L33.8995 15.6096V34.7614H6.10047V30.0542C6.10047 29.7398 5.84563 29.485 5.53117 29.485C5.2168 29.485 4.96187 29.7398 4.96187 30.0542V34.7614H1.72641C0.774453 34.7615 0 35.5359 0 36.4879C0 37.4398 0.774453 38.2143 1.72641 38.2143H38.2736C39.2255 38.2143 40 37.4398 40 36.4879C40 35.5359 39.2255 34.7615 38.2736 34.7615ZM12.7708 6.39194L9.35437 8.66452V5.14163H12.7708V6.39194ZM8.45039 3.07366H13.6749V4.00312H8.45039V3.07366ZM38.2736 37.0758H1.72641C1.40227 37.0758 1.13852 36.812 1.13852 36.4879C1.13852 36.1637 1.40227 35.8999 1.72641 35.8999H38.2736C38.5977 35.8999 38.8615 36.1637 38.8615 36.4879C38.8615 36.812 38.5977 37.0758 38.2736 37.0758Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=floor")}}">Floor</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M38.2736 34.7615H35.038V16.367L36.8586 17.578C37.5283 18.0237 38.3936 18.0235 39.0632 17.5781C39.6192 17.2083 39.9511 16.5888 39.9511 15.921C39.9511 15.2532 39.6191 14.6338 39.0632 14.264L34.733 11.3835C34.4713 11.2094 34.1179 11.2805 33.9438 11.5421C33.7697 11.8039 33.8408 12.1573 34.1025 12.3313L38.4327 15.2119C38.6741 15.3724 38.8126 15.6308 38.8126 15.9209C38.8126 16.211 38.6741 16.4694 38.4326 16.6301C38.146 16.8207 37.7757 16.8207 37.4891 16.6301L20.5598 5.36843C20.2197 5.14233 19.7802 5.14226 19.4402 5.36858L2.51078 16.6301C2.22422 16.8208 1.85398 16.8208 1.56742 16.6301C1.32594 16.4695 1.1875 16.2111 1.1875 15.921C1.1875 15.6309 1.32602 15.3725 1.56742 15.2119L20 2.95038L31.1571 10.3722C31.419 10.5466 31.7723 10.4753 31.9463 10.2136C32.1205 9.95179 32.0494 9.59843 31.7877 9.42436L20.5598 1.95522C20.2197 1.72913 19.7802 1.72905 19.4402 1.95538L13.9093 5.63452V5.14155H14.0737C14.4816 5.14155 14.8134 4.80968 14.8134 4.40186V2.67483C14.8134 2.26702 14.4815 1.93515 14.0737 1.93515H8.05148C7.64359 1.93515 7.3118 2.26702 7.3118 2.67483V4.40194C7.3118 4.80976 7.64359 5.14163 8.05148 5.14163H8.21586V9.42186L0.936797 14.264C0.380781 14.6338 0.0489062 15.2533 0.0489062 15.9211C0.0489062 16.5889 0.380859 17.2083 0.936797 17.5781C1.27164 17.8009 1.65531 17.9123 2.03914 17.9123C2.42281 17.9123 2.80664 17.8008 3.14141 17.5781L4.96195 16.3671V26.5066C4.96195 26.8211 5.2168 27.0759 5.53125 27.0759C5.84563 27.0759 6.10055 26.8211 6.10055 26.5066V15.6098L20 6.36351L33.8995 15.6096V34.7614H6.10047V30.069C6.10047 29.7546 5.84563 29.4998 5.53117 29.4998C5.2168 29.4998 4.96188 29.7546 4.96188 30.069V34.7614H1.72641C0.774453 34.7615 0 35.5359 0 36.4879C0 37.4398 0.774453 38.2143 1.72641 38.2143H38.2736C39.2255 38.2143 40 37.4398 40 36.4879C40 35.5359 39.2255 34.7615 38.2736 34.7615ZM12.7708 6.39194L9.35438 8.66452V5.14163H12.7708V6.39194ZM8.45039 3.07366H13.6749V4.00312H8.45039V3.07366ZM38.2736 37.0758H1.72641C1.40227 37.0758 1.13852 36.812 1.13852 36.4879C1.13852 36.1637 1.40227 35.8999 1.72641 35.8999H38.2736C38.5977 35.8999 38.8615 36.1637 38.8615 36.4879C38.8615 36.812 38.5977 37.0758 38.2736 37.0758Z"
                                            fill="black" />
                                        <path
                                            d="M28.7702 18.4035C27.6516 17.1371 26.341 16.4642 24.875 16.4031C22.6927 16.3135 20.7948 17.6162 20.0001 18.2564C19.2055 17.6162 17.3071 16.3142 15.1253 16.4031C13.6592 16.4642 12.3487 17.1372 11.2301 18.4035C9.89206 19.9182 9.39089 21.5704 9.7405 23.314C10.7972 28.5855 19.3865 32.8058 19.7516 32.9829C19.83 33.021 19.915 33.04 20 33.04C20.085 33.04 20.17 33.021 20.2485 32.9829C20.6136 32.8058 29.2029 28.5855 30.2598 23.314C30.6093 21.5704 30.1082 19.9182 28.7702 18.4035ZM29.1437 23.0892C28.2914 27.3455 21.4039 31.1061 20 31.8326C18.5961 31.1061 11.7087 27.3455 10.8564 23.0892C10.5771 21.6942 10.9784 20.4081 12.0833 19.1572C12.9873 18.1339 14.0246 17.59 15.1667 17.5409C15.2253 17.5383 15.2832 17.5371 15.3415 17.5371C17.6042 17.5371 19.5865 19.3998 19.6062 19.4186C19.8259 19.6292 20.1729 19.6292 20.3933 19.4192C20.4141 19.3995 22.4965 17.4406 24.8335 17.541C25.9755 17.5901 27.0129 18.1339 27.9168 19.1573C29.0217 20.4081 29.423 21.6942 29.1437 23.0892Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=building")}}">Building</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.2206 11.4313C14.3279 11.4313 9.53394 16.2252 9.53394 22.1178C9.53394 28.0105 14.3279 32.8044 20.2206 32.8044C26.1131 32.8045 30.9071 28.0105 30.9071 22.1178C30.9071 16.2252 26.1131 11.4313 20.2206 11.4313ZM20.2205 31.6659C14.9556 31.6659 10.6724 27.3826 10.6724 22.1178C10.6724 16.853 14.9556 12.5698 20.2205 12.5698C25.4853 12.5698 29.7685 16.853 29.7685 22.1178C29.7685 27.3826 25.4853 31.6659 20.2205 31.6659Z"
                                            fill="#D30952" />
                                        <path
                                            d="M27.2576 19.9423C27.1492 19.6086 26.8527 19.3804 26.5023 19.3613L22.4649 19.1395L21.0066 15.3683C20.88 15.041 20.5715 14.8295 20.2205 14.8295C19.8697 14.8295 19.5611 15.041 19.4345 15.3683L17.9761 19.1395L13.9388 19.3613C13.5883 19.3805 13.2919 19.6086 13.1834 19.9423C13.075 20.276 13.1809 20.6348 13.453 20.8562L16.589 23.4087L15.5521 27.317C15.4622 27.6562 15.5876 28.0086 15.8714 28.2148C16.1552 28.4211 16.529 28.4313 16.824 28.2409L20.2205 26.0472L23.6171 28.241C23.7578 28.3318 23.9163 28.3769 24.0746 28.3769C24.2481 28.3769 24.4212 28.3226 24.5697 28.2148C24.8536 28.0085 24.9789 27.656 24.8888 27.3169L23.8521 23.4087L26.988 20.8563C27.2601 20.6348 27.366 20.276 27.2576 19.9423ZM22.9853 22.6462C22.7287 22.8548 22.6177 23.1962 22.7026 23.5159L23.5922 26.8696L20.6777 24.9872C20.4 24.8078 20.0411 24.8078 19.7632 24.9872L16.8487 26.8696L17.7384 23.516C17.8232 23.1962 17.7122 22.8548 17.4558 22.6463L14.7648 20.4561L18.229 20.2659C18.5593 20.2478 18.8498 20.0368 18.969 19.7284L20.2205 16.4924L21.4719 19.7287C21.5913 20.037 21.8819 20.2479 22.2117 20.2659L25.6761 20.4561L22.9853 22.6462Z"
                                            fill="#D30952" />
                                        <path
                                            d="M38.2735 34.7614H35.0379V16.3669L36.8585 17.578C37.1934 17.8008 37.577 17.9121 37.9609 17.9121C38.3445 17.9121 38.7284 17.8007 39.0631 17.578C39.6191 17.2082 39.9509 16.5887 39.9509 15.9209C39.9509 15.2531 39.619 14.6337 39.0631 14.2639L34.5391 11.2545C34.2773 11.0802 33.9239 11.1513 33.7499 11.4131C33.5756 11.6748 33.6467 12.0282 33.9085 12.2023L38.4325 15.2118C38.674 15.3723 38.8124 15.6308 38.8124 15.9209C38.8124 16.2109 38.674 16.4694 38.4325 16.63C38.1459 16.8207 37.7756 16.8206 37.4891 16.63L20.5597 5.36846C20.2197 5.14252 19.7804 5.14236 19.4401 5.36861L2.51078 16.6302C2.22421 16.8209 1.85398 16.8207 1.56742 16.6301C1.32593 16.4695 1.1875 16.2111 1.1875 15.921C1.1875 15.6309 1.32593 15.3725 1.56742 15.2119L9.1003 10.2009L9.10045 10.2009L13.6554 7.17087C13.6557 7.17072 13.6558 7.17056 13.656 7.17048L20 2.95033L30.9061 10.2052C31.1679 10.3793 31.5213 10.3082 31.6953 10.0466C31.8695 9.78477 31.7985 9.43142 31.5367 9.25735L20.5597 1.95526C20.2197 1.72932 19.7804 1.72917 19.4401 1.95541L13.9093 5.63447V5.14158H14.0736C14.4815 5.14158 14.8134 4.80971 14.8134 4.40189V2.67479C14.8134 2.26698 14.4815 1.9351 14.0736 1.9351H8.05155C7.64366 1.9351 7.31178 2.26698 7.31178 2.67479V4.40189C7.31178 4.80971 7.64366 5.14158 8.05155 5.14158H8.21584V9.42181L0.936717 14.2639C0.38078 14.6337 0.0489062 15.2532 0.0489062 15.921C0.0489062 16.5888 0.380859 17.2082 0.936717 17.578C1.6064 18.0236 2.47164 18.0236 3.14132 17.578L4.96194 16.3669V26.5164C4.96194 26.8308 5.21679 27.0857 5.53124 27.0857C5.84569 27.0857 6.10053 26.8308 6.10053 26.5164V15.6096L20 6.36353L28.285 11.8748L33.8994 15.6096V34.7614H6.10046V30.0532C6.10046 29.7387 5.84561 29.4839 5.53116 29.4839C5.21671 29.4839 4.96187 29.7387 4.96187 30.0532V34.7614H1.7264C0.774452 34.7614 0 35.5359 0 36.4878C0 37.4398 0.774452 38.2142 1.7264 38.2142H38.2736C39.2256 38.2142 40 37.4398 40 36.4878C40 35.5359 39.2255 34.7614 38.2735 34.7614ZM12.7708 6.39181L9.35436 8.66446V5.14158H12.7708V6.39181ZM8.4503 3.07369H13.6749V4.00314H13.3401H8.78514H8.4503V3.07369ZM38.2735 37.0757H1.7264C1.40226 37.0757 1.13851 36.8119 1.13851 36.4878C1.13851 36.1635 1.40226 35.8998 1.7264 35.8998H38.2736C38.5977 35.8998 38.8615 36.1635 38.8615 36.4878C38.8614 36.812 38.5977 37.0757 38.2735 37.0757Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=shop")}}">Shop</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.9584 20.0481V16.1437L35.6976 17.3006C36.3525 17.7363 37.1987 17.7362 37.8537 17.3006C38.3974 16.9389 38.722 16.3331 38.722 15.6801C38.722 15.0271 38.3974 14.4213 37.8537 14.0596L33.3559 11.0676C33.0944 10.8937 32.7413 10.9645 32.5675 11.2261C32.3935 11.4876 32.4645 11.8406 32.7259 12.0145L37.2237 15.0065C37.453 15.1591 37.5846 15.4046 37.5846 15.6801C37.5846 15.9556 37.453 16.2011 37.2237 16.3537C36.9513 16.5347 36.5995 16.5347 36.3275 16.3537L19.9131 5.43463C19.8957 5.42307 19.8779 5.41244 19.8599 5.40205C19.8563 5.39994 19.8528 5.39752 19.8492 5.39549C19.8302 5.38478 19.8109 5.37502 19.7914 5.36572C19.7887 5.36439 19.786 5.36283 19.7832 5.3615C19.7626 5.35182 19.7416 5.34307 19.7205 5.33486C19.7188 5.33424 19.7172 5.33338 19.7155 5.33275C19.7049 5.32869 19.6941 5.32549 19.6834 5.32182C19.3945 5.22268 19.0717 5.25986 18.809 5.43463L2.39445 16.3537C2.12219 16.5347 1.77039 16.5347 1.49828 16.3537C1.26891 16.2011 1.13734 15.9556 1.13734 15.6801C1.13734 15.4046 1.26891 15.1591 1.49828 15.0065L19.361 3.124L29.7711 10.049C30.0326 10.223 30.3856 10.152 30.5595 9.89049C30.7335 9.629 30.6625 9.27603 30.4011 9.10205L19.9131 2.12525C19.5777 1.90213 19.1443 1.90213 18.809 2.12525L13.4475 5.69174V4.76791H13.6103C14.0176 4.76791 14.3489 4.43658 14.3489 4.02932V2.30744C14.3489 1.90018 14.0176 1.56885 13.6103 1.56885H7.60609C7.19883 1.56885 6.8675 1.90018 6.8675 2.30744V4.02939C6.8675 4.43666 7.19883 4.76799 7.60609 4.76799H7.76883V9.46924L0.868359 14.0595C0.324609 14.4211 0 15.027 0 15.68C0 16.3331 0.324609 16.9389 0.868359 17.3006C1.19578 17.5185 1.57109 17.6274 1.94633 17.6274C2.32164 17.6274 2.69695 17.5185 3.02438 17.3006L4.76359 16.1437V26.2117C4.76359 26.5258 5.0182 26.7804 5.33227 26.7804C5.64633 26.7804 5.90094 26.5258 5.90094 26.2117V15.3871L19.361 6.43338L32.821 15.3871V19.6805C32.772 19.6681 32.7227 19.6572 32.6736 19.6456C32.6513 19.6403 32.6291 19.6349 32.6067 19.6297C32.5512 19.617 32.4955 19.6049 32.4398 19.5933C32.4076 19.5865 32.3753 19.58 32.343 19.5735C32.2913 19.5633 32.2398 19.5531 32.188 19.5438C32.149 19.5367 32.1098 19.5303 32.0707 19.5236C32.0237 19.5157 31.9767 19.5074 31.9296 19.5002C31.8482 19.4877 31.7664 19.4763 31.6843 19.4659C31.6473 19.4612 31.6101 19.4574 31.573 19.4531C31.5195 19.447 31.4661 19.441 31.4124 19.4357C31.374 19.432 31.3355 19.4287 31.2969 19.4254C31.2433 19.4208 31.1895 19.4167 31.1357 19.413C31.0986 19.4105 31.0615 19.408 31.0244 19.4059C30.9657 19.4025 30.9069 19.4 30.8479 19.3978C30.8159 19.3965 30.7838 19.395 30.7517 19.3941C30.6659 19.3917 30.5797 19.3903 30.4933 19.3901C30.4887 19.3901 30.484 19.3899 30.4794 19.3899C25.8859 19.3899 22.0417 22.6599 21.1524 26.9942C21.0254 27.6135 20.9587 28.2544 20.9587 28.9106C20.9587 28.9906 20.9597 29.0706 20.9617 29.1505C20.9839 30.0432 21.1297 30.9057 21.3824 31.7217C21.383 31.7235 21.3834 31.7252 21.384 31.7268C21.3951 31.7624 21.4068 31.7978 21.4183 31.8333C21.5037 32.0992 21.6002 32.3613 21.7088 32.6186H18.9075V19.379C18.9075 18.7186 18.3702 18.1814 17.7099 18.1814H9.37109C8.7107 18.1814 8.17352 18.7187 8.17352 19.379V32.6185H5.90094V29.759C5.90094 29.4449 5.64633 29.1903 5.33227 29.1903C5.0182 29.1903 4.76359 29.4449 4.76359 29.759V32.6185H2.42305C1.55297 32.6185 0.845 33.3264 0.845 34.1966C0.845 35.0667 1.55289 35.7746 2.42305 35.7746H23.8887C25.6005 37.4189 27.9238 38.4312 30.4793 38.4312C35.7291 38.4313 40 34.1603 40 28.9106C40 24.888 37.4924 21.4403 33.9584 20.0481ZM12.3102 6.4483L8.90617 8.7126V4.76791H12.3102V6.4483ZM8.00484 2.70611H13.2116V3.63057H8.00484V2.70611ZM9.31078 19.379C9.31078 19.3457 9.33781 19.3188 9.37102 19.3188H17.7097C17.743 19.3188 17.7699 19.3458 17.7699 19.379V32.6185H9.31078V19.379ZM2.42305 34.6374C2.18008 34.6374 1.98234 34.4396 1.98234 34.1967C1.98234 33.9536 2.18008 33.756 2.42305 33.756H22.2823C22.4627 34.0605 22.66 34.3547 22.8731 34.6374H2.42305ZM30.4793 37.2939C26.8109 37.2939 23.6855 34.9253 22.5515 31.6371C22.5416 31.6081 22.5317 31.5792 22.5221 31.5502C22.5098 31.5131 22.4977 31.476 22.4859 31.4388C22.4672 31.3796 22.4491 31.3203 22.4317 31.2606C22.4283 31.2488 22.4246 31.2372 22.4212 31.2254C22.2791 30.7294 22.1827 30.2198 22.1338 29.7042C22.1329 29.6955 22.1322 29.6867 22.1314 29.6779C22.1248 29.6068 22.1194 29.5356 22.1147 29.4644C22.1134 29.4455 22.1122 29.4266 22.1111 29.4076C22.1073 29.3442 22.1045 29.2807 22.1021 29.2171C22.1013 29.1964 22.1003 29.1759 22.0998 29.1552C22.0974 29.0737 22.0959 28.9921 22.0959 28.9106C22.0959 28.3328 22.1547 27.7684 22.2666 27.2231C23.0496 23.4065 26.4345 20.5272 30.4793 20.5272C30.4809 20.5272 30.4825 20.5273 30.4841 20.5273C30.5856 20.5274 30.6869 20.5299 30.788 20.5335C30.8116 20.5344 30.8353 20.5352 30.8589 20.5363C30.9567 20.5406 31.0543 20.5466 31.1516 20.5543C31.1755 20.5562 31.1992 20.5586 31.223 20.5606C31.3059 20.5679 31.3888 20.5765 31.4713 20.5863C31.4941 20.5889 31.517 20.5912 31.5397 20.5941C31.63 20.6055 31.72 20.6189 31.8098 20.6333C31.8453 20.639 31.8808 20.6449 31.9162 20.651C32.0006 20.6656 32.0849 20.6812 32.1688 20.6984C32.2083 20.7065 32.2473 20.7154 32.2866 20.7241C32.3409 20.736 32.3951 20.7486 32.4492 20.7617C32.5139 20.7773 32.5784 20.7937 32.6425 20.8108C32.6933 20.8243 32.7441 20.8381 32.7946 20.8527C32.8486 20.8682 32.9024 20.8842 32.9559 20.9008C32.9814 20.9087 33.0068 20.9171 33.0322 20.9253C36.4102 22.0078 38.8625 25.1779 38.8625 28.9106C38.8627 33.5331 35.1019 37.2939 30.4793 37.2939Z"
                                            fill="black" />
                                        <path
                                            d="M31.2971 28.171V25.8007C32.1994 25.8681 32.509 26.299 32.8861 26.299C33.3844 26.299 33.5999 25.6796 33.5999 25.3698C33.5999 24.5887 32.1725 24.3328 31.2971 24.3059V23.9557C31.2971 23.7807 31.0681 23.619 30.8392 23.619C30.5833 23.619 30.3813 23.7806 30.3813 23.9557V24.3328C29.0347 24.5079 27.7686 25.2485 27.7686 26.9589C27.7686 28.6826 29.1558 29.2078 30.3813 29.6657V32.3457C29.1962 32.211 28.7922 31.3356 28.2804 31.3356C27.8629 31.3356 27.5263 31.9012 27.5263 32.2783C27.5263 33.0325 28.7518 33.9078 30.3813 33.9482V34.3253C30.3813 34.5003 30.5833 34.662 30.8392 34.662C31.0682 34.662 31.2971 34.5003 31.2971 34.3253V33.9077C32.8054 33.6653 33.8423 32.7092 33.8423 31.0527C33.8423 29.2214 32.4957 28.6154 31.2971 28.171ZM30.489 27.8746C29.8696 27.6323 29.4117 27.3764 29.4117 26.7839C29.4117 26.2721 29.8158 25.9489 30.489 25.8411V27.8746ZM31.1894 32.3323V29.989C31.7684 30.2449 32.1994 30.5682 32.1994 31.2279C32.1994 31.861 31.7819 32.2111 31.1894 32.3323Z"
                                            fill="#D30952" />
                                        <path
                                            d="M16.0404 24.5175C15.7275 24.5175 15.4739 24.771 15.4739 25.084V26.255C15.4739 26.5679 15.7275 26.8215 16.0404 26.8215C16.3534 26.8215 16.607 26.5679 16.607 26.255V25.084C16.607 24.771 16.3534 24.5175 16.0404 24.5175Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=duplex")}}">Duplex</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="31" viewBox="0 0 40 31" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M38.2735 26.5967H37.1977V12.6726H37.6379C38.0108 12.6726 38.3521 12.4685 38.5285 12.1399C38.705 11.8113 38.6866 11.4141 38.4806 11.1031L31.422 0.452577C31.2342 0.169218 30.9192 7.80819e-05 30.5792 7.80819e-05H27.0216C26.7071 7.80819e-05 26.4524 0.254922 26.4524 0.569374C26.4524 0.883827 26.7072 1.13867 27.0216 1.13867H30.5107L37.4003 11.5343H16.6922L9.80248 1.13859H23.4353C23.7497 1.13859 24.0046 0.883749 24.0046 0.569296C24.0046 0.254843 23.7497 0 23.4353 0H8.74225C8.55139 0 8.37319 0.0957031 8.26772 0.254765L0.970311 11.2658C0.970311 11.2658 0.970233 11.2659 0.970154 11.2661L0.904139 11.3657C0.732655 11.6247 0.717421 11.9554 0.864373 12.2291C1.01133 12.5027 1.29554 12.6726 1.60609 12.6726H1.72578H2.36109V26.5967H1.7264C0.774452 26.5967 0 27.3713 0 28.3232C0 29.2752 0.774452 30.0496 1.7264 30.0496H38.2736C39.2256 30.0496 40 29.2752 40 28.3232C39.9999 27.3713 39.2255 26.5967 38.2735 26.5967ZM15.9708 12.6726H36.0592V26.5967H15.9708V12.6726ZM2.15836 11.5341L8.74225 1.59976L15.3262 11.5341H2.15836ZM11.5915 16.824H6.17546C5.76218 16.824 5.42585 17.1603 5.42585 17.5736V26.5967H3.4996V12.6726H14.8323V26.5967H12.3411V17.5736C12.3411 17.1602 12.0047 16.824 11.5915 16.824ZM11.2026 17.9625V26.5967H6.56444V17.9625H11.2026ZM38.2735 28.9111H1.7264C1.40226 28.9111 1.13851 28.6474 1.13851 28.3232C1.13851 27.999 1.40226 27.7353 1.7264 27.7353H38.2735C38.5977 27.7353 38.8614 27.999 38.8614 28.3232C38.8614 28.6474 38.5977 28.9111 38.2735 28.9111Z"
                                            fill="black" />
                                        <path
                                            d="M10.3107 21.3278C9.99624 21.3278 9.74139 21.5826 9.74139 21.8971V23.0735C9.74147 23.388 9.99632 23.6428 10.3107 23.6428C10.6251 23.6428 10.88 23.388 10.88 23.0735V21.8971C10.88 21.5825 10.6251 21.3278 10.3107 21.3278Z"
                                            fill="#D30952" />
                                        <path
                                            d="M33.0554 17.4977H28.0869C27.675 17.4977 27.3397 17.8328 27.3397 18.2449V23.6137C27.3397 24.0256 27.6749 24.3608 28.0869 24.3608H33.0554C33.4674 24.3608 33.8025 24.0257 33.8025 23.6137V18.2449C33.8025 17.8329 33.4674 17.4977 33.0554 17.4977ZM32.664 23.2222H28.4783V18.6362H32.664V23.2222Z"
                                            fill="#D30952" />
                                        <path
                                            d="M23.4135 17.4977H18.445C18.033 17.4977 17.6979 17.8328 17.6979 18.2449V23.6137C17.6979 24.0256 18.033 24.3608 18.445 24.3608H23.4135C23.8254 24.3608 24.1606 24.0257 24.1606 23.6137V18.2449C24.1605 17.8329 23.8254 17.4977 23.4135 17.4977ZM23.022 23.2222H18.8364V18.6362H23.022V23.2222Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=apartment")}}">Apartments</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.2406 5.6167H7.92819C7.551 5.6167 7.2442 5.92357 7.2442 6.30068V9.44865C7.24412 9.82576 7.551 10.1326 7.92819 10.1326H10.2406C10.6178 10.1326 10.9246 9.82576 10.9246 9.44865V6.30068C10.9246 5.92357 10.6178 5.6167 10.2406 5.6167ZM9.786 8.99412H8.38264V6.75522H9.786V8.99412Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.316 5.6167H13.0035C12.6263 5.6167 12.3195 5.92357 12.3195 6.30068V9.44865C12.3194 9.82576 12.6263 10.1326 13.0035 10.1326H15.316C15.6932 10.1326 16 9.82576 16 9.44865V6.30068C16 5.92357 15.6932 5.6167 15.316 5.6167ZM14.8614 8.99412H13.458V6.75522H14.8614V8.99412Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 5.6167H18.0788C17.7016 5.6167 17.3948 5.92357 17.3948 6.30068V9.44865C17.3948 9.82576 17.7016 10.1326 18.0788 10.1326H20.3912C20.7684 10.1326 21.0752 9.82576 21.0752 9.44865V6.30068C21.0752 5.92357 20.7684 5.6167 20.3912 5.6167ZM19.9367 8.99412H18.5334V6.75522H19.9367V8.99412Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 14.1809H7.92806C7.55088 14.1809 7.24408 14.4878 7.24408 14.8649V18.0129C7.24408 18.39 7.55088 18.6969 7.92806 18.6969H10.2405C10.6177 18.6969 10.9245 18.39 10.9245 18.0129V14.8649C10.9245 14.4878 10.6177 14.1809 10.2405 14.1809ZM9.78603 17.5584H8.38267V15.3194H9.78603V17.5584Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.3159 14.1809H13.0034C12.6263 14.1809 12.3195 14.4878 12.3195 14.8649V18.0129C12.3195 18.39 12.6263 18.6969 13.0034 18.6969H15.3159C15.6931 18.6969 15.9999 18.39 15.9999 18.0129V14.8649C15.9999 14.4878 15.6931 14.1809 15.3159 14.1809ZM14.8614 17.5584H13.458V15.3194H14.8614V17.5584Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 14.1809H18.0788C17.7016 14.1809 17.3948 14.4878 17.3948 14.8649V18.0129C17.3948 18.39 17.7016 18.6969 18.0788 18.6969H20.3912C20.7684 18.6969 21.0752 18.39 21.0752 18.0129V14.8649C21.0752 14.4878 20.7684 14.1809 20.3912 14.1809ZM19.9367 17.5584H18.5334V15.3194H19.9367V17.5584Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 22.7454H7.92806C7.55088 22.7454 7.24408 23.0522 7.24408 23.4293V26.5773C7.24408 26.9544 7.55088 27.2613 7.92806 27.2613H10.2405C10.6177 27.2613 10.9245 26.9544 10.9245 26.5773V23.4293C10.9245 23.0522 10.6177 22.7454 10.2405 22.7454ZM9.78603 26.1228H8.38267V23.8839H9.78603V26.1228Z"
                                            fill="#D30952" />
                                        <path
                                            d="M15.3159 22.7454H13.0034C12.6263 22.7454 12.3195 23.0522 12.3195 23.4293V26.5773C12.3195 26.9544 12.6263 27.2613 13.0034 27.2613H15.3159C15.6931 27.2613 15.9999 26.9544 15.9999 26.5773V23.4293C15.9999 23.0522 15.6931 22.7454 15.3159 22.7454ZM14.8614 26.1228H13.458V23.8839H14.8614V26.1228Z"
                                            fill="black" />
                                        <path
                                            d="M20.3912 22.7454H18.0788C17.7016 22.7454 17.3948 23.0522 17.3948 23.4293V26.5773C17.3948 26.9544 17.7016 27.2613 18.0788 27.2613H20.3912C20.7684 27.2613 21.0752 26.9544 21.0752 26.5773V23.4293C21.0752 23.0522 20.7684 22.7454 20.3912 22.7454ZM19.9367 26.1228H18.5334V23.8839H19.9367V26.1228Z"
                                            fill="#D30952" />
                                        <path
                                            d="M10.2405 31.3096H7.92806C7.55088 31.3096 7.24408 31.6164 7.24408 31.9936V35.1415C7.24408 35.5186 7.55088 35.8255 7.92806 35.8255H10.2405C10.6177 35.8255 10.9245 35.5186 10.9245 35.1415V31.9936C10.9245 31.6164 10.6177 31.3096 10.2405 31.3096ZM9.78603 34.687H8.38267V32.4481H9.78603V34.687Z"
                                            fill="#D30952" />
                                        <path
                                            d="M20.3912 31.3096H18.0788C17.7016 31.3096 17.3948 31.6164 17.3948 31.9936V35.1415C17.3948 35.5186 17.7016 35.8255 18.0788 35.8255H20.3912C20.7684 35.8255 21.0752 35.5186 21.0752 35.1415V31.9936C21.0752 31.6164 20.7684 31.3096 20.3912 31.3096ZM19.9367 34.687H18.5334V32.4481H19.9367V34.687Z"
                                            fill="#D30952" />
                                        <path
                                            d="M36.5569 36.8882H34.957L34.9527 27.8429C34.9525 27.5286 34.6977 27.2739 34.3834 27.2739H34.3831C34.0688 27.2741 33.814 27.5291 33.8142 27.8434L33.8185 36.8881H30.7342V34.0573C30.7342 33.6093 30.3697 33.2448 29.9216 33.2448H27.3027C26.8546 33.2448 26.4901 33.6093 26.4901 34.0573V36.8881H23.4154L23.4078 18.7982H33.8099L33.8125 24.2934C33.8127 24.6077 34.0675 24.8624 34.3818 24.8624H34.382C34.6964 24.8623 34.9512 24.6073 34.951 24.2929L34.9485 18.7983H35.8678C36.1822 18.7983 36.4371 18.5434 36.4371 18.229V16.2915C36.4371 15.977 36.1823 15.7222 35.8678 15.7222H23.4064L23.401 2.87297H23.9667C24.3719 2.87297 24.7015 2.54336 24.7015 2.1382V0.734766C24.7015 0.329609 24.3719 0 23.9667 0H4.29768C3.89252 0 3.56291 0.329609 3.56291 0.734766V2.13828C3.56291 2.54344 3.89252 2.87305 4.29768 2.87305H4.84854L4.85908 27.6513C4.85924 27.9657 5.11408 28.2204 5.42838 28.2204H5.42861C5.74299 28.2202 5.99775 27.9652 5.9976 27.6509L5.98705 2.87305H22.2624L22.2769 36.8882H16.6117V31.1935C16.6117 30.7341 16.238 30.3605 15.7787 30.3605H12.4858C12.0265 30.3605 11.6528 30.7342 11.6528 31.1935V36.8882H6.00158L5.99916 31.1877C5.999 30.8734 5.74416 30.6187 5.42986 30.6187H5.42963C5.11525 30.6188 4.86049 30.8738 4.86064 31.1881L4.86307 36.8881H3.44314C2.58525 36.8881 1.88721 37.5861 1.88721 38.4441C1.88721 39.302 2.58518 40 3.44314 40H36.557C37.4149 40 38.1129 39.302 38.1129 38.4441C38.1128 37.5861 37.4149 36.8882 36.5569 36.8882ZM27.6286 34.3833H29.5957V36.8882H27.6286V34.3833ZM35.2985 16.8608V17.6598H23.4072L23.4068 16.8608H35.2985ZM4.7015 1.73453V1.13852H23.563V1.73453H4.7015ZM12.7913 31.4991H15.4731V36.8882H12.7913V31.4991ZM36.5569 38.8614H3.44314C3.21299 38.8614 3.02572 38.6741 3.02572 38.4441C3.02572 38.214 3.21299 38.0267 3.44314 38.0267H36.5569C36.7871 38.0267 36.9742 38.214 36.9742 38.4441C36.9742 38.6741 36.787 38.8614 36.5569 38.8614Z"
                                            fill="black" />
                                        <path
                                            d="M27.1952 20.9156H25.0579C24.6855 20.9156 24.3826 21.2186 24.3826 21.591V24.5006C24.3826 24.873 24.6855 25.1759 25.0579 25.1759H27.1953C27.5677 25.1759 27.8706 24.8729 27.8706 24.5006V21.591C27.8706 21.2185 27.5676 20.9156 27.1952 20.9156ZM26.7321 24.0374H25.5212V22.0542H26.7321V24.0374Z"
                                            fill="#D30952" />
                                        <path
                                            d="M31.8863 20.9156H29.749C29.3766 20.9156 29.0737 21.2186 29.0737 21.591V24.5006C29.0737 24.873 29.3766 25.1759 29.749 25.1759H31.8863C32.2587 25.1759 32.5616 24.8729 32.5616 24.5006V21.591C32.5616 21.2185 32.2587 20.9156 31.8863 20.9156ZM31.4231 24.0374H30.2122V22.0542H31.4231V24.0374Z"
                                            fill="black" />
                                        <path
                                            d="M27.1953 26.8671H25.0579C24.6855 26.8671 24.3826 27.17 24.3826 27.5424V30.4521C24.3826 30.8244 24.6856 31.1273 25.0579 31.1273H27.1953C27.5677 31.1273 27.8706 30.8243 27.8706 30.4521V27.5424C27.8706 27.17 27.5676 26.8671 27.1953 26.8671ZM26.7321 29.9889H25.5211V28.0057H26.7321V29.9889Z"
                                            fill="black" />
                                        <path
                                            d="M31.8863 26.8671H29.749C29.3766 26.8671 29.0737 27.17 29.0737 27.5424V30.4521C29.0737 30.8244 29.3766 31.1273 29.749 31.1273H31.8863C32.2587 31.1273 32.5616 30.8243 32.5616 30.4521V27.5424C32.5616 27.17 32.2587 26.8671 31.8863 26.8671ZM31.4231 29.9889H30.2122V28.0057H31.4231V29.9889Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=house")}}">House</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.3343 31.3202C33.0032 31.3202 32.7348 31.5885 32.7348 31.9196V32.7189C32.7349 33.05 33.0033 33.3184 33.3343 33.3184C33.6654 33.3184 33.9338 33.05 33.9338 32.7189V31.9196C33.9338 31.5885 33.6654 31.3202 33.3343 31.3202Z"
                                            fill="#D30952" />
                                        <path
                                            d="M38.4747 35.2715H37.492V16.4361C37.492 16.1051 37.2237 15.8367 36.8926 15.8367C36.5615 15.8367 36.2931 16.1051 36.2931 16.4361V20.2147H33.71V14.0925C33.71 13.4361 33.1759 12.902 32.5195 12.902H22.5752C21.9188 12.902 21.3848 13.4361 21.3848 14.0925V20.2147H18.8016V5.5049L36.2931 10.3761V12.7117C36.2931 13.0428 36.5615 13.3111 36.8926 13.3111C37.2237 13.3111 37.492 13.0428 37.492 12.7117V10.7099L38.3163 10.9394C38.3889 10.9597 38.4625 10.9696 38.5354 10.9696C38.7093 10.9695 38.8794 10.913 39.0225 10.8043C39.2256 10.65 39.3421 10.4153 39.3421 10.1602V8.60615C39.3421 8.24443 39.0987 7.92404 38.7503 7.82701L16.7784 1.7081C16.5329 1.63974 16.2754 1.68896 16.0723 1.84318C15.8691 1.99748 15.7527 2.23224 15.7527 2.48724V4.04131C15.7527 4.40302 15.996 4.72342 16.3445 4.82045L17.6027 5.17084V7.3492H6.00344C5.52625 7.3492 5.13797 7.73748 5.13797 8.21467V9.71935C5.13797 10.1965 5.52625 10.5848 6.00344 10.5848H6.73539V22.1312H2.77156C1.91461 22.1312 1.21734 22.8284 1.21734 23.6854V35.3026C0.523437 35.4455 0 36.0611 0 36.7968C0 37.6379 0.684219 38.3221 1.52531 38.3221H38.4747C39.3158 38.3221 40 37.6379 40 36.7968C40 35.9557 39.3158 35.2715 38.4747 35.2715ZM36.2932 23.3304V35.2715H35.3309V27.8867C35.3309 27.3815 34.9198 26.9704 34.4147 26.9704H30.4054C29.9002 26.9704 29.4892 27.3815 29.4892 27.8866V35.2714H18.8017V23.3304H36.2932ZM34.132 28.1694V35.2715H30.688V28.1694H34.132ZM22.5837 14.1009H32.511V20.2147H22.5837V14.1009ZM36.2931 21.4136V22.1315H7.93422V21.4136H36.2931ZM11.7133 20.2147V15.0014H15.1823V20.2147H11.7133ZM16.9516 3.74521V3.00099L38.1432 8.90263V9.64685L16.9516 3.74521ZM17.6028 10.5851V20.2147H16.3812V14.7907C16.3812 14.2458 15.9379 13.8025 15.393 13.8025H11.5027C10.9577 13.8025 10.5144 14.2458 10.5144 14.7907V20.2147H7.9343V10.5851H17.6028ZM6.3368 9.38615V8.54826H17.6027V9.38615H6.3368ZM2.41625 23.6856C2.41625 23.4897 2.57563 23.3303 2.77156 23.3303H17.6027V35.2714H15.6151V27.8194C15.6151 27.3198 15.2086 26.9133 14.709 26.9133H5.2225C4.72289 26.9133 4.31641 27.3198 4.31641 27.8194V35.2714L4.37 35.2715H4.31641H2.41625V23.6856ZM6.56547 29.1534H5.51531V28.1122H14.4162V29.1534H10.2898C9.95875 29.1534 9.69039 29.4218 9.69039 29.7529C9.69039 30.084 9.95875 30.3523 10.2898 30.3523H14.4162V31.3935H5.51531V30.3523H6.56547C6.89656 30.3523 7.16492 30.084 7.16492 29.7529C7.16492 29.4218 6.89656 29.1534 6.56547 29.1534ZM14.4162 32.5923V33.6335H5.51531V32.5923H14.4162ZM14.4162 34.8324V35.2714H5.51531V34.8324H14.4162ZM38.4747 37.1233H1.52531C1.34531 37.1233 1.19891 36.9768 1.19891 36.7968C1.19891 36.6168 1.34531 36.4703 1.52531 36.4703H38.4747C38.6547 36.4703 38.8011 36.6168 38.8011 36.7968C38.8011 36.9768 38.6547 37.1233 38.4747 37.1233Z"
                                            fill="black" />
                                        <path
                                            d="M28.1325 31.7998H27.8037V28.1117C27.8037 27.6065 27.3926 27.1953 26.8873 27.1953H21.2387C20.7334 27.1953 20.3223 27.6064 20.3223 28.1117V31.7998H20C19.6689 31.7998 19.4005 32.0681 19.4005 32.3992C19.4005 32.7303 19.6689 32.9987 20 32.9987H20.9218H27.2042H28.1325C28.4636 32.9987 28.732 32.7303 28.732 32.3992C28.732 32.0681 28.4635 31.7998 28.1325 31.7998ZM26.6048 31.7998H21.5212V28.3942H26.6048V31.7998Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=hotel")}}">Hotel</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_301_12046)">
                                            <path
                                                d="M21.6399 18.7241C21.3255 18.7241 21.0706 18.979 21.0706 19.2934V20.5321C21.0706 20.8465 21.3254 21.1014 21.6399 21.1014C21.9543 21.1014 22.2092 20.8465 22.2092 20.5321V19.2934C22.2092 18.979 21.9543 18.7241 21.6399 18.7241Z"
                                                fill="#D30952" />
                                            <path
                                                d="M39.604 16.9578C39.2453 16.5952 38.7195 16.4628 38.2318 16.6117V16.6118C37.828 16.7352 37.4084 17.1039 37.2341 17.4884L35.7362 20.7932L33.7531 23.1838L33.2554 23.4264L33.2618 23.4148C33.6509 22.7005 33.4153 21.8027 32.7252 21.3708C32.1128 20.9877 31.296 21.0948 30.7829 21.6255L30.6565 21.7561V19.3864C30.6565 19.072 30.4017 18.8171 30.0872 18.8171C29.7729 18.8171 29.5179 19.072 29.5179 19.3864V22.9338L28.0737 24.4276H24.0194V15.0682C24.0194 14.5049 23.5612 14.0466 22.9979 14.0466H17.002C16.4387 14.0466 15.9805 14.5049 15.9805 15.0682V24.4277H11.9262L10.482 22.9338V19.39C10.482 19.0755 10.2271 18.8207 9.91268 18.8207C9.59822 18.8207 9.34338 19.0755 9.34338 19.39V21.7562L9.21713 21.6256C8.704 21.0949 7.8872 20.9877 7.2747 21.3709C6.58478 21.8029 6.34907 22.7006 6.73829 23.4149L6.7447 23.4266L6.24696 23.1838L4.26376 20.7933L2.76586 17.4885C2.59157 17.104 2.17203 16.7352 1.76821 16.6118C1.28047 16.463 0.754687 16.5954 0.396015 16.9579C0.0372641 17.3205 -0.0897674 17.8476 0.0644517 18.3338L1.31719 22.2818C1.69641 23.4767 2.30032 24.567 3.11219 25.5224L4.35165 26.981C5.22845 28.0126 6.33501 28.8549 7.5515 29.4164C8.56416 29.8839 10.0224 30.6264 10.991 31.6734C11.6324 32.3667 11.9492 33.3081 11.873 34.2503C11.3899 34.4384 11.0462 34.9074 11.0462 35.4562V36.3242C11.0462 37.0382 11.6271 37.619 12.341 37.619H18.9455C19.4589 37.619 19.9021 37.3179 20.1114 36.8836C20.3206 37.3179 20.7639 37.619 21.2772 37.619H27.8817C28.5956 37.619 29.1765 37.0382 29.1765 36.3242V35.4562C29.1765 34.8246 28.7215 34.2979 28.1223 34.1846C28.0658 33.2646 28.3823 32.3507 29.0088 31.6734C29.9774 30.6264 31.4356 29.8839 32.4483 29.4164C33.6648 28.8549 34.7712 28.0128 35.6481 26.9809L36.8876 25.5224C37.6995 24.567 38.3034 23.4767 38.6826 22.2818L39.9353 18.3338C40.0898 17.8476 39.9627 17.3204 39.604 16.9578ZM17.119 15.1852H22.8808V24.4277H17.119V15.1852ZM25.4201 25.5663L24.584 25.8556C24.5807 25.8567 24.5775 25.8581 24.5743 25.8593C24.5092 25.882 24.4448 25.9062 24.3809 25.9313C24.3596 25.9397 24.3383 25.9484 24.3171 25.957C24.2678 25.9771 24.2189 25.998 24.1704 26.0195C24.1499 26.0286 24.1293 26.0374 24.1089 26.0467C24.0497 26.0738 23.9911 26.1019 23.9332 26.1311C23.8989 26.1483 23.865 26.1664 23.8311 26.1843C23.8077 26.1967 23.7843 26.2092 23.7611 26.222C23.7359 26.2358 23.7103 26.2486 23.6853 26.2628H16.3147C16.2899 26.2487 16.2644 26.236 16.2393 26.2223C16.2157 26.2093 16.1919 26.1966 16.1681 26.1839C16.1345 26.1662 16.101 26.1483 16.0671 26.1313C16.0089 26.102 15.95 26.0737 15.8907 26.0464C15.8709 26.0374 15.851 26.0289 15.8311 26.0202C15.7816 25.9982 15.7317 25.977 15.6814 25.9564C15.661 25.9481 15.6408 25.9399 15.6204 25.9319C15.5528 25.9053 15.4849 25.8796 15.416 25.8558L14.5799 25.5663H25.4201ZM11.8267 30.9002C10.7206 29.7045 9.12939 28.8907 8.02876 28.3826C6.96134 27.8899 5.98978 27.1502 5.21923 26.2435L3.97977 24.785C3.26633 23.9455 2.73563 22.9874 2.40243 21.9373L1.14969 17.9894C1.1132 17.8744 1.16883 17.7955 1.20531 17.7586C1.24172 17.7218 1.32 17.6656 1.43531 17.7005C1.52727 17.7287 1.68914 17.8709 1.72883 17.9585L3.25829 21.3329C3.27922 21.3791 3.30626 21.4223 3.33868 21.4613L5.44899 24.0052C5.50063 24.0674 5.56493 24.1179 5.63767 24.1534L7.72525 25.1713L9.2351 27.1745C9.34697 27.3231 9.51752 27.4012 9.69017 27.4012C9.80947 27.4012 9.92978 27.3638 10.0324 27.2865C10.2835 27.0973 10.3335 26.7403 10.1443 26.4893L8.57759 24.4106L7.73806 22.8699C7.63642 22.6835 7.6983 22.4489 7.87869 22.336C8.0383 22.2363 8.25681 22.2702 8.39853 22.4168L11.5217 25.6474C11.5367 25.6627 11.5525 25.6772 11.5689 25.6908C11.5696 25.6913 11.5702 25.692 11.5709 25.6926C11.5757 25.6966 11.5812 25.6999 11.5862 25.7037C11.6342 25.7403 11.6874 25.7699 11.7448 25.7897L15.0436 26.9317C15.0467 26.9327 15.0496 26.934 15.0526 26.935C15.1292 26.9617 15.2048 26.991 15.2793 27.0219C15.3035 27.0319 15.3272 27.043 15.3512 27.0535C15.4064 27.0776 15.4613 27.1024 15.5153 27.1289C15.538 27.14 15.5606 27.1517 15.5832 27.1631C15.6425 27.1935 15.7012 27.225 15.7589 27.2581C15.7724 27.2658 15.7858 27.2734 15.7991 27.2811C16.803 27.8717 17.5425 28.8631 17.8032 30.0155L18.1864 34.1611H13.0195C13.0681 32.9652 12.6436 31.7832 11.8267 30.9002ZM18.9455 36.4803H12.341C12.2549 36.4803 12.1848 36.4101 12.1848 36.324V35.456C12.1848 35.3699 12.2549 35.2998 12.341 35.2998H12.3817H18.8107H18.9454C19.0316 35.2998 19.1017 35.37 19.1017 35.456V36.324C19.1017 36.4102 19.0317 36.4803 18.9455 36.4803ZM21.0663 29.875L20.6554 34.321C20.4192 34.4509 20.2289 34.6529 20.1114 34.8966C19.9575 34.5772 19.6776 34.3298 19.3354 34.2215L18.9336 29.875C18.9314 29.8519 18.9279 29.829 18.923 29.8063C18.7267 28.9047 18.2993 28.0795 17.7046 27.4013H22.2954C21.7007 28.0795 21.2733 28.9047 21.077 29.8063C21.072 29.829 21.0685 29.8519 21.0663 29.875ZM28.038 36.324C28.038 36.4102 27.9679 36.4803 27.8817 36.4803H21.2773C21.1911 36.4803 21.1211 36.4101 21.1211 36.324V35.456C21.1211 35.3699 21.1911 35.2998 21.2773 35.2998H27.6181H27.8818C27.9679 35.2998 28.038 35.37 28.038 35.456V36.324ZM38.8502 17.9894L37.5975 21.9373C37.2644 22.9874 36.7337 23.9455 36.0201 24.785L34.7807 26.2435C34.0101 27.1502 33.0387 27.8899 31.9712 28.3826C30.8705 28.8907 29.2792 29.7045 28.1732 30.9002C27.3563 31.7832 26.9318 32.9652 26.9804 34.1613H21.8135L22.1967 30.0156C22.4575 28.8631 23.1971 27.8717 24.2011 27.2811C24.2143 27.2735 24.2275 27.266 24.2407 27.2585C24.2986 27.2252 24.3576 27.1935 24.4172 27.163C24.4396 27.1516 24.4618 27.1402 24.4843 27.1292C24.5388 27.1024 24.5942 27.0774 24.65 27.053C24.6734 27.0428 24.6966 27.032 24.7202 27.0221C24.7979 26.9899 24.8765 26.9592 24.9565 26.9316L28.2553 25.7897C28.3105 25.7706 28.3617 25.7424 28.4083 25.7077C28.4329 25.6894 28.4568 25.6697 28.4783 25.6474L31.6015 22.4169C31.7433 22.2703 31.9618 22.2361 32.1212 22.336C32.3018 22.449 32.3637 22.6836 32.262 22.87L31.4233 24.4091L29.8555 26.4894C29.6663 26.7405 29.7165 27.0974 29.9675 27.2866C30.0701 27.364 30.1904 27.4013 30.3097 27.4013C30.4823 27.4013 30.6528 27.3231 30.7647 27.1746L32.2744 25.1716L34.3625 24.1534C34.4351 24.118 34.4994 24.0674 34.5512 24.0052L36.6615 21.4613C36.6939 21.4223 36.7209 21.3791 36.7419 21.333L38.2713 17.9585C38.311 17.8709 38.4728 17.7288 38.5648 17.7007C38.6801 17.6652 38.7584 17.7219 38.7948 17.7587C38.8311 17.7955 38.8867 17.8744 38.8502 17.9894Z"
                                                fill="black" />
                                            <path
                                                d="M33.3859 11.1096L20.4857 2.52829C20.1907 2.33188 19.8093 2.33188 19.5142 2.52829L6.614 11.1096C6.17822 11.3996 5.91806 11.8851 5.91814 12.4085C5.91814 12.9319 6.17829 13.4174 6.614 13.7071C6.87642 13.8817 7.1772 13.969 7.47798 13.969C7.77877 13.969 8.07955 13.8817 8.34189 13.7071L9.3433 13.041V15.8437C9.3433 16.1582 9.59814 16.413 9.9126 16.413C10.2271 16.413 10.4819 16.1582 10.4819 15.8437V12.2837L20 5.95228L29.518 12.2837V15.8494C29.518 16.1639 29.7729 16.4187 30.0873 16.4187C30.4017 16.4187 30.6566 16.1639 30.6566 15.8494V13.041L31.658 13.7071C32.1828 14.0564 32.8611 14.0564 33.3859 13.7071C33.8217 13.4173 34.0819 12.9318 34.0819 12.4085C34.0819 11.8851 33.8218 11.3995 33.3859 11.1096ZM32.7552 12.7593C32.6135 12.8536 32.4303 12.8536 32.2885 12.7593L20.4857 4.90798C20.2465 4.74868 19.9505 4.7186 19.6896 4.81767C19.6289 4.84079 19.57 4.87079 19.5141 4.90798L7.71142 12.7592C7.7115 12.7592 7.71134 12.7592 7.71142 12.7592C7.56962 12.8536 7.38642 12.8535 7.24462 12.7592C7.07501 12.6464 7.05665 12.4763 7.05665 12.4084C7.05665 12.3405 7.07494 12.1704 7.24462 12.0575L20 3.57259L32.7553 12.0575C32.925 12.1704 32.9433 12.3406 32.9433 12.4085C32.9433 12.4764 32.925 12.6464 32.7552 12.7593Z"
                                                fill="#D30952" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_301_12044">
                                                <rect width="40" height="40" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=pent-house")}}">Pent House</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M31.3241 16.9595H27.7787C27.4643 16.9595 27.2094 17.2143 27.2094 17.5288C27.2094 17.8432 27.4643 18.0981 27.7787 18.0981H29.9512L25.2067 22.8426L23.9477 21.5832C23.8409 21.4765 23.6962 21.4165 23.5451 21.4165C23.3941 21.4165 23.2494 21.4765 23.1426 21.5832L19.2312 25.4947L17.3357 23.5991C17.229 23.4924 17.0841 23.4324 16.9332 23.4324C16.7823 23.4324 16.6374 23.4924 16.5307 23.5991L9.52241 30.6074C9.30007 30.8297 9.30007 31.1901 9.52241 31.4125C9.63358 31.5236 9.77921 31.5792 9.92491 31.5792C10.0706 31.5792 10.2163 31.5236 10.3274 31.4125L16.9332 24.8067L18.8287 26.7024C18.9354 26.8091 19.0802 26.8691 19.2312 26.8691C19.3821 26.8691 19.5269 26.8091 19.6337 26.7024L23.5451 22.7909L24.8042 24.0501C25.0265 24.2723 25.3869 24.2723 25.6093 24.0501L30.7548 18.9046V21.0883C30.7548 21.4028 31.0097 21.6576 31.3241 21.6576C31.6386 21.6576 31.8934 21.4028 31.8934 21.0883V17.5288C31.8934 17.2143 31.6386 16.9595 31.3241 16.9595Z"
                                            fill="#D30952" />
                                        <path
                                            d="M31.8785 32.1779H8.69072V16.15C8.69072 15.8357 8.43587 15.5808 8.12142 15.5808C7.80705 15.5808 7.55212 15.8357 7.55212 16.1501V32.7472C7.55212 33.0617 7.80697 33.3165 8.12142 33.3165H31.8785C32.193 33.3165 32.4478 33.0617 32.4478 32.7472C32.4478 32.4328 32.193 32.1779 31.8785 32.1779Z"
                                            fill="black" />
                                        <path
                                            d="M38.2736 34.7615H35.038V16.3669L36.8586 17.578C37.5283 18.0236 38.3935 18.0235 39.0632 17.5781C39.6191 17.2083 39.951 16.5888 39.951 15.921C39.951 15.2532 39.6191 14.6338 39.0632 14.264L34.6917 11.356C34.4299 11.1817 34.0766 11.2529 33.9025 11.5146C33.7283 11.7764 33.7994 12.1298 34.0611 12.3038L38.4326 15.2119C38.6741 15.3724 38.8125 15.6308 38.8125 15.9209C38.8125 16.211 38.6741 16.4694 38.4326 16.6301C38.146 16.8208 37.7758 16.8207 37.4892 16.6301L20.5598 5.36843C20.2197 5.14233 19.7802 5.14226 19.4402 5.36858L2.51078 16.6301C2.22422 16.8208 1.85391 16.8208 1.56734 16.6301C1.32586 16.4695 1.18742 16.2111 1.18742 15.921C1.18742 15.6309 1.32594 15.3725 1.56734 15.2119L20 2.95038L31.1169 10.3455C31.3786 10.5196 31.732 10.4485 31.9061 10.1869C32.0803 9.92507 32.0092 9.57171 31.7475 9.39765L20.5598 1.95522C20.2197 1.72913 19.7802 1.72905 19.4402 1.95538L13.9093 5.63452V5.14155H14.0737C14.4816 5.14155 14.8134 4.80968 14.8134 4.40187V2.67483C14.8134 2.26702 14.4815 1.93515 14.0737 1.93515H8.05148C7.64359 1.93515 7.3118 2.26702 7.3118 2.67483V4.40194C7.3118 4.80976 7.64359 5.14163 8.05148 5.14163H8.21586V9.42186L0.936797 14.264C0.380781 14.6338 0.0489062 15.2533 0.0489062 15.9211C0.0489062 16.5889 0.380859 17.2083 0.936797 17.5781C1.27164 17.8009 1.65531 17.9123 2.03914 17.9123C2.42281 17.9123 2.80664 17.8008 3.14141 17.5781L4.96195 16.3671V26.5174C4.96195 26.8319 5.2168 27.0867 5.53125 27.0867C5.84563 27.0867 6.10055 26.8319 6.10055 26.5174V15.6096L20 6.36351L33.8995 15.6096V34.7614H6.10047V30.0542C6.10047 29.7398 5.84563 29.485 5.53117 29.485C5.2168 29.485 4.96187 29.7398 4.96187 30.0542V34.7614H1.72641C0.774453 34.7615 0 35.5359 0 36.4879C0 37.4398 0.774453 38.2143 1.72641 38.2143H38.2736C39.2255 38.2143 40 37.4398 40 36.4879C40 35.5359 39.2255 34.7615 38.2736 34.7615ZM12.7708 6.39194L9.35437 8.66452V5.14163H12.7708V6.39194ZM8.45039 3.07366H13.6749V4.00312H8.45039V3.07366ZM38.2736 37.0758H1.72641C1.40227 37.0758 1.13852 36.812 1.13852 36.4879C1.13852 36.1637 1.40227 35.8999 1.72641 35.8999H38.2736C38.5977 35.8999 38.8615 36.1637 38.8615 36.4879C38.8615 36.812 38.5977 37.0758 38.2736 37.0758Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=floor")}}">Floor</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M38.2736 34.7615H35.038V16.367L36.8586 17.578C37.5283 18.0237 38.3936 18.0235 39.0632 17.5781C39.6192 17.2083 39.9511 16.5888 39.9511 15.921C39.9511 15.2532 39.6191 14.6338 39.0632 14.264L34.733 11.3835C34.4713 11.2094 34.1179 11.2805 33.9438 11.5421C33.7697 11.8039 33.8408 12.1573 34.1025 12.3313L38.4327 15.2119C38.6741 15.3724 38.8126 15.6308 38.8126 15.9209C38.8126 16.211 38.6741 16.4694 38.4326 16.6301C38.146 16.8207 37.7757 16.8207 37.4891 16.6301L20.5598 5.36843C20.2197 5.14233 19.7802 5.14226 19.4402 5.36858L2.51078 16.6301C2.22422 16.8208 1.85398 16.8208 1.56742 16.6301C1.32594 16.4695 1.1875 16.2111 1.1875 15.921C1.1875 15.6309 1.32602 15.3725 1.56742 15.2119L20 2.95038L31.1571 10.3722C31.419 10.5466 31.7723 10.4753 31.9463 10.2136C32.1205 9.95179 32.0494 9.59843 31.7877 9.42436L20.5598 1.95522C20.2197 1.72913 19.7802 1.72905 19.4402 1.95538L13.9093 5.63452V5.14155H14.0737C14.4816 5.14155 14.8134 4.80968 14.8134 4.40186V2.67483C14.8134 2.26702 14.4815 1.93515 14.0737 1.93515H8.05148C7.64359 1.93515 7.3118 2.26702 7.3118 2.67483V4.40194C7.3118 4.80976 7.64359 5.14163 8.05148 5.14163H8.21586V9.42186L0.936797 14.264C0.380781 14.6338 0.0489062 15.2533 0.0489062 15.9211C0.0489062 16.5889 0.380859 17.2083 0.936797 17.5781C1.27164 17.8009 1.65531 17.9123 2.03914 17.9123C2.42281 17.9123 2.80664 17.8008 3.14141 17.5781L4.96195 16.3671V26.5066C4.96195 26.8211 5.2168 27.0759 5.53125 27.0759C5.84563 27.0759 6.10055 26.8211 6.10055 26.5066V15.6098L20 6.36351L33.8995 15.6096V34.7614H6.10047V30.069C6.10047 29.7546 5.84563 29.4998 5.53117 29.4998C5.2168 29.4998 4.96188 29.7546 4.96188 30.069V34.7614H1.72641C0.774453 34.7615 0 35.5359 0 36.4879C0 37.4398 0.774453 38.2143 1.72641 38.2143H38.2736C39.2255 38.2143 40 37.4398 40 36.4879C40 35.5359 39.2255 34.7615 38.2736 34.7615ZM12.7708 6.39194L9.35438 8.66452V5.14163H12.7708V6.39194ZM8.45039 3.07366H13.6749V4.00312H8.45039V3.07366ZM38.2736 37.0758H1.72641C1.40227 37.0758 1.13852 36.812 1.13852 36.4879C1.13852 36.1637 1.40227 35.8999 1.72641 35.8999H38.2736C38.5977 35.8999 38.8615 36.1637 38.8615 36.4879C38.8615 36.812 38.5977 37.0758 38.2736 37.0758Z"
                                            fill="black" />
                                        <path
                                            d="M28.7702 18.4035C27.6516 17.1371 26.341 16.4642 24.875 16.4031C22.6927 16.3135 20.7948 17.6162 20.0001 18.2564C19.2055 17.6162 17.3071 16.3142 15.1253 16.4031C13.6592 16.4642 12.3487 17.1372 11.2301 18.4035C9.89206 19.9182 9.39089 21.5704 9.7405 23.314C10.7972 28.5855 19.3865 32.8058 19.7516 32.9829C19.83 33.021 19.915 33.04 20 33.04C20.085 33.04 20.17 33.021 20.2485 32.9829C20.6136 32.8058 29.2029 28.5855 30.2598 23.314C30.6093 21.5704 30.1082 19.9182 28.7702 18.4035ZM29.1437 23.0892C28.2914 27.3455 21.4039 31.1061 20 31.8326C18.5961 31.1061 11.7087 27.3455 10.8564 23.0892C10.5771 21.6942 10.9784 20.4081 12.0833 19.1572C12.9873 18.1339 14.0246 17.59 15.1667 17.5409C15.2253 17.5383 15.2832 17.5371 15.3415 17.5371C17.6042 17.5371 19.5865 19.3998 19.6062 19.4186C19.8259 19.6292 20.1729 19.6292 20.3933 19.4192C20.4141 19.3995 22.4965 17.4406 24.8335 17.541C25.9755 17.5901 27.0129 18.1339 27.9168 19.1573C29.0217 20.4081 29.423 21.6942 29.1437 23.0892Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=building")}}">Building</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.2206 11.4313C14.3279 11.4313 9.53394 16.2252 9.53394 22.1178C9.53394 28.0105 14.3279 32.8044 20.2206 32.8044C26.1131 32.8045 30.9071 28.0105 30.9071 22.1178C30.9071 16.2252 26.1131 11.4313 20.2206 11.4313ZM20.2205 31.6659C14.9556 31.6659 10.6724 27.3826 10.6724 22.1178C10.6724 16.853 14.9556 12.5698 20.2205 12.5698C25.4853 12.5698 29.7685 16.853 29.7685 22.1178C29.7685 27.3826 25.4853 31.6659 20.2205 31.6659Z"
                                            fill="#D30952" />
                                        <path
                                            d="M27.2576 19.9423C27.1492 19.6086 26.8527 19.3804 26.5023 19.3613L22.4649 19.1395L21.0066 15.3683C20.88 15.041 20.5715 14.8295 20.2205 14.8295C19.8697 14.8295 19.5611 15.041 19.4345 15.3683L17.9761 19.1395L13.9388 19.3613C13.5883 19.3805 13.2919 19.6086 13.1834 19.9423C13.075 20.276 13.1809 20.6348 13.453 20.8562L16.589 23.4087L15.5521 27.317C15.4622 27.6562 15.5876 28.0086 15.8714 28.2148C16.1552 28.4211 16.529 28.4313 16.824 28.2409L20.2205 26.0472L23.6171 28.241C23.7578 28.3318 23.9163 28.3769 24.0746 28.3769C24.2481 28.3769 24.4212 28.3226 24.5697 28.2148C24.8536 28.0085 24.9789 27.656 24.8888 27.3169L23.8521 23.4087L26.988 20.8563C27.2601 20.6348 27.366 20.276 27.2576 19.9423ZM22.9853 22.6462C22.7287 22.8548 22.6177 23.1962 22.7026 23.5159L23.5922 26.8696L20.6777 24.9872C20.4 24.8078 20.0411 24.8078 19.7632 24.9872L16.8487 26.8696L17.7384 23.516C17.8232 23.1962 17.7122 22.8548 17.4558 22.6463L14.7648 20.4561L18.229 20.2659C18.5593 20.2478 18.8498 20.0368 18.969 19.7284L20.2205 16.4924L21.4719 19.7287C21.5913 20.037 21.8819 20.2479 22.2117 20.2659L25.6761 20.4561L22.9853 22.6462Z"
                                            fill="#D30952" />
                                        <path
                                            d="M38.2735 34.7614H35.0379V16.3669L36.8585 17.578C37.1934 17.8008 37.577 17.9121 37.9609 17.9121C38.3445 17.9121 38.7284 17.8007 39.0631 17.578C39.6191 17.2082 39.9509 16.5887 39.9509 15.9209C39.9509 15.2531 39.619 14.6337 39.0631 14.2639L34.5391 11.2545C34.2773 11.0802 33.9239 11.1513 33.7499 11.4131C33.5756 11.6748 33.6467 12.0282 33.9085 12.2023L38.4325 15.2118C38.674 15.3723 38.8124 15.6308 38.8124 15.9209C38.8124 16.2109 38.674 16.4694 38.4325 16.63C38.1459 16.8207 37.7756 16.8206 37.4891 16.63L20.5597 5.36846C20.2197 5.14252 19.7804 5.14236 19.4401 5.36861L2.51078 16.6302C2.22421 16.8209 1.85398 16.8207 1.56742 16.6301C1.32593 16.4695 1.1875 16.2111 1.1875 15.921C1.1875 15.6309 1.32593 15.3725 1.56742 15.2119L9.1003 10.2009L9.10045 10.2009L13.6554 7.17087C13.6557 7.17072 13.6558 7.17056 13.656 7.17048L20 2.95033L30.9061 10.2052C31.1679 10.3793 31.5213 10.3082 31.6953 10.0466C31.8695 9.78477 31.7985 9.43142 31.5367 9.25735L20.5597 1.95526C20.2197 1.72932 19.7804 1.72917 19.4401 1.95541L13.9093 5.63447V5.14158H14.0736C14.4815 5.14158 14.8134 4.80971 14.8134 4.40189V2.67479C14.8134 2.26698 14.4815 1.9351 14.0736 1.9351H8.05155C7.64366 1.9351 7.31178 2.26698 7.31178 2.67479V4.40189C7.31178 4.80971 7.64366 5.14158 8.05155 5.14158H8.21584V9.42181L0.936717 14.2639C0.38078 14.6337 0.0489062 15.2532 0.0489062 15.921C0.0489062 16.5888 0.380859 17.2082 0.936717 17.578C1.6064 18.0236 2.47164 18.0236 3.14132 17.578L4.96194 16.3669V26.5164C4.96194 26.8308 5.21679 27.0857 5.53124 27.0857C5.84569 27.0857 6.10053 26.8308 6.10053 26.5164V15.6096L20 6.36353L28.285 11.8748L33.8994 15.6096V34.7614H6.10046V30.0532C6.10046 29.7387 5.84561 29.4839 5.53116 29.4839C5.21671 29.4839 4.96187 29.7387 4.96187 30.0532V34.7614H1.7264C0.774452 34.7614 0 35.5359 0 36.4878C0 37.4398 0.774452 38.2142 1.7264 38.2142H38.2736C39.2256 38.2142 40 37.4398 40 36.4878C40 35.5359 39.2255 34.7614 38.2735 34.7614ZM12.7708 6.39181L9.35436 8.66446V5.14158H12.7708V6.39181ZM8.4503 3.07369H13.6749V4.00314H13.3401H8.78514H8.4503V3.07369ZM38.2735 37.0757H1.7264C1.40226 37.0757 1.13851 36.8119 1.13851 36.4878C1.13851 36.1635 1.40226 35.8998 1.7264 35.8998H38.2736C38.5977 35.8998 38.8615 36.1635 38.8615 36.4878C38.8614 36.812 38.5977 37.0757 38.2735 37.0757Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=shop")}}">Shop</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="filter-item">
                        <div class="filter-content">
                            <div class="icon">
                                <span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.9584 20.0481V16.1437L35.6976 17.3006C36.3525 17.7363 37.1987 17.7362 37.8537 17.3006C38.3974 16.9389 38.722 16.3331 38.722 15.6801C38.722 15.0271 38.3974 14.4213 37.8537 14.0596L33.3559 11.0676C33.0944 10.8937 32.7413 10.9645 32.5675 11.2261C32.3935 11.4876 32.4645 11.8406 32.7259 12.0145L37.2237 15.0065C37.453 15.1591 37.5846 15.4046 37.5846 15.6801C37.5846 15.9556 37.453 16.2011 37.2237 16.3537C36.9513 16.5347 36.5995 16.5347 36.3275 16.3537L19.9131 5.43463C19.8957 5.42307 19.8779 5.41244 19.8599 5.40205C19.8563 5.39994 19.8528 5.39752 19.8492 5.39549C19.8302 5.38478 19.8109 5.37502 19.7914 5.36572C19.7887 5.36439 19.786 5.36283 19.7832 5.3615C19.7626 5.35182 19.7416 5.34307 19.7205 5.33486C19.7188 5.33424 19.7172 5.33338 19.7155 5.33275C19.7049 5.32869 19.6941 5.32549 19.6834 5.32182C19.3945 5.22268 19.0717 5.25986 18.809 5.43463L2.39445 16.3537C2.12219 16.5347 1.77039 16.5347 1.49828 16.3537C1.26891 16.2011 1.13734 15.9556 1.13734 15.6801C1.13734 15.4046 1.26891 15.1591 1.49828 15.0065L19.361 3.124L29.7711 10.049C30.0326 10.223 30.3856 10.152 30.5595 9.89049C30.7335 9.629 30.6625 9.27603 30.4011 9.10205L19.9131 2.12525C19.5777 1.90213 19.1443 1.90213 18.809 2.12525L13.4475 5.69174V4.76791H13.6103C14.0176 4.76791 14.3489 4.43658 14.3489 4.02932V2.30744C14.3489 1.90018 14.0176 1.56885 13.6103 1.56885H7.60609C7.19883 1.56885 6.8675 1.90018 6.8675 2.30744V4.02939C6.8675 4.43666 7.19883 4.76799 7.60609 4.76799H7.76883V9.46924L0.868359 14.0595C0.324609 14.4211 0 15.027 0 15.68C0 16.3331 0.324609 16.9389 0.868359 17.3006C1.19578 17.5185 1.57109 17.6274 1.94633 17.6274C2.32164 17.6274 2.69695 17.5185 3.02438 17.3006L4.76359 16.1437V26.2117C4.76359 26.5258 5.0182 26.7804 5.33227 26.7804C5.64633 26.7804 5.90094 26.5258 5.90094 26.2117V15.3871L19.361 6.43338L32.821 15.3871V19.6805C32.772 19.6681 32.7227 19.6572 32.6736 19.6456C32.6513 19.6403 32.6291 19.6349 32.6067 19.6297C32.5512 19.617 32.4955 19.6049 32.4398 19.5933C32.4076 19.5865 32.3753 19.58 32.343 19.5735C32.2913 19.5633 32.2398 19.5531 32.188 19.5438C32.149 19.5367 32.1098 19.5303 32.0707 19.5236C32.0237 19.5157 31.9767 19.5074 31.9296 19.5002C31.8482 19.4877 31.7664 19.4763 31.6843 19.4659C31.6473 19.4612 31.6101 19.4574 31.573 19.4531C31.5195 19.447 31.4661 19.441 31.4124 19.4357C31.374 19.432 31.3355 19.4287 31.2969 19.4254C31.2433 19.4208 31.1895 19.4167 31.1357 19.413C31.0986 19.4105 31.0615 19.408 31.0244 19.4059C30.9657 19.4025 30.9069 19.4 30.8479 19.3978C30.8159 19.3965 30.7838 19.395 30.7517 19.3941C30.6659 19.3917 30.5797 19.3903 30.4933 19.3901C30.4887 19.3901 30.484 19.3899 30.4794 19.3899C25.8859 19.3899 22.0417 22.6599 21.1524 26.9942C21.0254 27.6135 20.9587 28.2544 20.9587 28.9106C20.9587 28.9906 20.9597 29.0706 20.9617 29.1505C20.9839 30.0432 21.1297 30.9057 21.3824 31.7217C21.383 31.7235 21.3834 31.7252 21.384 31.7268C21.3951 31.7624 21.4068 31.7978 21.4183 31.8333C21.5037 32.0992 21.6002 32.3613 21.7088 32.6186H18.9075V19.379C18.9075 18.7186 18.3702 18.1814 17.7099 18.1814H9.37109C8.7107 18.1814 8.17352 18.7187 8.17352 19.379V32.6185H5.90094V29.759C5.90094 29.4449 5.64633 29.1903 5.33227 29.1903C5.0182 29.1903 4.76359 29.4449 4.76359 29.759V32.6185H2.42305C1.55297 32.6185 0.845 33.3264 0.845 34.1966C0.845 35.0667 1.55289 35.7746 2.42305 35.7746H23.8887C25.6005 37.4189 27.9238 38.4312 30.4793 38.4312C35.7291 38.4313 40 34.1603 40 28.9106C40 24.888 37.4924 21.4403 33.9584 20.0481ZM12.3102 6.4483L8.90617 8.7126V4.76791H12.3102V6.4483ZM8.00484 2.70611H13.2116V3.63057H8.00484V2.70611ZM9.31078 19.379C9.31078 19.3457 9.33781 19.3188 9.37102 19.3188H17.7097C17.743 19.3188 17.7699 19.3458 17.7699 19.379V32.6185H9.31078V19.379ZM2.42305 34.6374C2.18008 34.6374 1.98234 34.4396 1.98234 34.1967C1.98234 33.9536 2.18008 33.756 2.42305 33.756H22.2823C22.4627 34.0605 22.66 34.3547 22.8731 34.6374H2.42305ZM30.4793 37.2939C26.8109 37.2939 23.6855 34.9253 22.5515 31.6371C22.5416 31.6081 22.5317 31.5792 22.5221 31.5502C22.5098 31.5131 22.4977 31.476 22.4859 31.4388C22.4672 31.3796 22.4491 31.3203 22.4317 31.2606C22.4283 31.2488 22.4246 31.2372 22.4212 31.2254C22.2791 30.7294 22.1827 30.2198 22.1338 29.7042C22.1329 29.6955 22.1322 29.6867 22.1314 29.6779C22.1248 29.6068 22.1194 29.5356 22.1147 29.4644C22.1134 29.4455 22.1122 29.4266 22.1111 29.4076C22.1073 29.3442 22.1045 29.2807 22.1021 29.2171C22.1013 29.1964 22.1003 29.1759 22.0998 29.1552C22.0974 29.0737 22.0959 28.9921 22.0959 28.9106C22.0959 28.3328 22.1547 27.7684 22.2666 27.2231C23.0496 23.4065 26.4345 20.5272 30.4793 20.5272C30.4809 20.5272 30.4825 20.5273 30.4841 20.5273C30.5856 20.5274 30.6869 20.5299 30.788 20.5335C30.8116 20.5344 30.8353 20.5352 30.8589 20.5363C30.9567 20.5406 31.0543 20.5466 31.1516 20.5543C31.1755 20.5562 31.1992 20.5586 31.223 20.5606C31.3059 20.5679 31.3888 20.5765 31.4713 20.5863C31.4941 20.5889 31.517 20.5912 31.5397 20.5941C31.63 20.6055 31.72 20.6189 31.8098 20.6333C31.8453 20.639 31.8808 20.6449 31.9162 20.651C32.0006 20.6656 32.0849 20.6812 32.1688 20.6984C32.2083 20.7065 32.2473 20.7154 32.2866 20.7241C32.3409 20.736 32.3951 20.7486 32.4492 20.7617C32.5139 20.7773 32.5784 20.7937 32.6425 20.8108C32.6933 20.8243 32.7441 20.8381 32.7946 20.8527C32.8486 20.8682 32.9024 20.8842 32.9559 20.9008C32.9814 20.9087 33.0068 20.9171 33.0322 20.9253C36.4102 22.0078 38.8625 25.1779 38.8625 28.9106C38.8627 33.5331 35.1019 37.2939 30.4793 37.2939Z"
                                            fill="black" />
                                        <path
                                            d="M31.2971 28.171V25.8007C32.1994 25.8681 32.509 26.299 32.8861 26.299C33.3844 26.299 33.5999 25.6796 33.5999 25.3698C33.5999 24.5887 32.1725 24.3328 31.2971 24.3059V23.9557C31.2971 23.7807 31.0681 23.619 30.8392 23.619C30.5833 23.619 30.3813 23.7806 30.3813 23.9557V24.3328C29.0347 24.5079 27.7686 25.2485 27.7686 26.9589C27.7686 28.6826 29.1558 29.2078 30.3813 29.6657V32.3457C29.1962 32.211 28.7922 31.3356 28.2804 31.3356C27.8629 31.3356 27.5263 31.9012 27.5263 32.2783C27.5263 33.0325 28.7518 33.9078 30.3813 33.9482V34.3253C30.3813 34.5003 30.5833 34.662 30.8392 34.662C31.0682 34.662 31.2971 34.5003 31.2971 34.3253V33.9077C32.8054 33.6653 33.8423 32.7092 33.8423 31.0527C33.8423 29.2214 32.4957 28.6154 31.2971 28.171ZM30.489 27.8746C29.8696 27.6323 29.4117 27.3764 29.4117 26.7839C29.4117 26.2721 29.8158 25.9489 30.489 25.8411V27.8746ZM31.1894 32.3323V29.989C31.7684 30.2449 32.1994 30.5682 32.1994 31.2279C32.1994 31.861 31.7819 32.2111 31.1894 32.3323Z"
                                            fill="#D30952" />
                                        <path
                                            d="M16.0404 24.5175C15.7275 24.5175 15.4739 24.771 15.4739 25.084V26.255C15.4739 26.5679 15.7275 26.8215 16.0404 26.8215C16.3534 26.8215 16.607 26.5679 16.607 26.255V25.084C16.607 24.771 16.3534 24.5175 16.0404 24.5175Z"
                                            fill="#D30952" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{route("frontend.properties","category=duplex")}}">Duplex</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Filter area end -->

    <!-- Whychoose area start -->
    <section class="bd-whychoose-ara section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Why choose us</span>
                        <h2 class="section-title title-animation">Why choose Onespace</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp active" data-wow-delay=".3s"
                        data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-solution"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Avoid Brokers</h3>
                            <p class="description">Engage directly with buyers or tenants to avoid broker fees and
                                simplify the entire process easily.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-flexibility"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Save Thousands of Money</h3>
                            <p class="description">Bypassing intermediaries allows you to save money, helping keep your
                                costs low and maximizing value.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Rental Agreement (At your door step)</h3>
                            <p class="description">Get a professionally prepared rental agreement delivered by the next
                                day to ensure quick transactions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Comprehensive Property Management</h3>
                            <p class="description">Receive complete property management services, including maintenance
                                and tenant support for convenience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Easy Property Listing</h3>
                            <p class="description">List your property with ease using our simple platform designed to
                                attract potential buyers quickly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">3D Virtual Tour</h3>
                            <p class="description">Provide immersive 3D virtual tours of your property for remote buyers
                                and renters, enhancing engagement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Aggregator Listing</h3>
                            <p class="description">We will list your property on multiple platforms and marketplaces to help you reach a wider buyers quickly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Dedicated Relationship Manager</h3>
                            <p class="description">Receive personalized support from a dedicated relationship manager
                                throughout your entire process.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Whychoose area end -->

    <!-- Marquee slide area start -->
    <section class="bd-marquee-slide-area style-one position-relative ">
        <div class="container-fluid overlap-section">
            <div class="row position-relative mb-4">
                <div class="swiper text-slider swiper-width-auto text-center" data-fade-offset="50"
                    data-sliderSpeed="90000" data-autoPlay="true">
                    <div class="swiper-wrapper marquee-slide">
                        <div class="swiper-slide">
                            <h2 class="marquee-text text-black">&nbsp &nbsp Follow us @ OneSpace &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Marquee slide area end -->


    <!--- @if ($featured_properties && $featured_properties->isNotEmpty())-->
    <!-- Featured area start -->
    <section class="bd-featured-area section-space theme-bg-primary">
        <div class="container">
            <div class="row g-5 section-title-space align-items-center justify-content-between">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Property listings</span>
                        <h2 class="section-title title-animation">Discover our listings</h2>
                    </div>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6">
                    <div class="common-nav-pre">
                        <!-- If we need navigation buttons -->
                        <div class="common-navigation justify-content-lg-end justify-content-start">
                            <button class="common-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                            <button class="common-slider-button-next"><i
                                    class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="swiper common-carousel-active wow bdFadeInUp" data-wow-delay=".3s"
                        data-wow-duration="1s">
                        <div class="swiper-wrapper">
                            @foreach ($featured_properties as $property)

                            @php
                            $property_content = $property->getContent($language->id);
                            if (is_null($property_content)) {
                            $property_content = $property
                            ->propertyContents()
                            ->first();
                            }
                            @endphp

                            <div class="swiper-slide">
                                <div class="featured-item style-one">
                                    <div class="thumb-wrapper imgPropertySlider">
                                        <div class="swiper featured__properties">
                                            <div class="swiper-wrapper ">

                                                @php
                                                $slider_images= \DB::table('property_slider_images')
                                                ->where('property_id', $property->id)->get();
                                                @endphp
                                                @foreach($slider_images as $key => $slider_image)
                                                <div class="swiper-slide">
                                                    <div class="sidebar-widget p-0">
                                                        <div class="sidebar-slider">
                                                            <div class="sidebar-thumb-wrapper">
                                                                <div class="sidebar-thumb">
                                                                    <figure><img
                                                                            src="{{asset("assets/img/property/slider-images/$slider_image->image")}}"
                                                                            alt="agent-sidebar thumb not found">
                                                                    </figure>
                                                                </div>
                                                                <div class="badge-wrap agent-badge">
                                                                    <a href="#" class="bd-badge-blue"><img
                                                                            src="assets/front/v5/images/blueTick.png"
                                                                            alt="blue-tick" width="30px"
                                                                            height="30px"></a>
                                                                    <a href="#" class="bd-badge">For Rent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                            <div class="agent-nav-pag mb-20">
                                                <!-- If we need navigation buttons -->
                                                <div class="common-navigation">
                                                    <button class="properties-slider-button-prev"><i
                                                            class="fa-regular fa-arrow-left"></i></button>
                                                    <button class="properties-slider-button-next"><i
                                                            class="fa-regular fa-arrow-right"></i></button>
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="properties-pagination">
                                                    <div class="bd-swiper-dot text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>₹{{$property->price}} / {{$property->expectedPrice}}/mo</span>
                                        </div>
                                        <h3 class="title"><a
                                                href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Equestrian
                                                family home</a></h3>
                                        <span class="info">{{$property_content->address}}</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                                    class="title">{{$property->bedroom}} bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span
                                                    class="title">{{$property->bathroom}}
                                                    bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i
                                                        class="fa-regular fa-arrows-maximize"></i></span><span
                                                    class="title">{{$property->carpetArea}} sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- @endif -->

    <section class="bd-collection-area section-space ">
        <div class="container">
            <div class="row g-5 section-title-space align-items-center justify-content-between">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Collections</span>
                        <h2 class="section-title title-animation">Curated rental collections</h2>
                    </div>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6">
                    <div class="common-nav-pre">
                        <!-- If we need navigation buttons -->
                        <div class="common-navigation justify-content-lg-end justify-content-start">
                            <button class="common-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                            <button class="common-slider-button-next"><i
                                    class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="swiper common-carousel-active wow bdFadeInUp" data-wow-delay=".3s"
                        data-wow-duration="1s">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="collection-item style-one">
                                    <div class="thumb-wrapper">
                                        <div class="thumb">
                                            <a href="{{route("frontend.properties","AvailableFor=Family")}}">
                                                <figure>
                                                    <img src="assets/front/v5/images/d_hp_tenant_pref_FA.webp"
                                                        alt="Image">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="section-title">For Family</h5>
                                            <p class="description">60+ Properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="collection-item style-one">
                                    <div class="thumb-wrapper">
                                        <div class="thumb">
                                            <a href="{{route("frontend.properties","AvailableFor=Single Women")}}">
                                                <figure>
                                                    <img src="assets/front/v5/images/d_hp_tenant_pref_SW.webp"
                                                        alt="Image">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="section-title">For Single Women</h5>
                                            <p class="description">60+ Properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="collection-item style-one">
                                    <div class="thumb-wrapper">
                                        <div class="thumb">
                                            <a href='{{route("frontend.properties","AvailableFor=Single Men")}}'>
                                                <figure>
                                                    <img src="assets/front/v5/images/d_hp_tenant_pref_SM.webp"
                                                        alt="Image">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="section-title">For Single Men</h5>
                                            <p class="description">60+ Properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="collection-item style-one">
                                    <div class="thumb-wrapper">
                                        <div class="thumb">
                                            <a href="{{ route('frontend.property.search', ['name' => 'compnay']) }}">
                                                <figure>
                                                    <img src="assets/front/v5/images/d_hp_tenant_pref_CL.webp"
                                                        alt="Image">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="section-title">For Tenants with Company Lease</h5>
                                            <p class="description">60+ Properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageComponent section-space theme-bg-primary">
        <div class="container">
            <div class="section-title-wrapper anim-wrapper animation-style-3 mb-30">
                <span class="section-subtitle uppercase"><i class="icon-home"></i>Choose your preferred
                    furnishing</span>
                <h2 class="section-title title-animation">Homes by furnishing</h2>
            </div>
            <div class="cc__CarouselContainer">
                <div class="cc__CarouselBox">
                    <div class="row">

                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <a href='{{route("frontend.properties","furnishedStatus=Furnished")}}'>
                                <div class="spacer10">
                                    <picture>
                                        <img src="assets/front/v5/images/d_hp_furnish_1.webp" alt="">
                                    </picture>
                                </div>
                                <div class="content mt-20">
                                    <h5 class="section-title">Furnished</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <a href='{{route("frontend.properties","furnishedStatus=Semi funrnished")}}'>
                                <div class="spacer10">
                                    <picture>
                                        <img src="assets/front/v5/images/d_hp_furnish_4.webp" alt="">
                                    </picture>
                                </div>
                                <div class="content mt-20">
                                    <h5 class="section-title">Semifurnished</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <a href='{{route("frontend.properties","furnishedStatus=Non funrnished")}}'>
                                <div class="spacer10">
                                    <picture>
                                        <img src="assets/front/v5/images/d_hp_furnish_2.webp" alt="">
                                    </picture>
                                </div>
                                <div class="content mt-20">
                                    <h5 class="section-title">Unfurnished</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Featured area end -->

    <!-- Daily update area start -->
    <section class="bd-daily-update-area section-space-bottom ">
        <div class="container">
            <div class="row g-5 align-items-xl-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="daily-update-thumb-wrapper wow bdFadeInLeft" data-wow-delay=".3s">
                        <div class="dot">
                            <img src="assets/front/v5/images/shapes/daily-dot.png" alt="daily shape not found">
                        </div>
                        <div class="square-shape"></div>
                        <div class="thumb">
                            <div class="figure">
                                <img src="assets/front/v5/images/get_update.webp" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="daily-update-content wow bdFadeInRight" data-wow-delay=".4s">
                        <div class="section-title-wrapper anim-wrapper animation-style-3 mb-30">
                            <span class="section-subtitle uppercase"><i class="icon-home"></i>get daily update</span>
                            <h2 class="section-title title-animation">Register to post your property for <span
                                    class=" bg-success free-txt">FREE</span></h2>
                        </div>

                        <div class="counter-wrapper style-two">
                            <div class="content">
                                <h4 class="section-title">10L+</h4>
                                <p class="description">Property Listings</p>
                            </div>
                            <div class="content">
                                <h4 class="section-title"> 45L+</h4>
                                <p class="description">Monthly Searches</p>
                            </div>
                            <div class="content">
                                <h4 class="section-title">2L+</h4>
                                <p class="description">Owners advertise monthly</p>
                            </div>
                        </div>
                        <div class="bd-common-form-wrapper">
                            <!-- <a class="bd-btn btn-style btn-hover-x" type="submit"> </a> -->

                            <button type="button" id="book_now" class="bd-btn btn-style btn-hover-x">
                                <i class="far fa-arrow-right"></i>Post your property for FREE
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Daily update area end -->
    <!-- counter area start -->
    @if($counter_informations->isNotEmpty())

    <section class="bd-counter-area">
        <div class="container">
            <div class="row g-0">
                <div class="counter-wrapper style-two">
                    @foreach($counter_informations as $counter)
                    <div class="counter-item wow bdFadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s" data-wow-duration="1s">
                        <span class="icon"><i class="{{ $counter->icon }}"></i></span>
                        <div class="content">
                            <h2 class="title">
                                <span data-purecounter-duration="1" data-purecounter-end="{{ $counter->amount }}" class="purecounter">
                                    {{ $counter->amount }}
                                </span>+
                            </h2>
                            <p class="description">{{ $counter->title }}</p>
                        </div>
                    </div>
                    <div class="apartment-counter-top-line"></div> <!-- Add only between items -->
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @endif
    <!-- counter area end -->
    <!-- brand area start -->
    <div class="bd-brand-area">
        <div class="container-fluid">
            <div class="brand-section-wrapper section-title-space">
                <div class="line"></div>
                <div class="title">
                    <p class="description">More than <b>200+ companies </b> brand us worldwide</p>
                </div>
                <div class="line"></div>
            </div>
            <div class="brand-item-wrapper style-one">
                <div class="swiper brand-active wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-01.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-02.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-03.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-04.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-05.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <div class="thumb">
                                    <figure><img src="assets/front/v5/images/brand/brand-thumb-01.png" alt="Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->

    <!-- apartment type area start -->
    {{-- <section class="bd-apartment-type-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-7 col-lg-7">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Solutions</span>
                        <h2 class="section-title title-animation">Onespace is solutions for all</h2>
                    </div>

                </div>
            </div>
            <div class="apartment-type-wrapper">
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".3s">
                    <span class="apartment-type-icon is-orange"><i class="icon-villa"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Seller</h6>
                        <!-- <p class="apartment-property">20 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".4s">
                    <span class="apartment-type-icon is-orange"><i class="icon-penthouse"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Owner</h6>
                        <!-- <p class="apartment-property">25 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".5s">
                    <span class="apartment-type-icon is-orange"><i class="icon-urban"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Tenant/Buyer</h6>
                        <!-- <p class="apartment-property">15 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".6s">
                    <span class="apartment-type-icon is-orange"><i class="icon-factories"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Builder</h6>
                        <!-- <p class="apartment-property">30 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".7s">
                    <span class="apartment-type-icon is-orange"><i class="icon-warehouse"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Investor</h6>
                        <!-- <p class="apartment-property">10 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".8s">
                    <span class="apartment-type-icon is-orange"><i class="icon-city"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Landlord</h6>
                        <!-- <p class="apartment-property">35 Property</p> -->
                    </div>
                </div>
                <div class="apartment-type-card wow fadeIn" data-wow-delay=".9s">
                    <span class="apartment-type-icon is-orange"><i class="icon-store"></i></span>
                    <div class="apartment-name-details">
                        <h6 class="apartment-name">Legal Services</h6>
                        <!-- <p class="apartment-property">40 Property</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- apartment type area end -->
    <!-- Neighbor area start -->

    <!-- Neighbor area start -->
    <!-- @if(isset($property)) -->
    <section class="bd-neighbour-area section-space black-bg" data-background="assets/front/v5/images/shapes/line.png">
        <div class="container" id="localities">
            <div class="row gy-30 align-items-center section-title-space">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Top Areas</span>
                        <h2 class="section-title title-animation white-text">Find your neighborhood</h2>
                    </div>

                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="btn-inner text-lg-end">
                        <a class="bd-btn btn-style btn-hover-x hover-white" href="property.html"><i
                                class="fa-regular fa-arrow-right-long"></i>Discover more</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-01.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">04 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Rajwada</a>
                            </h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-02.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">08 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Vijay
                                    Nagar</a></h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-03.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">04 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Palasia</a>
                            </h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-04.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">14 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">AB
                                    Road</a></h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-05.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">07 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">LIG
                                    Colony</a></h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="assets/front/v5/images/neighbour/neighbour-06.png" alt="Image">
                            </figure>
                        </div>
                        <div class="content">
                            <span class="info">02 properties</span>
                            <h3 class="title"><a
                                    href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Vikramaditya</a>
                            </h3>
                        </div>
                        <a class="link"
                            href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- @endif -->
    <!-- Neighbour area enb -->
    <section class="bd-testimonial-area fix section-space theme-bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 section-title-space">
                        <span class="section-subtitle uppercase"><i
                                class="icon-home"></i>Explore Property Highlights on Instagram </span>
                        <h2 class="section-title title-animation">Swipe through to discover your next perfect home!</h2>
                    </div>

                </div>
            </div>
            <div class="container">
                <!-- Row for Reels -->
                <div class="row">
                    <h3>{{ __('Reels') }}</h3>
                    @foreach($medias->where('type', 1) as $media)
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="custom-instagram-container" style="height: 500px; overflow: hidden;">
                            <blockquote class="instagram-media"
                                data-instgrm-permalink="{{ $media->url }}"
                                data-instgrm-version="14"
                                style="background: #FFF; border: none; max-width: 540px; width:100%; height: 100%; margin: auto;">
                            </blockquote>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Row for Images -->
                <div class="row mt-4">
                    <h3>{{ __('Images') }}</h3>
                    @foreach($medias->where('type', 2) as $media)
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="custom-instagram-container" style="height: 500px; overflow: hidden;">
                            <blockquote class="instagram-media"
                                data-instgrm-permalink="{{ $media->url }}"
                                data-instgrm-version="14"
                                style="background: #FFF; border: none; max-width: 540px; width:100%; height: 100%; margin: auto;">
                            </blockquote>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
    </section>
    @if ($secInfo->testimonial_section_status == 1)
    <!-- Testimonial area start -->
    <section class="bd-testimonial-area fix section-space ">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 section-title-space">
                        <span class="section-subtitle uppercase"><i
                                class="icon-home"></i>{{ $testimonialSecInfo->title }}</span>
                        <h2 class="section-title title-animation"> {{ $testimonialSecInfo?->subtitle }}</h2>
                    </div>

                </div>
            </div>
            <div class="row wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                <div class="col-xxl-12">
                    <div class="swiper o-visible testimonial-active">
                        <div class="swiper-wrapper">
                            @forelse ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonials-item style-one">
                                    <div class="content">
                                        <div class="title-inner">
                                            <span>
                                                <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z"
                                                        fill="#D30952" />
                                                </svg>
                                            </span>
                                            <h3 class="title">{{$testimonial->title }}</h3>
                                        </div>
                                        <p class="description">{{ $testimonial->comment }}</p>
                                    </div>
                                    <div class="admin-item">
                                        <div class="admin-thumbnail">
                                            {{-- <img src="assets/front/v5/images/user/user-thumb-01.png" alt="Admin Avatar"> --}}
                                            @if (is_null($testimonial->image))
                                            <img src="assets/front/v5/images/user/user-thumb-01.png" alt="Admin Avatar">
                                            @else
                                            <img src="{{ asset('assets/img/clients/' . $testimonial->image) }}"
                                                alt="Admin Avatar">

                                            @endif

                                        </div>
                                        <div class="admin-info">
                                            <h4 class="admin-name">{{ $testimonial->name }}</h4>
                                            <span class="admin-designation">{{ $testimonial->occupation }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="p-3 text-center mb-30 w-100">
                                <h3 class="mb-0"> {{ __('No Testimonials Found') }}</h3>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="testimonial-nav-pre pagination-wrappper">
                        <!-- If we need navigation buttons -->
                        <div class="testimonial-navigation justify-content-start">
                            <button class="testimonial-slider-button-prev"><i
                                    class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="testimonial-swiper-dot"></div>
                            </div>
                            <button class="testimonial-slider-button-next"><i
                                    class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Testimonial area end -->
    <!-- video area end -->

    <!-- benefits area start -->
    @if(isset($property))
    <section class="bd-benefits-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-space section-title-wrapper text-center anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            OUR BENEFITS
                        </span>
                        <h2 class="section-title title-animation">Building benefits</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".3s">
                        <span class="benefits-icon"><i class="icon-living-space"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Living
                                space</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".4s">
                        <span class="benefits-icon"><i class="icon-parking-area"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Parking
                                area</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".5s">
                        <span class="benefits-icon"><i class="icon-swimming-pools"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Swimming
                                pools</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".6s">
                        <span class="benefits-icon"><i class="icon-security-features"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Security
                                feature</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".7s">
                        <span class="benefits-icon"><i class="icon-office-spaces"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Office
                                spaces</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".8s">
                        <span class="benefits-icon"><i class="icon-clinics-center"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Clinics
                                center</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay=".9s">
                        <span class="benefits-icon"><i class="icon-kids-playzone"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">kids
                                playzone</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="benefits-item style-one wow fadeIn" data-wow-delay="1s">
                        <span class="benefits-icon"><i class="icon-educational-area"></i></span>
                        <h3 class="benefits-title">
                            <a href="#!">Educational
                                area</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- benefits area end -->

    <!-- Contact area start -->
    <section class="bd-contact-area section-space">
        <div class="container">
            <div class="row align-items-center gy-30">
                <div class="col-xxl-4 col-xl-5 col-lg-5">
                    <div class="contact-info wow bdFadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="item">
                            <div class="content">
                                <h3 class="title">Address</h3>
                                <span class="info">27 Division St, New York, NY 10002, USA</span>
                            </div>
                            <div class="icon">
                                <span><i class="fa-regular fa-location-dot"></i></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <h3 class="title">Email</h3>
                                <span class="info"><a
                                        href="https://html.bdevs.net/cdn-cgi/l/email-protection#ea988f8b8686859daa878b8386c4898587"><span
                                            class="__cf_email__"
                                            data-cfemail="7f0d1a1e131310083f121e1613511c1012">[email&#160;protected]</span></a></span>
                            </div>
                            <div class="icon">
                                <span><i class="fa-regular fa-envelope-open"></i></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <h3 class="title">Phone</h3>
                                <span class="info"><a href="tel:+1(800)123456789">+1 (800) 123 456 789</a></span>
                            </div>
                            <div class="icon">
                                <span><i class="fa-regular fa-phone-flip"></i></span>
                            </div>
                        </div>
                        <div class="contact-info-social">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-lg-7">
                    <div class="contact-wrapper style-one wow bdFadeInRight" data-wow-delay=".4s"
                        data-wow-duration="1s">
                        <div class="section-title-wrapper anim-wrapper animation-style-3 mb-30">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                Contact Us
                            </span>
                            <h2 class="section-title title-animation">Send us a massage!</h2>
                        </div>

                        <div class="contact-from">
                            <div class="row g-5 align-items-center justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-input-box has-icon icon-right">
                                        <div class="form-input">
                                            <input name="name2" type="text" placeholder="Your Name">
                                            <div class=""><span><i class="fa-solid fa-user"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box has-icon icon-right">
                                        <div class="form-input">
                                            <input name="email2" type="text" placeholder="Your Email">
                                            <div class=""><span><i class="fa-solid fa-envelope"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box has-icon icon-right">
                                        <div class="form-input">
                                            <input name="number2" type="text" placeholder="Your Phone">
                                            <div class=""><span><i class="fa-solid fa-phone"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box has-icon icon-right">
                                        <div class="form-input">
                                            <input name="subject" type="text" placeholder="Subject">
                                            <div class=""><span><i class="fa-solid fa-book"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="form-input-box has-icon icon-right">
                                        <div class="form-input">
                                            <textarea name="message" placeholder="Your Message"></textarea>
                                            <div class=""><span><i class="fa-solid fa-pen"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="bd-btn btn-style btn-hover-x btn-black w-100" type="submit">Send
                                        Massage</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="otpSignupModal" class="modal fade" {{-- id="aboutUs"  --}} data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="aboutUsLabel" aria-hidden="true"
            {{-- class="modal "  --}} id="sessionModal" {{-- tabindex="-1" --}}>
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h5 class="modal-title">OTP Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Send OTP Form -->
                        <form id="sendOtpForm">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Phone number" required>
                            </div>
                            </br>
                            </br>
                            <div class="col-xl-12">
                                <div class="agent-details-btn">
                                    <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Send
                                        OTP</button>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Send OTP</button> -->
                        </form>

                        <!-- Verify OTP Form -->
                        <form id="verifyOtpForm" style="display: none;">
                            <div class="form-group">
                                <label for="otp">OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP"
                                    required>
                            </div>
                            </br>
                            </br>
                            {{--<div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name"
                                  placeholder="Enter your name" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Username</label>
                              <input type="text" class="form-control" id="username" name="username"
                                  placeholder="Enter your username" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Email</label>
                              <input type="text" class="form-control" id="email" name="email"
                                  placeholder="Enter your email" required>
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password"
                                  placeholder="Enter password" required>
                          </div>
                          <div class="form-group">
                              <label for="password_confirmation">Confirm Password</label>
                              <input type="password" class="form-control" id="password_confirmation"
                                  name="password_confirmation" placeholder="Confirm password" required>
                          </div>
                          --}}
                            <div class="col-xl-12">
                                <div class="agent-details-btn">
                                    <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Verify
                                        OTP</button>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-success">Verify OTP</button> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact area end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sendOtpForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    //url: "{{ route('vendor.otp.signup.send') }}",
                    url: "{{ route('vendor.otp.login.send') }}",
                    method: "POST",
                    data: {
                        phone: $('#phone').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.success);
                            $('#sendOtpForm').hide();
                            $('#verifyOtpForm').show();
                        } else {
                            alert(response.error);
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                });
            });

            $('#verifyOtpForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    // url: "{{ route('vendor.otp.signup.verify') }}",
                    url: "{{ route('vendor.otp.login.verify') }}",
                    method: "POST",
                    data: {
                        property_id: $('#property_id1').val(),
                        phone: $('#phone').val(),
                        otp: $('#otp').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert(response.success);
                            window.location.href = '{{ route("vendor.login") }}';
                            // Redirect to a new page or reload
                        } else {
                            alert(response.error);
                        }


                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                });
            });

            $('#book_now').on('click', function(e) {
                $.ajax({
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        // Check if the session value is null or empty
                        if (response.sessionValue === null || response.sessionValue === '') {
                            $('#otpSignupModal').modal('show');
                        } else {
                            window.location.href = '{{ route("vendor.login") }}';
                            // location.reload("/vendor/package-list");

                        }
                    },
                    error: function(error) {
                        console.log('Error fetching session value:', error);
                    }
                });
            });
        });
    </script>

</main>
@endsection