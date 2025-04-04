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
<meta property="og:image" content="{{ asset('{{asset("/front/v5/front/v5/front/v5<meta property="og:image" content="{{ asset('{{asset("/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
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
                                    <h1 class="bd-breadcrumb-title">Privacy and Policy</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="index.html"><i class="icon-home"></i>Home</a></span>
                                        <span>Privacy and Policy</span>
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
                                <p>Thank you for visiting onespace Real Estate. This Privacy Policy outlines how we collect, use, disclose,
                                    and manage your personal information. By using our website, you agree to the terms of this
                                    Privacy Policy.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Information We Collect</h4>
                                <p>We collect personal information that you voluntarily provide to us when you use our website,
                                    including but not limited to your name, email address, phone number, and property preferences.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">How We Use Your Information</h4>
                                <p class="mb-10">We may use your personal information to:</p>
                                <ul>
                                    <li>Provide and personalize our real estate services</li>
                                    <li>Communicate with you about property listings, inquiries, or transactions</li>
                                    <li>Improve our website and services</li>
                                    <li>Process your inquiries and facilitate transactions</li>
                                    <li>Comply with legal obligations</li>
                                </ul>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">How We Share Your Information</h4>
                                <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent,
                                    except as described in this Privacy Policy or as required by law.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Cookies and Tracking Technologies</h4>
                                <p>We use cookies and similar tracking technologies to analyze trends, administer our website, track users’
                                    movements around the site, and gather demographic information about our user base.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Third-Party Links</h4>
                                <p>Our website may contain links to third-party websites. We have no control over the content or privacy practices
                                    of these sites and are not responsible for their content or privacy policies.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Security</h4>
                                <p>We take reasonable measures to protect your personal information from unauthorized access, disclosure,
                                    alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100%
                                    secure.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Children’s Privacy</h4>
                                <p>Our website is not intended for children under the age of 13, and we do not knowingly collect personal
                                    information from children under the age of 13. If you are a parent or guardian and believe that your child has
                                    provided us with personal information, please contact us.</p>
                            </div>

                            <div class="policy-item">
                                <h4 class="policy-title">Changes to this Privacy Policy</h4>
                                <p>We reserve the right to modify this Privacy Policy at any time. If we make material changes to this policy, we
                                    will notify you here or by means of a notice on our website.</p>
                            </div>

                            <div class="policy-contact">
                                <h4 class="policy-title">Contact Us</h4>
                                <p class="mb-10">If you have any questions or concerns about our Privacy Policy, please contact us at:</p>
                                <ul>
                                    <li>Email: <span><a href="https://html.bdevs.net/cdn-cgi/l/email-protection#d8bbb7b6acb9bbac988abdb9b4b4b7af8abdb9b49dabacb9acbdf6bbb7b5"><span class="__cf_email__" data-cfemail="89eae6e7fde8eafdc9dbece8e5e5e6fedbece8e5ccfafde8fdeca7eae6e4">[email&#160;protected]</span></a></span></li>
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
