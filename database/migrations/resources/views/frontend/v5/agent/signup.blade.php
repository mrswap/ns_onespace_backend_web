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
<meta property="og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<!-- Body main wrapper start -->
 <main>
        <!-- sign-in area start -->
        <section class="bd-sign-area section-space">
            <div class="container">
                <div class="row gy-0 gx-0 justify-content-center">
                    <div class="col-xl-5">
                        <div class="sign-thumb">
                            <img src="assets/front/v5/images/sign/sign-img-2.png" alt="image">
                            <!-- image size height defend in register height -->
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="sign-form-wrapper text-center">
                            <h4 class="title mb-30">Register yourself</h4>
                            <form action="#">
                                <div class="row gy-24 align-items-center justify-content-between">
                                    <div class="col-md-6 col-12">
                                        <div class="form-input-box">
                                            <div class="form-input-title">
                                                <label for="Name">Name<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="name" id="Name" type="text" required placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-input-box">
                                            <div class="form-input-title">
                                                <label for="Username">Username<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="name" id="Username" type="text" required placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-input-box">
                                            <div class="form-input-title">
                                                <label for="email">Email Address<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="email" id="email" type="email" required placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-input-box">
                                            <div class="form-input-title">
                                                <label for="phoneNumber">Phone Number<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="name" id="phoneNumber" type="text" required placeholder="Your Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-input-box">
                                            <div class="form-input-title">
                                                <label for="password">Password<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="name" id="password" type="password" required placeholder="Min. 8 character">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="from-input-box">
                                            <div class="form-input-title">
                                                <label for="passwordRepeat">Confirm Password<span>*</span></label>
                                            </div>
                                            <div class="form-input">
                                                <input name="name" id="passwordRepeat" type="password" required placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sign-btn mt-20">
                                    <button type="submit" class="bd-btn btn-style btn-hover-x">Sign Up</button>
                                </div>
                            </form>
                            <div class="sign-meta-divider-wrapper">
                                <div class="sign-meta-divider-line left-line"></div>
                                <span class="sign-meta-divider-title">or</span>
                                <div class="sign-meta-divider-line right-line"></div>
                            </div>
                            <div class="sign-up-wrapper mt-30 mb-20">
                                <div class="social-menu d-flex justify-content-center text-center">
                                    <ul>
                                        <li><a class="facebook" href="https://facebook.com/" target="blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="https://twitter.com/" target="blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a class="instagram" href="https://www.instagram.com/" target="blank"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a class="linkedin" href="https://www.linkedin.com/" target="blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sign-up-label text-center">
                                Already have an account?<a href="{{ route('login') }}" class="sign-link"> Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sign-in area end -->

    </main>
<!-- Body main wrapper end -->
@endsection
