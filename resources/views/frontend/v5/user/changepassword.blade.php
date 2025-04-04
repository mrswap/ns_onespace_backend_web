@php
$version = $basicInfo->theme_version;
//echo"<pre>";print_r(session('redirectTo'));die;
@endphp
@extends("frontend.layouts.layout-dashboard-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>
    
<!-- app body content start -->
 <div class="app-content-wrapper">
            <div class="row justify-content-center">
            <div class="col-xl-10 col-md-10">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-30">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">{{ __('Change Password') }}</h6>
                            </div>
                           
                        </div>
                        <form id="ajaxEditForm" action="{{ route('user.update_password') }}" method="post">
                        @csrf
                            <div class="row gy-20">
                               
                                <div class="col-lg-12">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="current_password">{{ __('Current Password*') }}<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                        <input type="password"  id='current_password' name="current_password">
                                        <p id="editErr_current_password" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="new_password">{{ __('New Password*') }}<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                            <input name="new_password" id="new_password" type="password" >
                                            <p id="editErr_new_password" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="new_password_confirmation">{{ __('Confirm New Password*') }}<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                            <input name="new_password_confirmation" id="new_password_confirmation" type="password" >
                                            <p id="editErr_new_password_confirmation" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-center">
                                <button type="submit" id="updateBtn" class="bd-btn btn-style btn-hover-x">
                {{ __('Update') }}
              </button>
                             </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- app body content end -->

        </main>
<!-- Body main wrapper end -->
@endsection
