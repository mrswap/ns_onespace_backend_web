@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")

@section('content')
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
                                <h1 class="bd-breadcrumb-title">Sell @ 1%</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                    <span>our process</span>
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
                <div class=" col-xxl-6 col-xl-6 col-lg-6 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Selling Process</span>
                        <h2 class="section-title title-animation">Sell @ 1% – Revolutionizing Real Estate in India
                        </h2>
                    </div>
                    <h5 class="section-title title-animation pb-4">What is Sell @ 1%?</h5>
                    <div class="content">
                        <p class="description">At OneSpace, we believe in simplifying real estate transactions. Our
                            unique “Sell @ 1%” service guarantees you a streamlined, full-service experience, while
                            charging only 1% commission on the sale price. No hidden costs, no inflated fees—just a
                            transparent, affordable way to connect sellers with genuine buyers, where traditional
                            brokers charge between 3-5%.
                        </p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Why Pay More?</h5>
                    <div class="content">
                        <p class="description">With OneSpace, you don’t have to compromise on quality. We provide
                            the same services that high-commission brokers do, but for a fraction of the cost. Our
                            experienced professionals ensure that your property gets the best exposure, with
                            top-notch marketing strategies and personalized support throughout the selling process.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-two wow bdFadeInRight text-end" data-wow-delay=".4s">
                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("public/assets/img/own/graph.png" ) }} " alt="OneSpace.com Image">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">

                <div class="">
                    <div class="about-thumb-wrap style-two wow bdFadeInRight text-end" data-wow-delay=".4s">
                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("public/assets/img/own/chart.png" ) }} " alt="OneSpace.com Image">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- About area end -->

    <!-- Make us Different start  -->
    <section class="bd-Process-area section-space-bottom theme-bg-primary section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>Unique Advantage </span>
                        <h2 class="section-title title-animation">What Makes Us Different?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 py-3">
                    <div class="content">
                        <h5 class="title pb-3">1. Lower Commission, Full end to end Service</h5>
                        <p class="description text-dark">Where other brokers charge 3-5% on a deal, we charge only
                            1%. That means you save more on your property sale without sacrificing any essential
                            services. We believe that selling your property should be efficient and affordable, not
                            a drain on your hard-earned equity.
                        </p>
                    </div>
                    <div class="content my-5">
                        <h5 class="title pb-3">2. Expert Marketing & Exposure</h5>
                        <p class="description text-dark">Our platform ensures maximum exposure for your property.
                            Your listing will appear on all leading real estate websites, including our own,
                            ensuring that potential buyers can easily find your property. We also handle
                            professional Photoshoot, online listings, and promotional campaigns, ensuring that your
                            property stands out in a competitive market.
                        </p>
                    </div>
                    <div class="content">
                        <h5 class="title pb-3">3. Transparent Process</h5>
                        <p class="description text-dark">We provide clear, transparent communication at every step.
                            From listing your property to negotiating offers, OneSpace ensures you stay informed,
                            without the fine print or surprise fees.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Make us Different end  -->

    <!-- Process area start -->
    <section class="bd-Process-area section-space-bottom section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>Process </span>
                        <h2 class="section-title title-animation">Our Process </h2>
                    </div>

                </div>
            </div>
            <div class="process-item-wrapper">
                <div class="row">
                    <div class="process-item col-md-4 text-end">
                        <div class="content rightAfter">
                            <h3 class="title">Streamlined Listing Process</h3>
                            <p class="description">Our experts simplify the listing process, providing professional
                                photos and descriptions to make your property shine. We ensure it reaches top platforms
                                and real estate sites for maximum visibility, helping you sell faster.
                            </p>
                        </div>
                        <div class="content rightAfter">
                            <h3 class="title">Simplified Legal Compliance</h3>
                            <p class="description">Stay compliant with ease as we handle the legal aspects of your
                                property transactions, ensuring a smooth and secure process every time.
                            </p>
                        </div>
                        <div class="content rightAfter">
                            <h3 class="title">Managing Buyer Inquiries</h3>
                            <p class="description">We handle all buyer communications and schedule viewings, making
                                the process hassle-free for you.</p>
                        </div>
                    </div>
                    <div class="process-item col-md-4 text-center">
                        <div class="process-img-container">
                            <img fetchpriority="high" decoding="async" width="457" height="457"
                                src="{{asset("assets/front/v5/images/favicon.svg")}}" class="attachment-large size-large wp-image-9919"
                                alt="onespace-img">
                        </div>
                    </div>
                    <div class="process-item col-md-4 text-start">
                        <div class="content leftAfter">
                            <h3 class="title">Expert Negotiation Support</h3>
                            <p class="description">Our team guides you through negotiations, helping secure the best
                                price for your property while ensuring a smooth and successful deal. We advocate for
                                your interests at every stage, maximizing your profit.
                            </p>
                        </div>
                        <div class="content leftAfter">
                            <h3 class="title">Seamless Deal Closure</h3>
                            <p class="description">We manage all paperwork and formalities to close the deal,
                                ensuring everything runs smoothly and on time.</p>
                        </div>
                        <div class="content leftAfter">
                            <h3 class="title">Post-Sale Assistance</h3>
                            <p class="description">After the sale, we continue to assist with final paperwork and
                                transition needs, ensuring a smooth and hassle-free process.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="process-item-wrapper">
                    <div class="content text-center">
                        <h3 class="title process-sub-title">
                            We look forward to helping you sell your property!
                        </h3>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Process area end -->

    <!-- calculator area start -->
    <section class="section-space bd-calculator-area theme-bg-primary">
        <div class="section-title-wrapper mb-50 text-center">
            <span class="section-subtitle uppercase"><i class="icon-home"></i>Calculator</span>
            <h2 class="section-title title-animation">Commission Calculator</h2>
        </div>
        <!-- <div class="region-main-wraper shadow">
        <div class="region-main ">
            <div class="wrapper">
                <div class="row slider-calculator" id="slider-calculator_17e87844f2200712">
                    <div class="col-xs-12 text-center">
                        You'll Save
                        <div class="calculator-label" data-property-calculator="save">₹0.0</div>
                    </div>
                    <div class="slider-wrapper col-xs-12">
                        <input type="range" min="3000" max="1000000" step="250" value="3000"
                            data-property-calculator="range" class="styled-slider" style="display: none;">
                        <div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0">
                            <div class="rangeslider__fill" style="width: 0;"></div>
                            <div class="rangeslider__handle" style="left: 0;">
                                <div class="rangeslider__handle:after"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-output-row-12">
                        <div class="sub-output-row">
                            <div class="col-sm-12 col-md-6 text-start sub-output">
                                Your Property Value
                                <input type="number" name="property_value" class="calculator-label"
                                    data-property-calculator="value" value="3000" min="3000" max="1000000"
                                    step="250" style="display: block;">
                            </div>
                            <div class="col-sm-12 col-md-6 text-end sub-output">
                                Typical Agency <br>
                                <span class="calculator-label" data-property-calculator="commision">₹0.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        <div class="region-main-wraper ">
            <div class="calculate">
                <div class="calculate-wrap">
                    <div class="calculate-top">
                        <!-- Additional calculations displayed below the slider -->
                        <div class="calculation-results-top">
                            <p>You'll Save: <br> ₹<span id="save-amount">0</span></p>
                        </div>
                        <p class="calculate-text"><input type="hidden" id="text" class="calculate-input" readonly></p>
                    </div>
                </div>

                <div class="calculate-slider">
                    <div id="slider"></div>
                </div>

                <!-- Additional calculations displayed below the slider -->
                <div class="calculation-results-bottom">
                    <p>Typical Agency: <br> ₹<span id="agency-commission">0</span></p>

                </div>

                <div class="calculate-btn-wrapper" data-bs-toggle="modal" data-bs-target="#apprasialModel">
                    <a href='#!' class="calculate-btn bd-btn btn-style btn-hover-x">Get Appraisal</a>
                </div>
            </div>
        </div>
    </section>
    <!-- calculator area start -->

    <!-- Why Choose Us area start -->
    <section class="bd-about-area section-space p-relative">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                Your Trusted Partner in Success
                            </span>
                            <h2 class="section-title title-animation is-br-none">Why Choose Us?</h2>
                            <div class="types-list pt-30">
                                <ul class="ms-4 mt-5">
                                    <li class="pb-4">
                                        <strong> 1% Commission, No Compromise on Service</strong>
                                    </li>
                                    <li class="pb-4">
                                        <strong> Maximum Exposure on All Major Platforms</strong>
                                    </li>
                                    <li class="pb-4">
                                        <strong> Full Support From Listing to Closing</strong>
                                    </li>
                                    <li class="pb-4">
                                        <strong> Transparent, Hassle-Free Selling Process</strong>
                                    </li>
                                    <li class="pb-4">
                                        <strong> Significant Savings Compared to Traditional Brokers</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7">
                    <div class="about-thumb-wrap style-one">
                        <div class="round-box-inner">
                            <div class="round-box">
                                <span class="round one"></span>
                                <span class="round two"></span>
                                <span class="round three"></span>
                            </div>
                            <div class="round-icon">
                                <figure class="p-2"><img src="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png")}}" alt="image"
                                        width="60px"></figure>
                            </div>
                        </div>
                        <div class="thumb-one">
                            <figure> <img src="{{asset("assets/front/v5/images/about/about-thumb-01.png")}}" alt="image"></figure>
                        </div>
                        <div class="thumb-two-inner">
                            <div class="thumb-two">
                                <figure><img src="{{asset("assets/front/v5/images/about/about-thumb-02.png")}}" alt="image"></figure>
                            </div>
                            <div class="thumb-two">
                                <figure> <img src="{{asset("assets/front/v5/images/about/about-thumb-03.png")}}" alt="image"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us area end -->

    <!-- Additional Services area end -->
    <section class="bd-services-item section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Benefits</span>
                        <h2 class="section-title title-animation">Additional Services and Benefits</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: bdFadeInUp;">
                        <div class="content text-start">
                            <h3 class="title">
                                Professional Photoshoot & Videoshoot
                            </h3>
                            <p class="description">We showcase your property in the best light with professional
                                photos and videos, giving buyers a clear view of what you have to offer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: bdFadeInUp;">
                        <div class="content text-start">
                            <h3 class="title">
                                Digital Marketing Campaigns
                            </h3>
                            <p class="description">Our digital marketing team uses the latest techniques to market
                                your property to the right audience, ensuring that it gets noticed by potential
                                buyers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.7s; animation-name: bdFadeInUp;">
                        <div class="content text-start">
                            <h3 class="title">
                                Free Property Valuation
                            </h3>
                            <p class="description">Get a free, accurate valuation of your property based on current
                                market trends, so you know exactly where your property stands.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.7s; animation-name: bdFadeInUp;">
                        <div class="content text-start">
                            <h3 class="title">
                                Full Transaction Support
                            </h3>
                            <p class="description">From managing paperwork to ensuring a smooth transaction, our
                                team supports you throughout the entire process, so you can sell with confidence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Additional Services area end -->
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
                            <h5 class=" pricing-title">{{$planpackage->offer_name}}</h5>
                            <p class="pricing-description">{{$planpackage->description}}</p>
                            <h2 class="pricing-amount">
                                <span class="dollar-sign color-primary">₹</span>
                                {{$planpackage->price}}
                                <span class="duration">/monthly</span>
                            </h2>
                        </div>
                        <div class="pricing-btn">
                            <!-- <a class="bd-btn btn-style btn-hover-x btn-black w-100" href="#">
                                <i id="book_now">Book Now</i>
                            </a> -->
                            <!-- <a class="bd-btn btn-style btn-hover-x btn-black w-100" href="#" id="book_now">
                                <span><i id="book_now1"></i>Book Now</span>
                            </a> -->
                            <button type="button" id="book_now" class="bd-btn btn-style btn-hover-x btn-black w-100 book_now">
                                Book Now
                            </button>
                        </div>
                        <div class="pricing-feature">
                            <ul class="pricing-list">
                                @for ($i = 1; $i <= 8; $i++)
                                    @php
                                    $descField='desc_' . $i;
                                    @endphp
                                    @if (!empty($planpackage->$descField))
                                    <li>
                                        <i class="fa-regular fa-check"></i>
                                        {{$planpackage->$descField}}
                                    </li>
                                    @endif
                                    @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
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
    <!-- Pricing style two end -->
