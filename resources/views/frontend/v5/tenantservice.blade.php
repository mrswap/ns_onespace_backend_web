@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")


@section('content')
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png" ) }} " ) }} "></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Tenant Services</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                    <span>Services</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end -->

    <!-- About area Start -->
    <section class="bd-about-area section-space p-relative ">
        <div class="container">
            <div class="row g-5">
                <div class=" col-xxl-5 col-xl-5 col-lg-5 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            Tenant Services
                        </span>
                        <h2 class="section-title title-animation">Solution for Tenant</h2>
                    </div>

                    <div class="content">
                        <p class="description">Finding your ideal rental property has never been easier. At Onespace, we
                            offer a wide range of rental properties that fit your needs and budget. With verified
                            listings and easy scheduling for property visits, you can confidently secure the perfect
                            place to call home. Our dedicated support ensures a smooth rental process from start to
                            finish.</p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Services for Tenant:</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                Verified rental property listings
                            </li>
                            <li class="pb-4">
                                Easy scheduling for property visits
                            </li>
                            <li class="pb-4">
                                Property comparison tools to find the best fit
                            </li>
                            <li class="pb-4">
                                Clear and transparent rental agreements
                            </li>
                            <li class="pb-4">
                                Support for legal and documentation processes
                            </li>
                        </ul>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Rental Plan:</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                Flexible rental agreements and payment terms
                            </li>
                            <li class="pb-4">
                                Features designed to make renting stress-free
                            </li>
                        </ul>
                    </div>
                    <div class="about-btn mt-2">
                        <a class="bd-btn btn-style purchase-plan-btn" href="#"><span class="text">Purchase
                                Plan</span></a>
                        <a class="bd-btn btn-style btn-hover-x" href="#"><span class="text">Plan Tenant For
                                Free</span></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">
                        <!-- <a class="about-play-btn" href="#!">
                        <span class="title"><img src="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png" ) }} "></span>
                    </a> -->
                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("assets/front/v5/images/buyer-service.jpeg" ) }} " alt="about thumb not found">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area end -->

    <!-- key feature start-->
    <section class="bd-services-area section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Features</span>
                        <h2 class="section-title title-animation">Key Features</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp active" data-wow-delay=".3s"
                        data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">24/7 Maintenance Support</h3>
                            <p class="description"> - Round-the-clock assistance for maintenance requests and emergency
                                repairs.</p>
                            <p class="description"> - Routine property upkeep ensures your rental is always in great
                                condition.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Simple and Transparent Lease Agreements</h3>
                            <p class="description"> - Clear terms with no hidden fees, making your lease easy to
                                understand.</p>
                            <p class="description"> - Support for lease renewals and changes in tenancy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Responsive Tenant Support</h3>
                            <p class="description">- Quick resolution of tenant concerns and inquiries for a hassle-free
                                experience.</p>
                            <p class="description"> - Assistance with move-in and move-out processes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Legal and Compliance Assistance</h3>
                            <p class="description">- Guidance to ensure compliance with rental laws, safeguarding your
                                rights.</p>
                            <p class="description">- Help with any legal issues that may arise during your tenancy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Flexible Payment Options</h3>
                            <p class="description"> - Convenient rent payment options, including online payments.</p>
                            <p class="description"> - Timely notifications and reminders to keep you on track.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Personalized Tenant Experience</h3>
                            <p class="description">- A dedicated relationship manager to assist you throughout the
                                rental period, from moving in to addressing any concerns.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 pt-5">
                    <div class="content text-center">
                        <p class="description text-dark">At Onespace, we’re committed to providing a seamless rental
                            experience, so you can focus on enjoying your new home.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- key feature end -->

  @if ($services && $services->isNotEmpty())
    <!-- services area start -->
    <section class="bd-services-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Services</span>
                        <h2 class="section-title title-animation">Tenant Services</h2>
                    </div>

                </div>
            </div>
            <div class="row">
            <div class="services-item-wrapper">
                    @foreach ($services as $service)

                    @if($service)
                    <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <span class="icon"><i
                                class="{{ !empty($service->iconimage) ? $service->iconimage : "icon-home-buy" }}"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">{{$service->title}}</a>
                            </h3>
                            <p class="description">
                                 {!! $service->description !!}</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- services area end -->
    @endif

    <!-- counter area start -->
    <section class="bd-services-area section-space theme-bg-primary">
        <div class="container">
            <div class="row g-5">
                <div class=" col-xxl-5 col-xl-5 col-lg-5 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            Our Success
                        </span>
                        <h2 class="section-title title-animation">Our Success in Numbers</h2>
                    </div>

                    <div class="content">
                        <p class="description">We believe in more than just buying and selling properties. we
                            believe in
                            turning dreams
                            into reality. Explore our curated selection of homes tailored to your unique lifestyle.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="row gy-24 text-center justify-content-between">
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-wrapper counter-style-one p-relative">
                                <div class="counter-content-wrapper">
                                    <div class="counter-text">
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1"
                                                data-purecounter-end="855" class="purecounter">0</span>+
                                        </h3>
                                        <p>Total Property</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-wrapper counter-style-one p-relative">
                                <div class="counter-content-wrapper">
                                    <div class="counter-text">
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1"
                                                data-purecounter-end="900" class="purecounter">0</span>+
                                        </h3>
                                        <p>Total Services</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-wrapper counter-style-one p-relative">
                                <div class="counter-content-wrapper">
                                    <div class="counter-text">
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1"
                                                data-purecounter-end="15" class="purecounter">0</span>M+
                                        </h3>
                                        <p>Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Counter area end -->

</main>

@endsection
