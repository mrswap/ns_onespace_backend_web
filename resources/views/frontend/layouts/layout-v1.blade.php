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
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/' . $websiteInfo->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/' . $websiteInfo->favicon) }}">
    @php
        $primaryColor = $basicInfo->primary_color;
        $secoundaryColor = $basicInfo->secondary_color;

        // check, whether color has '#' or not, will return 0 or 1
        function checkColorCode($color)
        {
            return preg_match('/^#[a-f0-9]{6}/i', $color);
        }

        // if, primary color value does not contain '#', then add '#' before color value
        if (isset($primaryColor) && checkColorCode($primaryColor) == 0 && checkColorCode($secoundaryColor) == 0) {
            $primaryColor = '#' . $primaryColor;
            $secoundaryColor = '#' . $secoundaryColor;
        }

        // change decimal point into hex value for opacity
        function rgb($color = null)
        {
            if (!$color) {
                echo '';
            }
            $hex = htmlspecialchars($color);
            [$r, $g, $b] = sscanf($hex, '#%02x%02x%02x');
            echo "$r, $g, $b";
        }
    @endphp
    @includeIf('frontend.partials.styles.styles-v1')
    <style>
        :root {
            --color-primary: {{ $primaryColor }};
            --color-primary-rgb: {{ rgb(htmlspecialchars($primaryColor)) }};
            --color-secondary: {{ $secoundaryColor }};
            --color-secondary-rgb: {{ rgb(htmlspecialchars($secoundaryColor)) }};
        }
    </style>
</head>


<body dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">
    @includeIf('frontend.partials.header.header-v1')

    @if (request()->routeIs('index'))
    @endif

    @yield('breadcrumb')

    @yield('content')

    @includeIf('frontend.partials.popups')
    @includeIf('frontend.partials.footer.footer-v1')
    {{-- cookie alert --}}
    @if (!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1)
        @include('cookie-consent::index')
    @endif

    <!-- Go to Top -->
    <div class="go-top"><i class="fal fa-angle-double-up"></i></div>


    <!-- WhatsApp Chat Button -->
    <div id="WAButton"></div>

    @includeIf('frontend.partials.scripts.scripts-v1')
    @includeIf('frontend.partials.toastr')
</body>

</html>
