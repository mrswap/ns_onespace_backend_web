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
<meta property="og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5<meta property=" og:image"
    content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">
/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- sign-in area start -->
    <section class="bd-sign-area section-space">
        <div class="container">
            <div class="row gx-0 gy-0 justify-content-center">
                <div class="col-xl-5">
                    <div class="sign-thumb">
                        <img src="{{ asset("assets/front/v5/images/sign/sign-img.png")}}" alt="image">
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="sign-form-wrapper text-center">
                        <h4 class="title mb-30">Welcome again</h4>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form id="sendOtpForm">
                            <div class="form-group">
                                <!-- <label for="phone">Phone Number</label> -->
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
                            <br>
                            <div class="col-xl-12">
                                <div class="agent-details-btn">
                                    <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Verify
                                        OTP</button>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-success">Verify OTP</button> -->
                        </form>

                        <!-- <form class="form" action="{{ route('user.login_submit') }}" method="POST">
                            @csrf
                            <div class="input-box mb-15">
                                <input type="text" name="username" id="username" class="input" required placeholder="Email Address">
                            </div>
                            <div class="input-box mb-20">
                                <input type="password" name="password" id="password" class="input" required placeholder="Type Password Here">
                            </div>
                            <div class="input-box mb-20">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_type" id="buyer1" checked>
                                    <label class="form-check-label" for="buyer1">
                                        Buyer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_type" id="tenant" >
                                    <label class="form-check-label" for="tenant">
                                        Tenant
                                    </label>
                                </div>
                                <div class="sign-meta d-flex justify-content-between mb-20">
                                    <div class="sign-remember">
                                        <label class="footer-form-check-label signing-page cursor">
                                            <input type="checkbox" name="rememberme" id="rememberme">
                                            <svg viewBox="0 0 64 64" height="2em" width="2em">
                                                <path d="M 0 16 V 56 A 8 8 90 0 0 8 64 H 56 A 8 8 90 0 0 64 56 V 8 A 8 8 90 0 0 56 0 H 8 A 8 8 90 0 0 0 8 V 16 L 32 48 L 64 16 V 8 A 8 8 90 0 0 56 0 H 8 A 8 8 90 0 0 0 8 V 56 A 8 8 90 0 0 8 64 H 56 A 8 8 90 0 0 64 56 V 16" pathLength="575.0541381835938" class="path"></path>
                                            </svg> Remember me
                                        </label>
                                    </div>
                                    <div class="sign-forgot">
                                        <a href="{{ route('forgot') }}" class="sign-link">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="sign-btn">
                                    <button type="submit" class="bd-btn btn-style btn-hover-x">Sign in</button>
                                </div>
                        </form> -->
                        <div class="sign-meta-divider-wrapper">
                            <div class="sign-meta-divider-line left-line"></div>
                            <span class="sign-meta-divider-title">or</span>
                            <div class="sign-meta-divider-line right-line"></div>
                        </div>
                        <div class="sign-in-wrapper mt-30 mb-20">
                            <div class="social-menu d-flex justify-content-center text-center">
                                <ul>
                                    <li><a class="facebook" href="https://facebook.com/" target="blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a class="twitter" href="https://twitter.com/" target="blank"><i
                                                class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a class="instagram" href="https://www.instagram.com/" target="blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="https://www.linkedin.com/" target="blank"><i
                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sign-up-label text-center">
                            Don't have an account?<a href="{{ route('signup') }}" class="sign-link"> Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-in area end -->

</main>
<!-- Body main wrapper end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // $(document).ready(function() {
    $('#sendOtpForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('otp.login.send') }}",
            method: "POST",
            data: {
                phone: $('#phone').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);
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
            url: "{{ route('otp.login.verify') }}",
            method: "POST",
            data: {
                phone: $('#phone').val(),
                otp: $('#otp').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);

                if (response.success) {
                    alert(response.success);
                    window.location.href = "{{ route('user.dashboard') }}"; // Proper redirect
                } else {
                    alert(response.error);
                }

            },
            error: function(xhr) {
                alert(xhr.responseJSON.error);
            }
        });
    });
    // });
</script>
@endsection