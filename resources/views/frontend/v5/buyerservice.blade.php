@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")



@section('content')
<!-- Body main wrapper start -->
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background={{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png")}}></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Buyer Services</h1>
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
                            Buyer Services
                        </span>
                        <h2 class="section-title title-animation">Solution for Buyer</h2>
                    </div>

                    <div class="content">
                        <p class="description">At Onespace, finding your dream home is a breeze—and the best part? We
                            don’t charge buyers any fees! Our platform offers a wide selection of properties tailored to
                            your preferences and budget, all with zero cost to you. From property exploration to closing
                            the deal, we provide everything you need in one place, making your home-buying journey
                            seamless and stress-free.</p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Services for Buyers:</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                Verified property listings
                            </li>
                            <li class="pb-4">
                                Easy scheduling for property visits
                            </li>
                            <li class="pb-4">
                                Property comparison tools
                            </li>
                            <li class="pb-4">
                                <strong>No commission or fees for buyers</strong>
                            </li>
                            <li class="pb-4">
                                Comprehensive support for legal and documentation processes
                            </li>
                        </ul>
                    </div>

                    <div class="about-btn mt-2">
                        <a class="bd-btn btn-style purchase-plan-btn" href="#"><span class="text">Purchase
                                Plan</span></a>
                        <a class="bd-btn btn-style btn-hover-x" href="#"><span class="text">Plan Buyer For
                                Free</span></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">
                        <!-- <a class="about-play-btn" href="#!">
                        <span class="title"><img src={{asset("assets/front/v5/images/logo/ONESPACE-favicon.png")}}"></span>
                    </a> -->
                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src={{asset("assets/front/v5/images/buyer-service.jpeg")}} alt="about thumb not found">
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
                            <h3 class="title">Wide Range of Property Listings</h3>
                            <p class="description"> - Explore thousands of verified properties across various
                                categories, completely free of charge.</p>
                            <p class="description"> - Advanced search filters to narrow down properties by price,
                                location, type, and amenities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Zero Commission for Buyers</h3>
                            <p class="description"> - No hidden costs, no commissions—our services for buyers are
                                completely free.</p>
                            <p class="description"> - Enjoy a hassle-free buying process without worrying about extra
                                fees.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Personalized Assistance</h3>
                            <p class="description">- A dedicated relationship manager to assist you throughout the
                                entire process.</p>
                            <p class="description"> - Help with property selection, negotiation, and legal
                                documentation—at no extra cost.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Convenient Property Visits</h3>
                            <p class="description">- Easily schedule property visits at your convenience, whether
                                in-person or virtual.</p>
                            <p class="description">- Efficiently organize multiple visits in one day for a smoother
                                experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Transparent and Secure Transactions</h3>
                            <p class="description"> - We ensure complete transparency at every stage of the transaction.
                            </p>
                            <p class="description"> - Secure handling of your financial details and documentation for
                                peace of mind.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Full Legal Support</h3>
                            <p class="description">- Comprehensive assistance with legal documentation, title
                                verification, and registration—all without any charge to you.</p>
                            <p class="description"> - Support with property tax, loan processing, and regulatory
                                approvals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Post-Purchase Support</h3>
                            <p class="description">- Continued assistance after purchase with registration, possession,
                                and property handover.</p>
                            <p class="description">- Guidance on home setup, insurance, and other post-purchase
                                services—all free of cost.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Expert Market Insights</h3>
                            <p class="description">- Access to in-depth market insights and property valuations to help
                                you make informed decisions.</p>
                            <p class="description">- Stay up-to-date with neighborhood trends, future developments, and
                                property price forecasts—all at no cost to you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Loan Assistance</h3>
                            <p class="description">- Get help in securing the best home loan offers from top financial
                                institutions.</p>
                            <p class="description">- Our experts assist with the paperwork and eligibility
                                process—completely free for buyers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Custom Alerts & Notifications</h3>
                            <p class="description">- Set up alerts for new properties that match your requirements,
                                delivered straight to your inbox.</p>
                            <p class="description">- Get notifications for price drops or changes in properties you are
                                interested in.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Neighborhood Insights</h3>
                            <p class="description">- Get detailed information about the neighborhood, including schools,
                                hospitals, transport, and lifestyle amenities.</p>
                            <p class="description">- Compare different locations based on connectivity and
                                infrastructure, helping you make the right choice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 pt-5">
                    <div class="content text-center">
                        <p class="description text-dark">At Onespace, we make the home-buying experience easy,
                            transparent, and completely free for buyers. Let us help you find the perfect property with
                            no extra fees—just a smooth and enjoyable journey to your new home.</p>
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
                        <h2 class="section-title title-animation">Buyer Services</h2>
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
                    {{-- <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                        <span class="icon"><i class="icon-home-sell"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">Lorem ipsum</a>
                            </h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ex aut, porro eligendi vel veritatis sed necessitatibus ea sunt quaerat doloremque inventore odit assumenda.</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div>
                    <div class="services-item style-three has-large wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <span class="icon"><i class="icon-rent-home"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">Lorem ipsum</a>
                            </h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ex aut, porro eligendi vel veritatis sed necessitatibus ea sunt quaerat doloremque inventore odit assumenda.</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div>
                    <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <span class="icon"><i class="icon-location"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">Lorem ipsum</a>
                            </h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ex aut, porro eligendi vel veritatis sed necessitatibus ea sunt quaerat doloremque inventore odit assumenda.</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div>
                    <div class="services-item style-three has-large wow bdFadeInUp" data-wow-delay=".8s" data-wow-duration="1s">
                        <span class="icon"><i class="icon-value-for-money"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">Lorem ipsum</a>
                            </h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ex aut, porro eligendi vel veritatis sed necessitatibus ea sunt quaerat doloremque inventore odit assumenda.</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div>
                    <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                        <span class="icon"><i class="icon-cost-effective"></i></span>
                        <div class="content">
                            <h3 class="title underline">
                                <a href="#">Lorem ipsum</a>
                            </h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ex aut, porro eligendi vel veritatis sed necessitatibus ea sunt quaerat doloremque inventore odit assumenda.</p>
                        </div>
                        <div class="services-btn">
                            <a class="bd-half-outline-btn" href="#"><span class="text">Learn
                                    more</span></a>
                        </div>
                    </div> --}}
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
<!-- Body main wrapper end -->
@endsection