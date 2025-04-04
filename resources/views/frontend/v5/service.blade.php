

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
<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png" ) }} "></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">{{__($type)}} Services</h1>
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
    <section class="bd-about-area section-space p-relative theme-bg-primary">
        <div class="container">
            <div class="row g-5">
            	@if($type=='Tenant')
                <div class=" col-xxl-5 col-xl-5 col-lg-5 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            about us
                        </span>
                        <h2 class="section-title title-animation">Solution for {{$type}}</h2>
                    </div>

                    <div class="content">
                            <p class="description">Finding your ideal rental property has never been easier. At Onespace, we offer a wide range of rental properties that fit your needs and budget. With verified listings and easy scheduling for property visits, you can confidently secure the perfect place to call home. Our dedicated support ensures a smooth rental process from start to finish.</p>
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
                    	 <a class="bd-btn btn-style purchase-plan-btn" href="#"><span class="text">Purchase Plan</span></a>
                            <a class="bd-btn btn-style btn-hover-x" href="#"><span class="text">Plan Tenant For Free</span></a>
                       
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">

                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("assets/front/v5/images/buyer-service.jpeg" ) }} " alt="about thumb not found">
                            </figure>
                        </div>
                    </div>
                </div>
                @else
                <div class=" col-xxl-5 col-xl-5 col-lg-5 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            about us
                        </span>
                        <h2 class="section-title title-animation">Solution for Owner</h2>
                    </div>

                    <div class="content">
                        <p class="description">Managing your property doesn’t have to be a headache. With [Your Website Name], we offer comprehensive property management services that take care of everything from finding tenants to maintaining your property. Whether you’re renting or selling, we help you get the most out of your investment with minimum effort on your part.</p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Services for Property Owners:</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                Full property management services
                            </li>
                            <li class="pb-4">
                                Tenant screening and rent collection
                            </li>
                            <li class="pb-4">
                                Maintenance and repair management
                            </li>
                            <li class="pb-4">
                                Property listing and marketing
                            </li>
                            <li class="pb-4">
                                Legal and compliance support
                            </li>
                        </ul>
                    </div>

                    <div class="about-btn mt-2">
                        <a class="bd-btn btn-style btn-hover-x" href="#pricingPlan"><span class="text">Purchase Plan</span></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">

                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("assets/front/v5/images/owner-service.webp" ) }} " alt="about thumb not found">
                            </figure>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- About area end -->
            	@if($type=='Tenant')
            	 <!-- key feature start-->
        <section class="bd-services-area section-space theme-bg-primary">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div
                            class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                            <span class="section-subtitle uppercase"><i class="icon-home"></i>Features</span>
                            <h2 class="section-title title-animation">Key Features</h2>
                        </div>

                    </div>
                </div>
                <div class="row g-5 justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="core-feature-item style-one wow bdFadeInUp active" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="icon">
                                <span><i class="icon-security-features"></i></span>
                            </div>
                            <div class="content">
                                <h3 class="title">24/7 Maintenance Support</h3>
                                <p class="description"> - Round-the-clock assistance for maintenance requests and emergency repairs.</p>
                                <p class="description">  - Routine property upkeep ensures your rental is always in great condition.</p>
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
                                <p class="description">   - Clear terms with no hidden fees, making your lease easy to understand.</p>
                                <p class="description">    - Support for lease renewals and changes in tenancy.</p>
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
                                <p class="description">- Quick resolution of tenant concerns and inquiries for a hassle-free experience.</p>
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
                                <p class="description">- Guidance to ensure compliance with rental laws, safeguarding your rights.</p>
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
                                <p class="description">   - Convenient rent payment options, including online payments.</p>
                                <p class="description">  - Timely notifications and reminders to keep you on track.</p>
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
                                <p class="description">- A dedicated relationship manager to assist you throughout the rental period, from moving in to addressing any concerns.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 pt-5">
                        <div class="content text-center">
                            <p class="description text-dark">At Onespace, we’re committed to providing a seamless rental experience, so you can focus on enjoying your new home.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- key feature end -->


        <!-- services area start -->
        <section class="bd-services-area section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div
                            class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
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
                        <span class="icon"><i class="{{ !empty($service->iconimage) ? $service->iconimage : "icon-home-buy" }}"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">{{$service->title}}</a>
                            </h3>
                            <p class="description">
                               {!! $service->description !!} 
                               </p>
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
                                            <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="855" class="purecounter">0</span>+
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
                                            <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="900" class="purecounter">0</span>+
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
                                            <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="15" class="purecounter">0</span>M+
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
            	  @else
            	  <!-- services area start -->
    <section class="bd-services-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Services</span>
                        <h2 class="section-title title-animation">{{$type}} Services</h2>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="services-item-wrapper">
                    @foreach ($services as $service)

                    @if($service)
                    <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <span class="icon"><i class="{{ !empty($service->iconimage) ? $service->iconimage : "icon-home-buy" }}"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">{{$service->title}}</a>
                            </h3>
                            <p class="description">
                               {!! $service->description !!} 
                               </p>
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

    <!-- flow chart start -->

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
                    <div class="core-feature-item style-one wow bdFadeInUp active" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-solution"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Tenant Management</h3>
                            <p class="description"> - Tenant screening, lease drafting, and rent collection.</p>
                            <p class="description"> - Handling all tenant inquiries and concerns.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-flexibility"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Property Maintenance</h3>
                            <p class="description"> - Routine upkeep, landscaping, and repairs.</p>
                            <p class="description"> - 24/7 emergency maintenance response.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Marketing & Leasing</h3>
                            <p class="description">- Strategic property marketing to attract quality tenants.</p>
                            <p class="description"> - Lease renewals and tenant retention programs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Financial Reporting & Rent Collection</h3>
                            <p class="description">- Detailed financial reporting for transparency.</p>
                            <p class="description">- Timely rent collection and disbursement to owners.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Compliance & Legal Services</h3>
                            <p class="description"> - Ensure compliance with state and federal landlord-tenant laws.</p>
                            <p class="description"> - Handle legal disputes and evictions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Tailored Solutions for Every Property</h3>
                            <p class="description">- Custom property management plans for residential, commercial, and industrial properties.</p>
                            <p class="description"> - Experience in managing single-family homes, condos, offices, and industrial complexes.</p>
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
                            <p class="description">Easily list your property across multiple platforms simultaneously to reach a wider audience quickly.</p>
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
                            <p class="description">Receive personalized support from a dedicated relationship manager throughout your entire process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- key feature end -->
    <section class="bd-services-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Chart</span>
                        <h2 class="section-title title-animation">Process Flow Chart</h2>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <figure class="text-center">
                        <img src="{{asset("assets/front/v5/images/flowchart.jpeg" ) }} " class="flowchart" alt="flowchart" width="500px">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- flow chart end -->

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
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="855" class="purecounter">0</span>+
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
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="900" class="purecounter">0</span>+
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
                                        <h3 class="counter-text-title"><span data-purecounter-duration="1" data-purecounter-end="15" class="purecounter">0</span>M+
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

    <!-- Pricing style two start -->
    <section class="bd-pricing-area section-space" id="pricingPlan">
        <div class="container">
            <div class="row align-items-center justify-content-center wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12">
                    <div class="section-title-wrapper section-title-space text-center fix">
                        <div class="elements-section__wrapper elements-line">
                            <div class="separator__line line-left"></div>
                            <div class="elements-title__wrapper">
                                <h2 class="section__title elements__title">Pricing Plan</h2>
                            </div>
                            <div class="separator__line line-right"></div>
                        </div>
                        <p class="muted-text"></p>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow fadeInUp" data-wow-delay=".3s">
                @foreach ($planpackages as $planpackage)

                @if($planpackage)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="pricing-wrapper pricing-item">
                        <div class="pricing-content">
                            <h5 class=" pricing-title">{{$planpackage->title}}</h5>
                            <p class="pricing-description">{{$planpackage->description}}</p>
                            <h2 class="pricing-amount">
                                <span class="dollar-sign color-primary">$</span>
                                {{$planpackage->price}}
                                <span class="duration">/monthly</span>
                            </h2>
                        </div>
                        <div class="pricing-btn">
                            <a class="bd-btn btn-style btn-hover-x btn-black w-100" href="booking.html">Book Now</a>
                        </div>
                        <div class="pricing-feature">
                            <ul class="pricing-list">
                            @php
                                $polices=explode(",",$planpackage->polices)
                            @endphp
                            @foreach (json_decode($planpackage->polices) as $police)
                                <li>
                                    <i class="fa-regular fa-check"></i>
                                    {{$police}}
                                </li>
                                 @endforeach
                               
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
             
            </div>
        </div>
    </section>
    <!-- Pricing style two end -->
            	  @endif

    
</main>
@endsection
