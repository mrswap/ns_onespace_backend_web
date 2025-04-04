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
<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('{{asset("assets/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
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
                    <div class=" col-xxl-5 col-xl-5 col-lg-5 order-1 order-lg-0 wow bdFadeInLeft" data-wow-delay=".3s">
                        <div class="section-title-wrapper anim-wrapper animation-style-3 mb-20">
                            <span class="section-subtitle uppercase"><i class="icon-home"></i>Selling Process</span>
                            <h2 class="section-title title-animation">The Selling Process with Onespace </h2>
                        </div>

                        <div class="content">
                            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.


                            </p>
                        </div>

                        <div class="about-btn mt-50">
                            <a class="bd-half-outline-btn" href="#"><span class="text">For Sale</span></a>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 order-0 order-lg-1">
                        <div class="about-thumb-wrap style-three wow bdFadeInRight" data-wow-delay=".4s">
                            <a class="about-play-btn popup-video" href="https://www.youtube.com/watch?v=ec_fXMrD7Ow">
                                <span class="title">Play</span>
                            </a>
                            <div class="thumb">
                                <div class="ractangle"></div>
                                <figure> <img src="{{asset("assets/front/v5/images/about/about-thumb-06.png" ) }} " alt="about thumb not found">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About area end -->

        <!-- Process area start -->
        <section class="bd-Process-area section-space-bottom theme-bg-primary  section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div
                            class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
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
                                <h3 class="title">Free Sales Appraisal</h3>
                                <p class="description">Receive a complimentary property valuation from our expert team.
                                    Choose a convenient time for an in-person or virtual consultation. Book now for
                                    insights into your property’s value.</p>
                            </div>
                            <div class="content rightAfter">
                                <h3 class="title">Appointing Us to Sell</h3>
                                <p class="description">If you’re satisfied with our proposal, appoint us to sell your
                                    property. We’ll discuss advertising options, complete paperwork, and prepare a
                                    marketing campaign.</p>
                            </div>
                            <div class="content rightAfter">
                                <h3 class="title">Advertising Your Property</h3>
                                <p class="description">We’ll arrange a photographer, add floor plans, and create a
                                    written description. Your property will be listed on major real estate websites with
                                    wide exposure, and a “For Sale” signboard will be installed.</p>
                            </div>
                        </div>
                        <div class="process-item col-md-4 text-center">
                            <div class="process-img-container">
                                <img fetchpriority="high" decoding="async" width="457" height="457"
                                    src="https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0.jpg"
                                    class="attachment-large size-large wp-image-9919" alt=""
                                    srcset="https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0.jpg 457w, https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0-300x300.jpg 300w, https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0-150x150.jpg 150w, https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0-210x210.jpg 210w, https://netswaptech.com/onespace/wp-content/uploads/2024/08/350141464_1395768287866797_7726113298592690496_n-64858672a4db0-100x100.jpg 100w"
                                    sizes="(max-width: 457px) 100vw, 457px">
                            </div>
                        </div>
                        <div class="process-item col-md-4 text-start">
                            <div class="content leftAfter">
                                <h3 class="title">Buyer Feedback and Home Opens</h3>
                                <p class="description">We’ll schedule group viewings and private appointments, with our
                                    agent present for all viewings, providing buyer feedback. Home opens will continue
                                    until your property is sold.</p>
                            </div>
                            <div class="content leftAfter">
                                <h3 class="title">Comprehensive Property Report</h3>
                                <p class="description">After our visit, you’ll receive a property price report and
                                    comparative market analysis, including your property’s value and insights from our
                                    appraisal.</p>
                            </div>
                            <div class="content leftAfter">
                                <h3 class="title">Negotiating and Accepting an Offer</h3>
                                <p class="description">“We’ll assist in negotiating offers and provide expert guidance
                                    on accepting the best possible one, ensuring that all terms are clear and that the
                                    sale proceeds smoothly to a successful and timely completion.”</p>
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
        <section class="section-space bd-calculator-area">
            <div class="section-title-wrapper mb-50 text-center">
                <span class="section-subtitle uppercase"><i class="icon-home"></i>Calculator</span>
                <h2 class="section-title title-animation">Commission Calculator</h2>
            </div>
            <div class="region-main-wraper shadow">
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
            </div>
        </section>
        <!-- calculator area start -->

        <!-- Testimonial area start -->
        <section class="bd-testimonial-area fix section-space theme-bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-6">
                        <div class="section-title-wrapper anim-wrapper animation-style-3 section-title-space">
                            <span class="section-subtitle uppercase"><i class="icon-home"></i>Testimonials</span>
                            <h2 class="section-title title-animation">Why Choose Us? </h2>
                        </div>

                    </div>
                </div>
                <div class="row wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <div class="col-xxl-12">
                        <div class="swiper o-visible testimonial-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonials-item style-one">
                                        <div class="content">
                                            <div class="title-inner">
                                                <span>
                                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z"
                                                            fill="#ED6E5A" />
                                                    </svg>
                                                </span>
                                                <h3 class="title">Perfect service!</h3>
                                            </div>
                                            <p class="description">“I can't thank onespace enough for their exceptional
                                                service. As a
                                                first-time homebuyer, I was nervous about the process, but their team
                                                guided me.”</p>
                                        </div>
                                        <div class="admin-item">
                                            <div class="admin-thumbnail">
                                                <img src="{{asset("assets/front/v5/images/user/user-thumb-01.png" ) }} " alt="Admin Avatar">
                                            </div>
                                            <div class="admin-info">
                                                <h4 class="admin-name">Emily Parker</h4>
                                                <span class="admin-designation">Homebuyer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-item style-one">
                                        <div class="content">
                                            <div class="title-inner">
                                                <span>
                                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z"
                                                            fill="#ED6E5A" />
                                                    </svg>
                                                </span>
                                                <h3 class="title">A game changer for us!</h3>
                                            </div>
                                            <p class="description">“Working with onespace was a game-changer for us.
                                                Their team's
                                                attention to detail and market knowledge helped us find our dream home
                                                in no time.”</p>
                                        </div>
                                        <div class="admin-item">
                                            <div class="admin-thumbnail">
                                                <img src="{{asset("assets/front/v5/images/user/user-thumb-02.png" ) }} " alt="Admin Avatar">
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
                                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.395 5.75C5.26029 5.75 6.10615 6.00659 6.82562 6.48732C7.54508 6.96805 8.10584 7.65133 8.43697 8.45076C8.76811 9.25019 8.85474 10.1299 8.68594 10.9785C8.51712 11.8272 8.10045 12.6067 7.48859 13.2186C6.87674 13.8304 6.09719 14.2471 5.24852 14.4159C4.39985 14.5847 3.52019 14.4981 2.72076 14.167C1.92133 13.8358 1.23805 13.2751 0.75732 12.5556C0.276589 11.8362 0.02 10.9903 0.02 10.125L0 9.5C0 7.17936 0.921872 4.95376 2.56282 3.31282C4.20376 1.67187 6.42936 0.75 8.75 0.75V3.25C7.92888 3.24779 7.11546 3.40839 6.35679 3.7225C5.59812 4.03661 4.90925 4.498 4.33 5.08C4.10487 5.30471 3.89718 5.54624 3.70875 5.8025C3.9325 5.7675 4.16125 5.74875 4.39375 5.74875L4.395 5.75ZM15.645 5.75C16.5103 5.75 17.3562 6.00659 18.0756 6.48732C18.7951 6.96805 19.3558 7.65133 19.687 8.45076C20.0181 9.25019 20.1047 10.1299 19.9359 10.9785C19.7671 11.8272 19.3504 12.6067 18.7386 13.2186C18.1267 13.8304 17.3472 14.2471 16.4985 14.4159C15.6499 14.5847 14.7702 14.4981 13.9708 14.167C13.1713 13.8358 12.488 13.2751 12.0073 12.5556C11.5266 11.8362 11.27 10.9903 11.27 10.125L11.25 9.5C11.25 7.17936 12.1719 4.95376 13.8128 3.31282C15.4538 1.67187 17.6794 0.75 20 0.75V3.25C19.1789 3.24779 18.3655 3.40839 17.6068 3.7225C16.8481 4.03661 16.1592 4.498 15.58 5.08C15.3549 5.30471 15.1472 5.54624 14.9587 5.8025C15.1825 5.7675 15.4112 5.75 15.645 5.75Z"
                                                            fill="#ED6E5A" />
                                                    </svg>
                                                </span>
                                                <h3 class="title">I was impressed!</h3>
                                            </div>
                                            <p class="description">“Their expertise and personalized approach made us
                                                feel confident
                                                every step of the way. Thank you for making our real estate journey
                                                successful one!”
                                            </p>
                                        </div>
                                        <div class="admin-item">
                                            <div class="admin-thumbnail">
                                                <img src="{{asset("assets/front/v5/images/user/user-thumb-03.png" ) }} " alt="Admin Avatar">
                                            </div>
                                            <div class="admin-info">
                                                <h4 class="admin-name">Sarah Johnson</h4>
                                                <span class="admin-designation">Satisfied Seller</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <!-- Testimonial area end -->

    </main>
@endsection
