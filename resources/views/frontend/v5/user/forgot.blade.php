@php
$version = $basicInfo->theme_version;

@endphp
@extends("frontend.layouts.layout-v$version")

@section('content')
<!-- Body main wrapper start -->
<main>
    @if (Session::has('success'))
    <div class="alert alert-success">{{ __(Session::get('success')) }}</div>
    @endif
    @if (Session::has('warning'))
    <div class="alert alert-success">{{ __(Session::get('warning')) }}</div>
    @endif
    <!-- forgot area start -->
    <section class="bd-forgot-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5">
                    <div class="sign-form-wrapper text-center">
                        <h4 class="title mb-5">Reset password</h4>
                        <p class="mb-20">Enter your email address to request password reset</p>

                        <form action="{{ route('user.send_forget_password_mail') }}" method="POST">
                            @csrf
                            <div class="input-box mb-20">
                                <input type="text" class="form-control" name="email" placeholder="{{ __('Email Address') }}">
                            </div>
                            <div class="sign-btn">
                                <button type="submit" class="bd-btn btn-style btn-hover-x">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- forgot area end -->

</main>
<!-- Body main wrapper end -->
@endsection
