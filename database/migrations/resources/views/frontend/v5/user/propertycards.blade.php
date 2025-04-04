@php
$version = $basicInfo->theme_version;
@endphp
@extends("frontend.layouts.layout-dashboard-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- app body content start -->
    <div class="app-content-wrapper">
        <div class="row">
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-30">
                            <div class="card-icon">
                                <span><i class="fa-sharp fa-thin fa-buildings"></i></span>
                            </div>
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle mb-5">Total Properties</h6>
                                <div class="d-flex flex-wrap align-items-end gap-10">
                                    <h4 class="card-title">313</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-30">
                            <div class="card-icon">
                                <span><i class="fa-light fa-users"></i></span>
                            </div>
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle mb-5">Total Customer</h6>
                                <div class="d-flex flex-wrap align-items-end gap-10">
                                    <h4 class="card-title">313</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-30">
                            <div class="card-icon">
                                <span><i class="fa-thin fa-badge-check"></i></span>
                            </div>
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle mb-5">Total Sale</h6>
                                <div class="d-flex flex-wrap align-items-end gap-10">
                                    <h4 class="card-title">313</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-30">
                            <div class="card-icon">
                                <span><i class="fa-sharp fa-light fa-tag"></i></span>
                            </div>
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle mb-5">Total Rent</h6>
                                <div class="d-flex flex-wrap align-items-end gap-10">
                                    <h4 class="card-title">313</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card-wrapper">
                    <div class="card-header d-flex align-items-center justify-content-between mb-30">
                        <div class="card-title-wrap">
                            <h6 class="card-subtitle">My Property Card</h6>
                        </div>
                        <div class="card-dropdown">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        @foreach ($properties as $property)

                        @php
                        $property_content = $property->getContent($language->id);
                        if (is_null($property_content)) {
                        $property_content = $property
                        ->propertyContents()
                        ->first();
                        }
                        @endphp

                        <div class="col-xxl-4 col-xl-6 col-md-6">
                            <div class="featured-item style-one has-bg">
                                <div class="thumb-wrapper">
                                    <div class="badge-wrap">
                                        <a class="bd-badge" href="property-details.html">Featured</a>
                                        <a class="bd-badge" href="property-details.html">For {{$property->purpose}}</a>
                                    </div>
                                    <div class="thumb">
                                        <a href="property-details.html">
                                            <figure>
                                                <img src="{{asset("assets/img/property/featureds/$property->featured_image")}}" alt="image">
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="price">
                                        <span>${{$property->price}} / {{$property->expectedPrice}}/mo</span>
                                    </div>
                                    <h3 class="title"><a href="{{ route('frontend.property.details', ['slug' => $property_content->slug]) }}">
                                            {{ strlen(@$property_content->title) > 100 ? mb_substr(@$property_content->title, 0, 100, 'utf-8') . '...' : @$property_content->title }}
                                        </a></h3>
                                    <span class="info">{{$property_content->address}}</span>
                                    <div class="bd-meta">
                                        <div class="meta-item">
                                            <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">{{$property->beds}} bad</span>
                                        </div>
                                        <div class="meta-item">
                                            <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">{{$property->bath}}
                                                bath</span>
                                        </div>
                                        <div class="meta-item">
                                            <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">{{$property->area}} sqft</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- app body content end -->

    @endsection
