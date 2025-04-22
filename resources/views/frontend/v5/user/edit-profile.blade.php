@php
$version = $basicInfo->theme_version;

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
                    <form id="carForm" action="{{ route('user.updateprofile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="row gy-20">
                            <div class="col-md-12">
                                <div class="form-input-title mb-20">
                                    <label for="imageUpload">{{ __('Photo') }}</label>
                                </div>
                                <div class="agent-profile-thumb">
                                    <div class="agent-profile-thumb-label">
                                        <input type="file" id="imageUpload" name="image">
                                        <label for="imageUpload">
                                            <span class="label-title">Change Photo</span>
                                            <span class="agent-profile-preview">
                                                @if ($vendor->image != null)
                                                <span class="agent-profile-preview-box" id="imagePreview" style="background-image: url('{{ asset('assets/img/users/' . $vendor->image) }}');"></span>
                                                @else
                                                <img src="" alt="..." class="uploaded-img">
                                                <span class="agent-profile-preview-box" id="imagePreview" style="background-image: url('{{ asset('assets/img/noimage.jpg') }}');"></span>
                                                @endif
                                            </span>
                                        </label>

                                        {{-- Laravel validation error --}}
                                        @if ($errors->has('image'))
                                        <p class="mt-1 mb-0 text-danger">{{ $errors->first('image') }}</p>
                                        @endif

                                        {{-- Optional: for JS error handling --}}
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

                                        <input required name="username" value="{{ $vendor->username }}" id="username" type="text">
                                        <p id="editErr_username" class="mt-1 mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="email">Email Address<span>*</span></label>
                                    </div>
                                    <div class="form-input">

                                        <input required type="email" value="{{ $vendor->email }}" id="email" name="email">
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

                                        <input type="tel" value="{{ $vendor->phone }}" id="phone" name="phone">
                                        <p id="editErr_phone" class="mt-1 mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="firstname">Name<span>*</span></label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" value="{{ !empty($vendor) ? $vendor->name : '' }}" id="firstname" name="name" placeholder="Enter Name">
                                        <p id="editErr_name" class="mt-1 mb-0 text-danger em"></p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="Country">{{ __('Country') }}</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" value="{{ !empty($vendor) ? $vendor->country : '' }}" id='Country' name="country" placeholder="Enter Country">
                                        <p id="editErr_country" class="mt-1 mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="State">{{ __('State') }}</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" value="{{ !empty($vendor) ? $vendor->state : '' }}" id="State" name="state" placeholder="Enter State">
                                        <p id="editErr_state" class="mt-1 mb-0 text-danger em"></p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="City">{{ __('City') }}</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" value="{{ !empty($vendor) ? $vendor->city : '' }}" id="City" name="city" placeholder="Enter City">
                                        <p id="editErr_city" class="mt-1 mb-0 text-danger em"></p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-input-box">
                                    <div class="form-input-title">
                                        <label for="Zip">{{ __('Zip Code') }}</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" value="{{ !empty($vendor) ? $vendor->zip_code : '' }}" id="Zip" name="zip_code" placeholder="Enter Zip Code">
                                        <p id="editErr_zip_code" class="mt-1 mb-0 text-danger em">
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
                                        <input type="text" placeholder="Enter Address" name="address" id="address" value="{{ !empty($vendor) ? $vendor->address : '' }}">

                                        <p id="editErr_email" class="mt-1 mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            </div>
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