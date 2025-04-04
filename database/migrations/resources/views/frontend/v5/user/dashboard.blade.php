@php
$version = $basicInfo->theme_version;
//echo"<pre>";print_r(session('redirectTo'));die;
@endphp
@extends("frontend.layouts.layout-dashboard-v$version")

{{-- @section('pageHeading')
    {{ $project->title }}
@endsection --}}

{{-- @section('metaKeywords')
    @if (!empty($project))
        {{ $project->meta_keyword }}
@endif
@endsection --}}

{{-- @section('metaDescription')
    @if (!empty($project))
        {{ $project->meta_description }}
@endif
@endsection --}}
{{-- @section('og:tag')
    <meta property="og:title" content="{{ $project->title }}">
<meta property="og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5<meta property=" og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

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
                                        <span class="card-desc">
                                            <span class="price-increase">
                                                <i class="fa-light fa-arrow-up"></i>
                                                +2.15%</span> Than Last Month
                                        </span>
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
                                        <span class="card-desc">
                                            <span class="price-decrease">
                                                <i class="fa-light fa-arrow-down"></i>
                                                +2.15%</span> Than Last Month
                                        </span>
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
                                    <h6 class="card-subtitle mb-5">Properties for Sale</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                        <span class="card-desc">
                                            <span class="price-increase">
                                                <i class="fa-light fa-arrow-up"></i>
                                                +2.15%</span> Than Last Month
                                        </span>
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
                                    <h6 class="card-subtitle mb-5">Properties for Rent</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                        <span class="card-desc">
                                            <span class="price-increase">
                                                <i class="fa-light fa-arrow-up"></i>
                                                +2.15%</span> Than Last Month
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-12 col-lg-12">
                    <div class="card-wrapper">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-20">
                                <div class="card-title-wrap">
                                    <h6 class="card-subtitle mb-5">Total Revenue</h6>
                                </div>
                                <div class="card-tab">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-bar-year-tab" data-bs-toggle="pill" data-bs-target="#pills-bar-year" type="button" role="tab" aria-controls="pills-bar-year" aria-selected="true">1Y</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-bar-month-tab" data-bs-toggle="pill" data-bs-target="#pills-bar-month" type="button" role="tab" aria-controls="pills-bar-month" aria-selected="false">1M</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-bar-week-tab" data-bs-toggle="pill" data-bs-target="#pills-bar-week" type="button" role="tab" aria-controls="pills-bar-week" aria-selected="false">1W</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-chart">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pills-bar-year" role="tabpanel" aria-labelledby="pills-bar-year-tab">
                                        <div class="card__line-chart">
                                            <div id="salesChartYearly"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-bar-month" role="tabpanel" aria-labelledby="pills-bar-month-tab">
                                        <div class="card__line-chart">
                                            <div id="salesChartMonthly"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-bar-week" role="tabpanel" aria-labelledby="pills-bar-week-tab">
                                        <div class="card__line-chart">
                                            <div id="salesChartWeek"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-15">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">Notification</h6>
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
                            <div class="card-review-wrapper custom-scrollbar">
                                <div class="card-review-box">
                                    <div class="d-flex align-items-center gap-15 mb-10">
                                        <div class="card-review-thumb">
                                            <img src="{{ asset("assets/front/v5/images/agent/agent-01.png" )}}"alt="image">
                                        </div>
                                        <div class="card-review-meta">
                                            <h5 class="small fw-600">Ethan Mitchell</h5>
                                            <span>Oct 09, 2023</span>
                                        </div>
                                    </div>
                                    <div class="card-review-content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam
                                            in hendrerit urna. Pellente</p>
                                    </div>
                                </div>
                                <div class="card-review-box">
                                    <div class="d-flex align-items-center gap-15 mb-10">
                                        <div class="card-review-thumb">
                                            <img src="{{ asset("assets/front/v5/images/agent/agent-02.png")}}" alt="image">
                                        </div>
                                        <div class="card-review-meta">
                                            <h5 class="small fw-600">Ethan Mitchell</h5>
                                            <span>Oct 09, 2023</span>
                                        </div>
                                    </div>
                                    <div class="card-review-content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam
                                            in hendrerit urna. Pellente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-10">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">Customer Satisfaction</h6>
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
                            <div class="card__box-wrapp">
                                <div class="d-flex flex-wrap align-items-end gap-10 mb-25">
                                    <h4 class="card-title">313</h4>
                                    <span class="card-desc">
                                        <span class="price-increase">
                                            <i class="fa-light fa-arrow-up"></i>
                                            +2.15%</span> Than Last Month
                                    </span>
                                </div>
                                <div class="onespace-progress-bar">
                                    <div class="onespace-progress">
                                        <div class="onespace-progress-wrapper">
                                            <div class="onespace-progress-head">
                                                <h3 class="onespace-progress-title">Excellent<span>/5 Star</span></h3>
                                                <span class="onespace-progress-percentage">44%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 44%; visibility: visible; animation-name: slideInLeft;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="onespace-progress-wrapper">
                                            <div class="onespace-progress-head">
                                                <h3 class="onespace-progress-title">Very Good<span>/4 Star</span></h3>
                                                <span class="onespace-progress-percentage">22%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-2 wow slideInLeft" role="progressbar" style="width: 22%; visibility: visible; animation-name: slideInLeft;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="onespace-progress-wrapper">
                                            <div class="onespace-progress-head">
                                                <h3 class="onespace-progress-title">Good<span>/3 Star</span></h3>
                                                <span class="onespace-progress-percentage">18%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-3 wow slideInLeft" role="progressbar" style="width: 18%; visibility: visible; animation-name: slideInLeft;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="onespace-progress-wrapper">
                                            <div class="onespace-progress-head">
                                                <h3 class="onespace-progress-title">Poor<span>/2 Star</span></h3>
                                                <span class="onespace-progress-percentage">7%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-4 wow slideInLeft" role="progressbar" style="width: 7%; visibility: visible; animation-name: slideInLeft;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="onespace-progress-wrapper">
                                            <div class="onespace-progress-head">
                                                <h3 class="onespace-progress-title">Very Poor<span>/1 Star</span></h3>
                                                <span class="onespace-progress-percentage">4%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-5 wow slideInLeft" role="progressbar" style="width: 4%; visibility: visible; animation-name: slideInLeft;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-10">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">Recent Listing</h6>
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
                                            <tr class="table-custom">
                                                <td style="width: 280px;">
                                                    <div class="property-thumb-wrapper">
                                                        <div class="property-thumb image-hover-effect-two position-relative">
                                                            <img src="{{ asset("assets/front/v5/images/blog/blog-thumb-01.png" )}}"alt="image">
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
                                                            <h3 class="property-title underline"><a href="property-details.html">Equestrian family home</a></h3>
                                                            <div class="property-info-box mb-5">
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">3 bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4 bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">1200 sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="property-location">California, CA, USA</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="recent-activity-price-box">
                                                        <h5 class="mb-5">$15,000</h5>
                                                        <p>Monthly</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="recent-activity-list">
                                                        <li class="property-date mb-5">Add Date: <span class="property-add-date">June
                                                                17, 2024</span></li>
                                                        <li class="property-date">Last Date: <span class="property-last-date">July 31,
                                                                2024</span></li>
                                                    </ul>
                                                </td>
                                                <td><span class="bd-badge success">Active</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-start gap-10">
                                                        <a href="property-details.html" class="action-button download"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="property-details.html" class="action-button edit"><i class="fa-sharp fa-light fa-pen"></i></a>
                                                        <button class="action-button delete"><i class="fa-regular fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-custom">
                                                <td style="width: 280px;">
                                                    <div class="property-thumb-wrapper">
                                                        <div class="property-thumb image-hover-effect-two position-relative">
                                                            <img src="{{ asset("assets/front/v5/images/blog/blog-thumb-05.png" )}}"alt="image">
                                                            <div class="property-thumb-date">
                                                                <div class="bd-badge-sq theme-bg">
                                                                    <div class="d-block">
                                                                        <h5 class="badge-title">13</h5>
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
                                                            <h3 class="property-title underline"><a href="property-details.html">Luxury
                                                                    villa in rego park</a></h3>
                                                            <div class="property-info-box mb-5">
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">4 bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">5 bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">2500 sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="property-location">New York, USA</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="recent-activity-price-box">
                                                        <h5 class="mb-5">$85,000</h5>
                                                        <p>Monthly</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="recent-activity-list">
                                                        <li class="property-date mb-5">Add Date: <span class="property-add-date">June
                                                                13, 2024</span></li>
                                                        <li class="property-date">Last Date: <span class="property-last-date">June 30,
                                                                2024</span></li>
                                                    </ul>
                                                </td>
                                                <td><span class="bd-badge warning">Processing</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-start gap-10">
                                                        <a href="property-details.html" class="action-button download"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="property-details.html" class="action-button edit"><i class="fa-sharp fa-light fa-pen"></i></a>
                                                        <button class="action-button delete"><i class="fa-regular fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-custom">
                                                <td style="width: 280px;">
                                                    <div class="property-thumb-wrapper">
                                                        <div class="property-thumb image-hover-effect-two position-relative">
                                                            <img src="{{ asset("assets/front/v5/images/blog/blog-thumb-02.png")}}" alt="image">
                                                            <div class="property-thumb-date">
                                                                <div class="bd-badge-sq theme-bg">
                                                                    <div class="d-block">
                                                                        <h5 class="badge-title">10</h5>
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
                                                            <h3 class="property-title underline"><a href="property-details.html">Villa
                                                                    on hollywood estate</a></h3>
                                                            <div class="property-info-box mb-5">
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">2 bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">2 bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">1000 sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="property-location">Tranquil Oaks, Washington</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="recent-activity-price-box">
                                                        <h5 class="mb-5">$1,80,000</h5>
                                                        <p>Yearly</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="recent-activity-list">
                                                        <li class="property-date mb-5">Add Date: <span class="property-add-date">June
                                                                10, 2024</span></li>
                                                        <li class="property-date">Last Date: <span class="property-last-date">July 10,
                                                                2024</span></li>
                                                    </ul>
                                                </td>
                                                <td><span class="bd-badge danger">Pending</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-start gap-10">
                                                        <a href="property-details.html" class="action-button download"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="property-details.html" class="action-button edit"><i class="fa-sharp fa-light fa-pen"></i></a>
                                                        <button class="action-button delete"><i class="fa-regular fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-custom">
                                                <td style="width: 280px;">
                                                    <div class="property-thumb-wrapper">
                                                        <div class="property-thumb image-hover-effect-two position-relative">
                                                            <img src="{{ asset("assets/front/v5/images/blog/blog-thumb-04.png")}}" alt="image">
                                                            <div class="property-thumb-date">
                                                                <div class="bd-badge-sq theme-bg">
                                                                    <div class="d-block">
                                                                        <h5 class="badge-title">06</h5>
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
                                                            <h3 class="property-title underline"><a href="property-details.html">Sunset
                                                                    Ridge Cottage</a></h3>
                                                            <div class="property-info-box mb-5">
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span class="title">6 bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">5 bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span class="title">22,800 sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="property-location">Meadowview Manor, Colorado</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="recent-activity-price-box">
                                                        <h5 class="mb-5">$14,000</h5>
                                                        <p>Monthly</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="recent-activity-list">
                                                        <li class="property-date mb-5">Add Date: <span class="property-add-date">June
                                                                06, 2024</span></li>
                                                        <li class="property-date">Last Date: <span class="property-last-date">June 30,
                                                                2024</span></li>
                                                    </ul>
                                                </td>
                                                <td><span class="bd-badge info">Closed</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-start gap-10">
                                                        <a href="property-details.html" class="action-button download"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="property-details.html" class="action-button edit"><i class="fa-sharp fa-light fa-pen"></i></a>
                                                        <button class="action-button delete"><i class="fa-regular fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
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
