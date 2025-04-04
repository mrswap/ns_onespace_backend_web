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
                                <h6 class="card-subtitle">Reviews</h6>
                            </div>
                            
                        </div>
                        <form id="carForm" action="{{ route('user.update_profile') }}" method="post">
                        @csrf
                            <div class="row gy-20">
                                <div class="col-md-12">
                                    <div class="form-input-title mb-20">
                                        <label for="imageUpload">{{ __('Photo') }}</label>
                                    </div>
                                    <div class="agent-profile-thumb">
                                        <div class="agent-profile-thumb-label">
                                            <input type="file" id="imageUpload" name="photo">
                                            <label for="imageUpload">
                                                <span class="label-title">Change Photo</span>
                                                <span class="agent-profile-preview">
                                                @if ($vendor->photo != null)
                                                    
                                                        <span class="agent-profile-preview-box" id="imagePreview"
                                          style="background-image: url('{{ asset('assets/admin/img/vendor-photo/' . $vendor->photo) }}');">
                                       </span>
                                                @else
                                                    <img src="" alt="..."
                                                        class="uploaded-img">
                                                        <span class="agent-profile-preview-box" id="imagePreview"
                                          style="background-image: url('{{ asset('assets/img/noimage.jpg') }}');">
                                       </span>
                                                @endif

                                      
                                                </span>
                                            </label>
                                            <p id="editErr_photo" class="mt-1 mb-0 text-danger em"></p>
                                               
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="username">User Name<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                            
                                            <input  name="username" value="{{ $vendor->username }}" id="username"  type="text" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="email">Email Address<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                           
                                            <input type="email" value="{{ $vendor->email }}" id="email"
                                                name="email">
                                            <p id="editErr_email" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="phone">Phone<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                           
                                            <input type="tel" value="{{ $vendor->phone }}" id="phone" 
                                                name="phone">
                                            <p id="editErr_phone" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="show_email_addresss">{{ __('Show Email Address ') }}</label>
                                        </div>
                                        <div class="form-input">
                                                    <input type="checkbox"
                                                            {{ $vendor->show_email_addresss == 1 ? 'checked' : '' }}
                                                            name="show_email_addresss" class=""
                                                            id="show_email_addresss">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                       
                                        <div class="form-input">
                                        <input type="checkbox"
                                                            {{ $vendor->show_phone_number == 1 ? 'checked' : '' }}
                                                            name="show_phone_number" 
                                                            id="show_phone_number">
                                                        <label class="custom-control-label"
                                                            for="show_phone_number">{{ __('Show Phone Number') }}</label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                       
                                        <div class="form-input">
                                        <input type="checkbox"
                                                            {{ $vendor->show_contact_form == 1 ? 'checked' : '' }}
                                                            name="show_contact_form" 
                                                            id="show_contact_form">
                                                        <label class="custom-control-label"
                                                            for="show_contact_form">{{ __('Show  Contact Form') }}</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($languages as $language)
                                <div class="version">
                                                    <div class="version-header" id="heading{{ $language->id }}">
                                                        <h5 class="mb-0">
                                                            <button type="button" class="btn btn-link "
                                                                data-toggle="collapse"
                                                                data-target="#collapse{{ $language->id }}"
                                                                aria-expanded="{{ $language->is_default == 1 ? 'true' : 'false' }}"
                                                                aria-controls="collapse{{ $language->id }}">
                                                                {{ $language->name . __(' Language') }}
                                                                {{ $language->is_default == 1 ? '(Default)' : '' }}
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    </div>
                                @php
                                                        $vendor_info = App\Models\VendorInfo::where(
                                                            'vendor_id',
                                                            $vendor->id,
                                                        )
                                                            ->where('language_id', $language->id)
                                                            ->first();
                                                    @endphp
                                                    
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="firstname">Name<span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->name : '' }}"
                                                                            id="firstname"
                                                                            name="{{ $language->code }}_name"
                                                                            placeholder="Enter Name">
                                                                        <p id="editErr_{{ $language->code }}_name"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                         
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="Country">{{ __('Country') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->country : '' }}"
                                                                            id='Country'
                                                                            name="{{ $language->code }}_country"
                                                                            placeholder="Enter Country">
                                                                        <p id="editErr_{{ $language->code }}_country"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="State">{{ __('State') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->state : '' }}"
                                                                            id="State"
                                                                            name="{{ $language->code }}_state"
                                                                            placeholder="Enter State">
                                                                        <p id="editErr_{{ $language->code }}_state"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                                                   
                                         
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="City">{{ __('City') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->city : '' }}"
                                                                            id="City"
                                                                            name="{{ $language->code }}_city"
                                                                            placeholder="Enter City">
                                                                        <p id="editErr_{{ $language->code }}_city"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="Zip">{{ __('Zip Code') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->zip_code : '' }}"
                                                                            id="Zip"
                                                                            name="{{ $language->code }}_zip_code"
                                                                            placeholder="Enter Zip Code">
                                                                        <p id="editErr_{{ $language->code }}_zip_code"
                                                                            class="mt-1 mb-0 text-danger em">
                                                                        </p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-lg-12">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="address">{{ __('Address') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <input type="text" 
                                                                            placeholder="Enter Address"
                                                                            name="{{ $language->code }}_address"
                                                                            id="address"
                                                                            value="{{ !empty($vendor_info) ? $vendor_info->address : '' }}">

                                                                        <p id="editErr_{{ $language->code }}_email"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-input-box">
                                        <div class="form-input-title">
                                            <label for="Details">{{ __('Details') }}</label>
                                        </div>
                                        <div class="form-input">
                                        <textarea name="{{ $language->code }}_details"  id='Details' rows="5" placeholder="Enter Details">{{ !empty($vendor_info) ? $vendor_info->details : '' }}</textarea>
                                                                        <p id="editErr_{{ $language->code }}_details"
                                                                            class="mt-1 mb-0 text-danger em"></p>
                                                                    </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="PropertySubmit" class="bd-btn btn-style btn-hover-x">Save Change</button>
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
