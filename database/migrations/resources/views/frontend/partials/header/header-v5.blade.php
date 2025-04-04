@if ($basicInfo->preloader_status == 1)

<!-- Preloader start -->
{{-- <div class="preloader">
    <div class='loader'>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
    </div>
</div> --}}
@endif
<!-- filter search form modal start -->
<div id="searchFilter" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header pl-30 pr-30">
                <h5 class="modal-title">Advanced Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- filter-search-form-start -->
            <div class="filter-search-form show">
                <div class="filter-grid-2 filter-group-box group-price mb-20">
                    <div class="filter-range-box">
                        <h6 class="title-price mb-20">Price Range</h6>
                        <div class="sidebar-widget-range">
                            <div id="slider-range"></div>
                            <div class="price-filter mt-10"><input type="text" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="filter-range-box">
                        <h6 class="title-price mb-20">Size Range</h6>
                        <div class="sidebar-widget-range">
                            <div id="slider-range-2"></div>
                            <div class="price-filter mt-10"><input type="text" id="amount-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-group-box filter-grid-2 mb-20">
                    <div class="filter-grid-2">
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Bathrooms</label>
                            </div>
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Bedrooms</label>
                            </div>
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="filter-grid-2">
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Available For</label>
                            </div>
                            <select>
                                <option value="1" selected>Family</option>
                                <option value="2">Single Women</option>
                                <option value="3">Single Men</option>
                            </select>
                        </div>
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Available From</label>
                            </div>
                            <select>
                                <option value="1" selected>Any Time</option>
                                <option value="2">Immediately</option>
                                <option value="3">Within 15 Days</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="filter-group-box filter-grid-2 mb-20">
                    <div class="filter-grid-2">
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Construction status</label>
                            </div>
                            <select>
                                <option value="1" selected>Ready to move</option>
                                <option value="2">New Launch</option>
                                <option value="3">Under Construction</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Posted by</label>
                            </div>
                            <select>
                                <option value="1" selected>Owner</option>
                                <option value="2">Dealer</option>
                                <option value="3">Builder</option>
                            </select>
                        </div>
                    </div>
                    <div class="filter-grid-2">
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Furnishing status</label>
                            </div>
                            <select>
                                <option value="1">Furnished</option>
                                <option value="2">Semi Furnished</option>
                                <option value="3">Unfurnished</option>
                            </select>
                        </div>
                        <div class="booking-select">
                            <div class="form-input-title">
                                <label>Amenities</label>
                            </div>
                            <select>
                                <option value="1" selected>Parking</option>
                                <option value="2">Power Backup</option>
                                <option value="3">Park</option>
                                <option value="4">Swimming Pool</option>
                                <option value="5">Security Personal</option>
                                <option value="6">Lift</option>
                                <option value="7">Gas Pipeline</option>
                                <option value="8">Gymnasium</option>
                                <option value="9">Club House</option>
                                <option value="10">Wheelchair Friendly</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="filter-group-checkbox">
                    <h6 class="mb-10">Facilities:</h6>
                    <div class="facilities-group filter-grid-6">
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac1" checked="">
                                <label for="fac1" class="facilities-title">Basement</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac2">
                                <label for="fac2" class="facilities-title">Cable TV</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac3">
                                <label for="fac3" class="facilities-title">Air Condition</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac4">
                                <label for="fac4" class="facilities-title">Ceiling Height</label>
                            </fieldset>
                        </div>
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac5">
                                <label for="fac5" class="facilities-title">Disabled Access</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac6" checked="">
                                <label for="fac6" class="facilities-title">Elevator</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac7">
                                <label for="fac7" class="facilities-title">Kids Zone</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac8">
                                <label for="fac8" class="facilities-title">Garden</label>
                            </fieldset>
                        </div>
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac9" checked="">
                                <label for="fac9" class="facilities-title">Service</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac10">
                                <label for="fac10" class="facilities-title">Furnishing</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac11" checked="">
                                <label for="fac11" class="facilities-title">Garage</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac12">
                                <label for="fac12" class="facilities-title">Laundry</label>
                            </fieldset>
                        </div>
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac13">
                                <label for="fac13" class="facilities-title">Gymnasium</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac14">
                                <label for="fac14" class="facilities-title">Intercom</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac15">
                                <label for="fac15" class="facilities-title">Parking</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac16">
                                <label for="fac16" class="facilities-title">WiFi</label>
                            </fieldset>
                        </div>
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac17">
                                <label for="fac17" class="facilities-title">Renovation</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac18">
                                <label for="fac18" class="facilities-title">Security</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac19">
                                <label for="fac19" class="facilities-title">Swimming Pool</label>
                            </fieldset>
                        </div>
                        <div class="facilities-box">
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac20">
                                <label for="fac20" class="facilities-title">Window Type</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac21">
                                <label for="fac21" class="facilities-title">Mosque</label>
                            </fieldset>
                            <fieldset class="facilities-items">
                                <input type="checkbox" id="fac22">
                                <label for="fac22" class="facilities-title">Emergency Ambulance</label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <!-- filter-search-form-end -->
        </div>
    </div>
