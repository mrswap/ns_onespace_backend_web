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
<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('assets/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
   <main>

        <!-- Breadcrumb area start -->
        <section class="bd-breadcrumb-area p-relative fix">
            <!-- breadcrumb background image -->
            <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png") }} "></div>
            <div class="bd-breadcrumb-wrapper p-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="bd-breadcrumb">
                                <div class="bd-breadcrumb-content text-center">
                                    <h1 class="bd-breadcrumb-title">Help FAQ</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                        <span>Help FAQ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area end -->

        <!-- faq area start -->
        <section class="bd-faq-listing-area section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-xxl-8 col-xl-8 col-lg-6">
                            <div class="section-title-wrapper anim-wrapper section-title-space text-center animation-style-3">
                                <span class="section-subtitle uppercase">
        <i class="icon-home"></i>
        faqs
    </span>
                                <h2 class="section-title title-animation">Frequently asked question</h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-10 col-xl-10 col-lg-8">
                        <div class="accordion-wrapper faq-style-3 wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="accordion" id="accordionExampleThree">
                                <div class="accordion-item">
                                    <h6 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span>Q1:</span>What the first step of the home buying process?</button>
                                    </h6>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">
                                            <p>Getting pre-approved for a mortgage is the first step of the home buying process. Getting a pre-approval letter from a lender get the ball rolling in the right direction.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span>Q2:</span>How long does it take to buy a home?</button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">
                                            <p>From start (searching online) to finish (closing escrow), buying a home takes about 10 to 12 weeks. Once a home is selected an the offer is accepted, the average time to complete the escrow period on a home is 30 to 45 days (under normal market conditions).</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span>Q3:</span>What is a seller’s market?</button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">
                                            <p>In sellers’ markets, increasing demand for homes drives up prices. Here are some of the drivers of demand</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <span>Q4:</span>Can I make repairs to the unit?</button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">
                                            <p>In most cases, a renter’s lease outlines which repairs are the landlord's responsibility and which are the tenant's. If the renter wants to complete repairs on their own, it’s best to ask the landlord before doing so. They might approve the repairs and even cover some of the costs for them</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <span>Q5:</span>How much do I need for a down payment?</button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">While the broad down payment average is 11%, first time homebuyers usually only put down 3 to 5% on a home. That’s because several first-time home buyer programs don’t require big down payments. A longtime favorite, the FHA loan, requires 3.5% down</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            <span>Q6:</span>How much will I have to pay in closing costs?</button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExampleThree">
                                        <div class="accordion-body">
                                            <p>Closing costs for homebuyers typically range from 2% to 5% of the home's purchase price. These costs cover various fees and expenses associated with finalizing the real estate transaction</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end -->

    </main>
@endsection
