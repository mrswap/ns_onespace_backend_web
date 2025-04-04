@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")

@section('pageHeading')
{{ $propertyContent->title }}
@endsection

@section('metaKeywords')
@if ($propertyContent)
{{ $propertyContent->meta_keyword }}
@endif
@endsection

@section('metaDescription')
@if ($propertyContent)
{{ $propertyContent->meta_description }}
@endif
@endsection

@section('og:tag')
<meta property="og:title" content="{{ $propertyContent->title }}">
<meta property="og:image" content="{{ asset('assets/img/property/featureds/' . $propertyContent->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.property.details', $propertyContent->slug) }}">
@endsection


@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- property slider area start -->
    <div class="bd-property-details-area fix pt-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="property-details-wrapper">

                        <div class="swiper property-details-active">


                            <div class="swiper-wrapper">
                                @foreach ($sliders as $slider)
                                <div class="swiper-slide">
                                    <div class=" property-details-item">
                                        <div class="property-details-item-thumb">


                                            <img src="{{asset("assets/img/property/slider-images/$slider->image")}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="property-details-navigation d-none d-sm-block">
                                <button class="property-details-button-prev circle-btn is-bg-white"><i class="fa-regular fa-arrow-left-long"></i></button>
                                <button class="property-details-button-next circle-btn is-bg-white"><i class="fa-regular fa-arrow-right-long"></i></button>
                            </div>
                            <!-- If we need pagination -->
                            <div class="pagination-wrapper d-block d-sm-none">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- property slider area end -->

    <!-- property details content start -->
    <section class="bd-property-details-area section-space-medium">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-8 col-lg-8">
                    <div class="property-details-content-inner">
                        <div class="property-details-meta">
                            <ul>
                                <li class="property-details-category">
                                    <a class="is-bg-orange" href="#">Featured</a>
                                </li>
                                <li class="property-details-category">
                                    <a class="is-bg-transparent" href="#">{{$propertyContent->purpose}} Rent</a>
                                </li>
                                <li class="property-details-date">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    June 29, 2022
                                </li>
                            </ul>
                        </div>
                        <h2 class="property-details-title">{{$propertyContent->title}}</h2>
                        <span class="property-details-location">
                            <i class="fa-regular fa-location-dot"></i>
                            {{ $propertyContent->address }}
                        </span>
                        <h4 class="property-details-title-two">Description</h4>
                        <div class="property-details-descrip-text">
                            <p>{{$propertyContent->description}}</p>
                        </div>
                        <h4 class="property-details-title-two">Property Details</h4>
                        <div class="property-details-info-list wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <ul>
                                <li><label>Property ID:</label> <span>{{$propertyContent->propertyid}}</span></li>
                                <li><label>Home Area: </label> <span>{{$propertyContent->homearea}} sqft</span></li>
                                <li><label>Rooms:</label> <span>{{$propertyContent->rooms}} </span></li>
                                <li><label>Baths:</label> <span>{{$propertyContent->bath}} </span></li>
                                <li><label>Year built:</label> <span>{{$propertyContent->builtyear}} </span></li>
                            </ul>
                            <ul>
                                <li><label>Lot Area:</label> <span>{{$propertyContent->lotarea}} </span></li>
                                <li><label>Lot dimensions:</label> <span>{{$propertyContent->lotdimensions}} sqft</span></li>
                                <li><label>Beds:</label> <span>{{$propertyContent->beds}}</span></li>
                                <li><label>Price:</label> <span>{{$propertyContent->price}} {{$propertyContent->expectedPrice}} </span></li>
                                <li><label>Property Status:</label> <span>For {{$propertyContent->purpose}}</span></li>
                            </ul>
                        </div>
                        <h4 class="property-details-title-two">Property Features</h4>
                        <div class="property-details-feature wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <ul>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-modern-living"></i>
                                        </span>
                                        <div>
                                            <h6>Living Room</h6>
                                            <span class="descrip">{{$propertyContent->livingroom}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-garage"></i>
                                        </span>
                                        <div>
                                            <h6>Garage</h6>
                                            <span class="descrip">{{$propertyContent->garage}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-dining-area"></i>
                                        </span>
                                        <div>
                                            <h6>Dining Area</h6>
                                            <span class="descrip">{{$propertyContent->diningarea}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-bedroom"></i>
                                        </span>
                                        <div>
                                            <h6>Bedroom</h6>
                                            <span class="descrip">{{$propertyContent->bedroom}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-bathroom"></i>
                                        </span>
                                        <div>
                                            <h6>Bathroom</h6>
                                            <span class="descrip">{{$propertyContent->bathroom}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-gym-area"></i>
                                        </span>
                                        <div>
                                            <h6>Gym Area</h6>
                                            <span class="descrip">{{$propertyContent->gymarea}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-garden"></i>
                                        </span>
                                        <div>
                                            <h6>Garden</h6>
                                            <span class="descrip">{{$propertyContent->garden}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-details-feature-list-item">
                                        <span class="icon">
                                            <i class="icon-parking-area"></i>
                                        </span>
                                        <div>
                                            <h6>Parking</h6>
                                            <span class="descrip">{{$propertyContent->parking}} sq feet</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h4 class="property-details-title-two"> Our Property Gallery</h4>
                        <div class="property-details-gallery wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="row g-5">
                                @foreach ($galleryImages as $galleryImage)
                                <div class="col-md-6">
                                    <div class="property-details-gallery-thumb">
                                        <img src="{{asset("assets/img/project/gallery-images/$galleryImage->image")}}" alt="image not found">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <h4 class="property-details-title-two"> Benefits </h4>
                        <div class="property-details-benefits wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="property-details-benefits-list">
                                <ul>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Mosque/Prayer Room
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Square Footage
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Square Footage
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Living Spaces
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Flooring
                                    </li>
                                </ul>
                            </div>
                            <div class="property-details-benefits-list">
                                <ul>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Energy Efficiency
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Parking
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Security Features
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Landscaping
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Accessibility Features
                                    </li>
                                </ul>
                            </div>
                            <div class="property-details-benefits-list">
                                <ul>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        HVAC System
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Cylinder Gas
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Plumbing System
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        Sports Area
                                    </li>
                                    <li>
                                        <span class="list-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        internet and Connectivity
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="property-details-title-two"> Location</h4>
                        <div class="property-details-google-map wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60970.02123903755!2d-74.01588829728814!3d40.707092808586985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1712226046538!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <h4 class="property-details-title-two"> Apartment Plans</h4>
                        <div class="property-details-floor-plan wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="apartments-tab">
                                        <div class="nav section-title-space">
                                            <a data-bs-toggle="tab" href="#apartment-tab-1">The House</a>
                                            <a class="active show" data-bs-toggle="tab" href="#apartment-tab-2">Deluxe
                                                Portion</a>
                                            <a data-bs-toggle="tab" href="#apartment-tab-3">Penthouse</a>
                                            <a data-bs-toggle="tab" href="#apartment-tab-4">Warehouse</a>
                                            <a data-bs-toggle="tab" href="#apartment-tab-5">Urban</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="apartment-tab-1">
                                    <div class="apartments-tab-content-inner">
                                        <div class="row align-items-center g-5">
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-info">
                                                    <h3 class="apartments-title">The House</h3>
                                                    <p>The suitability of a house apartment building for your needs, whether you're looking to rent or buy. If studio have any specific buildings.</p>
                                                    <div class="apartments-info-list apartments-info-list-color">
                                                        <ul>
                                                            <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                            <li><label>Bedroom</label> <span>1500 Sq. Ft</span></li>
                                                            <li><label>Bathroom</label> <span>45 Sq. Ft</span></li>
                                                            <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                            <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-thumb">
                                                    <figure><img src="assets/images/apartment/apartment-plan-thumb-01.png" alt="apartment thumb">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="apartment-tab-2">
                                    <div class="product-tab-content-inner">
                                        <div class="row align-items-center g-5">
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-info">
                                                    <h3 class="apartments-title">Deluxe Portion</h3>
                                                    <p>That a deluxe real estate portion meets your expectations for luxury, comfort, and investment value
                                                        Larger living spaces.</p>
                                                    <div class="apartments-info-list apartments-info-list-color">
                                                        <ul>
                                                            <li><label>Total Area</label> <span>2600 Sq. Ft</span></li>
                                                            <li><label>Bedroom</label> <span>1300 Sq. Ft</span></li>
                                                            <li><label>Bathroom</label> <span>40 Sq. Ft</span></li>
                                                            <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                            <li><label>Lounge</label> <span>600 Sq. Ft</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-thumb">
                                                    <figure><img src="assets/images/apartment/apartment-plan-thumb-02.png" alt="apartment thumb">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="apartment-tab-3">
                                    <div class="product-tab-content-inner">
                                        <div class="row align-items-center g-5">
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-info">
                                                    <h3 class="apartments-title">Penthouse</h3>
                                                    <p>The better assess the value and suitability of a penthouse property for your needs ensuring it meets your expectations for luxury.</p>
                                                    <div class="apartments-info-list apartments-info-list-color">
                                                        <ul>
                                                            <li><label>Total Area</label> <span>3000 Sq. Ft</span></li>
                                                            <li><label>Bedroom</label> <span>2000 Sq. Ft</span></li>
                                                            <li><label>Bathroom</label> <span>50 Sq. Ft</span></li>
                                                            <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                            <li><label>Lounge</label> <span>750 Sq. Ft</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-thumb">
                                                    <figure><img src="assets/images/apartment/apartment-plan-thumb-03.png" alt="apartment thumb">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="apartment-tab-4">
                                    <div class="product-tab-content-inner">
                                        <div class="row align-items-center g-5">
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-info">
                                                    <h3 class="apartments-title">Warehouse</h3>
                                                    <p> Warehouse real estate, whether for purchase, lease, or investment, there are several important details and features to evaluate.</p>
                                                    <div class="apartments-info-list apartments-info-list-color">
                                                        <ul>
                                                            <li><label>Total Area</label> <span>3200 Sq. Ft</span></li>
                                                            <li><label>Bedroom</label> <span>2500 Sq. Ft</span></li>
                                                            <li><label>Bathroom</label> <span>55 Sq. Ft</span></li>
                                                            <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                            <li><label>Lounge</label> <span>700 Sq. Ft</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-thumb">
                                                    <figure><img src="assets/images/apartment/apartment-plan-thumb-04.png" alt="apartment thumb">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="apartment-tab-5">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row align-items-center g-5">
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-info">
                                                    <h3 class="apartments-title">Urban</h3>
                                                    <p>The informed decision about urban real estate properties, ensuring they meet your needs and expectations planned or potential future.</p>
                                                    <div class="apartments-info-list apartments-info-list-color">
                                                        <ul>
                                                            <li><label>Total Area</label> <span>4000 Sq. Ft</span></li>
                                                            <li><label>Bedroom</label> <span>3000 Sq. Ft</span></li>
                                                            <li><label>Bathroom</label> <span>60 Sq. Ft</span></li>
                                                            <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                            <li><label>Lounge</label> <span>800 Sq. Ft</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="apartments-plan-thumb">
                                                    <figure><img src="assets/images/apartment/apartment-plan-thumb-05.png" alt="apartment thumb">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="property-details-title-two"> Apartment Video</h4>
                        <div class="property-details-video">
                            <div class="bd-video-area style-one position-relative">
                                <div class="video-bg-thumb include-bg" data-background="assets/images/bg/video-bg-01.png">
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-7 col-lg-8 col-md-10">
                                            <div class="video-content text-center">
                                                <div class="video-play">
                                                    <a href="https://www.youtube.com/watch?v=go7QYaQR494" class="bd-play-btn popup-video"><i class="fa-duotone fa-play"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <h4 class="property-details-title-two">Clients Reviews</h4>
                            <div class="property-details-reviews wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="bd-postbox-details-comment-inner">
                                    <ul>
                                        <li>
                                            <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                <div class="bd-postbox-details-comment-thumb">
                                                    <img src="assets/images/user/user-thumb-04.png" alt="">
                                                </div>
                                                <div class="bd-postbox-details-comment-content">
                                                    <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                        <div class="bd-postbox-details-comment-avater">
                                                            <h4 class="bd-postbox-details-comment-avater-title">Lance Bogrol</h4>
                                                            <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                3.50pm</span>
                                                        </div>
                                                        <div class="bd-postbox-details-comment-reply">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>By defining and following internal and external processes, your team will
                                                        have clarity on resources to <br> attract and retain customers for your
                                          business.</p>
                                                </div>
                                            </div>
                                            <ul class="children">
                                                <li>
                                                    <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                        <div class="bd-postbox-details-comment-thumb">
                                                            <img src="assets/images/user/user-thumb-05.png" alt="">
                                                        </div>
                                                        <div class="bd-postbox-details-comment-content">
                                                            <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                <div class="bd-postbox-details-comment-avater">
                                                                    <h4 class="bd-postbox-details-comment-avater-title">Dasy Lily</h4>
                                                                    <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                      3.50pm</span>
                                                                </div>
                                                                <div class="bd-postbox-details-comment-reply">
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>By defining and following internal and external processes, your team
                                                                will have clarity on resources to <br> attract and retain customers
                                                for your business.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                <div class="bd-postbox-details-comment-thumb">
                                                    <img src="assets/images/user/user-thumb-06.png" alt="">
                                                </div>
                                                <div class="bd-postbox-details-comment-content">
                                                    <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                        <div class="bd-postbox-details-comment-avater">
                                                            <h4 class="bd-postbox-details-comment-avater-title">Jeremy C. Irizarry</h4>
                                                            <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                3.50pm</span>
                                                        </div>
                                                        <div class="bd-postbox-details-comment-reply">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>By defining and following internal and external processes, your team will
                                                        have clarity on resources to <br> attract and retain customers for your
                                          business.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-comment-form">
                                    <div class="post-comments-title">
                                        <h4 class="mb-15">Leave a Comment</h4>
                                    </div>
                                    <form>
                                        <div class="row gy-20">
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <div class="input-box">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="input-box">
                                                    <textarea cols="30" rows="10" placeholder="Type Comment here"></textarea>
                                                </div>
                                            </div>
                                            <div class="bd-postbox-details-suggetions mb-20">
                                                <div class="bd-postbox-details-remeber">
                                                    <input id="remeber" type="checkbox">
                                                    <label for="remeber">Save my name, email, and website in this browser for the
                                                        next time I comment.</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="submit-btn">
                                                    <button class="bd-btn btn-style btn-hover-x btn-black" type="submit">Post
                                                        Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="agent-sidebar-wrapper bd-sidebar-sticky">
                        <div class="agent-details-widget mb-35">
                            <h3 class="sidebar-widget-title">Contact</h3>
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <div class="input-box">
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-box">
                                        <div class="input-box">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-box">
                                        <input type="text" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-box">
                                        <textarea cols="30" rows="10" placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="agent-details-btn">
                                        <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Send
                                            Email</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- featured properties start -->
                        <div class="sidebar-properties-wrapper">
                            <div class="swiper featured__properties">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="sidebar-widget mb-25">
                                            <h3 class="sidebar-widget-title">Featured Properties</h3>
                                            <div class="sidebar-slider">
                                                <div class="sidebar-thumb-wrapper">
                                                    <div class="sidebar-thumb">
                                                        <figure><img src="assets/images/agent/sidebar/agent-sidebar-01.png" alt="agent-sidebar thumb not found"></figure>
                                                    </div>
                                                    <div class="sidebar-content-inner">
                                                        <div class="content">
                                                            <span class="price">$16000/mo</span>
                                                            <h3 class="title"><a href="#">Renovated Apartment</a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="badge-wrap agent-badge">
                                                        <a href="#" class="bd-badge">Featured</a>
                                                        <a href="#" class="bd-badge">For Rent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sidebar-widget mb-25">
                                            <h3 class="sidebar-widget-title">Featured Properties</h3>
                                            <div class="sidebar-slider">
                                                <div class="sidebar-thumb-wrapper">
                                                    <div class="sidebar-thumb">
                                                        <figure><img src="assets/images/agent/sidebar/agent-sidebar-01.png" alt="agent-sidebar thumb not found"></figure>
                                                    </div>
                                                    <div class="sidebar-content-inner">
                                                        <div class="content">
                                                            <span class="price">$16000/mo</span>
                                                            <h3 class="title"><a href="#">Renovated Apartment</a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="badge-wrap agent-badge">
                                                        <a href="#" class="bd-badge">Featured</a>
                                                        <a href="#" class="bd-badge">For Rent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sidebar-widget mb-25">
                                            <h3 class="sidebar-widget-title">Featured Properties</h3>
                                            <div class="sidebar-slider">
                                                <div class="sidebar-thumb-wrapper">
                                                    <div class="sidebar-thumb">
                                                        <figure><img src="assets/images/agent/sidebar/agent-sidebar-01.png" alt="agent-sidebar thumb not found"></figure>
                                                    </div>
                                                    <div class="sidebar-content-inner">
                                                        <div class="content">
                                                            <span class="price">$16000/mo</span>
                                                            <h3 class="title"><a href="#">Renovated Apartment</a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="badge-wrap agent-badge">
                                                        <a href="#" class="bd-badge">Featured</a>
                                                        <a href="#" class="bd-badge">For Rent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agent-nav-pag mb-20">
                                    <!-- If we need navigation buttons -->
                                    <div class="common-navigation">
                                        <button class="properties-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                                        <button class="properties-slider-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="properties-pagination">
                                        <div class="bd-swiper-dot text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- featured properties end -->
                        <!-- latest post start -->
                        <div class="sidebar-widget mb-35">
                            <h3 class="sidebar-widget-title">Latest Posts</h3>
                            <div class="sidebar-widget-content">
                                <div class="sidebar-blog-item-wrapper">
                                    <div class="sidebar-blog-item">
                                        <div class="sidebar-blog-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/sidebar/blog-sm-01.png" alt="image">
                                            </a>
                                        </div>
                                        <div class="sidebar-blog-content">
                                            <div class="sidebar-blog-meta">
                                                <span>12 April, 2023</span>
                                            </div>
                                            <h3 class="sidebar-blog-title">
                                                <a href="blog-details.html">From Fixer-Uppers to Dream Homes Tips</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="sidebar-blog-item">
                                        <div class="sidebar-blog-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/sidebar/blog-sm-02.png" alt="image">
                                            </a>
                                        </div>
                                        <div class="sidebar-blog-content">
                                            <div class="sidebar-blog-meta">
                                                <span>8 July, 2023</span>
                                            </div>
                                            <h3 class="sidebar-blog-title">
                                                <a href="blog-details.html">Navigating Rental Market Dynamics Tips</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="sidebar-blog-item">
                                        <div class="sidebar-blog-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/sidebar/blog-sm-03.png" alt="image">
                                            </a>
                                        </div>
                                        <div class="sidebar-blog-content">
                                            <div class="sidebar-blog-meta">
                                                <span>12 April, 2023</span>
                                            </div>
                                            <h3 class="sidebar-blog-title">
                                                <a href="blog-details.html">Strategies for Building Wealth Through
                                                    Property</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- latest post end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property details content end -->
    @endsection

    {{-- @section('content')
    <div class="product-single pt-100 pb-70 border-top header-next">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-9 col-xl-8">
                    <div class="product-single-gallery mb-40">
                        <!-- Slider navigation buttons -->
                        <div class="slider-navigation">
                            <button type="button" title="Slide prev" class="slider-btn slider-btn-prev">
                                <i class="fal fa-angle-left"></i>
                            </button>
                            <button type="button" title="Slide next" class="slider-btn slider-btn-next">
                                <i class="fal fa-angle-right"></i>
                            </button>
                        </div>
                        <div class="swiper product-single-slider">
                            <div class="swiper-wrapper">
                                @foreach ($sliders as $slider)
                                <div class="swiper-slide">
                                    <figure class="radius-lg lazy-container ratio ratio-16-11">
                                        <a href="{{ asset('assets/img/property/slider-images/' . $slider->image) }}" class="lightbox-single">
                                            <img class="lazyload" src="assets/images/placeholder.png" data-src="{{ asset('assets/img/property/slider-images/' . $slider->image) }}">
                                        </a>
                                    </figure>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="swiper slider-thumbnails">
                            <div class="swiper-wrapper">
                                @foreach ($sliders as $slider)
                                <div class="swiper-slide">
                                    <div class="thumbnail-img lazy-container radius-md ratio ratio-16-11">
                                        <img class="lazyload" src="assets/images/placeholder.png" data-src="{{ asset('assets/img/property/slider-images/' . $slider->image) }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-single-details">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center justify-content-between mb-10">
                                    <span class="product-category text-sm"> <a href="{{ route('frontend.properties', ['category' => $propertyContent->categoryContent?->slug]) }}">
                                            {{ $propertyContent->categoryContent?->name }}</a></span>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">{{ $propertyContent->title }}</a>
                                </h3>
                                <div class="product-location icon-start">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <span>
                                        {{ $propertyContent->address }}
                                    </span>
                                    <span>
                                        {{ $propertyContent->property->city?->getContent($propertyContent->language_id)?->name }}
                                        {{ $propertyContent->property->isStateActive ? ', ' . $propertyContent->property->state?->getContent($propertyContent->language_id)?->name : '' }}
                                        {{ $propertyContent->property->isCountryActive ? ', ' . $propertyContent->property->country?->getContent($propertyContent->language_id)?->name : '' }}
                                    </span>
                                </div>
                                <ul class="product-info p-0 list-unstyled d-flex align-items-center mt-10 mb-30">
                                    <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Area') }}">
                                        <i class="fal fa-vector-square"></i>
                                        <span>{{ $propertyContent->area }} {{ __('Sqft') }}</span>
                                    </li>
                                    @if ($propertyContent->type == 'residential')
                                    <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Beds') }}">
                                        <i class="fal fa-bed"></i>
                                        <span>{{ $propertyContent->beds }} {{ __('Beds') }}</span>
                                    </li>
                                    <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Baths') }}">
                                        <i class="fal fa-bath"></i>
                                        <span>{{ $propertyContent->bath }} {{ __('Baths') }}</span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="product-price mb-10">
                                    <span class="new-price">{{ __('Price:') }}
                                        {{ $propertyContent->price ? symbolPrice($propertyContent->price) : __('Negotiable') }}</span>
                                </div>
                                <a @if (!empty($agent)) href="{{ route('frontend.agent.details', ['username' => $agent->username]) }}">
                                    @elseif(!empty($vendor))
                                    href="{{ route('frontend.vendor.details', ['username' => $vendor->username]) }}">
                                    @else
                                    href="{{ route('frontend.vendor.details', ['username' => $admin->username, 'admin' => 'true']) }}"> @endif
                                    <div class="user mb-20">
                                        <div class="user-img">
                                            <div class="lazy-container ratio ratio-1-1 rounded-pill">
                                                <img class="lazyload" src="{{ asset('assets/img/blank-user.jpg') }}" data-src="@if (!empty($agent)) {{ $agent->image ? asset('assets/img/agents/' . $agent->image) : asset('assets/img/blank-user.jpg') }}
                                            @elseif(!empty($vendor))
                                                {{ $vendor->photo ? asset('assets/admin/img/vendor-photo/' . $vendor->photo) : asset('assets/img/blank-user.jpg') }}
                                                @else
                                                 {{ asset('assets/img/admins/' . $admin->image) }} @endif">

                                            </div>
                                        </div>
                                        <div class="user-info">
                                            <h5 class="m-0">
                                                @if (!empty($agent))
                                                {{ $agent->agent_info?->first_name . ' ' . $agent->agent_info?->last_name }}
                                                @elseif(!empty($vendor))
                                                {{ $vendor->vendor_info?->name }}
                                                @else
                                                {{ $admin->first_name . ' ' . $admin->last_name }}
                                                @endif
                                            </h5>

                                        </div>
                                    </div>
                                </a>

                                <ul class="share-link list-unstyled mb-30">
                                    <li>
                                        <a class="btn blue" href="#" data-bs-toggle="modal" data-bs-target="#socialMediaModal">
                                            <i class="far fa-share-alt"></i>
                                        </a>
                                        <span>{{ __('Share') }}</span>

                                    </li>

                                    <li>
                                        @if (Auth::guard('web')->check())
                                        @php
                                        $user_id = Auth::guard('web')->user()->id;
                                        $checkWishList = checkWishList($propertyContent->propertyId, $user_id);
                                        @endphp
                                        @else
                                        @php
                                        $checkWishList = false;
                                        @endphp
                                        @endif
                                        <a href="{{ $checkWishList == false ? route('addto.wishlist', $propertyContent->propertyId) : route('remove.wishlist', $propertyContent->propertyId) }}" class="btn red " data-tooltip="tooltip" data-bs-placement="top" title="{{ $checkWishList == false ? __('Add to Wishlist') : __('Saved') }}">

                                            @if ($checkWishList == false)
                                            <i class="fal fa-heart"></i>
                                            @else
                                            <i class="fas fa-heart"></i>
                                            @endif
                                        </a>
                                        <span>{{ $checkWishList == false ? __('Save') : __('Saved') }}</span>

                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="mb-20"></div>
                        <div class="product-desc mb-40">
                            <h3 class="mb-20">{{ __('Property Description') }}</h3>
                            <p class=" summernote-content">{!! $propertyContent->description !!}</p>
                        </div>
                        @if (!empty(showAd(3)))
                        <div class="text-center mb-3 mt-3">
                            {!! showAd(3) !!}
                        </div>
                        @endif

                        @if (count($propertyContent->propertySpacifications) > 0)
                        <div class="row" class="mb-20">
                            <div class="col-12">
                                <h3 class="mb-20"> {{ __('Features') }}</h3>
                            </div>

                            @foreach ($propertyContent->propertySpacifications as $specification)
                            @php
                            $property_specification_content = App\Models\Property\SpacificationCotent::where([
                            ['property_spacification_id', $specification->id],
                            ['language_id', $language->id],
                            ])->first();
                            @endphp
                            <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                <strong class="mb-1 text-dark d-block">{{ $property_specification_content?->label }}</strong>
                                <span>{{ $property_specification_content?->value }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="pb-20"></div>
                        @endif

                        <div class="product-featured mb-40">
                            <h3 class="mb-20">{{ __('Amenities') }}</h3>
                            <ul class="featured-list list-unstyled p-0 m-0">
                                @foreach ($amenities as $amenity)
                                <li class="d-inline-block icon-start">
                                    <i class="{{ $amenity->amenity->icon }}"></i>
                                    <span>{{ $amenity->amenityContent?->name }}</span>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        @if (!empty($propertyContent->video_url))
                        <div class="product-video mb-40">
                            <h3 class="mb-20"> {{ __('Video') }}</h3>
                            <div class="lazy-container radius-lg ratio ratio-16-11">
                                <img class="lazyload" src="{{ asset('assets/front/images/placeholder.png') }}" data-src="{{ $propertyContent->video_image ? asset('assets/img/property/video/' . $propertyContent->video_image) : asset('assets/front/images/placeholder.png') }}">
                                <a href="{{ $propertyContent->video_url }}" class="video-btn youtube-popup p-absolute">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if (!empty($propertyContent->floor_planning_image))
                        <div class="product-planning mb-40">
                            <h3 class="mb-20">{{ __('Floor Planning') }}</h3>
                            <div class="lazy-container radius-lg ratio ratio-16-11 border">
                                <img class="lazyload" src="assets/images/placeholder.png" data-src="{{ asset('assets/img/property/plannings/' . $propertyContent->floor_planning_image) }}">
                            </div>
                        </div>
                        @endif
                        @if (!empty($propertyContent->latitude) && !empty($propertyContent->longitude))
                        <div class="product-location mb-40">
                            <h3 class="mb-20">{{ __('Location') }}</h3>
                            <div class="lazy-container radius-lg ratio ratio-21-9 border">
                                <iframe class="lazyload" src="https://maps.google.com/maps?q={{ $propertyContent->latitude }},{{ $propertyContent->longitude }}&hl={{ $currentLanguageInfo->code }}&z=14&amp;output=embed"></iframe>
                            </div>
                        </div>
                        @endif
                        @if (!empty(showAd(3)))
                        <div class="text-center mb-3 mt-3">
                            {!! showAd(3) !!}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4">
                    <aside class="sidebar-widget-area mb-10" data-aos="fade-up">
                        <div class="widget widget-form radius-md mb-30">
                            <div class="user mb-20">
                                <div class="user-img">
                                    <div class="lazy-container ratio ratio-1-1 rounded-pill">
                                        @if (!empty($agent))
                                        <a href="{{ route('frontend.agent.details', ['username' => $agent->username]) }}">
                                            <img class="lazyload" src="{{ asset('assets/img/blank-user.jpg') }}" data-src="{{ $agent->image ? asset('assets/img/agents/' . $agent->image) : asset('assets/img/blank-user.jpg') }}">
                                        </a>
                                        @elseif(!empty($vendor))
                                        <a href="{{ route('frontend.vendor.details', ['username' => $vendor->username]) }}">
                                            <img class="lazyload" src="{{ asset('assets/img/blank-user.jpg') }}" data-src=" {{ $vendor->photo ? asset('assets/admin/img/vendor-photo/' . $vendor->photo) : asset('assets/img/blank-user.jpg') }}">
                                        </a>
                                        @else
                                        <a href="{{ route('frontend.vendor.details', ['username' => $admin->username, 'admin' => 'true']) }}">
                                            <img class="lazyload" src="{{ asset('assets/img/blank-user.jpg') }}" data-src=" {{ asset('assets/img/admins/' . $admin->image) }} ">
                                        </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="mb-0">
                                        <a @if (!empty($agent)) href="{{ route('frontend.agent.details', ['username' => $agent->username]) }}"> {{ $agent->agent_info?->first_name . ' ' . $agent->agent_info?->last_name }}
                                            @elseif(!empty($vendor))
                                            href="{{ route('frontend.vendor.details', ['username' => $vendor->username]) }}"> {{ $vendor->vendor_info?->name }}
                                            @else
                                            href="{{ route('frontend.vendor.details', ['username' => $admin->username, 'admin' => 'true']) }}"> {{ $admin->first_name . ' ' . $admin->last_name }} @endif
                                        </a>
                                    </h4>
                                    <a class="d-block" href="tel:@if (!empty($agent)) {{ $agent->phone }}
                                        @elseif(!empty($vendor))
                                            {{ $vendor->phone }}
                                        @else
                                            @if ($admin->show_contact_form && !empty($admin->phone))
                                            {{ $admin->phone }} @endif
                                        @endif">
                                        @if (!empty($agent))
                                        {{ $agent->phone }}
                                        @elseif(!empty($vendor))
                                        {{ $vendor->phone }}
                                        @else
                                        @if ($admin->show_contact_form && !empty($admin->phone))
                                        {{ $admin->phone }}
                                        @endif
                                        @endif
                                    </a>
                                    <a href="mailto:@if (!empty($agent)) {{ $agent->email }}
                                        @elseif(!empty($vendor))
                                            {{ $vendor->email }} @else {{ $admin->email }} @endif">
                                        @if (!empty($agent))
                                        {{ $agent->email }}
                                        @elseif(!empty($vendor))
                                        {{ $vendor->email }}
                                        @else
                                        @if ($admin->show_email_addresss)
                                        {{ $admin->email }}
                                        @endif
                                        @endif
                                    </a>
                                </div>
                            </div>

                            <form action="{{ route('property_contact') }}" method="POST">
                                @csrf
                                @if (!empty($agent))
                                <input type="hidden" name="vendor_id" value="{{ $agent->vendor_id }}">
                                <input type="hidden" name="agent_id" value="{{ !empty($agent) ? $agent->id : '' }}">
                                @elseif(!empty($vendor) && empty($agent))
                                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                @else
                                <input type="hidden" name="vendor_id" value="0">
                                @endif
                                <input type="hidden" name="property_id" value="{{ $propertyContent->propertyId }}">
                                <div class="form-group mb-20">
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}*" required value="{{ old('name') }}">
                                    @error('name')
                                    <p class=" text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-20">
                                    <input type="email" class="form-control" required name="email" placeholder="{{ __('Email Address') }}*" value="{{ old('email') }}">
                                    @error('email')
                                    <p class=" text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-20">
                                    <input type="number" class="form-control" name="phone" required value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}*">
                                    @error('phone')
                                    <p class=" text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-20">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="8" required="" data-error="Please enter your message" placeholder="{{ __('Message') }}...">{{ old('message') }}</textarea>

                                    @error('message')
                                    <p class=" text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if ($info->google_recaptcha_status == 1)
                                <div class="form-group mb-30">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    @error('g-recaptcha-response')
                                    <p class="mt-1 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                @endif
                                <button type="submit" class="btn btn-md btn-primary w-100">{{ __('Send message') }}</button>
                            </form>
                        </div>

                        <div class="widget widget-recent radius-md mb-30 ">
                            <h3 class="title">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#products" aria-expanded="true" aria-controls="products">
                                    {{ __('Related Property') }}
                                </button>
                            </h3>
                            <div id="products" class="collapse show">
                                <div class="accordion-body p-0">
                                    @foreach ($relatedProperty as $property)
                                    <div class="product-default product-inline mt-20">
                                        <figure class="product-img">
                                            <a href="{{ route('frontend.property.details', $property->slug) }}" class="lazy-container ratio ratio-1-1 radius-md">
                                                <img class="lazyload" src="assets/images/placeholder.png" data-src="{{ asset('assets/img/property/featureds/' . $property->featured_image) }}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h6 class="product-title"><a href="{{ route('frontend.property.details', $property->slug) }}">{{ $property->title }}</a>
                                            </h6>
                                            <span class="product-location icon-start"> <i class="fal fa-map-marker-alt"></i>
                                                {{ $property->city->getContent($property->language_id)?->name }}
                                                {{ $property->isStateActive ? ', ' . $property->state?->getContent($property->language_id)?->name : '' }}
                                                {{ $property->isCountryActive ? ', ' . $property->country?->getContent($property->language_id)?->name : '' }}</span>
                                            <div class="product-price">

                                                <span class="new-price">{{ __('Price:') }}
                                                    {{ $property->price ? symbolPrice($property->price) : __('Negotiable') }}</span>
                                            </div>
                                            <ul class="product-info p-0 list-unstyled d-flex align-items-center">
                                                <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Area') }}">
                                                    <i class="fal fa-vector-square"></i>
                                                    <span>{{ $property->area }}</span>
                                                </li>
                                                @if ($property->type == 'residential')
                                                <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Bed') }}">
                                                    <i class="fal fa-bed"></i>
                                                    <span>{{ $property->beds }} </span>
                                                </li>
                                                <li class="icon-start" data-tooltip="tooltip" data-bs-placement="top" title="{{ __('Bath') }}">
                                                    <i class="fal fa-bath"></i>
                                                    <span>{{ $property->bath }} </span>
                                                </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div><!-- product-default -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if (!empty(showAd(2)))
                        <div class="text-center mb-3 mt-3">
                            {!! showAd(2) !!}
                        </div>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="socialMediaModal" tabindex="-1" role="dialog" aria-labelledby="socialMediaModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> {{ __('Share On') }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="actions d-flex justify-content-around">
                        <div class="action-btn">
                            <a class="facebook btn" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&src=sdkpreparse"><i class="fab fa-facebook-f"></i></a>
                            <br>
                            <span> {{ __('Facebook') }} </span>
                        </div>
                        <div class="action-btn">
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}" class="linkedin btn"><i class="fab fa-linkedin-in"></i></a>
                            <br>
                            <span> {{ __('Linkedin') }} </span>
                        </div>
                        <div class="action-btn">
                            <a class="twitter btn" href="https://twitter.com/intent/tweet?text={{ url()->current() }}"><i class="fab fa-twitter"></i></a>
                            <br>
                            <span> {{ __('Twitter') }} </span>
                        </div>
                        <div class="action-btn">
                            <a class="whatsapp btn" href="whatsapp://send?text={{ url()->current() }}"><i class="fab fa-whatsapp"></i></a>
                            <br>
                            <span> {{ __('Whatsapp') }} </span>
                        </div>
                        <div class="action-btn">
                            <a class="sms btn" href="sms:?body={{ url()->current() }}" class="sms"><i class="fas fa-sms"></i></a>
                            <br>
                            <span> {{ __('SMS') }} </span>
                        </div>
                        <div class="action-btn">
                            <a class="mail btn" href="mailto:?subject=Digital Card&body=Check out this digital card {{ url()->current() }}."><i class="fas fa-at"></i></a>
                            <br>
                            <span> {{ __('Mail') }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection --}}
