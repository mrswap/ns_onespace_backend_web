       <!-- app header start -->
        <header class="app-header">
            <div class="app-header-inner">
                <div class="app-header-left">
                    <div class="onespace-toggle-btn">
                        <a id="sidebarActive" class="app-header-toggle" href="javascript:void(0)">
                            <div class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <h3 class="app-header-title d-none d-sm-block">Hello {{ Auth::guard()->user()->username}} </h3>
                </div>
                <div class="app-header-right">
                    <div class="app-header-input p-relative d-none d-xl-block">
                        <div class="form-input">
                            <input type="text" placeholder="Search Here . . .">
                        </div>
                        <button><i class="fa-sharp fa-light fa-magnifying-glass"></i></button>
                    </div>
                    <div class="app-header-admin p-relative">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="admin-wrapper">
                            <span class="admin-thumb">
                                        {{-- @if ($loginType == "user" && Auth::guard('user')->user()->photo != null)
                                            <img src="{{ asset('assets/admin/img/vendor-photo/' . Auth::guard('vendor')->user()->photo) }}"
                                        alt="Vendor Image" class="avatar-sm"> --}}
                                {{-- @else
                                    <img src="{{ asset('assets/img/blank-user.jpg') }}" alt="image"
                                        class="avatar-sm">
                                @endif --}}
                                
                            </span>
                                <span class="admin-meta">
                              <span class="admin-meta-name"> {{ Auth::guard()->user()->username}}</span>
                                <span class="status">online</span>
                                </span>
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- app header end -->

        <!-- app-sidebar start -->
        <div class="onespace-sidebar">
            <div class="sidebar-logo-wrap d-flex justify-content-between align-items-center">
                <div class="logo-details">
                    <!-- <a href="index.html">
                    
                        <img src="assets/images/logo/logo-black.svg" alt="logo not found">
                    </a> -->
                    @if (!empty($websiteInfo->logo))
                    <a href="{{ route('vendor.dashboard') }}" class="navbar-brand">
                        <img src="{{ asset('assets/img/' . $websiteInfo->logo) }}">
                    </a>
                    @endif
                </div>
            </div>
            <div class="onespace-sidebar-inner">
                <div class="sidebar-nav">
                @php $menuDatas = json_decode($menuInfos); @endphp
                    <ul>
                        @if(session('loginType')=="user")
                        <li><a href="{{ route('user.dashboard') }}"><span><i class="fa-sharp fa-light fa-table-columns"></i></span>Dashboard</a></li>
                        <li><a href="{{ route('frontend.properties') }}"><span><i class="fa-sharp fa-light fa-house-building"></i></span>My Property</a></li>
                         <li><a href="{{ route('user.wishlist') }}"><span><i class="fa-sharp fa-light fa-file-lines"></i></span>{{ __('Favorite List') }}</a></li>
                         <li><a href="{{ route('user.support_ticket') }}"><span><i class="fa-sharp fa-light fa-file-lines"></i></span>{{ __('All Tickets') }}</a></li>
                        
                         <li><a href="{{ route('user.support_ticket.create') }}"><span><i class="fa-sharp fa-light fa-receipt"></i></span>{{ __('Add a Ticket') }}</a></li>
                        <li><a href="{{ route('user.edit_profile') }}"><span><i class="fa-sharp fa-light fa-user"></i></span>{{ __('Edit Profile') }}</a></li>
                        <li><a href=" {{ route('user.change_password') }}"><span><i class="fa-sharp fa-key fa-user"></i></span>{{ __('Change Password') }}</a></li>                       
                        <li><a href="{{ route('user.logout') }}"><span><i class="fa-sharp fa-light fa-backward"></i></span>Log Out</a></li>
                        @elseif(session('loginType')=="vendor")
                        <li><a href="{{ route('vendor.dashboard') }}"><span><i class="fa-sharp fa-light fa-table-columns"></i></span>Dashboard</a></li>
                        <li><a href="{{ route('vendor.property_management.properties') }}"><span><i class="fa-sharp fa-light fa-house-building"></i></span>My Property</a></li>
                        <li><a href="{{ route('vendor.property_management.properties_card') }}"><span><i class="fa-sharp fa-light fa-building"></i></span>Property Card</a></li>
                        <li><a href="{{ route('vendor.property_management.type') }}"><span><i class="fa-sharp fa-light fa-building-circle-arrow-right"></i></span>Add Property</a></li>
                        <!-- <li><a href="property-edit.html"><span><i class="fa-sharp fa-light fa-building-circle-exclamation"></i></span>Property Edit</a></li> -->
                        <li><a href="{{ route('vendor.support_tickets') }}"><span><i class="fa-sharp fa-light fa-file-lines"></i></span>{{ __('All Tickets') }}</a></li>
                        <li><a href="{{ route('vendor.support_ticket.create') }}"><span><i class="fa-sharp fa-light fa-receipt"></i></span>{{ __('Add a Ticket') }}</a></li>
                        <li><a href="{{ route('vendor.plan.extend.index') }}"><span><i class="fa-sharp fa-light fa-bookmark"></i></span>{{ __('Buy Plan') }}</a></li>
                        <li><a href="{{ route('vendor.payment_log') }}"><span><i class="fa-sharp fa-light fa-message-lines"></i></span>{{ __('Payment Logs') }}</a></li>
                        
                        <li><a href="{{ route('vendor.invoice') }}"><span><i class="fa-sharp fa-light fa-file-lines"></i></span>{{ __('Invoice List') }}</a></li>
                        <li><a href="{{ route('vendor.favorite') }}"><span><i class="fa-sharp fa-light fa-receipt"></i></span>{{ __('Favorite List') }}</a></li>
                        <li><a href="{{ route('vendor.reviews') }}"><span><i class="fa-sharp fa-light fa-bookmark"></i></span>{{ __('Reviews') }}</a></li>
         
                        
                        <li><a href="{{ route('vendor.edit.profile') }}"><span><i class="fa-sharp fa-light fa-user"></i></span>{{ __('Edit Profile') }}</a></li>
                        <li><a href=" {{ route('vendor.change_password') }}"><span><i class="fa-sharp fa-key fa-user"></i></span>{{ __('Change Password') }}</a></li>                       
                        <li><a href="{{ route('vendor.logout') }}"><span><i class="fa-sharp fa-light fa-backward"></i></span>Log Out</a></li>
                         @elseif(session('loginType')=="agent")
                        <li><a href="{{ route('vendor.dashboard') }}"><span><i class="fa-sharp fa-light fa-table-columns"></i></span>Dashboard</a></li>
                        <li><a href="{{ route('vendor.property_management.properties') }}"><span><i class="fa-sharp fa-light fa-house-building"></i></span>My Property</a></li>
                        <!-- <li><a href="my-property-card.html"><span><i class="fa-sharp fa-light fa-building"></i></span>Property Card</a></li> -->
                        <li><a href="{{ route('vendor.property_management.type') }}"><span><i class="fa-sharp fa-light fa-building-circle-arrow-right"></i></span>Add Property</a></li>
                        <!-- <li><a href="property-edit.html"><span><i class="fa-sharp fa-light fa-building-circle-exclamation"></i></span>Property Edit</a></li> -->
                        <li><a href="{{ route('vendor.support_tickets') }}"><span><i class="fa-sharp fa-light fa-file-lines"></i></span>{{ __('All Tickets') }}</a></li>
                        <li><a href="{{ route('vendor.support_ticket.create') }}"><span><i class="fa-sharp fa-light fa-receipt"></i></span>{{ __('Add a Ticket') }}</a></li>
                        <li><a href="{{ route('vendor.plan.extend.index') }}"><span><i class="fa-sharp fa-light fa-bookmark"></i></span>{{ __('Buy Plan') }}</a></li>
                        <li><a href="{{ route('vendor.payment_log') }}"><span><i class="fa-sharp fa-light fa-message-lines"></i></span>{{ __('Payment Logs') }}</a></li>
                        <li><a href="{{ route('vendor.edit.profile') }}"><span><i class="fa-sharp fa-light fa-user"></i></span>{{ __('Edit Profile') }}</a></li>
                        <li><a href=" {{ route('vendor.change_password') }}"><span><i class="fa-sharp fa-key fa-user"></i></span>{{ __('Change Password') }}</a></li>                       
                        <li><a href="{{ route('vendor.logout') }}"><span><i class="fa-sharp fa-light fa-backward"></i></span>Log Out</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-offcanvas-overlay"></div>
        <!-- app-sidebar end -->