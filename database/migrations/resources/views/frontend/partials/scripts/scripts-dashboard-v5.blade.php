<script>
    'use strict';
    const baseURL = "{{ url('/') }}";
    const all_model = "{{ __('All') }}";
    const read_more = "{{ __('Read More') }}";
    const read_less = "{{ __('Read Less') }}";
    const show_more = "{{ __('Show More') . '+' }}";
    const show_less = "{{ __('Show Less') . '-' }}";
    const langDir = "{{ $currentLanguageInfo->direction }}";
    var vapid_public_key = "{!! env('VAPID_PUBLIC_KEY') !!}";
</script>



 <!-- JS here -->
 <script src="{{asset("assets/front/v5/js/vendor/jquery-3.7.1.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/waypoints.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/bootstrap.bundle.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/meanmenu.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/swiper.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/slick.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/wow.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/magnific-popup.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/isotope.pkgd.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/purecounter.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/nouislider.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/nice-select.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/ScrollTrigger.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/SplitText.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/gsap.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/bd-cursor.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/jarallax.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/dropzone.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/tinymce.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/plugins/apexcharts.min.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/vendor/ajax-form.js") }}"></script>
    <script src="{{asset("assets/front/v5/js/main.js") }}"></script>



<!--End of Tawk.to Script-->
{{-- whatsapp init code --}}

@if ($basicInfo->whatsapp_status == 1)
    <script type="text/javascript">
        var whatsapp_popup = "{{ $basicInfo->whatsapp_popup_status }}";
        var whatsappImg = "{{ asset('assets/img/whatsapp.svg') }}";

        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: "{{ $basicInfo->whatsapp_number }}", //WhatsApp Business phone number
                headerTitle: "{{ $basicInfo->whatsapp_header_title }}", //Popup Title
                popupMessage: `{!! nl2br($basicInfo->whatsapp_popup_message) !!}`, //Popup Message
                showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                position: "right" //Position: left | right
            });
        });
    </script>
@endif

<!--Start of Tawk.to Script-->
@if ($basicInfo->tawkto_status)
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = "{{ $basicInfo->tawkto_direct_chat_link }}";
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
@endif
<!--End of Tawk.to Script-->

@yield('script')
@if (session()->has('success'))
    <script>
        "use strict";
        toastr['success']("{{ __(session('success')) }}");
    </script>
@endif

@if (session()->has('error'))
    <script>
        "use strict";
        toastr['error']("{{ __(session('error')) }}");
    </script>
@endif
@if (session()->has('warning'))
    <script>
        "use strict";
        toastr['warning']("{{ __(session('warning')) }}");
    </script>
@endif



