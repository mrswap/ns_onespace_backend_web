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
    <link rel="stylesheet" href="{{ asset("assets/css/toastr.min.css") }}">


</head>

<body dir="{{ $currentLanguageInfo->direction == 1 ? 'rtl' : '' }}">
    <!-- @includeIf('backend.partials.scripts') -->
    <!-- @includeIf('frontend.partials.scripts.scripts-dashboard-v5') -->
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
        @includeIf('backend.partials.scripts')

        @includeIf('frontend.partials.scripts.scripts-dashboard-v5')
     
 @if (request()->routeIs('vendor.property_management.create_property') || request()->routeIs('vendor.property_management.edit'))
        @php
    $languages = App\Models\Language::get();
    $labels = '';
    $values = '';

    $category = '';
    $subcategory = '';
    $asset = '';
    $quantity = '';
    foreach ($languages as $language) {
    $label_name = $language->code . '_label[]';
    $value_name = $language->code . '_value[]';
    if ($language->direction == 1) {
    $direction = 'form-group rtl text-right';
    } else {
    $direction = 'form-group';
    }

    $labels .=
    "<div class='$direction'><input type='text' name='" .
                    $label_name .
                    "' class='form-control' placeholder='Label ($language->name)'></div>";
    $values .= "<div class='$direction'><input type='text' name='$value_name' class='form-control' placeholder='Value ($language->name)'></div>";
    }
    foreach ($languages as $language) {
    $category_name = $language->code . '_category[]';
    $subcategory_name = $language->code . '_subcategory[]';
    $asset_name = $language->code . '_asset[]';
    $quantity_name = $language->code . '_quantity[]';

    if ($language->direction == 1) {
    $direction = 'form-group rtl text-right';
    } else {
    $direction = 'form-group';
    }

    $category .= "<div class='$direction'><select name='$category_name' class='form-control Category' required>           <option value=''>Select Category</option>";
            foreach ($Categories as $Categor) {


            $category .= "<option value='".$Categor["id"]."'>".$Categor["name"]."</option>";

            }
            $category .= "        </select></div>";
    $subcategory .= "<div class='$direction'><select name='$subcategory_name' class='form-control subcategory' required>    <option value=''>Select Subcategory</option>";
            foreach ($SubCategories as $subCategor) {
            $subcategory .= "<option value='".$subCategor["id"]."'>".$subCategor["name"]."</option>";
            }
            $subcategory .= "        </select></div>";
    $asset.= "<div class='$direction'><input type='text' name='$asset_name' class='form-control' placeholder='Assets ($language->name)'></div>";
    $quantity .= "<div class='$direction'><input type='number' name='$quantity_name' class='form-control' placeholder='Quantity ($language->name)'></div>";


    }

    @endphp

    <script>
        'use strict';

        var labels = "{!! $labels !!}";
        var values = "{!! $values !!}";
        var category = "{!! $category !!}";
        var subcategory = "{!! $subcategory !!}";
        var asset = "{!! $asset !!}";
        var quantity = "{!! $quantity !!}";
        var storeUrl = "{{ route('vendor.property.imagesstore') }}";
        var removeUrl = "{{ route('vendor.property.imagermv') }}";
        var outdoorstoreUrl = "{{ route('vendor.property.outdoorimagesstore') }}";
        var livingroomstoreUrl = "{{ route('vendor.property.livingroomimagesstore') }}";
        var bedroomstoreUrl = "{{ route('vendor.property.bedroomimagesstore') }}";
        var kitchenstoreUrl = "{{ route('vendor.property.kitchenimagesstore') }}";
        var washroomstoreUrl = "{{ route('vendor.property.washroomimagesstore') }}";
        var balconystoreUrl = "{{ route('vendor.property.balconyimagesstore') }}";
        var terracestoreUrl = "{{ route('vendor.property.terraceimagesstore') }}";
        var stairsstoreUrl = "{{ route('vendor.property.stairsimagesstore') }}";
        var otherstoreUrl = "{{ route('vendor.property.otherimagesstore') }}";
        var removeUrl = "{{ route('vendor.property.imagermv') }}";

        var outdoorremoveUrl = "{{ route('vendor.property.outdoorimagermv') }}";

        var livingroomremoveUrl = "{{ route('vendor.property.livingroomimagermv') }}";

        var bedroomremoveUrl = "{{ route('vendor.property.bedroomimagermv') }}";

        var kitchenremoveUrl = "{{ route('vendor.property.kitchenimagermv') }}";

        var washroomremoveUrl = "{{ route('vendor.property.washroomimagermv') }}";

        var balconyremoveUrl = "{{ route('vendor.property.balconyimagermv') }}";

        var terraceremoveUrl = "{{ route('vendor.property.terraceimagermv') }}";

        var stairsremoveUrl = "{{ route('vendor.property.stairsimagermv') }}";

        var otherremoveUrl = "{{ route('vendor.property.otherimagermv') }}";
        var subcategoryUrl = "{{ route('vendor.property.get_subcategory') }}";
        var stateUrl = "{{ route('vendor.property_specification.get_state_cities') }}";
        var cityUrl = "{{ route('vendor.property_specification.get_cities') }}";
        let galleryImages = 999999;
        let galleryImagesoutdoor = 999999;


        let galleryImageslivingroom = 999999;


        let galleryImagesbedroom = 999999;


        let galleryImageskitchen = 999999;


        let galleryImageswashroom = 999999;


        let galleryImagesbalcony = 999999;


        let galleryImagesterrace = 999999;



        let galleryImagesstairs = 999999;


        let galleryImagesother = 999999;

    </script>
   
<script src="{{ asset('/assets/front/v5/js/properties.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/admin-dropzone-propertyG.js') }}"></script>
@endif
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

    <div id="WAButton"></div>

    <script src="{{asset('assets/front/v5/js/main.js') }}"></script>
   



    @includeIf('frontend.partials.toastr')
</body>

</html>
