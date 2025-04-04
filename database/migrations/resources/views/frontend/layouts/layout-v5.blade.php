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
    @yield('og:tag')
    {{-- title --}}
    <title>@yield('pageHeading') {{ '| ' . $websiteInfo->website_title }}</title>
    {{-- fav icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/front/v5/img/' . $websiteInfo->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/front/v5/img/' . $websiteInfo->favicon) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png") }} ">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/bootstrap.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/animate.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/swiper.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/chosen.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/nouislider.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/magnific-popup.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/fontawesome-pro.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/icomoon.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/spacing.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/main.css") }} ">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

   
   

</head>

<body dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">

    @includeIf('frontend.partials.header.header-v5')

    @yield('content')

    {{-- @includeIf('frontend.partials.popups') --}}
    @include('frontend.partials.footer.footer-v5')

    {{-- cookie alert --}}
    @if (!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1)
        @include('cookie-consent::index')
    @endif
    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>

    @includeIf('frontend.partials.scripts.scripts-v5')
    @includeIf('frontend.partials.toastr')
</body>

</html>
