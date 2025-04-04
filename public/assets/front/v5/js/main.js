(function ($) {
    "use strict";
    /* Windows Load */
    $(window).on('load', function () {
        wowAnimation();
        // aosAnimation();
    });

    /* Preloader activation */
    $(window).on('load', function (event) {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });


    /* Wow Active */
    function wowAnimation() {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();
    }

    /* tinymce Text editor */
    tinymce.init({
        selector: '#tinymce_simple_textarea',
        toolbar: 'undo redo blockquote blocks bold italic alignleft aligncenter alignright outdent indent code anchor link restoredraft charmap codesample ltr rtl emoticons fullscreen help image insertdatetime lists media nonbreaking pagebreak preview save searchreplace visualblocks visualchars wordcount accordion print',
        toolbar_mode: 'wrap',
        plugins: ['code', 'table', 'lists', 'anchor', 'autolink', "autosave", "charmap", "codesample", "directionality", "emoticons", "fullscreen", "help", "image", "importcss", "insertdatetime", "visualblocks", "visualchars", "wordcount", "accordion"],
        link_default_target: '_blank',
        quickbars_insert_toolbar: false,
        height: "300"
    });
    /*======================================
    Mobile Menu Js
    ========================================*/
    $("#mobile-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "1199",
        meanExpand: ['<i class="fa-solid fa-plus"></i>'],
    });

    $("#mobile-menu-2").meanmenu({
        meanMenuContainer: ".mobile-menu-2",
        meanScreenWidth: "4000",
        meanExpand: ['<i class="fa-solid fa-plus"></i>'],
    });

    /* Sidebar Toggle */
    $(".offcanvas-close,.offcanvas-overlay").on("click", function () {
        $(".offcanvas-area").removeClass("info-open");
        $(".offcanvas-overlay").removeClass("overlay-open");
    });
    $(".sidebar-toggle").on("click", function () {
        $(".offcanvas-area").addClass("info-open");
        $(".offcanvas-overlay").addClass("overlay-open");
    });


    /* Body overlay Js */
    $(".body-overlay").on("click", function () {
        $(".offcanvas-area").removeClass("opened");
        $(".body-overlay").removeClass("opened");
        $(".bd-filter-offcanvas-area").removeClass("offcanvas-opened");
    });

    /* Sticky Header Js */
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 250) {
            $("#header-sticky").addClass("bd-sticky");
        } else {
            $("#header-sticky").removeClass("bd-sticky");
        }
    });

    /* jarallax js */
    jarallax(document.querySelectorAll('.jarallax'), {
        speed: 0.4,
    });

    /* footer year */
    document.getElementById("year").innerHTML = new Date().getFullYear();

    /*  Default active and hover item active */
    var core__active_item = $('.core-feature-item')
    core__active_item.mouseover(function () {
        core__active_item.removeClass('active');
        $(this).addClass('active');
    });

    /*  Data Css js */
    $("[data-background").each(function () {
        $(this).css(
            "background-image",
            "url( " + $(this).attr("data-background") + "  )"
        );
    });
    $("[data-width]").each(function () {
        $(this).css("width", $(this).attr("data-width"));
    });
    $("[data-bg-color]").each(function () {
        $(this).css("background-color", $(this).attr("data-bg-color"));
    });

    /* MagnificPopup image view */
    $(".popup-image").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    /* MagnificPopup video view */
    $(".popup-video").magnificPopup({
        type: "iframe",
    });

    /* PureCounter Js */
    new PureCounter();
    new PureCounter({
        filesizing: true,
        selector: ".filesizecount",
        pulse: 2,
    });

    /* Nice Select Js */
    $('select').niceSelect();

    /* Nice Select Js */
    $(document).on('mouseover', '.single-item', function () {
        $('.blog-thumb').removeClass('active');
        $('.blog-thumb').addClass('active');
    });

    /* Button scroll up js */
    function backToTopScrollbar() {
        const bodyHeight = $("body").height();
        const scrollPos = $(window).innerHeight() + $(window).scrollTop();
        let percentage = (scrollPos / bodyHeight) * 100;
        if (percentage > 100) {
            percentage = 100;
        }
        $(".back-to-top .back-to-top-inner").css("width", percentage + "%");
    }
    $(window).on("scroll", function () {
        backToTopScrollbar();
        var backToTopBtn = ".back-to-top";
        if (backToTopBtn.length) {
            if ($(window).scrollTop() > 500) {
                $(backToTopBtn).addClass("show");
            } else {
                $(backToTopBtn).removeClass("show");
            }
        }
    });

    /* Cursor JS */
    $('#cursor_style').on('change', function () {
        var cursor_val = $(this).val();

        if (cursor_val == '1') {
            $('.cursor1').hide();
            $('.cursor2').hide();
        } else {
            $('.cursor1').show();
            $('.cursor2').show();
        }
    });

    function mousemoveHandler(e) {
        try {
            const target = e.target;

            let tl = gsap.timeline({
                defaults: {
                    x: e.clientX,
                    y: e.clientY,
                }
            })

            // Main Cursor Moving 
            tl.to(".cursor1", {
                ease: "power2.out"
            })
            // .to(".cursor2", {
            //   ease: "power2.out"
            // }, "-=0.4")

        } catch (error) {
            console.log(error)
        }
    }
    document.addEventListener("mousemove", mousemoveHandler);

    var cursor_border_hide = document.querySelector('.cursor_border_hide');
    if (cursor_border_hide) {
        cursor_border_hide.addEventListener("mousemove", () => {
            var cursor_text = document.querySelector('.wc-cursor.text');
            var cursor_1 = document.querySelector('.cursor1');
            if (cursor_text) {
                cursor_1.style.opacity = '0';
            }
            else {
                cursor_1.style.opacity = '1';
            }
        });
    }

    // propertySliderActivation'
    var propertySliderActivation = new Swiper('.propertySliderActivation', {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'fade',
        loop: true,
        mousewheel: true,
        pagination: {
            el: '.property-slider-pagination',
            type: 'fraction',
            renderFraction: function (currentClass, totalClass) {
                return '<span class="' + currentClass + '"></span>' + ' <span class="bd-swiper-fraction-divide"></span> ' + '<span class="' + totalClass + '"></span>';
            }
        },

        // Navigation arrows
        navigation: {
            nextEl: ".property-navigation-next",
            prevEl: ".property-navigation-prev",
        },
    });

    /* property details slider */
    var portfolio = new Swiper(".property-details-active", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        speed: 900,
        autoplay: {
            delay: 4500,
        },
        navigation: {
            nextEl: ".property-details-button-next",
            prevEl: ".property-details-button-prev",
        },
        pagination: {
            el: ".bd-swiper-dot",
            clickable: true,
        },
        breakpoints: {
            1200: {
                slidesPerView: 1.3,
            },
            992: {
                slidesPerView: 1.1,
            },
            768: {
                slidesPerView: 1.3,
            },
            576: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    /* Slider Swiper */
    var testimonialOne = new Swiper(".testimonial-active", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: ".testimonial-slider-button-next",
            prevEl: ".testimonial-slider-button-prev",
        },
        pagination: {
            el: ".testimonial-swiper-dot",
            clickable: true,
        },
        breakpoints: {
            1400: {
                slidesPerView: 2.4,
            },
            1200: {
                slidesPerView: 2.45,
            },
            992: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    /* testimonial slider style 02 */
    var testimonialOne = new Swiper(".testimonial-active-two", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        speed: 1500,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: ".testimonial-nav-next",
            prevEl: ".testimonial-nav-prev",
        },
        pagination: {
            el: ".testimonial-swiper-dot",
            clickable: true,
        },
    });


    if (jQuery(".testimonial-active-four").length > 0) {
        let testimonial = new Swiper(".testimonial-active-four", {
            slidesPerView: 3,
            spaceBetween: 24,
            centeredSlides: true,
            loop: true,
            pagination: {
                el: ".slider-pagination",
                clickable: true,
            },
            allowTouchMove: true,
            observer: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 1,
                },
                600: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 3,
                },
                1400: {
                    slidesPerView: 3,
                },
                1600: {
                    slidesPerView: 3,
                },
            },
        });
    }
    /*  common-carousel-active */
    var commonCarousel = new Swiper(".common-carousel-active", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        speed: 1000,
        autoplay: {
            delay: 300000000,
        },
        navigation: {
            nextEl: ".common-slider-button-next",
            prevEl: ".common-slider-button-prev",
        },
        pagination: {
            el: ".bd-swiper-dot",
            clickable: true,
        },
        breakpoints: {
            1400: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    /* Text Slider */
    var text_slider_option = document.querySelector(".text-slider");
    if (text_slider_option) {

        var text_slider_speed = 5000
        var text_slider_autoplay = true
        var loop_value = true
        var data_itemshow = "auto"

        if (text_slider_option.getAttribute("data-sliderSpeed")) {
            text_slider_speed = parseInt(text_slider_option.getAttribute("data-sliderSpeed"));
        }
        if (text_slider_option.getAttribute("data-autoPlay")) {
            text_slider_autoplay = text_slider_option.getAttribute("data-autoPlay")
        }

        if (text_slider_option.getAttribute("data-loop")) {
            loop_value = text_slider_option.getAttribute("data-loop")
        }
        if (text_slider_option.getAttribute("data-itemShow")) {
            data_itemshow = text_slider_option.getAttribute("data-itemShow")
        }


        if (text_slider_autoplay == 'true') {
            var text_slider = new Swiper(".text-slider", {
                loop: loop_value,
                speed: text_slider_speed,
                allowTouchMove: false,
                slidesPerView: data_itemshow,
                slidesPerGroup: 10,
                spaceBetween: 20,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: true,
                }
            });
        }
        else {
            var text_slider = new Swiper(".text-slider", {
                loop: loop_value,
                speed: text_slider_speed,
                allowTouchMove: false,
                slidesPerView: data_itemshow,
                slidesPerGroup: 10,
                spaceBetween: 20,
                autoplay: false,
            });
        }
    };

    /*  property slider active */
    var property = new Swiper(".featured-slider-active-two", {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        roundLengths: true,
        speed: 1000,
        autoplay: {
            delay: 30000000,
        },
        navigation: {
            nextEl: ".common-slider-button-next",
            prevEl: ".common-slider-button-prev",
        },
        pagination: {
            el: ".bd-swiper-dot",
            clickable: true,
        },
        breakpoints: {
            1400: {
                slidesPerView: 2.4,
            },
            1200: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 2.2,
            },
            768: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 1.5,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    /*  team slider active */
    var teamSliderActive = new Swiper(".team-slider-active", {
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: ".common-slider-button-next",
            prevEl: ".common-slider-button-prev",
        },
        pagination: {
            el: ".team-slider-dot",
            clickable: true,
        },
        breakpoints: {
            1400: {
                slidesPerView: 3.5,
            },
            1200: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3.5,
            },
            768: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 3,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    var postboxSlider = new Swiper('.postbox__slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        // Navigation arrows
        navigation: {
            nextEl: ".postbox-slider-button-next",
            prevEl: ".postbox-slider-button-prev",
        },
        breakpoints: {
            '1200': {
                slidesPerView: 1,
            },
            '992': {
                slidesPerView: 1,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });

    /* properties active */
    var FeaturedProperties = new Swiper('.featured__properties', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: ".properties-slider-button-next",
            prevEl: ".properties-slider-button-prev",
        },
        pagination: {
            el: ".bd-swiper-dot",
            clickable: true,
        },
        breakpoints: {
            '1200': {
                slidesPerView: 1,
            },
            '992': {
                slidesPerView: 1,
            },
            '768': {
                slidesPerView: 1,
            },
            '576': {
                slidesPerView: 1,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });

    /* Property Tab */
    if ($('#productTabMarker').length > 0) {
        function tp_tab_line_2() {
            var marker = document.querySelector('#productTabMarker');
            var item = document.querySelectorAll('.bd-product-tab button');
            var itemActive = document.querySelector('.bd-product-tab .nav-link.active');

            // rtl settings
            var tp_rtl = localStorage.getItem('tp_dir');
            let rtl_setting = tp_rtl == 'rtl' ? 'right' : 'left';

            function indicator(e) {
                marker.style.left = e.offsetLeft + "px";
                marker.style.width = e.offsetWidth + "px";
            }


            item.forEach(link => {
                link.addEventListener('click', (e) => {
                    indicator(e.target);
                });
            });

            var activeNav = $('.nav-link.active');
            var activewidth = $(activeNav).width();
            var activePadLeft = parseFloat($(activeNav).css('padding-left'));
            var activePadRight = parseFloat($(activeNav).css('padding-right'));
            var totalWidth = activewidth + activePadLeft + activePadRight;

            var precedingAnchorWidth = anchorWidthCounter();


            $(marker).css('display', 'block');

            $(marker).css('width', totalWidth);

            function anchorWidthCounter() {
                var anchorWidths = 0;
                var a;
                var aWidth;
                var aPadLeft;
                var aPadRight;
                var aTotalWidth;
                $('.bd-product-tab button').each(function (index, elem) {
                    var activeTest = $(elem).hasClass('active');
                    marker.style.left = elem.offsetLeft + "px";
                    if (activeTest) {
                        // Break out of the each function.
                        return false;
                    }

                    a = $(elem).find('button');
                    aWidth = a.width();
                    aPadLeft = parseFloat(a.css('padding-left'));
                    aPadRight = parseFloat(a.css('padding-right'));
                    aTotalWidth = aWidth + aPadLeft + aPadRight;

                    anchorWidths = anchorWidths + aTotalWidth;

                });

                return anchorWidths;
            }
        }
        tp_tab_line_2();
    }

    // Property Tab Activation
    document.addEventListener('DOMContentLoaded', function () {
        const panelItems = document.querySelectorAll('.col-custom');
        const propertyTabContent = document.querySelectorAll('.propertyTabContent');

        function activatePanel(index) {
            if (index >= propertyTabContent.length) return; // Handle case when index is out of bounds

            // Hide all property contents
            propertyTabContent.forEach(content => {
                content.classList.remove('active');
            });

            // Show the clicked property content
            propertyTabContent[index].classList.add('active');

            // Remove active class from all panels
            panelItems.forEach(p => p.classList.remove('active'));

            // Add active class to the clicked panel
            panelItems[index].classList.add('active');
        }

        panelItems.forEach((panel, index) => {
            panel.addEventListener('click', () => {
                activatePanel(index);
            });
        });

        // Initially display the first property content
        activatePanel(0);
    });

    /* Banner Slider Active Js */
    if ($('.banner_more_item').length > 1) {
        var banner = new Swiper(".banner-active", {
            slidesPerView: 1,
            loop: true,
            roundLengths: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".onespace-navigation-next",
                prevEl: ".onespace-navigation-prev",
            },
        });
    }

    /* bannerSliderActivation */
    var slider = new Swiper('.bannerSliderActivation', {
        slidesPerView: 1,
        loop: true,
        effect: 'fade',
        autoplay: {
            delay: 7000,
        },
        navigation: {
            nextEl: ".banner-navigation-next",
            prevEl: ".banner-navigation-prev",
        },
    });

    /* packageActivation */
    var packageActivation = new Swiper(".package-activation", {
        slidesPerView: 4,
        spaceBetween: 30,
        centeredSlides: false,
        loop: true,
        allowTouchMove: true,
        observer: true,
        pagination: {
            el: ".slider-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".onespace-navigation-next",
            prevEl: ".onespace-navigation-prev",
        },
        breakpoints: {
            // // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            451: {
                slidesPerView: 2,
            },
            540: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 4,
            },
            1600: {
                slidesPerView: 4,
            },
        },
    });

    /* blogActivation */
    var blogActivation = new Swiper(".blog_activation", {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        allowTouchMove: true,
        observer: true,
        pagination: {
            el: ".blog-slider-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".onespace-navigation-next",
            prevEl: ".onespace-navigation-prev",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            540: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 3,
            },
        },
    });

    /* filter */
    var filter = new Swiper(".filter-active", {
        slidesPerView: "auto",
        spaceBetween: "auto",
        freeMode: true,
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        slidesPerView: 5.5,
        spaceBetween: 32,
        speed: 10000,
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
            },
            540: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 7,
            },
        },
    });

    /* brand style 01 */
    var brand = new Swiper(".brand-active", {
        slidesPerView: 6,
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            1400: {
                slidesPerView: 6,
            },
            1200: {
                slidesPerView: 5,
            },
            992: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 2,
            },
            450: {
                slidesPerView: 2,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    /* Feedback activation js */
    var feedback = new Swiper(".feedback__active", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        roundLengths: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: ".feedback__button-prev",
            prevEl: ".feedback__button-next",
        },
        pagination: {
            el: ".bd-swiper-dot",
            clickable: true,
        },
    });

    /* product active */
    var productDetails = new Swiper(".product-details-nav", {
        spaceBetween: -20,
        slidesPerView: 4,
        navigation: {
            nextEl: ".product-details-button-next",
            prevEl: ".product-details-button-prev",
        },
    });

    /* product small thumb active */
    var productDetailsActive = new Swiper(".product-details-active", {
        spaceBetween: 0,
        thumbs: {
            swiper: productDetails,
        },
        navigation: {
            nextEl: ".product-details-button-next",
            prevEl: ".product-details-button-prev",
        },
    });

    /* product active 2 */
    var productDetails = new Swiper(".product-details-nav1", {
        spaceBetween: -20,
        slidesPerView: 4,
        navigation: {
            nextEl: ".product-details-button-next",
            prevEl: ".product-details-button-prev",
        },
    });

    /* product small thumb active 2 */
    var productDetailsActive = new Swiper(".product-details-active1", {
        spaceBetween: 0,
        thumbs: {
            swiper: productDetails,
        },
        navigation: {
            nextEl: ".product-details-button-next",
            prevEl: ".product-details-button-prev",
        },
    });

    /* slider-rang js */
    var slider1 = document.getElementById('slider-range'); // Changed variable name to slider1
    var minValue = 0;
    var maxValue = 10000000;
    if ($("#slider-range").length) {
        noUiSlider.create(slider1, {
            start: [0, 1000000],
            connect: true,
            range: {
                'min': minValue,
                'max': maxValue
            }
        });

        var amount1 = document.getElementById('amount'); // Changed variable name to amount1
         var min1 = document.getElementById('o_min'); 
          var max1 = document.getElementById('o_max'); 
        slider1.noUiSlider.on('update', function (values, handle) {
            amount1.value = "₹" + values[0] + " - ₹" + values[1];
            min1.value=values[0];
            max1.value=values[1];
            
        });

        $('#filter-btn').on('click', function () {
            $('.filter-widget').slideToggle(1000);
        });
    }
    var slider2 = document.getElementById('slider-range-2'); // Changed variable name to slider2
    var minValue2 = 0;
    var maxValue2 = 1500;
    if ($("#slider-range-2").length) {
        noUiSlider.create(slider2, {
            start: [0, 500],
            connect: true,
            range: {
                'min': minValue2,
                'max': maxValue2
            }
        });

        var amount2 = document.getElementById('amount-2'); // Changed variable name to amount2
        slider2.noUiSlider.on('update', function (values, handle) {
            amount2.value = values[0] + "sft" + " - " + values[1] + "sft";
        });

    }

    /* Filter Search Form */
    $(document).ready(function () {
        // Function to toggle the search form visibility
        $(".filter-search-btn").on("click", function () {
            $(".filter-toggle-btn").toggleClass("show");
        });

        // Function to close the search form when clicking outside
        $(document).on("click", function (e) {
            // Check if the click is outside the search form and booking filter
            if (!$(e.target).closest('.booking-filter').length && !$(e.target).closest('.filter-toggle-btn').length) {
                $(".filter-toggle-btn").removeClass("show");
            }
        });
    });

    /* Shop Cart minus */
    $('.bd-cart-minus').on('click', function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val(), 10) - 1; // Adding radix parameter
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    /* Shop Cart plus */
    $('.bd-cart-plus').on('click', function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val(), 10) + 1); // Adding radix parameter
        $input.change();
        return false;
    });

    /* Show Login Toggle Js */
    $('#showlogin').on('click', function () {
        $('#checkout-login').slideToggle(900);
    });

    /* Show Coupon Toggle Js */
    $('#showcoupon').on('click', function () {
        $('#checkout_coupon').slideToggle(900);
    });
    /* checkout-payment-item */
    $('.checkout-payment-item label').on('click', function () {
        $(this).siblings('.checkout-payment-desc').slideToggle(400);

    });

    /* Show Login Toggle Js */
    $('.checkout-login-form-reveal-btn').on('click', function () {
        $('#returnCustomerLoginForm').slideToggle(400);
    });

    /* Show Coupon Toggle Js */
    $('.checkout-coupon-form-reveal-btn').on('click', function () {
        $('#checkoutCouponForm').slideToggle(400);
    });

    /* Create An Account Toggle Js */
    $('#cbox').on('click', function () {
        $('#cbox_info').slideToggle(900);
    });

    /* Shipping Box Toggle Js */
    $('#ship-box').on('click', function () {
        $('#ship-box-info').slideToggle(1000);
    });

    /* content hidden class js */
    $('.contentHidden').remove();

    /* gsap plugin resister */
    gsap.registerPlugin(ScrollTrigger, SplitText);

    gsap.config({
        nullTargetWarn: false,
        trialWarn: false
    });

    /* GSAP Title Animation */
    function title_animation() {
        var bd_var = jQuery('.anim-wrapper');
        if (!bd_var.length) {
            return;
        }
        const quotes = document.querySelectorAll(".anim-wrapper .title-animation");
        quotes.forEach(quote => {
            //Reset if needed
            if (quote.animation) {
                quote.animation.progress(1).kill();
                quote.split.revert();
            }
            var getclass = quote.closest('.anim-wrapper').className;
            var animation = getclass.split('animation-');
            if (animation[1] == "style4") return
            quote.split = new SplitText(quote, {
                type: "lines,words,chars",
                linesClass: "split-line"
            });
            gsap.set(quote, { perspective: 400 });
            if (animation[1] == "style-1") {
                gsap.set(quote.split.chars, {
                    opacity: 0,
                    y: "90%",
                    rotateX: "-40deg"
                });
            }
            if (animation[1] == "style-2") {
                gsap.set(quote.split.chars, {
                    opacity: 0,
                    x: "50"
                });
            }
            if (animation[1] == "style-3") {
                gsap.set(quote.split.chars, {
                    opacity: 0,
                });
            }
            quote.animation = gsap.to(quote.split.chars, {
                scrollTrigger: {
                    trigger: quote,
                    start: "top 90%",
                },
                x: "0",
                y: "0",
                rotateX: "0",
                opacity: 1,
                duration: 1,
                ease: Back.easeOut,
                stagger: .02,
            });
        });
    }
    ScrollTrigger.addEventListener("refresh", title_animation);

    /* For Footer Language Dropdown */
    $(document).on('click', '#footer-lang-toggle', function (e) {
        e.stopPropagation();
        $(".header-lang ul").toggleClass("lang-list-open");
    });

    /* For language */
    $(document).on('click', '#header-language-toggle', function (e) {
        e.stopPropagation(); // Prevent the event from bubbling up
        $(".header-language ul").toggleClass("lang-list-open");
    });

    /* Click outside handler */
    $(document).on('click', function (e) {
        // Check if the click occurred outside the currency toggle and its associated ul
        if (!$(e.target).closest('#footer-lang-toggle').length && !$(e.target).closest('.header-lang ul').length) {
            $(".header-lang ul").removeClass("lang-list-open");
        }
        // Check if the click occurred outside the language toggle and its associated ul
        if (!$(e.target).closest('#header-language-toggle').length && !$(e.target).closest('.header-language ul').length) {
            $(".header-language ul").removeClass("lang-list-open");
        }
    });

    /* Product Color Activation */
    $('.color-variation-btn').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    /* offer house */
    function mediaSize() {
        /* Set the matchMedia */
        if (window.matchMedia('(min-width: 768px)').matches) {
            const panels = document.querySelectorAll('.col-custom')
            panels.forEach(panel => {
                panel.addEventListener('click', () => {
                    removeActiveClasses()
                    panel.classList.add('active')
                })
            })

            function removeActiveClasses() {
                panels.forEach(panel => {
                    panel.classList.remove('active')
                })
            }

        } else {
            /* Reset for CSS changes â€“ Still need a better way to do this! */
            $(".col-custom ").addClass("active");
        }
    };

    /* Call the function */
    mediaSize();
    /* Attach the function to the resize event listener */
    window.addEventListener('resize', mediaSize, false);

    /* featured js for feature properties */
    if ($('.featured-portfolio-load-more').length > 0) {
        $('.grid').imagesLoaded(function () {
            // init Isotope
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-item',
                }
            });


            // filter items on button click
            $('.featured-menu').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            //for menu active class
            $('.featured-menu button').on('click', function (event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
            });

            var show_item = $('.featured-portfolio-load-more').attr('data-show');
            var count_item = show_item;
            var isotop_call = $grid.data('isotope');

            loadMore(show_item);

            function loadMore(showing) {
                $grid.find(".hidden").removeClass("hidden");

                var hidden = isotop_call.filteredItems.slice(showing, isotop_call.filteredItems.length).map(function (item) {
                    return item.element;
                });

                $(hidden).addClass('hidden');
                $grid.isotope('layout');


                if (hidden.length == 0) {
                    jQuery("#featured-load-more").hide();
                } else {
                    jQuery("#featured-load-more").show();
                };

            }

            $("#featured-load-more").on('click', function () {
                if ($('.featured-menu').data('clicked')) {

                    count_item = show_item;
                    $('.featured-menu').data('clicked', false);
                } else {
                    count_item = count_item;
                };

                count_item = count_item + show_item;

                loadMore(count_item);
            });

            $(".featured-menu").on('click', function () {
                $(this).data('clicked', true);

                loadMore(show_item);
            });

        });
    } else {
        $('.grid').imagesLoaded(function () {
            // init Isotope
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-item',
                }
            });


            // filter items on button click
            $('.featured-menu').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            //for menu active class
            $('.featured-menu button').on('click', function (event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
            });

        });

        var show_item_2 = $('.featured-load-item-count').attr('data-show');
        $(".featured-load-item").hide();
        $(".featured-load-item").slice(0, show_item_2).show();
        $("body").on('click touchstart', '.load-more', function (e) {
            e.preventDefault();
            $(".featured-load-item:hidden").slice(0, show_item_2).slideDown();
            if ($(".featured-load-item:hidden").length == 0) {
                $(".load-more").css('display', 'none');
            }

        });
    }

    /*======================================
    dashboard related JavaScript start
    ========================================*/

    /* Sidebar js */
    $("#sidebarActive").on("click", function () {
        if (window.innerWidth > 0 && window.innerWidth <= 991) {
            $(".onespace-sidebar, .app-header, .app-page-body").toggleClass("open");
        } else {
            $(".onespace-sidebar, .app-header, .app-page-body").toggleClass("collapsed");
        }
        $(".app-offcanvas-overlay").toggleClass("overlay-open");
    });
    $(".app-offcanvas-overlay").on("click", function () {
        $(".onespace-sidebar, .app-header, .app-page-body").removeClass("collapsed");
        $(".onespace-sidebar, .app-header, .app-page-body").removeClass("open");
        $(".app-offcanvas-overlay").removeClass("overlay-open");
    });

    /* ApexChart Activation */
    if (jQuery("#salesChartWeek").length > 0) {
        var options = {
            series: [{
                name: 'Sale',
                data: [76, 85, 101, 98, 87, 105, 91]
            }, {
                name: 'Profit',
                data: [44, 55, 57, 56, 61, 58, 63]
            }],
            chart: {
                type: 'bar',
                height: 315,
                // width: 620,
                // offsetX: -20,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            colors: ['var(--bd-primary)', 'var(--bd-success)'],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            legend: {
                show: true,
            },
            xaxis: {
                categories: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#salesChartWeek"), options);
        chart.render();
    }
    if (jQuery("#salesChartMonthly").length > 0) {
        var options = {
            series: [{
                name: 'Sale',
                data: [76, 85, 101, 98, 87, 105, 91]
            }, {
                name: 'Profit',
                data: [44, 55, 57, 56, 61, 58, 63]
            }],
            chart: {
                type: 'bar',
                height: 315,
                // width: 620,
                // offsetX: -20,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            colors: ['var(--bd-primary)', 'var(--bd-success)'],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            legend: {
                show: true,
            },
            xaxis: {
                categories: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#salesChartMonthly"), options);
        chart.render();
    };
    if (jQuery("#salesChartYearly").length > 0) {
        var options = {
            series: [{
                name: 'Sale',
                data: [76, 85, 101, 98, 87, 105, 91]
            }, {
                name: 'Profit',
                data: [44, 55, 57, 56, 61, 58, 63]
            }],
            chart: {
                type: 'bar',
                height: 315,
                // width: 620,
                // offsetX: -20,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            colors: ['var(--bd-primary)', 'var(--bd-success)'],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            legend: {
                show: true,
            },
            xaxis: {
                categories: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: 'var(--clr-chart-1)',
                        fontSize: '12px',
                        fontFamily: 'var(--bd-fs-body)',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#salesChartYearly"), options);
        chart.render();
    };

    /* image change activation */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650); // corrected from bdFadeIn to fadeIn
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });
    $("#imageUpload2").change(function () {
        var input=this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview2').hide();
                $('#imagePreview2').fadeIn(650); // corrected from bdFadeIn to fadeIn
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    $("#imageUpload3").change(function () {
        var input=this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview3').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview3').hide();
                $('#imagePreview3').fadeIn(650); // corrected from bdFadeIn to fadeIn
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    $("#imageUpload4").change(function () {
        var input=this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview4').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview4').hide();
                $('#imagePreview4').fadeIn(650); // corrected from bdFadeIn to fadeIn
            }
            reader.readAsDataURL(input.files[0]);
        }
    });



    /* Add event listeners to all close buttons */
    document.querySelectorAll('.remove-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Remove the parent element of the clicked button
            this.parentNode.remove();
        });
    });

    // /* Dropzone Activision */
    // Dropzone.options.myDropzone = {
    //     url: "/fake/location",
    //     autoProcessQueue: false,
    //     paramName: "file",
    //     clickable: true,
    //     maxFilesize: 5000, // in MB
    //     maxFilesQuantity: 15,
    //     addRemoveLinks: true,
    //     acceptedFiles: '.png,.jpg,.zip,.svg',
    //     dictDefaultMessage: "Upload your file here",
    //     init: function () {
    //         this.on("sending", function (file, xhr, formData) {
    //             console.log("Sending file");
    //         });

    //         this.on("success", function (file, responseText) {
    //             console.log('Great success');
    //         });

    //         this.on("addedfile", function (file) {
    //             console.log('File added');
    //         });

    //         this.on("complete", function (file) {
    //             console.log('Upload complete for: ' + file.name);
    //         });
    //     }
    // };

    // Dropzone.options.newMyDropzone = {
    //     url: "/fake/location",
    //     autoProcessQueue: false,
    //     paramName: "file",
    //     clickable: true,
    //     maxFilesize: 5000, // in MB
    //     maxFilesQuantity: 3,
    //     addRemoveLinks: true,
    //     acceptedFiles: '.png,.jpg,.zip,.svg',
    //     dictDefaultMessage: "Upload your file here",
    //     init: function () {
    //         this.on("sending", function (file, xhr, formData) {
    //             console.log("Sending file");
    //         });

    //         this.on("success", function (file, responseText) {
    //             console.log('Great success');
    //         });

    //         this.on("addedfile", function (file) {
    //             console.log('File added');
    //         });

    //         this.on("complete", function (file) {
    //             console.log('Upload complete for: ' + file.name);
    //         });
    //     }
    // };

    /* Dashboard Sidebar nav activation */
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current URL's last part
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("https://html.bdevs.net/") + 1);
        // Select all <a> tags inside the sidebar navigation
        const navLinks = document.querySelectorAll('.sidebar-nav ul li a');
        navLinks.forEach(link => {
            // If the href of the link matches the current URL or is empty, add 'active' class
            if (link.getAttribute('href') === pgurl || link.getAttribute('href') === '') {
                link.classList.add('active');
            }
        });
    });

    /*======================================
    dashboard related JavaScript endt
    ========================================*/

    /* Enable tooltips */
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

    /* rating color activation */
    let reviewStarElm = $(".onespace-ratings-two");
    if (reviewStarElm.length) {
        reviewStarElm.find('i').on('mouseover', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('i').each(function (e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function () {
            $(this).parent().children('i').each(function (e) {
                $(this).removeClass('hover');
            });
        });

        reviewStarElm.find('i').on('click', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('i');

            for (let i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('active');
            }

            for (let i = 0; i < onStar; i++) {
                $(stars[i]).addClass('active');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt(reviewStarElm.find('i.active').last().data('value'), 10);
            var msg = 0;
            if (ratingValue > 1) {
                msg = ratingValue;
            } else {
                msg = ratingValue;
            }

            reviewStarElm.find('input[name=rating]').val(msg);

        });

    }

    /* row remove activation */
    $(document).ready(function () {
        $('.removeRow').click(function () {
            $(this).closest('tr').remove();
        });
    });

    /* otp moveToNext */
    document.addEventListener('DOMContentLoaded', (event) => {
        const inputs = document.querySelectorAll('.otp-input .input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && index > 0 && input.value.length === 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });

})(jQuery);