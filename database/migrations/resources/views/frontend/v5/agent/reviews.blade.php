 
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
                <div class="col-xl-8">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-30">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">Reviews</h6>
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
                        <div class="review-wrapper">
                            <div class="client-review">
                                <img src="assets/images/agent/agent-02.png" alt="" class="rounded-circle reviewer-avatar">
                                <div class="review-content">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="reviewer-name">Michael Nguyen</h6>
                                            <span class="review-date fs-16">17 June, 2024</span>
                                        </div>
                                        <ul class="review-rating style-none d-flex xs-mt-10">
                                            <li><span class="mr-5">(4.9 Rating)</span> </li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <p class="review-description">“The team at onespace exceeded our expectations. Their
                                        commitment to finding the perfect property was evident throughout the process. Highly
                                        professional and reliable!”</p>
                                    <ul class="review-gallery style-none d-flex">
                                        <li><a href="assets/images/property/property-thumb-01.png" class="popup-image
                                    d-block"><img src="assets/images/property/property-thumb-01.png" alt=""></a></li>
                                        <li><a href="assets/images/property/property-thumb-02.png" class="popup-image d-block"><img src="assets/images/property/property-thumb-02.png" alt=""></a></li>
                                        <li><a href="assets/images/property/property-thumb-03.png" class="popup-image d-block"><img src="assets/images/property/property-thumb-03.png" alt=""></a></li>
                                    </ul>
                                    <div class="d-flex review-button">
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                            <span>Helpful</span></a>
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                            <span>Favorite</span></a>
                                        <a href="#"><i class="fa-sharp fa-regular fa-reply"></i> <span>Reply</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="client-review">
                                <img src="assets/images/agent/agent-01.png" alt="" class="rounded-circle reviewer-avatar">
                                <div class="review-content">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="reviewer-name">Emily Parker</h6>
                                            <span class="review-date fs-16">13 June, 2024</span>
                                        </div>
                                        <ul class="review-rating style-none d-flex xs-mt-10">
                                            <li><span class="mr-5">(5.0 Rating)</span> </li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <p class="review-description">“onespace's dedication and attention to detail made all the
                                        difference. Their market insight and personalized service helped us secure our ideal home
                                        effortlessly.”</p>
                                    <div class="d-flex review-button">
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                            <span>Helpful</span></a>
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                            <span>Favorite</span></a>
                                        <a href="#"><i class="fa-sharp fa-regular fa-reply"></i> <span>Reply</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="client-review">
                                <img src="assets/images/agent/agent-04.png" alt="" class="rounded-circle reviewer-avatar">
                                <div class="review-content">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="reviewer-name">Sarah Johnson</h6>
                                            <span class="review-date fs-16">10 June, 2024</span>
                                        </div>
                                        <ul class="review-rating style-none d-flex xs-mt-10">
                                            <li><span class="mr-5">(5.0 Ratings)</span> </li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <p class="review-description">“Choosing onespace was the best decision we made. Their expert
                                        team provided invaluable advice and support, making our home-buying journey smooth and
                                        successful.”</p>
                                    <div class="d-flex review-button">
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                            <span>Helpful</span></a>
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                            <span>Favorite</span></a>
                                        <a href="#"><i class="fa-sharp fa-regular fa-reply"></i> <span>Reply</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="client-review">
                                <img src="assets/images/agent/agent-06.png" alt="" class="rounded-circle reviewer-avatar">
                                <div class="review-content">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="reviewer-name">Mazharul Islam</h6>
                                            <span class="review-date fs-16">9 June, 2024</span>
                                        </div>
                                        <ul class="review-rating style-none d-flex xs-mt-10">
                                            <li><span class="mr-5">(3.9 Rating)</span> </li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                            <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <p class="review-description">“onespace's professionalism and market expertise are unmatched.
                                        They guided us every step of the way, ensuring we found the perfect home. Highly recommend
                                        them!”</p>
                                    <div class="d-flex review-button">
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                            <span>Helpful</span></a>
                                        <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                            <span>Favorite</span></a>
                                        <a href="#"><i class="fa-sharp fa-regular fa-reply"></i> <span>Reply</span></a>
                                    </div>
                                </div>

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
        <!-- app body content end -->
        </main>
<!-- Body main wrapper end -->
@endsection
