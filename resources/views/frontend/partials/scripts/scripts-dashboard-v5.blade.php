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
<script src="{{asset('assets/front/v5/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/waypoints.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/meanmenu.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/swiper.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/slick.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/wow.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/magnific-popup.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/purecounter.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/nouislider.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/nice-select.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/ScrollTrigger.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/SplitText.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/plugins/gsap.min.js') }}"></script>
<!-- <script src="{{asset('assets/front/v5/js/plugins/bd-cursor.js') }}"></script> -->
<script src="{{asset('assets/front/v5/js/plugins/jarallax.min.js') }}"></script>
<!-- <script src="{{asset('assets/front/v5/js/plugins/dropzone.min.js') }}"></script> -->
<script src="{{ asset('assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<!-- <script src="{{asset('assets/front/v5/js/plugins/tinymce.min.js') }}"></script> -->
<script src="{{asset('assets/front/v5/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{asset('assets/front/v5/js/vendor/ajax-form.js') }}"></script>

{{-- select2 js --}}
<script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>

<!-- <script type="text/javascript" src="{{ asset('assets/js/admin-dropzone-propertyG.js') }}"></script> -->