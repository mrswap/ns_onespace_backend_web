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
<meta property="og:image"
    content="{{ asset('{{asset("assets/front/v5<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">
/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg"
            data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png" ) }} "></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Comprehensive Property Management</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                    <span>Management</span>
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
    <section class="bd-about-area section-space p-relative">
        <div class="container">
            <div class="row g-5">
                <div class=" col-xxl-6 col-xl-6 col-lg-6 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            Comprehensive Property Management
                        </span>
                        <h2 class="section-title title-animation">Expert Property Management for Your Real Estate
                            Investments</h2>
                    </div>

                    <div class="content">
                        <p class="description">
                            Maximize your property’s potential with our full-suite property management services. Whether
                            it's residential, commercial, or industrial real estate, we take the hassle out of managing
                            your property while ensuring it runs smoothly and generates consistent returns.
                        </p>
                    </div>
                    <h5 class="section-title title-animation py-4 mt-2">Types of Properties We Manage</h5>
                    <div class="types-list">
                        <ul class="ms-4 mt-2">
                            <li class="pb-4">
                                <strong> Residential:</strong> Single-family homes, apartments, and condos.</p>
                            </li>
                            <li class="pb-4">
                                <strong> Commercial:</strong> Retail spaces, offices, and co-working environments.</p>
                            </li>
                            <li class="pb-4">
                                <strong> Industrial:</strong> Warehouses, manufacturing facilities.</p>
                            </li>
                            <li class="pb-4">
                                <strong> Special-Purpose:</strong> Theaters, resorts, sports arenas, and more.</p>
                            </li>
                        </ul>
                    </div>

                    <div class="about-btn mt-2">
                        <a class="bd-btn btn-style btn-hover-x" href="#pricingPlan"><span class="text">Purchase
                                Plan</span></a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 order-0 order-lg-1">
                    <div class="thumb">
                        <div class="ractangle"></div>
                        <figure> <img src="{{asset("assets/front/v5/images/property-management.jpeg" ) }} "
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
                            <span><i class="icon-efficiency"></i></span>
                        </div>
                        <div class="content">
                            <h3 class="title">Aggregator Listing</h3>
                            <p class="description">Easily list your property across multiple platforms simultaneously to
                                reach a wider audience quickly.</p>
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
                            <button type="button" id="book_now" class="bd-btn btn-style btn-hover-x btn-black w-100 book_now">
                            Purchase Now
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
    
    @if ($services && $services->isNotEmpty())
    <!-- services area start -->
    <section class="bd-services-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Services</span>
                        <h2 class="section-title title-animation">Property Management Services</h2>
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
                                {{$service->description}}</p>
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
               // alert(response.success);

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