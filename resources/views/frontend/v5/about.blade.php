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
<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<!-- Body main wrapper start -->
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png") }} "></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">About Us</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                    <span>About Us</span>
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
            <div class="row g-5 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                {{$aboutInfo->title}}
                            </span>
                            <h2 class="section-title title-animation is-br-none">{{$aboutInfo->sub_title}}</h2>
                        </div>
                        <div class="about-tab">
                            <div class="about-tab-contnent mb-3">
                                <p class="description">
                                    {!! $aboutInfo->description !!}

                                </p>
                            </div>

                        </div>
                        <!-- <div class="about-btn">
                                <a class="bd-half-outline-btn" href="about.html"><span class="text">know More</span></a>
                            </div> -->
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="ps-3 pe-3">
                        <div class="thumb-one">
                            <figure> <img src="{{asset("assets/front/v5/images/about.webp") }} " alt="image"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area end -->

    <!-- Services area start -->
    <section class="bd-services-item section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Services</span>
                        <h2 class="section-title title-animation">What we provide</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="content text-start">
                            <h3 class="title">
                                Discover Your Ideal Property
                            </h3>
                            <p class="description">At ONESPACE, finding your perfect property is effortless. Whether you’re seeking a cozy home, a stylish apartment, or a versatile office space, our extensive listings cater to every need. With user-friendly search tools, you can easily filter by location, price, and features to pinpoint exactly what you’re looking for. Our detailed property descriptions and high-quality images make exploring options straightforward. Let our experienced team guide you through a seamless search process, ensuring you find a property that fits your lifestyle. Start your journey with us and discover the ideal space for you today.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <div class="content text-start">
                            <h3 class="title">
                                Effortless Property Selling

                            </h3>
                            <p class="description">Selling your property is a breeze with ONESPACE. Our streamlined process is designed to make your selling experience smooth and stress-free. From crafting engaging listings to utilizing the latest marketing strategies, we ensure your property gets maximum exposure. Our team of experts handles every detail, from staging advice to negotiations, so you can focus on your next move. With our extensive network and proven techniques, we’ll help you achieve the best possible sale swiftly and efficiently. Trust us to turn your property into a successful sale with minimal effort on your part.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="content text-start">
                            <h3 class="title">
                                Reliable Property Management Services

                            </h3>
                            <p class="description">We also offer comprehensive property management services to ensure your investment is well taken care of. From maintenance and repairs to tenant relations, our dedicated team handles it all, providing you with peace of mind and allowing you to enjoy the benefits of property ownership without the hassle.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                        <div class="content text-start">
                            <h3 class="title">
                                Our Commitment to Excellence
                            </h3>
                            <p class="description">With years of experience in the real estate industry, we pride ourselves on our deep knowledge of the market and our commitment to customer satisfaction. Our team is composed of passionate professionals who are dedicated to providing you with personalized service and expert advice. We believe in building long-term relationships with our clients, founded on trust, integrity, and transparency.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services area end -->

    <!-- About area Start -->
    <section class="bd-about-area section-space p-relative">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                Value added services
                            </span>
                            <h2 class="section-title title-animation is-br-none">Why Choose Us? </h2>
                            <div class="types-list">
                                <ul class="ms-4 mt-5">
                                    <li class="pb-4">
                                        <strong> Extensive Listings:</strong> Access a wide range of properties for sale and rent.
                                    </li>
                                    <li class="pb-4">
                                        <strong> Expert Guidance:</strong> Receive professional advice and support from our experienced team.
                                    </li>
                                    <li class="pb-4">
                                        <strong> Innovative Tools:</strong> Utilize our advanced search and comparison tools to find your perfect property.
                                    </li>
                                    <li class="pb-4">
                                        <strong> Comprehensive Services:</strong> Benefit from our full spectrum of real estate services, including property management.
                                    </li>
                                    <li class="pb-4">
                                        <strong>Customer Satisfaction:</strong> Experience exceptional service tailored to your needs.
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
                                <figure class="p-2"><img src="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png") }} " alt="image" width="60px"></figure>
                            </div>
                        </div>
                        <div class="thumb-one">
                            <figure> <img src="{{asset("assets/front/v5/images/about/about-thumb-01.png") }} " alt="image"></figure>
                        </div>
                        <div class="thumb-two-inner">
                            <div class="thumb-two">
                                <figure><img src="{{asset("assets/front/v5/images/about/about-thumb-02.png") }} " alt="image"></figure>
                            </div>
                            <div class="thumb-two">
                                <figure> <img src="{{asset("assets/front/v5/images/about/about-thumb-03.png") }} " alt="image"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area end -->

    @if ($secInfo->testimonial_section_status == 1)
    <!-- Testimonial area start -->
    <section class="bd-testimonial-area fix section-space theme-bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3 section-title-space">
                        <span class="section-subtitle uppercase">
                            <i class="icon-home"></i>
                            {{ $testimonialSecInfo->title }}
                        </span>
                        <h2 class="section-title title-animation">
                            {{ $testimonialSecInfo?->subtitle }}</h2>
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
                                                <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z" fill="#D30952" />
                                                </svg>
                                            </span>
                                            <h3 class="title">{{ $testimonial->title }}!</h3>
                                        </div>
                                        <p class="description">{{ $testimonial->comment }}</p>
                                    </div>
                                    <div class="admin-item">
                                        <div class="admin-thumbnail">
                                            @if (is_null($testimonial->image))
                                            <img src="assets/front/v5/images/user/user-thumb-01.png" alt="Admin Avatar">
                                            @else
                                            <img src="{{ asset('assets/img/clients/' . $testimonial->image) }}" alt="Admin Avatar">

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
                            {{-- <div class="swiper-slide">
                                <div class="testimonials-item style-one">
                                    <div class="content">
                                        <div class="title-inner">
                                            <span>
                                                <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z" fill="#D30952" />
                                                </svg>
                                            </span>
                                            <h3 class="title">A game changer for us!</h3>
                                        </div>
                                        <p class="description">“Working with onespace was a game-changer for us. Their team's
                                            attention to detail and market knowledge helped us find our dream home in no time.”</p>
                                    </div>
                                    <div class="admin-item">
                                        <div class="admin-thumbnail">
                                            <img src="assets/front/v5/images/user/user-thumb-02.png" alt="Admin Avatar">
                                        </div>
                                        <div class="admin-info">
                                            <h4 class="admin-name">Michael Nguyen</h4>
                                            <span class="admin-designation">Property Seller</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonials-item style-one">
                                    <div class="content">
                                        <div class="title-inner">
                                            <span>
                                                <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z" fill="#D30952" />
                                                </svg>
                                            </span>
                                            <h3 class="title">I was impressed!</h3>
                                        </div>
                                        <p class="description">“Their expertise and personalized approach made us feel confident
                                            every step of the way. Thank you for making our real estate journey successful one!”
                                        </p>
                                    </div>
                                    <div class="admin-item">
                                        <div class="admin-thumbnail">
                                            <img src="assets/front/v5/images/user/user-thumb-03.png" alt="Admin Avatar">
                                        </div>
                                        <div class="admin-info">
                                            <h4 class="admin-name">Sarah Johnson</h4>
                                            <span class="admin-designation">Satisfied Seller</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="testimonial-nav-pre pagination-wrappper">
                        <!-- If we need navigation buttons -->
                        <div class="testimonial-navigation justify-content-start">
                            <button class="testimonial-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="testimonial-swiper-dot"></div>
                            </div>
                            <button class="testimonial-slider-button-next"><i class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

</main>
<!-- Body main wrapper end -->
@endsection