</main>
@endsection

<div class="modal fade" id="apprasialModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <section class="bd-contact-form">
                    <div class="container">
                        <div class="row gy-24 justify-content-between">
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="section-title-wrapper anim-wrapper animation-style-3 mb-30">
                                    <span class="section-subtitle uppercase mb-20"> <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.5859 7.23047C16.668 7.3125 16.7227 7.42188 16.75 7.55859C16.7227 7.66797 16.6953 7.75 16.6133 7.83203L16.0391 8.48828C15.957 8.57031 15.8477 8.625 15.7109 8.625C15.6016 8.625 15.4922 8.59766 15.4102 8.51562L15 8.13281V13.875C15 14.3672 14.5898 14.75 14.125 14.75H3.625C3.13281 14.75 2.75 14.3672 2.75 13.875V8.13281L2.3125 8.51562C2.23047 8.59766 2.12109 8.625 2.01172 8.625C1.875 8.625 1.76562 8.57031 1.68359 8.48828L1.10938 7.83203C1.02734 7.77734 0.972656 7.66797 0.972656 7.55859C0.972656 7.42188 1.05469 7.3125 1.13672 7.23047L8.13672 1.05078C8.30078 0.886719 8.62891 0.75 8.875 0.75C9.09375 0.75 9.42188 0.886719 9.58594 1.05078L12.375 3.48438V2.0625C12.375 1.84375 12.5664 1.625 12.8125 1.625H14.5625C14.7812 1.625 15 1.84375 15 2.0625V5.80859L16.5859 7.23047ZM10.625 8.92578V6.60156C10.5977 6.27344 10.3516 6.02734 10.0234 6H7.69922C7.37109 6.02734 7.125 6.27344 7.125 6.60156V8.92578C7.125 9.25391 7.37109 9.5 7.69922 9.5H10.0234C10.3516 9.5 10.5977 9.25391 10.625 8.92578Z" fill="#ED6E5A" />
                                            </svg>
                                        </span>Contact Us</span>
                                    <h3 class="section-title title-animation mb-20">Send us a massage!</h3>
                                    <div class="section-divider mb-25"></div>
                                    <div class="contact-social">
                                        <span class="contact-social-title d-block mb-20">Follow Us here:</span>
                                        <div class="contact-info-social style-two">
                                            <ul>
                                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-threads"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="contact-wrapper">
                                    <form class="form" enctype="multipart/form-data" action="<?php echo env('APP_URL') . '/contact_us'; ?>" method="POST">
                                        <input type="hidden" name="_token" value="xvdF2nuadeXYxGGQyqV4uRnzpv59UozgdkRLNE4s">
                                        <div class="contact-from">
                                            <div class="row g-5 align-items-center justify-content-center">
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="name" type="text" placeholder="Your Name">
                                                            <div class=""><span><i class="fa-solid fa-user"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="email" type="text" placeholder="Your Email">
                                                            <div class=""><span><i class="fa-solid fa-envelope"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="phone" type="text" placeholder="Your Phone">
                                                            <div class=""><span><i class="fa-solid fa-phone"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="subject" type="text" placeholder="Subject">
                                                            <div class=""><span><i class="fa-solid fa-book"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <textarea required name="message" placeholder="Your Message"></textarea>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact form area end -->

            </div>
        </div>
    </div>
</div>