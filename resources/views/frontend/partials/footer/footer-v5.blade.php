<!-- Footer-area start -->
@if ($footerSectionStatus == 1)
<footer class="black-bg">
    <div class="bd-footer-area style-one">
        <div class="container">
            <div class="footer-top">
                <div class="row g-5 align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="footer-cta-content">
                            <h3 class="title">Start your journey with our onespace property</h3>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="footer-btn-wrap text-lg-end">
                            <a class="bd-btn btn-style btn-hover-x hover-white" href="contact.html"><i class="fa-regular fa-arrow-right-long"></i>Get In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between g-5">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-widget footer-1-col-1">
                        <div class="footer-wrapper-content">
                            <div class="footer-widget-logo">
                                <a href="#">
                                    <h3 class="text-white">ONE<span class="fw-lighter">SPACE</span></h3>
                                </a>
                            </div>
                            <div class="footer-contact-info">
                                <div class="footer-contact-item">
                                    <div class="footer-info-icon">
                                        <span>
                                            <i class="fa-regular fa-location-dot"></i>
                                        </span>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><a href="#">27 Division St, New York</a></span>
                                    </div>
                                </div>
                                <div class="footer-contact-item">
                                    <div class="footer-info-icon">
                                        <span>
                                            <i class="fa-regular fa-phone"></i>
                                        </span>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><a href="tel:+1(800)123456789">+00 (123) 456 889</a></span>
                                    </div>
                                </div>
                                <div class="footer-contact-item">
                                    <div class="footer-info-icon">
                                        <span>
                                            <i class="fa-sharp fa-solid fa-envelope"></i>
                                        </span>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><a href="https://html.bdevs.net/cdn-cgi/l/email-protection#e597808489898a92a588848c89cb868a88"><span class="__cf_email__" data-cfemail="d8aabdb9b4b4b7af98b5b9b1b4f6bbb7b5">[email&#160;protected]</span></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="bd-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-4">
                    <div class="footer-widget footer-1-col-2">
                        <h3 class="footer-widget-title">Category</h3>
                        <div class="footer-widget-links">
                            <ul>
                                <li class="underline"><a href="/">Home</a></li>
                                @if (Auth::guard('web')->check() || Auth::guard('vendor')->check())
                               
                                    @if (Auth::guard('web')->check() )
                                    <li class="underline"><a href="{{route('user.edit_profile')}}">Profile</a></li>
                                    @else
                                     <li class="underline"><a href="{{route('vendor.edit.profile')}}">Profile</a></li>
                                    @endif
                                @endif
                                <li class="underline"><a href="{{route('about_us')}}">About Us</a></li>
                                <li class="underline"><a href="{{route('contact')}}">Contact Us</a></li>
                                 @if (Auth::guard('web')->check() || Auth::guard('vendor')->check())
                                     @if (Auth::guard('web')->check() )
                                         <li class="underline"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                                        <li class="underline"><a href="{{route('property-management')}}">Featured Property</a></li>
                                    @else
                                        <li class="underline"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                                        <li class="underline"><a href="{{route('vendor.property_management.properties')}}">Featured Property</a></li>
                                    @endif
                                

                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-4">
                    <div class="footer-widget footer-1-col-3">
                        <h3 class="footer-widget-title">Services</h3>
                        <div class="footer-widget-links">
                            <ul>
                                 @if (Auth::guard('web')->check() || Auth::guard('vendor')->check())
                                  @if (Auth::guard('web')->check() )
                                          <li class="underline"><a href="{{route('property-management')}}">My Property</a></li>
                                            <li class="underline"><a href="{{route('user.wishlist')}}">Favorites</a></li>
                                    @else
                                         <li class="underline"><a href="{{route('vendor.property_management.properties')}}">My Property</a></li>
                                        <li class="underline"><a href="{{route('vendor.favorite')}}">Favorites</a></li>
                                    @endif
                                
                               

                                @endif
                                <li class="underline"><a href="{{route('career')}}">Careers</a></li>
                                <li class="underline"><a href="{{route('faq')}}">FAQs</a></li>
                                <li class="underline"><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li class="underline"><a href="{{route('terms-conditions')}}">Terms and Conditions</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-widget footer-1-col-4">
                        <div class="footer-google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60970.02123903755!2d-74.01588829728814!3d40.707092808586985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1712226046538!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area style-one include-bg" data-background="{{asset("assets/front/v5/images/bg/copy-right-bg.png") }} ">
        <div class="container">
            <div class="footer-copyright-wrap">
                <div class="logo">
                    <a href="#">
                        <h5 class="text-white">ONE<span class="fw-lighter">SPACE</span></h5>
                    </a>
                </div>
                <div class="footer-copyright">
                    <p class="description underline"> © <span id="year"></span> design by <a href="#">onespace.</a> All Right
                        Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- Go to Top -->
    <!--<div class="go-top"><i class="fal fa-angle-double-up"></i></div>-->
    <!-- Go to Top -->
    @endif
    <!-- what app chat start-->
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/9752248875" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <!-- what app chat end -->
   

    <!-- Footer-area end-->
