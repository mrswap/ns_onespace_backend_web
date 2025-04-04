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
                                    <h1 class="bd-breadcrumb-title">Contact</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                        <span>Contact</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area end -->

        <!-- Contact address area start -->
        <section class="bd-contact address section-space">
            <div class="container">
                <div class="row gy-30">
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="contact-box">
                            <div class="contact-icon mb-30"><i class="fa-light fa-phone-volume"></i></div>
                            <h5 class="contact-title mb-15">Call Us On</h5>
                            <div class="contact-content">
                                <a href="tel:+415864872899">+415-864-8728-99</a>
                                <a href="tel:+415864872997">+415-864-8729-97</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="contact-box">
                            <div class="contact-icon mb-30"><i class="fa-sharp fa-light fa-envelope"></i></div>
                            <h5 class="contact-title mb-15">Email Us</h5>
                            <div class="contact-content">
                                <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#1764626767786563574572767b7b78603974787a"><span class="__cf_email__" data-cfemail="d8abada8a8b7aaac988abdb9b4b4b7aff6bbb7b5">[email&#160;protected]</span></a>
                                <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#92f1fdfce6f3f1e6d2c0f7f3fefefde5bcf1fdff"><span class="__cf_email__" data-cfemail="6605090812070512263403070a0a09114805090b">[email&#160;protected]</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="contact-box">
                            <div class="contact-icon mb-30"><i class="fa-sharp fa-light fa-location-dot"></i></div>
                            <h5 class="contact-title mb-15">Our Location</h5>
                            <div class="contact-content">
                                <a target="_blank" href="#">1426 Center StreetBend</a>
                                <a target="_blank" href="#">97702, California, USA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact address area end -->

        <!-- Contact form area start -->
        <section class="bd-contact-form section-space-bottom">
            <div class="container">
                <div class="row gy-24 justify-content-between">
                    <div class="col-xxl-5 col-xl-5 col-lg-6">
                        <div class="section-title-wrapper anim-wrapper animation-style-3 mb-30">
                            <span class="section-subtitle uppercase mb-20"> <span><svg width="17" height="15"
                              viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M16.5859 7.23047C16.668 7.3125 16.7227 7.42188 16.75 7.55859C16.7227 7.66797 16.6953 7.75 16.6133 7.83203L16.0391 8.48828C15.957 8.57031 15.8477 8.625 15.7109 8.625C15.6016 8.625 15.4922 8.59766 15.4102 8.51562L15 8.13281V13.875C15 14.3672 14.5898 14.75 14.125 14.75H3.625C3.13281 14.75 2.75 14.3672 2.75 13.875V8.13281L2.3125 8.51562C2.23047 8.59766 2.12109 8.625 2.01172 8.625C1.875 8.625 1.76562 8.57031 1.68359 8.48828L1.10938 7.83203C1.02734 7.77734 0.972656 7.66797 0.972656 7.55859C0.972656 7.42188 1.05469 7.3125 1.13672 7.23047L8.13672 1.05078C8.30078 0.886719 8.62891 0.75 8.875 0.75C9.09375 0.75 9.42188 0.886719 9.58594 1.05078L12.375 3.48438V2.0625C12.375 1.84375 12.5664 1.625 12.8125 1.625H14.5625C14.7812 1.625 15 1.84375 15 2.0625V5.80859L16.5859 7.23047ZM10.625 8.92578V6.60156C10.5977 6.27344 10.3516 6.02734 10.0234 6H7.69922C7.37109 6.02734 7.125 6.27344 7.125 6.60156V8.92578C7.125 9.25391 7.37109 9.5 7.69922 9.5H10.0234C10.3516 9.5 10.5977 9.25391 10.625 8.92578Z"
                                 fill="#ED6E5A" />
                           </svg>
                        </span>Contact Us</span>
                            <h2 class="section-title title-animation mb-20">Send us a massage!</h2>
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
                    <div class="col-xxl-7 col-xl-7 col-lg-7">
                        <div class="contact-wrapper style-one">
                            <div class="contact-from">
                                <div class="row g-5 align-items-center justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-input-box has-icon icon-right">
                                            <div class="form-input">
                                                <input name="name2" type="text" placeholder="Your Name">
                                                <div class=""><span><i class="fa-solid fa-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-input-box has-icon icon-right">
                                            <div class="form-input">
                                                <input name="email2" type="text" placeholder="Your Email">
                                                <div class=""><span><i class="fa-solid fa-envelope"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-input-box has-icon icon-right">
                                            <div class="form-input">
                                                <input name="number2" type="text" placeholder="Your Phone">
                                                <div class=""><span><i class="fa-solid fa-phone"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-input-box has-icon icon-right">
                                            <div class="form-input">
                                                <input name="subject" type="text" placeholder="Subject">
                                                <div class=""><span><i class="fa-solid fa-book"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="form-input-box has-icon icon-right">
                                            <div class="form-input">
                                                <textarea name="message" placeholder="Your Message"></textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact form area end -->

        <!-- Google map area start -->
        <div class="bd-map-area section-space-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d34214.60083365065!2d-74.01068688015093!3d40.714229226069826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1713786758295!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google map area end-->

    </main>
<!-- Body main wrapper end -->
@endsection
