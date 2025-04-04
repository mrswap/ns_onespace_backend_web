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
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-30">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">My Property List</h6>
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
                        <div class="card-body">
                            <div class="property-table-wrapper">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($properties as $property)
                                            <tr class="table-custom">
                                                <td style="width: 280px;">
                                                    <div class="property-thumb-wrapper">
                                                        <div class="property-thumb image-hover-effect-two position-relative">
                                                            <img src="{{asset("assets/img/property/featureds/$property->featured_image")}}" alt="image">
                                                            <div class="property-thumb-date">
                                                                <div class="bd-badge-sq theme-bg">
                                                                    <div class="d-block">
                                                                        <h5 class="badge-title">17</h5>
                                                                        <span>June</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="property-title-box d-flex align-items-center gap-10">
                                                        <div>
                                                            <h3 class="property-title underline">
                                                            
                                                            {{-- <a href="{{ route('vendor.property_management.details', ['id' => $property->id]) }}"> --}}
                                                            
                                                            
                                                             @php
                                                            $property_content = $property->getContent($language->id);
                                                            if (is_null($property_content)) {
                                                                $property_content = $property
                                                                    ->propertyContents()
                                                                    ->first();
                                                            }
                                                        @endphp
                                                        @if (!empty($property_content))
                                                        <a href="{{ route('frontend.property.details', ['slug' => $property_content->slug]) }}">
                                                        {{ strlen(@$property_content->title) > 100 ? mb_substr(@$property_content->title, 0, 100, 'utf-8') . '...' : @$property_content->title }}
                                                            {{-- <a href="{{ route('frontend.property.details', ['slug' => $property_content->slug]) }}"
                                                                target="_blank">
                                                                {{ strlen(@$property_content->title) > 100 ? mb_substr(@$property_content->title, 0, 100, 'utf-8') . '...' : @$property_content->title }}
                                                            </a> --}}
                                                        @endif
                                                            
                                                            </a></h3>
                                                            <div class="property-info-box mb-5">
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                            class="fa-regular fa-bed-front"></i></span><span
                                                         class="title">{{$property->beds}} bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                            class="fa-duotone fa-shower"></i></span><span
                                                         class="title">{{$property->bath}} bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                            class="fa-regular fa-arrows-maximize"></i></span><span
                                                         class="title">{{$property->area}} sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="property-location">{{$property_content->address}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="recent-activity-price-box">
                                                        <h5 class="mb-5">${{$property->price}}  {{$property->expectedPrice}}</h5>
                                                        <p>Monthly</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="recent-activity-list">
                                                        <li class="property-date mb-5">Add Date: <span class="property-add-date">{{$property->created_at}}</span></li>
                                                        <li class="property-date">Last Date: <span class="property-last-date">{{$property->created_at}}</span></li>
                                                    </ul>
                                                </td>
                                                <td><span class="bd-badge success">{{$property->status==1 ? "Active":"Inactive"}}</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-start gap-10">
                                                        <a href="{{ route('vendor.property_management.properties') }}" class="action-button download"><i
                                                class="fa-regular fa-eye"></i></a>
                                                        <a href="property-details.html" class="action-button edit"><i
                                                class="fa-sharp fa-light fa-pen"></i></a>
                                                        <button class="action-button delete"><i
                                                class="fa-regular fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pagination__wrapper mt-30">
                                    <div class="basic-pagination">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa-regular fa-arrow-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">1</a>
                                                </li>
                                                <li>
                                                    <a class="current" href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa-regular fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
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
