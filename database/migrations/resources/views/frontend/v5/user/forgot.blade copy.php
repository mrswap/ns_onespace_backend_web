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
<meta property="og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5<meta property=" og:image" content="{{ asset('{{{{ asset}}/front/v5/front/v5/front/v5/front/v5/front/v5/img/project/featured/' . $project->featured_image) }}">/front/v5/img/project/featured/' . $project->featured_image) }}">
<meta property="og:url" content="{{ route('frontend.projects.details', $project->slug) }}">
@endsection --}}

@section('content')
<!-- Body main wrapper start -->
<main>
    <!-- forgot area start -->
    <section class="bd-forgot-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5">
                    <div class="sign-form-wrapper text-center">
                        <h4 class="title mb-5">Reset password</h4>
                        <p class="mb-20">Enter your email address to request password reset</p>
                        <form action="{{ route('vendor.forget.mail') }}" method="POST">
                            @csrf
                            <div class="input-box mb-20">
                                <input type="email" class="form-control" name="email" placeholder="{{ __('Email Address') }}">
                            </div>
                            <div class="sign-btn">
                                <button type="submit" class="bd-btn btn-style btn-hover-x">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- forgot area end -->

</main>
<!-- Body main wrapper end -->
@endsection
