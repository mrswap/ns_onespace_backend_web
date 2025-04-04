<!DOCTYPE html>
<html lang="xxx" dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KreativDev">

    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="description" content="@yield('metaDescription')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:type" content="website">
    {{-- <meta name="csrf_token" content="{{ csrf_token() }}" /> --}}

    @yield('og:tag')
    {{-- title --}}
    <title>@yield('pageHeading') {{ '| ' . $websiteInfo->website_title }}</title>
    {{-- fav icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/front/v5/img/' . $websiteInfo->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/front/v5/img/' . $websiteInfo->favicon) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png") }} ">
    <!-- CSS here -->

    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/chosen.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/nouislider.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/fontawesome-pro.css")}}">
    
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/spacing.css")}}">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/main.css")}}">
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />-->
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    
    
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.css">
    <style type="text/css" >
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

<div class="preloader">
        <div class='loader'>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
        </div>
    </div>

</head>

<body dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">
<link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/icomoon.css")}}">
    @includeIf('frontend.partials.header.header-v5')

    @yield('content')

    {{-- @includeIf('frontend.partials.popups') --}}
    @include('frontend.partials.footer.footer-v5')
     @includeIf('backend.partials.scripts')

    {{-- cookie alert --}}
    @if (!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1)
    @include('cookie-consent::index')
    @endif
    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>
    <!--@includeIf('backend.partials.scripts')-->
    @includeIf('frontend.partials.scripts.scripts-v5')
    <!--@includeIf('frontend.partials.toastr')-->
</body>

</html>