</div>
<!-- filter search form modal end -->

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
<!-- Cursor Animation -->
<div class="cursor1"></div>

<!-- Back to top start -->

<a href="#" data-target="html" class="back-to-target back-to-top">
    <span class="back-to-top-text">back top</span>
    <span class="back-to-top-wrapper"><span class="back-to-top-inner" style="width: 4.05654%;"></span></span>
</a>

<!-- Back to top end -->

<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas-area">
        <div class="offcanvas-wrapper">
            <div class="offcanvas-content">
                <div class="offcanvas-top d-flex justify-content-between align-items-center mb-25">
                    <div class="offcanvas-logo">
                        <a href="/">
                            <img src="{{asset("assets/front/v5/images/logo-black.svg")}}" alt="logo not found">
                        </a>
                    </div>
                    <div class="offcanvas-close">
                        <button class="offcanvas-close-icon animation--flip">
                            <span class="offcanvas-m-lines">
                                <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="offcanvas-search mb-0">
                    <form action="#">
                        <input type="text" name="offcanvasSearch" placeholder="Search here">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="mobile-menu fix mb-25"></div>
                <div class="offcanvas-about d-none d-lg-block mb-25">
                    <h4 class="offcanvas-title-meta">About onespace</h4>
                    <p>The Property of real estate where you can embark on a journey to discover your perfect lifestyle
                        home and floors and countertops space.</p>
                </div>
                <div class="offcanvas-contact mb-25">
                    <h4 class="offcanvas-title-meta">Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center gap-10">
                            <div class="offcanvas-contact-icon">
                                <a target="_blank" href="#">
                                    <i class="fal fa-map-marker-alt"></i></a>
                            </div>
                            <div class="offcanvas-contact-text">
                                <a target="_blank" href="#">1426 Center StreetBend, 97702, California, USA</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-10">
                            <div class="offcanvas-contact-icon">
                                <a href="tel:+415864872899"><i class="far fa-phone"></i></a>
                            </div>
                            <div class="offcanvas-contact-text">
                                <a href="tel:+415864872899">+415-864-8728-99</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-10">
                            <div class="offcanvas-contact-icon">
                                <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#a4d7d1d4d4cbd6d0e4f6c1c5c8c8cbd38ac7cbc9"><i class="fal fa-envelope"></i></a>
                            </div>
                            <div class="offcanvas-contact-text">
                                <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#88fbfdf8f8e7fafcc8daede9e4e4e7ffa6ebe7e5"><span class="__cf_email__" data-cfemail="04777174746b76704456616568686b732a676b69">[email&#160;protected]</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-btn mb-25">
                    <h4 class="offcanvas-title-meta">Account</h4>
                    <div class="header-btn-wrap gap-10">
                        <a class="bd-btn btn-style text-btn" href="sign-in.html">Log In</a>
                        <a class="bd-btn btn-style text-btn" href="contact.html">Get Started</a>
                    </div>
                </div>
                <div class="offcanvas-social">
                    <h4 class="offcanvas-title-meta">Subscribe & Follow</h4>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    <!-- Header top bar start -->
    <div class="header-top-area header-primary">
        <div class="header-top-main">
            <div class="header-top-left">
                <div class="header-top-left-item">
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <a href="tel:1800234-34-45">1(800) 234-34-45</a>
                </div>
                <div class="header-top-left-item">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#5b293e3a3737342c1b363a323775383436"><span class="__cf_email__" data-cfemail="f486919598989b83b499959d98da979b99">[email&#160;protected]</span></a>
                </div>
            </div>
            <div class="heder-top-right d-flex flex-wrap align-items-center gap-3">
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
    <!-- Header top bar end -->

    <!-- main header start -->
    <div class="header-area header-primary has-border-bottom" id="header-sticky">
        <div class="header-inner">
            <div class="header-logo">
                <a href="/"><img src="{{asset("assets/front/v5/images/logo/ONESPACE-Logo.jpg")}}" alt="Logo"></a>
            </div>
            <div class="header-menu">
                <nav class="bd-main-menu" id="mobile-menu">
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="#">City</a>
                            <ul class="dp-menu">
                                <li>
                                    <a href="#">Indore</a>
                                </li>
                                <li>
                                    <a href="#">Bhopal</a>
                                </li>
                                <li>
                                    <a href="#">Dewas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Properties</a>
                            <ul class="dp-menu">
                                <li>
                                    <a href="property.html">For Rent</a>
                                    <ul class="dp-menu">
                                        <li><a href="{{route("property-listing","rent_residential")}}">Residential</a></li>
                                        <li><a href="{{route("property-listing","rent_commercial")}}">Commercial</a></li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="property.html">For Sell</a>
                                    <ul class="dp-menu">
                                        <li><a href="{{route("property-listing","sale_residential")}}">Residential</a></li>
                                        <li><a href="{{route("property-listing","sale_commercial")}}">Commercial</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('property-management')}}">Property Management</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="dp-menu">
                                <li><a href="{{ route('service','owner') }}">For Owner</a></li>
                                <li><a href="{{ route('service','tenant') }}">For Tenant</a></li>
                                <li><a href="{{ route('service','buyer') }}">For Buyer</a></li>
                                <li><a href="{{ route('service','seller') }}">For Seller</a></li>
                                <li><a href="{{ route('ourprocess') }}">Sell @ 1%</a></li>
                            </ul>
                        </li>
                        <!-- <li class="menu-item-has-children">
                                <a href="#">Dashboard</a>
                                <ul class="dp-menu">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="my-property.html">My Property</a></li>
                                    <li><a href="my-property-card.html">Property Card</a></li>
                                    <li><a href="property-add.html">Add Property</a></li>
                                    <li><a href="property-edit.html">Property Edit</a></li>
                                    <li><a href="app-invoice.html">Invoices List</a></li>
                                    <li><a href="app-invoice-preview.html">Invoices Preview</a></li>
                                    <li><a href="favorite.html">Favorites</a></li>
                                    <li><a href="reviews.html">Reviews</a></li>
                                    <li><a href="profile.html">Profile</a></li>
                                </ul>
                            </li> -->

                             {{-- <li class="menu-item-has-children">
                            <a href="#">About Company</a>
                            <ul class="dp-menu">
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                                <li><a href="{{ route('career') }}">Careers</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Dashboard</a>
                                    <ul class="dp-menu">
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="my-property.html">My Property</a></li>
                                        <!-- <li><a href="my-property-card.html">Property Card</a></li> -->
                                        <!-- <li><a href="property-add.html">Add Property</a></li> -->
                                        <!-- <li><a href="property-edit.html">Property Edit</a></li> -->
                                        <!-- <li><a href="app-invoice.html">Invoices List</a></li> -->
                                        <!-- <li><a href="app-invoice-preview.html">Invoices Preview</a></li> -->
                                        <li><a href="favorite.html">Favorites</a></li>
                                        <!-- <li><a href="reviews.html">Reviews</a></li> -->
                                        <li><a href="profile.html">Profile</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="menu-item-has-children">
                            <a href="{{ route('login') }}">Login</a>
                        </li> --}}
                         <li class="menu-item-has-children">
                            <a href="#">Login</a>
                            <ul class="dp-menu">
                                <li><a href="{{ route('user.login') }}">User Login</a></li>
                                <li><a href="{{ route('vendor.login') }}">Vendor Login</a></li>
                                <li><a href="{{ route('agent.login') }}">Agent Login</a></li>
                                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="header-right style-one">
                <div class="header-action">
                    <div class="header-btn-wrap d-none d-sm-block">
                        <a class="bd-half-outline-btn post-property-btn" href="contact.html"><span class="text">Post Property for free</span></a>
                    </div>
                    <div class="header-hamburger">
                        <div class="sidebar-toggle">
                            <button><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.69832 0.128621C5.15057 -0.0428735 3.5886 -0.0428735 2.04085 0.128621C1.55781 0.182362 1.10707 0.397514 0.761668 0.73922C0.416264 1.08093 0.196426 1.52917 0.137769 2.01133C-0.045923 3.58071 -0.045923 5.16615 0.137769 6.73553C0.196426 7.21769 0.416264 7.66593 0.761668 8.00764C1.10707 8.34935 1.55781 8.5645 2.04085 8.61824C3.5757 8.78929 5.16347 8.78929 6.69832 8.61824C7.18136 8.5645 7.6321 8.34935 7.9775 8.00764C8.3229 7.66593 8.54274 7.21769 8.6014 6.73553C8.7851 5.16615 8.7851 3.58071 8.6014 2.01133C8.54274 1.52917 8.3229 1.08093 7.9775 0.73922C7.6321 0.397514 7.18136 0.182362 6.69832 0.128621ZM6.69832 11.3821C5.15057 11.2106 3.5886 11.2106 2.04085 11.3821C1.55781 11.4358 1.10707 11.651 0.761668 11.9927C0.416264 12.3344 0.196426 12.7826 0.137769 13.2648C-0.045923 14.8342 -0.045923 16.4196 0.137769 17.989C0.196426 18.4712 0.416264 18.9194 0.761668 19.2611C1.10707 19.6028 1.55781 19.818 2.04085 19.8717C3.5757 20.0428 5.16347 20.0428 6.69832 19.8717C7.18136 19.818 7.6321 19.6028 7.9775 19.2611C8.3229 18.9194 8.54274 18.4712 8.6014 17.989C8.78511 16.4196 8.78511 14.8342 8.6014 13.2648C8.54274 12.7826 8.3229 12.3344 7.9775 11.9927C7.6321 11.651 7.18136 11.4358 6.69832 11.3821ZM17.9591 0.128621C16.4114 -0.0428735 14.8494 -0.0428735 13.3017 0.128621C12.8186 0.182362 12.3679 0.397514 12.0225 0.73922C11.6771 1.08093 11.4572 1.52917 11.3986 2.01133C11.2149 3.58071 11.2149 5.16615 11.3986 6.73553C11.4572 7.21769 11.6771 7.66593 12.0225 8.00764C12.3679 8.34935 12.8186 8.5645 13.3017 8.61824C14.8376 8.78929 16.4232 8.78929 17.9591 8.61824C18.4422 8.5645 18.8929 8.34935 19.2383 8.00764C19.5837 7.66593 19.8036 7.21769 19.8622 6.73553C20.0459 5.16615 20.0459 3.58071 19.8622 2.01133C19.8036 1.52917 19.5837 1.08093 19.2383 0.73922C18.8929 0.397514 18.4422 0.182362 17.9591 0.128621ZM17.9591 11.3821C16.4114 11.2106 14.8494 11.2106 13.3017 11.3821C12.8186 11.4358 12.3679 11.651 12.0225 11.9927C11.6771 12.3344 11.4572 12.7826 11.3986 13.2648C11.2149 14.8342 11.2149 16.4196 11.3986 17.989C11.4572 18.4712 11.6771 18.9194 12.0225 19.2611C12.3679 19.6028 12.8186 19.818 13.3017 19.8717C14.8376 20.0428 16.4232 20.0428 17.9591 19.8717C18.4422 19.818 18.8929 19.6028 19.2383 19.2611C19.5837 18.9194 19.8036 18.4712 19.8622 17.989C20.0459 16.4196 20.0459 14.8342 19.8622 13.2648C19.8036 12.7826 19.5837 12.3344 19.2383 11.9927C18.8929 11.651 18.4422 11.4358 17.9591 11.3821Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- for wp -->
                <div class="header-hamburger ml-20 d-none">
                    <button type="button" class="hamburger-btn offcanvas-open-btn">
                        <span>01</span>
                        <span>01</span>
                        <span>01</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- main header end -->
</header>
<!-- Header area end -->

