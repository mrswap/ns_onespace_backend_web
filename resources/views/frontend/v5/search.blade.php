@php
$version = $basicInfo->theme_version;

@endphp
@extends("frontend.layouts.layout-v$version")

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
<meta property="og:image" content="{{ asset('{{asset("front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<main>
    <section class="bd-featured-area section-space theme-bg-primary">
        <div class="container">
            <div class="row g-5 section-title-space align-items-center justify-content-between">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6">
                    <div class="common-nav-pre">
                        <!-- If we need navigation buttons -->
                        <div class="common-navigation justify-content-lg-end justify-content-start">
                            <button class="common-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                            <!-- If we need pagination -->
                            <div class="why-choos-pagination">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                            <button class="common-slider-button-next"><i class="fa-regular fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="swiper common-carousel-active wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="swiper-wrapper">
                            @foreach ($properties as $property)

                            @php
                            $property_content = $property->getContent($language->id);
                            if (is_null($property_content)) {
                            $property_content = $property
                            ->propertyContents()
                            ->first();
                            }
                            @endphp

                            <div class="swiper-slide">
                                <div class="featured-item style-one">
                                    <div class="thumb-wrapper imgPropertySlider">
                                        <div class="swiper featured__properties">
                                            <div class="swiper-wrapper ">

                                                @php
                                                $slider_images= \DB::table('property_slider_images') ->where('property_id', $property->id)->get();
                                                @endphp
                                                @foreach($slider_images as $key => $slider_image)
                                                <div class="swiper-slide">
                                                    <div class="sidebar-widget p-0">
                                                        <div class="sidebar-slider">
                                                            <div class="sidebar-thumb-wrapper">
                                                                <div class="sidebar-thumb">
                                                                    <figure><img src="{{asset("assets/img/property/slider-images/$slider_image->image")}}" alt="agent-sidebar thumb not found"></figure>
                                                                </div>
                                                                <div class="badge-wrap agent-badge">
                                                                    <a href="#" class="bd-badge-blue"><img src="{{asset("assets/front/v5/images/blueTick.png")}}" alt="blue-tick" width="30px" height="30px"></a>
                                                                    <a href="#" class="bd-badge">For Rent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                            <div class="agent-nav-pag mb-20">
                                                <!-- If we need navigation buttons -->
                                                <div class="common-navigation">
                                                    <button class="properties-slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                                                    <button class="properties-slider-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="properties-pagination">
                                                    <div class="bd-swiper-dot text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price">
                                            <span>₹{{$property->price}} / {{$property->expectedPrice}}/mo</span>
                                        </div>
                                        <h3 class="title"><a href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">Equestrian family home</a></h3>
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
    </section>

</main>
@endsection
