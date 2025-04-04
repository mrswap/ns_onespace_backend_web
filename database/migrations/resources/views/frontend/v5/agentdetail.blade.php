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
<!-- Body main wrapper start -->
        <main>

            <!-- Breadcrumb area start -->
            <section class="bd-breadcrumb-area p-relative fix">
                <!-- breadcrumb background image -->
                <div class="bd-breadcrumb-bg"
                    data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png")}}"></div>
                <div class="bd-breadcrumb-wrapper p-relative">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <div class="bd-breadcrumb">
                                    <div
                                        class="bd-breadcrumb-content text-center">
                                        <h1 class="bd-breadcrumb-title">Agent
                                            Details</h1>
                                        <div class="bd-breadcrumb-list">
                                            <span><a href="index.html"><i
                                                        class="icon-home"></i>Home</a></span>
                                            <span>Agent Details</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb area end -->

            <!-- Agent area Start -->
            <section class="bd-agent-area section-space">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-xl-8 col-lg-8">
                            <div class="agent-item style-three wow bdFadeInUp"
                                data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="thumb-wrapper">
                                    <div class="thumb">
                                        <figure><img
                                                src="{{asset("assets/front/v5/images/agent/agent-01.png")}}"
                                                alt="agent thumb not found"></figure>
                                    </div>
                                </div>
                                <div class="content">

                                    <div class="top">
                                        <div class="review">
                                            <h3 class="title"><a href="#">{{$agents->first_name}}</a></h3>
                                            <div class="bd-rating">
                                                <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i
                                                        class="fa-solid fa-star"></i></span>
                                            </div>
                                        </div>
                                        <span class="info underline">Company
                                            Agent at
                                            <a href="agent-details.html">Modern
                                                House Real Estate</a>
                                        </span>
                                    </div>
                                    <div class="contact-list-wrapper">
                                        <ul>
                                        @php
                                        //var_dump($agents)
                                        @endphp
                                            <li class="contact-list-item">
                                                <span class="icon"><i
                                                        class="fa-regular fa-location-dot"></i></span>
                                                <span class="title">
                                                    <a target="_blank"
                                                        href="https://www.google.com/maps">{{$agents->address}},{{$agents->country}}</a>
                                                </span>
                                            </li>
                                            <li class="contact-list-item">
                                                <span class="icon"><i
                                                        class="fa-regular fa-envelope"></i></span>
                                                <span class="title">
                                                @if ($agents->show_email_addresss)
                                                    <a
                                                        href="mailto:{{$agents->email}}"><span
                                                            class="__cf_email__"
                                                            data-cfemail="790b1c181515160e3914181015571a1614">{{$agents->email}}</span></a>
                                                
                                                @else
                                                    <a
                                                        href="https://html.bdevs.net/cdn-cgi/l/email-protection#9ceef9fdf0f0f3ebdcf1fdf5f0b2fff3f1"><span
                                                            class="__cf_email__"
                                                            data-cfemail="790b1c181515160e3914181015571a1614">[email&#160;protected]</span></a>
                                                
                                                @endif
                                                
                                                    </span>
                                            </li>
                                            <li class="contact-list-item">
                                                <span class="icon"><i
                                                        class="fa-regular fa-phone-volume"></i></span>
                                                <span class="title">
                                                    <a
                                                        href="tel:{{$agents->phone}}">{{$agents->phone}}</a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="personal-info-wrapper">
                                        <ul>
                                            <li class="single-info">
                                                <strong>Service Areas:</strong>
                                                <span class="detail">Los
                                                    Angeles, Miami Beach, New
                                                    York</span>
                                            </li>
                                            <li class="single-info">
                                                <strong>Specialties:</strong>
                                                <span class="detail">Property
                                                    management, Real estate
                                                    development</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="agent-btn-wrapper">
                                        <div class="agent-btn-item">
                                            <button
                                                class="bd-btn btn-style btn-hover-x outline-btn"
                                                type="submit">Send
                                                Email</button>
                                        </div>
                                        <div class="agent-btn-item">
                                            <a
                                                class="bd-btn btn-style btn-hover-x btn-black"
                                                href="#">Get In Touch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="agent-details-info wow bdFadeInUp"
                                data-wow-delay=".5s" data-wow-duration="1s">
                                <h3 class="title">About me</h3>
                                <p>{{$agents->details}}</p>
                                <div class="agent-details-skills">
                                    <strong>Language:</strong>
                                    <span class="detail">English, Spanish,
                                        French</span>
                                </div>
                            </div>
                            <div class="agent-details-tab bd-tab wow bdFadeInUp"
                                data-wow-delay=".7s" data-wow-duration="1s">
                                <nav>
                                    <div
                                        class="nav nav-tabs p-relative bd-product-tab"
                                        id="navPresentationTab" role="tablist">
                                        <button class="nav-link active"
                                            id="nav-description-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#nav-description"
                                            type="button" role="tab"
                                            aria-controls="nav-description"
                                            aria-selected="true">Review</button>

                                        <button class="nav-link"
                                            id="nav-addInfo-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#nav-addInfo"
                                            type="button" role="tab"
                                            aria-controls="nav-addInfo"
                                            aria-selected="false">Property
                                            Summary</button>

                                    </div>
                                </nav>
                                <div class="tab-content"
                                    id="navPresentationTabContent">
                                    <div class="tab-pane fade show active"
                                        id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab"
                                        tabindex="0">
                                        <div
                                            class="bd-postbox-details-comment-wrapper">

                                            <div
                                                class="bd-postbox-details-comment-inner">
                                                <ul>
                                                    <li>
                                                        <div
                                                            class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                            <div
                                                                class="bd-postbox-details-comment-thumb">
                                                                <img
                                                                    src="{{asset("assets/front/v5/images/user/user-thumb-04.png")}}"
                                                                    alt>
                                                            </div>
                                                            <div
                                                                class="bd-postbox-details-comment-content">
                                                                <div
                                                                    class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                    <div
                                                                        class="bd-postbox-details-comment-avater">
                                                                        <h4
                                                                            class="bd-postbox-details-comment-avater-title">Lance
                                                                            Bogrol</h4>
                                                                        <span
                                                                            class="bd-postbox-details-avater-meta">12
                                                                            April,
                                                                            2023
                                                                            at
                                                                            3.50pm</span>
                                                                    </div>
                                                                    <div
                                                                        class="bd-postbox-details-comment-reply">
                                                                        <a
                                                                            href="#">Reply</a>
                                                                    </div>
                                                                </div>
                                                                <p>By defining
                                                                    and
                                                                    following
                                                                    internal and
                                                                    external
                                                                    processes,
                                                                    your team
                                                                    will
                                                                    have clarity
                                                                    on resources
                                                                    to <br>
                                                                    attract and
                                                                    retain
                                                                    customers
                                                                    for your
                                                                    business.</p>
                                                            </div>
                                                        </div>
                                                        <ul class="children">
                                                            <li>
                                                                <div
                                                                    class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                                    <div
                                                                        class="bd-postbox-details-comment-thumb">
                                                                        <img
                                                                            src="{{asset("assets/front/v5/images/user/user-thumb-05.png")}}"
                                                                            alt>
                                                                    </div>
                                                                    <div
                                                                        class="bd-postbox-details-comment-content">
                                                                        <div
                                                                            class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                            <div
                                                                                class="bd-postbox-details-comment-avater">
                                                                                <h4
                                                                                    class="bd-postbox-details-comment-avater-title">Dasy
                                                                                    Lily
                                                                                </h4>
                                                                                <span
                                                                                    class="bd-postbox-details-avater-meta">12
                                                                                    April,
                                                                                    2023
                                                                                    at
                                                                                    3.50pm</span>
                                                                            </div>
                                                                            <div
                                                                                class="bd-postbox-details-comment-reply">
                                                                                <a
                                                                                    href="#">Reply</a>
                                                                            </div>
                                                                        </div>
                                                                        <p>By
                                                                            defining
                                                                            and
                                                                            following
                                                                            internal
                                                                            and
                                                                            external
                                                                            processes,
                                                                            your
                                                                            team
                                                                            will
                                                                            have
                                                                            clarity
                                                                            on
                                                                            resources
                                                                            to
                                                                            <br>
                                                                            attract
                                                                            and
                                                                            retain
                                                                            customers
                                                                            for
                                                                            your
                                                                            business.</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                            <div
                                                                class="bd-postbox-details-comment-thumb">
                                                                <img
                                                                    src="{{asset("assets/front/v5/images/user/user-thumb-06.png")}}"
                                                                    alt>
                                                            </div>
                                                            <div
                                                                class="bd-postbox-details-comment-content">
                                                                <div
                                                                    class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                    <div
                                                                        class="bd-postbox-details-comment-avater">
                                                                        <h4
                                                                            class="bd-postbox-details-comment-avater-title">Jeremy
                                                                            C.
                                                                            Irizarry</h4>
                                                                        <span
                                                                            class="bd-postbox-details-avater-meta">12
                                                                            April,
                                                                            2023
                                                                            at
                                                                            3.50pm</span>
                                                                    </div>
                                                                    <div
                                                                        class="bd-postbox-details-comment-reply">
                                                                        <a
                                                                            href="#">Reply</a>
                                                                    </div>
                                                                </div>
                                                                <p>By defining
                                                                    and
                                                                    following
                                                                    internal and
                                                                    external
                                                                    processes,
                                                                    your team
                                                                    will
                                                                    have clarity
                                                                    on resources
                                                                    to <br>
                                                                    attract and
                                                                    retain
                                                                    customers
                                                                    for your
                                                                    business.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="post-comment-form">
                                                <div
                                                    class="post-comments-title">
                                                    <h4 class="mb-15">Leave a
                                                        Comment</h4>
                                                </div>
                                                <form>
                                                    <div class="row gy-20">
                                                        <div class="col-xl-6">
                                                            <div
                                                                class="input-box">
                                                                <input
                                                                    type="text"
                                                                    placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div
                                                                class="input-box">
                                                                <div
                                                                    class="input-box">
                                                                    <input
                                                                        type="email"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div
                                                                class="input-box">
                                                                <textarea
                                                                    cols="30"
                                                                    rows="10"
                                                                    placeholder="Type Comment here"></textarea>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bd-postbox-details-suggetions mb-20">
                                                            <div
                                                                class="bd-postbox-details-remeber">
                                                                <input
                                                                    id="remeber"
                                                                    type="checkbox">
                                                                <label
                                                                    for="remeber">Save
                                                                    my name,
                                                                    email, and
                                                                    website in
                                                                    this browser
                                                                    for
                                                                    the
                                                                    next time I
                                                                    comment.</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div
                                                                class="submit-btn">
                                                                <button
                                                                    class="bd-btn btn-style btn-hover-x btn-black"
                                                                    type="submit">Post
                                                                    Comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-addInfo"
                                        role="tabpanel"
                                        aria-labelledby="nav-addInfo-tab"
                                        tabindex="0">
                                        <div
                                            class="bd-product-details-additional-info">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Property Name</td>
                                                        <td>Almost Ready
                                                            Apartment for Sale
                                                            at Aftab Nagar,
                                                            Dhaka</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Type</td>
                                                        <td>Flat /
                                                            Apartment</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Reference no.</td>
                                                        <td> Bproperty -
                                                            ID5557642</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property For</td>
                                                        <td>Sale</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location</td>
                                                        <td>ftab Nagar,
                                                            Dhaka</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Construction
                                                            Status</td>
                                                        <td>Ready</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Size</td>
                                                        <td>1,250 katha</td>
                                                    </tr>
                                                    <tr>
                                                        <td>APrice Per
                                                            Katha</td>
                                                        <td>Call For Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transaction
                                                            Type</td>
                                                        <td>Old</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bed Room</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Balconies</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bath Room</td>
                                                        <td>5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Floor Number</td>
                                                        <td>5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garages</td>
                                                        <td>N\A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Handover Date</td>
                                                        <td>25 May, 2024</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div
                                class="agent-sidebar-wrapper bd-sidebar-sticky">
                                <div class="agent-details-widget mb-35">
                                    <h3
                                        class="sidebar-widget-title">Contact</h3>
                                    <div class="row g-3">
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <input type="text"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <div class="input-box">
                                                    <input type="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <input type="text"
                                                    placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <textarea cols="30" rows="10"
                                                    placeholder="Write Massage"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="agent-details-btn">
                                                <button
                                                    class="bd-btn btn-style btn-hover-x w-100 btn-black"
                                                    type="submit">Send
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
                                                <div
                                                    class="sidebar-widget mb-25">
                                                    <h3
                                                        class="sidebar-widget-title">Featured
                                                        Properties</h3>
                                                    <div class="sidebar-slider">
                                                        <div
                                                            class="sidebar-thumb-wrapper">
                                                            <div
                                                                class="sidebar-thumb">
                                                                <figure><img
                                                                        src="{{asset("assets/front/v5/images/agent/sidebar/agent-sidebar-01.png")}}"
                                                                        alt="agent-sidebar thumb not found"></figure>
                                                            </div>
                                                            <div
                                                                class="sidebar-content-inner">
                                                                <div
                                                                    class="content">
                                                                    <span
                                                                        class="price">$16000/mo</span>
                                                                    <h3
                                                                        class="title"><a
                                                                            href="#">Renovated
                                                                            Apartment</a></h3>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="badge-wrap agent-badge">
                                                                <a href="#"
                                                                    class="bd-badge">Featured</a>
                                                                <a href="#"
                                                                    class="bd-badge">For
                                                                    Rent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div
                                                    class="sidebar-widget mb-25">
                                                    <h3
                                                        class="sidebar-widget-title">Featured
                                                        Properties</h3>
                                                    <div class="sidebar-slider">
                                                        <div
                                                            class="sidebar-thumb-wrapper">
                                                            <div
                                                                class="sidebar-thumb">
                                                                <figure><img
                                                                        src="{{asset("assets/front/v5/images/agent/sidebar/agent-sidebar-01.png")}}"
                                                                        alt="agent-sidebar thumb not found"></figure>
                                                            </div>
                                                            <div
                                                                class="sidebar-content-inner">
                                                                <div
                                                                    class="content">
                                                                    <span
                                                                        class="price">$16000/mo</span>
                                                                    <h3
                                                                        class="title"><a
                                                                            href="#">Renovated
                                                                            Apartment</a></h3>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="badge-wrap agent-badge">
                                                                <a href="#"
                                                                    class="bd-badge">Featured</a>
                                                                <a href="#"
                                                                    class="bd-badge">For
                                                                    Rent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div
                                                    class="sidebar-widget mb-25">
                                                    <h3
                                                        class="sidebar-widget-title">Featured
                                                        Properties</h3>
                                                    <div class="sidebar-slider">
                                                        <div
                                                            class="sidebar-thumb-wrapper">
                                                            <div
                                                                class="sidebar-thumb">
                                                                <figure><img
                                                                        src="{{asset("assets/front/v5/images/agent/sidebar/agent-sidebar-01.png")}}"
                                                                        alt="agent-sidebar thumb not found"></figure>
                                                            </div>
                                                            <div
                                                                class="sidebar-content-inner">
                                                                <div
                                                                    class="content">
                                                                    <span
                                                                        class="price">$16000/mo</span>
                                                                    <h3
                                                                        class="title"><a
                                                                            href="#">Renovated
                                                                            Apartment</a></h3>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="badge-wrap agent-badge">
                                                                <a href="#"
                                                                    class="bd-badge">Featured</a>
                                                                <a href="#"
                                                                    class="bd-badge">For
                                                                    Rent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="agent-nav-pag mb-20">
                                            <!-- If we need navigation buttons -->
                                            <div class="common-navigation">
                                                <button
                                                    class="properties-slider-button-prev"><i
                                                        class="fa-regular fa-arrow-left"></i></button>
                                                <button
                                                    class="properties-slider-button-next"><i
                                                        class="fa-regular fa-arrow-right"></i></button>
                                            </div>
                                            <!-- If we need pagination -->
                                            <div class="properties-pagination">
                                                <div
                                                    class="bd-swiper-dot text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- featured properties end -->
                                <!-- latest post start -->
                                <div class="sidebar-widget mb-35">
                                    <h3 class="sidebar-widget-title">Latest
                                        Posts</h3>
                                    <div class="sidebar-widget-content">
                                        <div class="sidebar-blog-item-wrapper">
                                            <div class="sidebar-blog-item">
                                                <div class="sidebar-blog-thumb">
                                                    <a href="blog-details.html">
                                                        <img
                                                            src="{{asset("assets/front/v5/images/blog/sidebar/blog-sm-01.png")}}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                                <div
                                                    class="sidebar-blog-content">
                                                    <div
                                                        class="sidebar-blog-meta">
                                                        <span>12 April,
                                                            2023</span>
                                                    </div>
                                                    <h3
                                                        class="sidebar-blog-title">
                                                        <a
                                                            href="blog-details.html">From
                                                            Fixer-Uppers to
                                                            Dream Homes Tips</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="sidebar-blog-item">
                                                <div class="sidebar-blog-thumb">
                                                    <a href="blog-details.html">
                                                        <img
                                                            src="{{asset("assets/front/v5/images/blog/sidebar/blog-sm-02.png")}}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                                <div
                                                    class="sidebar-blog-content">
                                                    <div
                                                        class="sidebar-blog-meta">
                                                        <span>8 July,
                                                            2023</span>
                                                    </div>
                                                    <h3
                                                        class="sidebar-blog-title">
                                                        <a
                                                            href="blog-details.html">Navigating
                                                            Rental Market
                                                            Dynamics Tips</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="sidebar-blog-item">
                                                <div class="sidebar-blog-thumb">
                                                    <a href="blog-details.html">
                                                        <img
                                                            src="{{asset("assets/front/v5/images/blog/sidebar/blog-sm-03.png")}}"
                                                            alt="image">
                                                    </a>
                                                </div>
                                                <div
                                                    class="sidebar-blog-content">
                                                    <div
                                                        class="sidebar-blog-meta">
                                                        <span>12 April,
                                                            2023</span>
                                                    </div>
                                                    <h3
                                                        class="sidebar-blog-title">
                                                        <a
                                                            href="blog-details.html">Strategies
                                                            for Building Wealth
                                                            Through
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
            <!-- Agent area end -->

        </main>
        <!-- Body main wrapper end -->
@endsection
