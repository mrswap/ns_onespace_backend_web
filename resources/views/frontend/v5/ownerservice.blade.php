@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-v$version")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.css">
<style type="text/css">
.calculate {
    text-align: center;
    /* background-color: #fff; */
    padding-bottom: 20px;
}

.region-main-wraper {
    border-radius: 10px 10px 10px 10px;
    padding: 0px 15px;
    background-color: transparent;
    border: none;
    width: 90%;
    margin: 0 auto;
}

.calculate-wrap {
    height: 140px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.calculate-amount {
    color: rgba(255, 255, 255, .6);
    font-size: 14px;
    font-weight: 400;
    font-family: Roboto, sans-serif;
    line-height: 26px;
}

.calculate-text {
    color: #fff;
    font-weight: 700;
    font-family: Roboto, sans-serif;
    font-size: 45px;
    margin: 0;
}

.calculation-results-bottom {
    margin-top: 100px;
    color: #000;
}

.calculation-results-top {
    margin-top: 10px;
    color: #000;
}

.calculate-input {
    background: transparent;
    border: none;
    color: #fff;
    font-weight: 700;
    font-family: Roboto, sans-serif;
    font-size: 45px;
    max-width: 170px;
    outline: none;
    width: 154px;
    text-align: center;
}

.calculation-results-top p,
.calculation-results-bottom p {
    font-size: 30px;
    font-weight: 600;
    color: #000;
    line-height: 45px;
}

.calculate-slider {
    padding: 0 60px;
}

.calculate-inner {
    display: flex;
    justify-content: space-between;
    padding: 0 90px;
}

.calculate-block {
    font-size: 14px;
    font-family: "Roboto", sans-serif;
    font-weight: 400;
    color: #A1AFC3;
    text-align: center;
    line-height: 26px;
}

.calculate-block span {
    font-weight: 700;
    font-size: 25px;
    color: #1a273a;
}

.calculate-btn-wrapper {
    margin: 30px 0 0;
}

.noUi-handle {
    background: #d30952;
    box-shadow: 0 11px 19px 0 rgba(12, 71, 124, 0.48);
    border-radius: 50%;
    border: none;
    outline: none;
    cursor: pointer;
}

.noUi-handle:before {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.noUi-handle:after {
    display: none;
}

.noUi-horizontal .noUi-handle {
    width: 52px;
    height: 52px;
    top: -21px;
}

.noUi-target {
    background: #A1AFC3;
    border: none;
    box-shadow: none;
    outline: none;
}

.noUi-connects {
    border-radius: 10px;
}

.noUi-connect {
    background: #d30952;
}

.noUi-horizontal .noUi-tooltip {
    font-weight: 700;
    font-size: 14px;
    color: #1a273a;
    line-height: 26px;
    text-align: center;
    background: #FFFFFF;
    box-shadow: 0 11px 28px 0 rgba(255, 255, 255, 0.3);
    padding: 5px 11px;
    border: none;
    border-radius: 20px;
    text-transform: uppercase;
    font-family: "Roboto", sans-serif;
}

.noUi-horizontal .noUi-tooltip:after {
    position: absolute;
    content: '';
    width: 10px;
    height: 10px;
    left: 50%;
    transform: translateX(-50%) rotate(45deg);
    bottom: -5px;
    background: white;
}

@media only screen and (min-width: 576px) and (max-width: 767px),
(max-width: 575px) {
    .region-main-wraper {
        width: 100%;
        padding: 0px;
    }
}
</style>

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
<meta property="og:image"
    content="{{ asset('{{asset("assets/front/v5/front/v5<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">
/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')

<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg"
            data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png" ) }}"></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Owner Services</h1>
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
                            Owner Services
                        </span>
                        <h2 class="section-title title-animation">Solution for Owner</h2>
                    </div>

                    <div class="content">
                        <p class="description">Managing your property doesn’t have to be a headache. With Onespace, we
                            offer comprehensive property management services that take care of everything from finding
                            tenants to maintaining your property. Whether you’re renting or selling, we help you get the
                            most out of your investment with minimum effort on your part.</p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Services for Property Owners:</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                Full property management services
                            </li>
                            <li class="pb-4">
                                Tenant screening and assured rent on time
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
                        <a class="bd-btn btn-style btn-hover-x" href="#pricingPlan"><span class="text">Purchase
                                Plan</span></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                    <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">

                        <div class="thumb">
                            <div class="ractangle"></div>
                            <figure> <img src="{{asset("assets/front/v5/images/owner-service.webp" ) }}"
                                    alt="about thumb not found">
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
                            <h3 class="title">Tenant Management</h3>
                            <p class="description"> - Tenant screening, lease drafting, and rent collection.</p>
                            <p class="description"> - Handling all tenant inquiries and concerns.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
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
                            <span><i class="icon-security-features"></i></span>
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
                            <span><i class="icon-security-features"></i></span>
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
                            <span><i class="icon-security-features"></i></span>
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
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Tailored Solutions for Every Property</h3>
                            <p class="description">- Custom property management plans for residential, commercial, and
                                industrial properties.</p>
                            <p class="description"> - Experience in managing single-family homes, condos, offices, and
                                industrial complexes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Aggregator Listing</h3>
                            <p class="description">- Easily list your property across multiple platforms simultaneously
                                to reach a wider audience quickly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="core-feature-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="icon">
                            <span><i class="icon-security-features"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Dedicated Relationship Manager</h3>
                            <p class="description">- Receive personalized support from a dedicated relationship manager
                                throughout your entire process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
                                        $descField = 'desc_' . $i;
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


        <!-- key feature end -->
    @if ($services && $services->isNotEmpty())
    <!-- services area start -->
    <section class="bd-services-area section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Services</span>
                        <h2 class="section-title title-animation">Owner Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="services-item-wrapper">
                    @foreach ($services as $service)
                        @if ($service)
                        <div class="services-item style-three wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <span class="icon">
                                <i class="{{ !empty($service->iconimage) ? $service->iconimage : 'icon-home-buy' }}"></i>
                            </span>
                            <div class="content">
                                <h3 class="title underline">
                                    <a href="#">{{ $service->title }}</a>
                                </h3>
                                <p class="description">
                                    {!! $service->description !!}
                                </p>
                            </div>
                            <div class="services-btn">
                                <a class="bd-half-outline-btn" href="#"><span class="text">Learn more</span></a>
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
    <section class="bd-services-area section-space ">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#sendOtpForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
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
            url: "{{ route('vendor.otp.login.verify') }}",
            method: "POST",
            data: {
                property_id: $('#property_id1').val(),
                phone: $('#phone').val(),
                otp: $('#otp').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href =
                    '{{ route("vendor.login") }}'; // Redirect to a new page or reload
                } else {
                    alert(response.error);
                }
                alert(response.success);

            },
            error: function(xhr) {
                alert(xhr.responseJSON.error);
            }
        });
    });

    $('.book_now').on('click', function(e) {
        $.ajax({
            // url: '/check-session',
             url: '{{ route('check-session')}}',
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

@endsection