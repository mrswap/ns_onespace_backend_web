<!DOCTYPE html>
<html lang="xxx" dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">




<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/front/v5/images/favicon.svg") }} ">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/bootstrap.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/animate.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/swiper.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/slick.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/chosen.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/nouislider.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/plugins/dropzone.min.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/magnific-popup.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/fontawesome-pro.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/icomoon.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/vendor/spacing.css") }} ">
    <link rel="stylesheet" href="{{asset("assets/front/v5/css/main.css") }} ">
</head>

<body dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">
    <!-- Pre loader start -->
    <div class="preloader">
        <div class='loader'>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
            <div class='circle'></div>
        </div>
    </div>
    <!-- Pre loader end -->

    <!-- Cursor Animation -->
    <div class="cursor1"></div>

    <!-- Body main wrapper start -->
    <div class="app-page-body">
   @includeIf('frontend.partials.header.header-dashboard-v5') 

    @yield('content')

   
    @include('frontend.partials.footer.footer-dashboard-v5')
    </div>
    <!-- Body main wrapper end -->

    <!-- Backtotop start -->
    <a href="#" data-target="html" class="back-to-target back-to-top">
        <span class="back-to-top-text">back top</span>
        <span class="back-to-top-wrapper"><span class="back-to-top-inner" style="width: 4.05654%;"></span></span>
    </a>
    <!-- Backtotop end -->

    {{-- cookie alert --}}
    @if (!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1)
        @include('cookie-consent::index')
    @endif
    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>

    @includeIf('frontend.partials.scripts.scripts-dashboard-v5')
    @includeIf('frontend.partials.toastr')
</body>

</html>
