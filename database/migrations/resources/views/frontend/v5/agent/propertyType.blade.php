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
            <div class="row">
            <div class="col-md-12">

<div class="card">
    <div class="card-header">
        <h3>{{ __('Choose Property Type') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <a href="{{ route('vendor.property_management.create_property') . '?type=commercial' }}"
                    class="d-block text-decoration-none">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="col-icon mx-auto">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="far fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers mx-auto text-center">
                                        <h2 class="card-title mt-2 mb-4 text-uppercase">{{ __('Commercial') }}
                                        </h2>
                                        <p class="card-category"><strong>{{ __('Total') }}:</strong>
                                            {{ $commertialCount }}
                                            {{ __('Properties') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('vendor.property_management.create_property') . '?type=residential' }}"
                    class="d-block text-decoration-none">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="col-icon mx-auto">
                                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers mx-auto text-center">
                                        <h2 class="card-title mt-2 mb-4 text-uppercase">{{ __('Residential') }}
                                        </h2>
                                        <p class="card-category"><strong>{{ __('Total') }}:</strong>
                                            {{ $residentialCount }}
                                            {{ __('Properties') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
        <!-- app body content end -->

</main>
<!-- Body main wrapper end -->
@endsection
