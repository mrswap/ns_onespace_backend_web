@extends('backend.layout')

@includeIf('backend.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Edit Plan package') }}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Planpackage') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Edit') }}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{ __('Edit Plan package') }}</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block" href="{{ route('admin.Planpackage.index') }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        {{ __('Back') }}
                    </a>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" class="" action="{{ route('admin.Planpackage.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="Planpackage_id" value="{{ $Planpackage->id }}">

                                

                                <div class="form-group">
                                    <label for="title">{{ __('Plan Package title') }}*</label>
                                    <input id="title" type="text" class="form-control" name="title"
                                        value="{{ $Planpackage->title }}" placeholder="{{ __('Enter title') }}">
                                    <p id="err_title" class="mb-0 text-danger em"></p>
                                </div>



                                <div class="form-group">
                                    <label for="price">{{ __('Price') }}
                                        ({{ $settings->base_currency_text }})*</label>
                                    <input id="price" type="number" class="form-control" name="price"
                                        placeholder="{{ __('Enter Plan package price') }}" value="{{ $Planpackage->price }}">
                                    <p class="text-warning">
                                        <small>{{ __('If price is 0 , than it will appear as free') }}</small>
                                    </p>
                                    <p id="err_price" class="mb-0 text-danger em"></p>
                                </div>

                                <div class="form-group">
                            <label for="description">{{ __('Description') }} </label>
                            
                                <textarea class="form-control" name="description" rows="5"
                                  placeholder="Enter Description" id="description">{{ $Planpackage->description}}</textarea>
                            
                            <p id="err_price" class="mb-0 text-danger em"></p>
                        </div>
                                @php
                                $polices= json_decode($Planpackage->polices);
                                @endphp
                                <div class="form-group">
                                    <label class="form-label">{{ __('Number of packege Policies') }} *</label>
                                    <input type="text" class="form-control" name="policies[]"
                                        value="{{ $polices[0] }}"
                                        placeholder="{{ __('Enter Policy') }}">
                                    <!-- <p id="err_number_of_agent" class="mb-0 text-danger em"></p>
                                    <p class="text-warning mb-0">
                                        <small>{{ __('Enter 999999, than it will appear as unlimited') }}</small>
                                    </p> -->
                                </div>

                                <div class="form-group">
                                    <!-- <label class="form-label">{{ __('Number of Properties') }} *</label> -->
                                    <input type="text" class="form-control" name="policies[]"
                                        value="{{ $polices[1] }}"
                                        placeholder="{{ __('Enter Policy') }}">
                                    <!-- <p id="err_number_of_property" class="mb-0 text-danger em"></p>
                                    <p class="text-warning mb-0">
                                        <small>{{ __('Enter 999999, than it will appear as unlimited') }}</small>
                                    </p> -->
                                </div>
                                <div class="form-group">
                                    <!-- <label class="form-label">{{ __('Number of Gallery Images (Per Property)') }}
                                        *</label> -->
                                    <input type="text" name="policies[]" class="form-control"
                                        value="{{ $polices[2] }}"
                                        placeholder="{{ __('Enter Policy') }}">
                                    <!-- <p id="err_number_of_property_gallery_images" class="mb-0 text-danger em"></p>
                                    <p class="text-warning mb-0">
                                        <small>{{ __('Enter 999999, than it will appear as unlimited') }}</small>
                                    </p> -->
                                </div>

                                <div class="form-group">
                                    <!-- <label class="form-label">{{ __('Number of Additional Features (Per Property)') }}
                                        *</label> -->
                                    <input type="text" class="form-control"
                                        name="policies[]"
                                        value="{{ $polices[3] }}"
                                        placeholder="{{ __('Enter Policy') }}">
                                    <!-- <p id="err_number_of_property_adittionl_specifications" class="mb-0 text-danger em">
                                    </p>
                                    <p class="text-warning mb-0">
                                        <small>{{ __('Enter 999999, than it will appear as unlimited') }}</small>
                                    </p> -->
                                </div>

                                <div class="form-group">
                                    <!-- <label class="form-label">{{ __('Number of Projects') }} *</label> -->
                                    <input type="text" class="form-control" name="policies[]"
                                        value="{{ $polices[4] }}"
                                        placeholder="{{ __('Enter Policy') }}">
                                    <!-- <p id="err_number_of_projects" class="mb-0 text-danger em"></p>
                                    <p class="text-warning mb-0">
                                        <small>{{ __('Enter 999999, than it will appear as unlimited') }}</small>
                                    </p> -->
                                </div>


                                <div class="form-group">
                                    <label for="status">{{ __('Status') }}*</label>
                                    <select id="status" class="form-control ltr" name="status">
                                        <option value="" selected disabled>{{ __('Select a status') }}</option>
                                        <option value="1" {{ $Planpackage->status == '1' ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0" {{ $Planpackage->status == '0' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    <p id="err_status" class="mb-0 text-danger em"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn"
                                    class="btn btn-success">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <!-- <script src="{{ asset('assets/js/packages.js') }}"></script>
    <script src="{{ asset('assets/admin/js/edit-package.js') }}"></script> -->
    <script src="{{ asset('assets/js/admin-partial.js') }}"></script>
@endsection
