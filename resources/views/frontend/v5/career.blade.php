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
<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<!-- Body main wrapper start -->
<main>

    <!-- Breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png" ) }} "></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">Careers</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                    <span>Careers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area end -->

    <!-- About area Start -->
    <section class="bd-about-area section-space p-relative">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-content style-one">
                        <div class="section-title-wrapper anim-wrapper section-title-space animation-style-3">
                            <span class="section-subtitle uppercase">
                                <i class="icon-home"></i>
                                career
                            </span>
                            <h2 class="section-title title-animation is-br-none">Grow your career with us </h2>
                        </div>
                        <div class="about-tab">
                            <div class="content">
                                <p class="description">
                                    At Onespace, we’re building the future of real estate by offering innovative solutions and exceptional service to buyers, sellers, tenants, and property owners. We believe that success comes from having a passionate, dedicated, and creative team. If you're driven to make a difference and want to be a part of a dynamic company, we’d love to have you on board.
                                </p>
                            </div>
                            <h5 class="section-title title-animation py-4 mt-2">Types of Properties We Manage</h5>
                            <div class="types-list">
                                <ul class="ms-4 mt-2">
                                    <li class="pb-4">
                                        <strong> Innovative Environment:</strong> We’re not just another real estate company; we’re reimagining the way real estate works. Join a team that thrives on creativity, innovation, and solving real-world challenges.
                                    </li>
                                    <li class="pb-4">
                                        <strong> Career Growth Opportunities:</strong> Your professional development is our priority. We provide opportunities for continuous learning and growth, with clear career paths and mentorship from industry leaders.</p>
                                    </li>
                                    <li class="pb-4">
                                        <strong> Work-Life Balance:</strong> We believe in maintaining a healthy work-life balance and provide a flexible, supportive work environment where you can thrive both personally and professionally.</p>
                                    </li>
                                    <li class="pb-4">
                                        <strong>Competitive Compensation:</strong> Along with a competitive salary, we offer bonuses, health benefits, and performance incentives.</p>
                                    </li>
                                    <li class="pb-4"></li>
                                    <strong>Collaborative Culture:</strong> At Onespace, we foster a culture of collaboration and open communication. You’ll work with a supportive team that values new ideas and diverse perspectives.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="about-btn">
                                <a class="bd-half-outline-btn" href="about.html"><span class="text">know More</span></a>
                            </div> -->
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="ps-3 pe-3">
                        <!-- <div class="round-box-inner">
                                <div class="round-box">
                                    <span class="round one"></span>
                                    <span class="round two"></span>
                                    <span class="round three"></span>
                                </div>
                                <div class="round-icon">
                                    <figure class="p-2"><img src="{{asset("assets/front/v5/images/logo/ONESPACE-favicon.png" ) }} "alt="image" width="60px"></figure>
                                </div>
                            </div> -->
                        <div class="thumb-one">
                            <figure> <img src="{{asset("assets/front/v5/images/career.webp" ) }} " alt="image"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area end -->

    <!-- Services area start -->
    <section class="bd-services-item section-space theme-bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                        <span class="section-subtitle uppercase"><i class="icon-home"></i>Our Jobs</span>
                        <h2 class="section-title title-animation">Join Our Real Estate Revolution: Exciting Careers Await!</h2>
                    </div>

                </div>
            </div>
            <div class="row g-5">
                @foreach ($careers_jobs as $careers_job)

                @if($careers_job)
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="services-item style-one wow bdFadeInUp text-start" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="content">
                            <h3 class="title">
                                {{$careers_job->title}}
                            </h3>
                            <p class="description">
                                <!--{{$careers_job->description}}-->
                                {!! $careers_job->description !!}
                            </p>
                        </div>
                        <div class="btn-inner justify-content-start">
                            <a class="bd-half-outline-btn open-modal" href="javascript:myVoid(0)" data-name="{{$careers_job->title}}" data-id="{{$careers_job->id}}" data-wow-delay=".3s" data-bs-toggle="modal" data-bs-target="#jobModal" data-bs-placement="top"><span class="text">Apply</span></a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>
    <!-- Services area end -->


</main>
<!-- Body main wrapper end -->

<!-- job modal start-->
<div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close product-modal-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
                <div class="bd-product-modal">
                    <div class="row g-5">
                        <div class="col-md-12">
                            <div class="content">
                                <h3 id="job_title" class="title pb-30">

                                </h3>
                                <form class="form"  enctype="multipart/form-data" action="{{ route('career_apply') }}" method="POST">
                                    @csrf
                                    <div class="applyJob">
                                        <div class="Job-from">
                                            <div class="row g-5 align-items-center justify-content-center">
                                                <input id="jobs_id" name="jobs_id" type="hidden">
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="name" type="text" placeholder="Your Name">
                                                            <div class=""><span><i class="fa-solid fa-user"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="email" type="text" placeholder="Your Email">
                                                            <div class=""><span><i class="fa-solid fa-envelope"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="number" type="text" placeholder="Your Phone">
                                                            <div class=""><span><i class="fa-solid fa-phone"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <input required name="jobtitle" type="text" placeholder="Job Title">
                                                            <div class=""><span><i class="fa-solid fa-book"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <label for="resume" class="w-100 text-start pb-4 fw-bold">Upload Resume</label>
                                                            <input required name="resume" type="file" placeholder="Resume" class="p-4" id="resume">
                                                            <div class=""><span style="top: 48px;"><i class="fa-solid fa-file-doc"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <div class="form-input-box has-icon icon-right">
                                                        <div class="form-input">
                                                            <textarea required name="message" placeholder="Your Message"></textarea>
                                                            <div class=""><span><i class="fa-solid fa-pen"></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <button class="bd-btn btn-style btn-hover-x btn-black w-100" type="submit">Send
                                                        Massage</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job modal end -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", ".open-modal", function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $(".modal-body h3").text(name);

        $("#jobs_id").val(id);
    });

</script>
