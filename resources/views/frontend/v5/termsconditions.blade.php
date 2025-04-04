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
        <!-- breadcrumb area start -->
        <section class="bd-breadcrumb-area p-relative fix">
            <!-- breadcrumb background image -->
            <div class="bd-breadcrumb-bg" data-background="{{asset("assets/front/v5/images/breadcrumb/breadcrumb-thumb-01.png") }} "></div>
            <div class="bd-breadcrumb-wrapper p-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                                <div class="bd-breadcrumb-content text-center">
                                    <h1 class="bd-breadcrumb-title">Terms and Conditions</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                        <span>Terms and Conditions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- policy-area start -->
        <section class="policy-area section-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="policy-wrapper policy-translate p-relative z-index-1">
                            <div class="policy-item">
                                <h4 class="policy-title">Introduction</h4>
                                <p>These Terms and Conditions govern the use of the real estate services provided by onespace Real Estate. By using our services, you agree to comply with these terms. Please read them carefully.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Services Provided</h4>
                                <p>onespace Real Estate offers real estate brokerage services, property management, rental services, and other related services.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Client Responsibilities</h4>
                                <ul>
                                    <li><b>Accuracy of Information:</b> You agree that all information provided to onespace, whether directly or through our platform, is accurate and up-to-date.</li>
                                    <li><b>Compliance:</b> You agree to comply with all applicable laws and regulations in connection with your use of our Services.</li>
                                    <li><b>Payment:</b> Any fees or commissions due to onespace for our Services shall be paid promptly as agreed upon in writing.</li>
                                </ul>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Use of Information</h4>
                                <ul>
                                    <li><b>Confidentiality:</b> onespace will treat all client information with strict confidentiality, except where disclosure is required by law.</li>
                                    <li><b>Data Use:</b> By using our Services, you agree that onespace may collect and use your personal information in accordance with our Privacy Policy.</li>
                                </ul>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Limitation of Liability</h4>
                                <ul>
                                    <li><b>Disclaimer:</b> onespace makes no warranties or representations about the accuracy or completeness of any information provided through our Services.</li>
                                    <li><b>Indemnification:</b> You agree to indemnify and hold onespace harmless from any claims, losses, or damages arising out of your use of our Services or any breach of these Terms and Conditions.</li>
                                </ul>
                            </div>
                            <div class="policy-item">
                                <h4 class="policy-title">Termination</h4>
                                <ul>
                                    <li><b>Termination by You:</b> You may terminate your use of our Services at any time by providing us with written notice.</li>
                                    <li><b>Termination by onespace:</b> onespace reserves the right to terminate or suspend your access to our Services at any time for any reason.</li>
                                </ul>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Governing Law</h4>
                                <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of United State of America, without regard to its conflict of law provisions.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Changes to Terms and Conditions</h4>
                                <p>onespace reserves the right to update or modify these Terms and Conditions at any time without prior notice. Your continued use of our Services after any such changes constitutes your acceptance of the new Terms and Conditions.</p>
                            </div>

                            <div class="policy-contact">
                                <h4 class="policy-title">Contact Information</h4>
                                <p class="mb-10">If you have any questions or concerns about these Terms and Conditions, please contact us at</p>

                                <ul>
                                    <li>Email: <span><a href="https://html.bdevs.net/cdn-cgi/l/email-protection#d3b0bcbda7b2b0a79381b6b2bfbfbca4fdb0bcbe"><span class="__cf_email__" data-cfemail="dfbcb0b1abbebcab9f8dbabeb3b3b0a8f1bcb0b2">[email&#160;protected]</span></a></span></li>
                                </ul>

                                <div class="policy-address">
                                    <p class="mb-0">
                                        <a href="#">27 Division St, New York, NY 10002, USA</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- policy-area end -->

    </main>
@endsection
