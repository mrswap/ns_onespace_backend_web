
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
<script src="{{asset("assets/front/v5/js/vendor/jquery-3.7.1.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/waypoints.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/meanmenu.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/swiper.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/wow.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/magnific-popup.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/purecounter.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/nouislider.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/nice-select.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/ScrollTrigger.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/SplitText.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/gsap.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/bd-cursor.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/jarallax.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/dropzone.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/plugins/tinymce.min.js")}}"></script>
<script src="{{asset("assets/front/v5/js/vendor/ajax-form.js")}}"></script>
<script src="{{asset("assets/front/v5/js/properties.js")}}"></script>
<script src="{{asset("assets/front/v5/js/main.js")}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="{{asset("assets/front/js/script.js")}}"></script> --}}
{{-- <script src="{{asset("assets/js/toastr.min.js")}}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script
            src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.js"></script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWCfqnOzQVhONMaKbh7CAjga3pdhxMxg&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWCfqnOzQVhONMaKbh7CAjga3pdhxMxg&libraries=places&callback=initAutocomplete" async defer></script>
        <script>

let slider = document.getElementById('slider');
let value = document.getElementById("text"); // This will show the rent amount
let agencyCommissionElement = document.getElementById("agency-commission"); // Display Typical Agency ₹
let saveAmountElement = document.getElementById("save-amount"); // Display You'll Save ₹

// Create the slider with the new range starting from ₹10,00,000
noUiSlider.create(slider, {
    start: [1000000], // Starting point of the slider
    connect: [true, false],
    range: {
        'min': 1000000, // Set minimum to ₹10,00,000
        'max': 10000000 // Set maximum to ₹1,00,00,000
    },
    step: 1000, // Change step size if needed
    tooltips: [true],
    pips: { // Add markers on slider to highlight the specific values
        mode: 'values',
        values: [1000000, 2500000, 5000000, 7500000, 10000000], // Your required points
        density: 4
    },
    format: {
        from: function (value) {
            return Math.round(+value);
        },
        to: function (value) {
            return Math.round(+value);
        }
    }
});

// Update calculations based on the value from the slider
function updateCalculations(value) {
    let onePercent = value * 0.01; // 1% of the monthly rent
    let threePercent = value * 0.03; // 3% of the monthly rent

    let typicalAgency = threePercent; // 3% as the typical agency commission
    let savings = threePercent - onePercent; // Difference between 3% and 1%

    // Update the displayed values
    agencyCommissionElement.textContent = `${typicalAgency.toFixed(2)}`; // Typical Agency commission
    saveAmountElement.textContent = `${savings.toFixed(2)}`; // You'll Save amount
}


// Update the input and the tooltip based on the specific points
slider.noUiSlider.on('update', function (values, handle) {
    let sliderValue = values[handle];
    value.value = sliderValue; // Update input field
    updateCalculations(sliderValue); // Call the update function for savings/commission
});

    </script>
{{-- select2 js --}}
{{-- <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>




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
    var Tawk_API = Tawk_API || {}
        , Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script")
            , s0 = document.getElementsByTagName("script")[0];
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
<script src="{{ asset('/assets/front/js/properties.js') }}"></script>
<script>
$(".advance").on("click", function(){
       var fordata=$(this).attr('data-for');
           $('#searchFilter .datafor').html('');
          $('#searchFilter .datafor').append(`<input type="hidden" id="fordata" value="${fordata}"> `);
       $('#searchFilter').modal('show');
    });
    $("#searchFilter").on('hide.bs.modal', function(){
    $('#hidden').html('');
    const checkedCheckboxes = $('.amenities:checked');
        const count = checkedCheckboxes.length;

var fordata=$("#searchFilter #fordata").val();
    var size_range=$("#searchFilter #amount-2").val();
    var price_range=$("#searchFilter #amount").val();
    var baths=$("#searchFilter #baths").val();
    var beds=$("#searchFilter #beds").val();
    var AvailableFor=$("#searchFilter #AvailableFor").val();
    var AvailableFrom=$("#searchFilter #AvailableFrom").val();
    var availability=$("#searchFilter #availability").val();
    var postedby=$("#searchFilter #postedby").val();
    var furnishedStatus=$("#searchFilter #furnishedStatus ").val();;

     $('#'+fordata+' #hidden').append(`<input type="hidden" name="beds" value="${beds}"> `);
     $('#'+fordata+' #hidden').append(`<input type="hidden" name="baths" value="${baths}"> `);
     $('#'+fordata+' #hidden').append(`<input type="hidden" name="areaRange" value="${size_range}"> `);
   $('#'+fordata+' #hidden').append(`<input type="hidden" name="AvailableFor" value="${AvailableFor}"> `);
   $('#'+fordata+' #hidden').append(`<input type="hidden" name="AvailableFrom" value="${AvailableFrom}"> `);
   $('#'+fordata+' #hidden').append(`<input type="hidden" name="availability" value="${availability}"> `);
   $('#'+fordata+' #hidden').append(`<input type="hidden" name="postedby" value="${postedby}"> `);
    $('#'+fordata+' #hidden').append(`<input type="hidden" name="furnishedStatus" value="${furnishedStatus}"> `);
    checkedCheckboxes.each(function(index) {
            const label = $(this).val(); // Get the value of the checkbox
            const inputField = `
                
                    <input type="hidden" name="amenities[]" value="${label}">
                
            `;
            $('#'+fordata+' #hidden').append(inputField);
        });
    

  });
</script>
<script type="text/javascript">
    let autocomplete;
    
    let geocoder = new google.maps.Geocoder();

    function initAutocomplete() {
        // Initialize the Autocomplete object on the input field
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('location-search'), {
            types: ['geocode'], // Allow autocomplete to show all geocode results, including localities
            componentRestrictions: { country: "IN" } // Optional: Restrict to India for more relevant results
        });

        autocomplete.addListener('place_changed', onPlaceChanged);
    }

    function onPlaceChanged() {
        const place = autocomplete.getPlace();

        if (!place.geometry) {
            console.log("No details available for the input location.");
            return;
        }

        // Get latitude and longitude of the selected location
        const latitude = place.geometry.location.lat();
        const longitude = place.geometry.location.lng();
        
        $('#buy #latitude').val(latitude);
         $('#buy #longitude').val(longitude);
             $('#rent #latitude').val(latitude);
         $('#rent #longitude').val(longitude);
        console.log("Latitude: " + latitude + ", Longitude: " + longitude);

        // Optionally, you can store these values in hidden input fields or use them for further API calls
        getPropertiesWithinRadius(latitude, longitude);
    }

    function getPropertiesWithinRadius(latitude, longitude) {
        const radius = 100000; // 5km radius

        // Example of how you could query your database for properties near this location
        // Here you can make an API call to your server or use AJAX to query properties
        // For demonstration, I'll just log the values
        console.log("Searching for properties within " + radius + " meters from Lat: " + latitude + " and Lng: " + longitude);

        // You can send the latitude and longitude to your backend to filter properties within a 5km radius
    }
</script>
 <script>
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        // Load nearby localities
                        fetchLocalities(userLocation);
                    },
                    () => {
                        document.getElementById('localities').innerHTML = "Unable to fetch your location.";
                    }
                );
            } else {
                document.getElementById('localities').innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function fetchLocalities(location) {
            const map = new google.maps.Map(document.createElement('div')); // Dummy map element
            const service = new google.maps.places.PlacesService(map);

            const request = {
                location: location,
                radius: 100000, // 10 km radius
                type: ['locality'], // Fetch localities
                rankBy: google.maps.places.RankBy.PROMINENCE,
            };

            service.nearbySearch(request, (results, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    displayLocalities(results.slice(0, 8)); // Display top 6 localities
                } else {
                    document.getElementById('localities').innerHTML = "No localities found.";
                }
            });
        }

        function displayLocalities(localities) {
            const localitiesDiv = document.getElementById('localities');
            localitiesDiv.innerHTML = ""; // Clear loading text
            if(localities.lenght > 4) {
              localitiesDiv.innerHTML=  `  <div class="row gy-30 align-items-center section-title-space">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper anim-wrapper animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Top Areas</span>
                        <h2 class="section-title title-animation white-text">Find your neighborhood</h2>
                    </div>

                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="btn-inner text-lg-end">
                        <a class="bd-btn btn-style btn-hover-x hover-white" href="property.html"><i
                                class="fa-regular fa-arrow-right-long"></i>Discover more</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">`;
                localities.forEach((place) => {
                const localityElement = document.createElement('div');
                localityElement.className = 'col-xxl-3 col-xl-3 col-lg-4 col-md-6';

                // Fetch the first photo if available
                const photoUrl = place.photos ? place.photos[0].getUrl({ maxWidth: 400 }) : null;

                // Create a Google Maps URL with latitude and longitude
                const mapsUrl = `https://www.google.com/maps?q=${place.geometry.location.lat()},${place.geometry.location.lng()}`;

                // localityElement.innerHTML = `
                //     <strong>${place.name}</strong><br>
                //     ${place.vicinity || ''}
                //     ${photoUrl ? `<br><a href="{{route('frontend.properties')}}?latitude=${place.geometry.location.lat()}&latitude=${place.geometry.location.lat()}" target="_blank"><img src="${photoUrl}" alt="${place.name}"></a>` : ''}
                //     <br><a href="${mapsUrl}" target="_blank">View on Google Maps</a>
                // `;
                    localityElement.innerHTML = `
                    <div class="neighbour-area-item">
                        <div class="thumb">
                            <figure><img src="${photoUrl}" alt="${place.name}">
                            </figure>
                        </div>
                        <div class="content">
                            
                            <h3 class="title"><a
                                    href="{{route('frontend.properties')}}?latitude=${place.geometry.location.lat()}&latitude=${place.geometry.location.lat()}">>${place.name}</a>
                            </h3>
                        </div>
                        <a class="link"
                            href="{{route('frontend.properties')}}?latitude=${place.geometry.location.lat()}&latitude=${place.geometry.location.lat()}"><i
                                class="fa-regular fa-arrow-up-right"></i></a>
                    </div>
                `;
                localitiesDiv.appendChild(localityElement);
            });
            
            localitiesDiv.appendChild('</div>'); 
            }
            
        }

        // Initialize the map and fetch localities on page load
        window.onload = initMap;
    </script>

