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
                <div class="col-xl-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-30">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">My Property Listing</h6>
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
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">Featured</a>
                                                <a class="bd-badge" href="property-details.html">For Sale</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-01.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$14,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Equestrian family home</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">For Sale</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-02.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$82,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Luxury villa in rego park</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">Featured</a>
                                                <a class="bd-badge" href="property-details.html">For Sale</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-03.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$18,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Villa on hollywood estate</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">For Rent</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-04.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$14,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Equestrian family home</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">For Sale</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-05.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$82,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Luxury villa in rego park</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-md-6">
                                <div class="featured-item style-one has-bg">
                                    <div class="thumb-wrapper">
                                        <div class="badge-wrap favorite-badge">
                                            <div class="badge-wrapper">
                                                <a class="bd-badge" href="property-details.html">Featured</a>
                                                <a class="bd-badge" href="property-details.html">For Sale</a>
                                            </div>
                                            <a href="#" class="favorite-btn">
                                                <i class="fa-light fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="property-details.html">
                                                <figure>
                                                    <img src="assets/images/featured/featured-thumb-06.png" alt="image">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>$18,000/mo</span>
                                        </div>
                                        <h3 class="title"><a href="property-details.html">Villa on hollywood estate</a></h3>
                                        <span class="info">California, CA, USA</span>
                                        <div class="bd-meta">
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span><span
                                       class="title">3 bad</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-duotone fa-shower"></i></span><span class="title">4
                                       bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="icon"><i class="fa-regular fa-arrows-maximize"></i></span><span
                                       class="title">1200 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__wrapper d-flex justify-content-center mt-30">
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
        <!-- app body content end -->

               
</main>
<!-- Body main wrapper end -->
@endsection
