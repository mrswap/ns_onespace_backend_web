@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Edit Property') }}</h4>
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
                <a href="#">{{ __('Property Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Edit Property') }}
                    @if ($property->type == 'residential')
                        {{ '(Residential)' }}
                    @else
                        {{ '(Commercial)' }}
                    @endif
                </a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{ __('Edit Property') }}</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{ route('admin.property_management.properties', ['language' => $defaultLang->code]) }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        {{ __('Back') }}
                    </a>
                    @php
                        $dContent = App\Models\Property\Content::where('property_id', $property->id)
                            ->where('language_id', $defaultLang->id)
                            ->first();
                        $slug = !empty($dContent) ? $dContent->slug : '';
                    @endphp
                    @if ($dContent)
                        <a class="btn btn-success btn-sm float-right mr-1 d-inline-block"
                            href="{{ route('frontend.property.details', ['slug' => $slug]) }}" target="_blank">
                            <span class="btn-label">
                                <i class="fas fa-eye"></i>
                            </span>
                            {{ __('Preview') }}
                        </a>
                    @endif

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="alert alert-danger pb-1 dis-none" id="carErrors">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul></ul>
                            </div>

                            <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Gallery Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($galleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.imagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>

                            <!-- outdoor,    -->
                            <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Outdoor Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($outdoorgalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/outdoor/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.outdoorimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                            <!-- livingroom,    -->
                            <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Living Room Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($livingroomgalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/livingroom/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.livingroomimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  bedroom,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Bedroom Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($bedroomgalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/bedroom/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.bedroomimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  kitchen,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Kitchen Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($kitchengalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/kitchen/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.kitchenimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  washroom,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Washroom Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($washroomgalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/washroom/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.washroomimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  balcony,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Balcony Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($balconygalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/balcony/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.balconyimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  terrace,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Terrace Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($terracegalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/terrace/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.terraceimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                           <!--  stairs,    -->
                           <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Stairs Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($stairsgalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/stairs/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.stairsimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                          <!--   other,     -->
                          <div class="col-lg-12">
                                <label for=""
                                    class="mb-2"><strong>{{ __('Other Images') . '*' }}</strong></label>
                                <div id="reload-slider-div">
                                    <div class="row">

                                        <div class="col-12">
                                            <table class="table table-striped" id="imgtable">

                                                @foreach ($othergalleryImages as $item)
                                                    <tr class="trdb table-row" id="trdb{{ $item->id }}">
                                                        <td>
                                                            <div class="">
                                                                <img class="thumb-preview wf-150"
                                                                    src="{{ asset('assets/img/property/slider-images/other/' . $item->image) }}"
                                                                    alt="Ad Image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-times rmvbtndb"
                                                                data-indb="{{ $item->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.property.otherimagesstore') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>




                            <form id="carForm"
                                action="{{ route('admin.property_management.update_property', $property->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                <input type="hidden" name="type" value="{{ $property->type }}">
                                <input type="hidden" name="vendor_id" value="{{ $property->vendor_id }}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ __('Thumbnail Image') . '*' }}</label>
                                            <br>
                                            <div class="thumb-preview">
                                                <img src="{{ $property->featured_image ? asset('assets/img/property/featureds/' . $property->featured_image) : asset('assets/img/noimage.jpg') }}"
                                                    alt="..." class="uploaded-img">
                                            </div>
                                            <div class="mt-3">
                                                <div role="button" class="btn btn-primary btn-sm upload-btn">
                                                    {{ __('Choose Image') }}
                                                    <input type="file" class="img-input" name="featured_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ __('Floor Planning Image') }}</label>
                                            <br>
                                            <div class="thumb-preview remove">

                                                <img src="{{ !empty($property->floor_planning_image) ? asset('assets/img/property/plannings/' . $property->floor_planning_image) : asset('assets/img/noimage.jpg') }}"
                                                    alt="..." class="uploaded-img2">
                                                @if (!empty($property->floor_planning_image))
                                                    <i class="fas fa-times text-danger rmvflrImg"
                                                        data-indb="{{ $property->id }}"></i>
                                                @endif
                                            </div>

                                            <div class="mt-3">
                                                <div role="button" class="btn btn-primary btn-sm upload-btn">
                                                    {{ __('Choose Image') }}
                                                    <input type="file" class="img-input2" name="floor_planning_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ __('Video Image') }}</label>
                                            <br>
                                            <div class="thumb-preview remove">

                                                <img src="{{ !empty($property->video_image) ? asset('assets/img/property/video/' . $property->video_image) : asset('assets/img/noimage.jpg') }}"
                                                    alt="..." class="uploaded-img3">
                                                @if (!empty($property->video_image))
                                                    <i class="fas fa-times text-danger rmvvdoImg"
                                                        data-indb="{{ $property->id }}"></i>
                                                @endif
                                            </div>

                                            <div class="mt-3">
                                                <div role="button" class="btn btn-primary btn-sm upload-btn">
                                                    {{ __('Choose Image') }}
                                                    <input type="file" class="img-input3" name="video_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">{{ __('Short Video') }}</label>
                                            <br>
                                            <!-- <div class="thumb-preview remove">
                                                <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..."
                                                    class="uploaded-img3">

                                            </div> -->

                                            <div class="mt-3">
                                                <div role="button" class="btn btn-primary btn-sm upload-btn">
                                                    {{ __('Choose Video File') }}
                                                    <input type="file" class="img-input3" name="video">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Video Url') }} </label>
                                            <input type="text" class="form-control" name="video_url"
                                                placeholder="Enter video url" value="{{ $property->video_url }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Purpose') }}*</label>

                                            <select name="purpose" class="form-control">
                                                <option disabled> {{ __('Select a Purpose') }} </option>
                                                <option value="rent" @if ($property->purpose == 'rent') 'selected' @endif>
                                                    {{ __('Rent') }}
                                                </option>
                                                <option value="sale" @if ($property->purpose == 'sale') 'selected' @endif>
                                                    {{ __('Sale') }}
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>{{ __('Type') }} *</label>
                                            <select name="category_id" class="form-control category">
                                                <option disabled selected>
                                                    {{ __('Select a Type') }}
                                                </option>

                                                @foreach ($propertyCategories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $property->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->categoryContent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if ($propertySettings->property_country_status == 1)
                                        <div class="col-lg-3">
                                            <div class="form-group ">

                                                <label>{{ __('Country') }} *</label>
                                                <select name="country_id"
                                                    class="form-control country js-example-basic-single3">
                                                    <option disabled selected>{{ __('Select Country') }}
                                                    </option>

                                                    @foreach ($propertyCountries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $property->country_id == $country->id ? 'selected' : '' }}>
                                                            {{ $country->countryContent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($propertySettings->property_state_status == 1)
                                        <div class="col-lg-3 state"
                                            @if (is_null($property->state_id)) style="display:none !important;" @else style="display:block !important;" @endif>
                                            <div class="form-group">

                                                <label>{{ __('State') }} *</label>
                                                <select onchange="getCities(event)" name="state_id"
                                                    class="form-control  state_id states js-example-basic-single3">
                                                    <option disabled>{{ __('Select State') }}
                                                    </option>
                                                    @if ($property->state_id)
                                                        @foreach ($propertyStates as $state)
                                                            <option value="{{ $state->id }}"
                                                                {{ $property->state_id == $state->id ? 'selected' : '' }}>
                                                                {{ $state?->stateContent->name }}</option>
                                                        @endforeach
                                                    @endif


                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-3 city"
                                        @if (empty($property->city_id)) style="display:none;"@else style="display:block;" @endif>
                                        <div class="form-group ">

                                            <label>{{ __('City') }} *</label>
                                            <select name="city_id" class="form-control city_id js-example-basic-single3">
                                                <option value="" disabled>{{ __('Select City') }}
                                                </option>
                                                @if ($property->city_id)
                                                    @foreach ($propertyCities as $city)
                                                        <option value="{{ $property->city_id }}"
                                                            {{ $property->city_id == $city->id ? 'selected' : '' }}>
                                                            {{ $city?->cityContent->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">{{ __('Amenities') }}*</label>
                                            <select name="amenities[]" class="form-control js-example-basic-single2"
                                                multiple="multiple">
                                                <option value="" disabled>
                                                    {{ __('Please Select Amenities') }}
                                                </option>
                                                @foreach ($amenities as $amenity)
                                                    <option value="{{ $amenity->id }}"
                                                        @foreach ($propertyAmenities as $propertyAmenity)
                                                            {{ $propertyAmenity->amenity_id == $amenity->id ? 'selected' : '' }} @endforeach>
                                                        {{ $amenity->amenityContent->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    


                                    @if ($property->type == 'residential')
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Beds') }} *</label>
                                                <input type="text" class="form-control" name="beds"
                                                    value="{{ $property->beds }}" placeholder="Enter number of bed">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Baths') }} *</label>
                                                <input type="text" class="form-control" name="bath"
                                                    value="{{ $property->bath }}" placeholder="Enter number of bath">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Balcony') }} *</label>
                                                <input type="text" class="form-control" name="balcony"
                                                    placeholder="Enter number of balcony" value="{{ $property->balcony }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Total Floor') }} *</label>
                                                <input type="text" class="form-control" name="TotalFloor"
                                                value="{{ $property->TotalFloor }}"  placeholder="Enter number of total floor">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Floor Number') }} *</label>
                                                <input type="text" class="form-control" name="FloorNo"
                                                    placeholder="Enter floor number" value="{{ $property->FloorNo }}">
                                            </div>
                                        </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Super Buildup Area') }} *</label>
                                            <input type="text" class="form-control" name="area"
                                                value="{{ $property->area }}" placeholder="Enter super buildup area ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Carpet Area') }} *</label>
                                            <input type="text" class="form-control" name="carpetArea" id="carpetArea" 
                                                placeholder="Enter carpet area " value="{{ $property->carpetArea }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Expected Price') }} * </label>
                                            <input type="text" class="form-control" name="expectedPrice"
                                                placeholder="Enter expected Price" value="{{ $property->expectedPrice }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Per sqr Price') }} * </label>
                                            <input type="text" class="form-control" name="sqrPrice"
                                                placeholder="Enter sqrPrice" value="{{ $property->sqrPrice }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Price') . ' (' . $settings->base_currency_text . ')' }} </label>
                                            <input type="number" class="form-control" name="price"
                                                placeholder="Enter Current Price" value="{{ $property->price }}">
                                            <p class="text-warning">
                                                {{ __('If you leave it blank, price will be negotiable.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Furnished Status') }} *</label>
                                            <select name="furnishedStatus" id="" class="form-control">
                                            <option {{ $property->furnishedStatus == "Non funrnished" ? 'selected' : '' }}  value="Non funrnished">{{ __('Non funrnished') }}</option>
                                                <option {{ $property->furnishedStatus == "Furnished" ? 'selected' : '' }} value="Furnished">{{ __('Furnished') }}</option>
                                                <option {{ $property->furnishedStatus == 1 ? 'selected' : '' }} value="Semi funrnished">{{ __('Semi funrnished') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Availability Status') }} *</label>
                                            <select name="availability" id="" class="form-control">
                                            <option value="Ready to move" {{ $property->availability == "Ready to move" ? 'selected' : '' }}>{{ __('Ready to move') }}</option>
                                                <option value="Under Construction" {{ $property->availability == "Under Construction" ? 'selected' : '' }}>{{ __('Under Construction') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Status') }} *</label>
                                            <select name="status" id="" class="form-control">
                                                <option {{ $property->status == 1 ? 'selected' : '' }} value="1">
                                                    {{ __('Active') }}</option>
                                                <option {{ $property->status == 0 ? 'selected' : '' }} value="0">
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Latitude') }} *</label>
                                            <input type="text" class="form-control" value="{{ $property->latitude }}"
                                                name="latitude" placeholder="Enter Latitude">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Longitude') }} *</label>
                                            <input type="text" class="form-control"
                                                value="{{ $property->longitude }}" name="longitude"
                                                placeholder="Enter Longitude">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">{{ __('Property Owner') }}</label>
                                            <select name="vendor_id" class="form-control vendor js-example-basic-single1">
                                                <option value="0" selected>{{ __('Please Select') }}
                                                </option>
                                                @foreach ($vendors as $item)
                                                    <option {{ $property->vendor_id == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{ __('Extra') }} * </label>
                                            @php
                                                $selectedValues = !empty($property->extras)?json_decode($property->extras, true):array(); 
                                            @endphp
                                            <ul>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="smokingallowed" {{ in_array("Smoking allowed", $selectedValues) ? "checked" : '' }} value="Smoking allowed"> <label for="smokingallowed">{{ __('Smoking allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="drinkingallowed" value="Drinking allowed" {{ in_array("Drinking allowed", $selectedValues) ? "checked" : '' }}> <label for="drinkingallowed">{{ __('Drinking allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="petsallowed" value="Pets allowed" {{ in_array("Pets allowed", $selectedValues) ? "checked" : '' }}> <label for="petsallowed">{{ __('Pets allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="nonvegallowed" value="Non veg allowed" {{ in_array("Non veg allowed", $selectedValues) ? "checked" : '' }}> <label for="nonvegallowed" >{{ __('Non veg allowed') }}</label>
                                            </li>
                                            
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="independedallowed" value="Independed allowed" {{ in_array("Independed allowed", $selectedValues) ? "checked" : '' }}> <label for="independedallowed">{{ __('Independed allowed') }}</label>
                                            </li>
                                            </ul>

                                            
                                        </div>
                                    </div>
                                    @php
                                        $agents = App\Models\Agent::where('vendor_id', $property->vendor_id)
                                            ->select('id', 'username')
                                            ->get();
                                    @endphp
                                    <div class="col-lg-3">
                                        <div class="form-group agent @if (empty($property->agent_id)) d-none @endif">
                                            <label for="">{{ __('Agent') }}</label>
                                            <select name="agent_id" class="form-control agent_id js-example-basic-single1">
                                                <option value="" selected>{{ __('Please Select') }}
                                                </option>
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}"
                                                        {{ $agent->id == $property->agent_id ? 'selected' : '' }}>
                                                        {{ $agent->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="text-warning">
                                                {{ __('if you do not select any agent, then this property will be listed under Vendor') }}
                                            </p>
                                        </div>
                                    </div>


                                </div>

                                <div id="accordion" class="mt-3">
                                    @foreach ($languages as $language)
                                        @php
                                            $peopertyContent = App\Models\Property\Content::where(
                                                'property_id',
                                                $property->id,
                                            )
                                                ->where('language_id', $language->id)
                                                ->first();

                                        @endphp
                                        <div class="version">
                                            <div class="version-header" id="heading{{ $language->id }}">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapse{{ $language->id }}"
                                                        aria-expanded="{{ $language->is_default == 1 ? 'true' : 'false' }}"
                                                        aria-controls="collapse{{ $language->id }}">
                                                        {{ $language->name . __(' Language') }}
                                                        {{ $language->is_default == 1 ? '(Default)' : '' }}
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse{{ $language->id }}"
                                                class="collapse {{ $language->is_default == 1 ? 'show' : '' }}"
                                                aria-labelledby="heading{{ $language->id }}" data-parent="#accordion">
                                                <div class="version-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Title*') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="{{ $language->code }}_title"
                                                                    placeholder="Enter Title"
                                                                    value="{{ $peopertyContent ? $peopertyContent->title : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Address') . '*' }} </label>
                                                                <input type="text"
                                                                    name="{{ $language->code }}_address"
                                                                    placeholder="Enter Address"
                                                                    value="{{ @$peopertyContent->address }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Description') }} *</label>
                                                                <textarea class="form-control summernote " id="{{ $language->code }}_description"
                                                                    name="{{ $language->code }}_description" data-height="300">{{ @$peopertyContent->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Meta Keywords') }} *</label>
                                                                <input class="form-control"
                                                                    name="{{ $language->code }}_meta_keyword"
                                                                    placeholder="Enter Meta Keywords"
                                                                    data-role="tagsinput"
                                                                    value="{{ $peopertyContent ? $peopertyContent->meta_keyword : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Meta Description') }} *</label>
                                                                <textarea class="form-control" name="{{ $language->code }}_meta_description" rows="5"
                                                                    placeholder="Enter Meta Description">{{ $peopertyContent ? $peopertyContent->meta_description : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            @php $currLang = $language; @endphp

                                                            @foreach ($languages as $language)
                                                                @continue($language->id == $currLang->id) 
                                                                <div class="form-check py-0">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            onchange="cloneInput('collapse{{ $currLang->id }}', 'collapse{{ $language->id }}', event)">
                                                                        <span
                                                                            class="form-check-sign">{{ __('Clone for') }}
                                                                            <strong
                                                                                class="text-capitalize text-secondary">{{ $language->name }}</strong>
                                                                            {{ __('language') }}</span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-lg-12" id="variation_pricing">
                                        <h4 for="">{{ __('Additional Features (Optional)') }}</h4>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Label') }}</th>
                                                    <th>{{ __('Value') }}</th>
                                                    <th><a href="javascrit:void(0)"
                                                            class="btn  btn-sm btn-success addRow"><i
                                                                class="fas fa-plus-circle"></i></a></th>
                                                </tr>
                                            <tbody id="tbody">

                                                @if (count($specifications) > 0)
                                                    @foreach ($specifications as $specification)
                                                        <tr>
                                                            <td>
                                                                @foreach ($languages as $language)
                                                                    @php
                                                                        $sp_content = App\Models\Property\SpacificationCotent::where(
                                                                            [
                                                                                ['language_id', $language->id],
                                                                                [
                                                                                    'property_spacification_id',
                                                                                    $specification->id,
                                                                                ],
                                                                            ],
                                                                        )->first();
                                                                    @endphp
                                                                    <div
                                                                        class="form-group  {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                        <input type="text"
                                                                            name="{{ $language->code }}_label[]"
                                                                            value="{{ @$sp_content->label }}"
                                                                            class="form-control"
                                                                            placeholder="Label ({{ $language->name }})">
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($languages as $language)
                                                                    @php
                                                                        $sp_content = App\Models\Property\SpacificationCotent::where(
                                                                            [
                                                                                ['language_id', $language->id],
                                                                                [
                                                                                    'property_spacification_id',
                                                                                    $specification->id,
                                                                                ],
                                                                            ],
                                                                        )->first();
                                                                    @endphp
                                                                    <div
                                                                        class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                        <input type="text"
                                                                            name="{{ $language->code }}_value[]"
                                                                            value="{{ @$sp_content->value }}"
                                                                            class="form-control"
                                                                            placeholder="Value ({{ $language->name }})">
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-specification="{{ $specification->id }}"
                                                                    class="btn  btn-sm btn-danger deleteSpecification">
                                                                    <i class="fas fa-minus"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td>
                                                            @foreach ($languages as $language)
                                                                <div
                                                                    class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                    <input type="text"
                                                                        name="{{ $language->code }}_label[]"
                                                                        class="form-control"
                                                                        placeholder="Label ({{ $language->name }})">
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($languages as $language)
                                                                <div
                                                                    class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                    <input type="text"
                                                                        name="{{ $language->code }}_value[]"
                                                                        class="form-control"
                                                                        placeholder="Value ({{ $language->name }})">
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger  btn-sm deleteRow">
                                                                <i class="fas fa-minus"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-lg-12" id="variation_pricing">
                                        <h4 for="">{{ __('Additional Features (Optional)') }}</h4>
                                        <table class="table table-bordered table-striped addassets">
                                            <thead>
                                                <tr>
                                                     <th>{{ __('Category') }}</th>
                                                    <th>{{ __('SubCategory') }}</th>
                                                    <th>{{ __('AssetsName') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th><a href="javascrit:void(0)"
                                                            class="btn  btn-sm btn-success addassetsRow"><i
                                                                class="fas fa-plus-circle"></i></a></th>
                                                </tr>
                                            <tbody id="tAssetsbody">

                                                @if (count($propertyAssets) > 0)
                                                    @foreach ($propertyAssets as $propertyAsset)
                                                        <tr>
                                                            <td>
                                                                @foreach ($languages as $language)
                                                                    
                                                                   <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <select name="{{ $language->code }}_category[]" class="form-control Category" required>
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($Categories as $Categor)
                                                                        <option value="{{ $Categor->id }}">{{ $Categor->name }}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                            </div>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($languages as $language)
                                                                    @php
                                                                        $SubCategories = App\Models\SubCategory::where(
                                                                            [
                                                                                
                                                                                [
                                                                                    'category_id',
                                                                                    $propertyAsset->category,
                                                                                ],
                                                                            ],
                                                                        );
                                                                    @endphp
                                                                    <div
                                                                        class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                        <select name="{{ $language->code }}_subcategory[]" class="form-control subcategory" required>
                                                                    <option value="">Select Subcategory</option>
                                                                    @foreach ($SubCategories as $subCategor)
                                                                        <option value="{{ $subCategor->id }}">{{ $subCategor->name }}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                                    </div>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <input type="text" name="{{ $language->code }}_asset[]" value="{{ $propertyAsset->name }}" class="form-control" required>

                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <input type="number" name="{{ $language->code }}_quantity[]" value="{{ $propertyAsset->quantity }}" class="form-control" required>

                                                            </div>
                                                        @endforeach
                                                    </td>
                                                            <td>

                                                                <a href="javascript:void(0)"
                                                                    data-specification="{{ $propertyAsset->id }}"
                                                                    class="btn  btn-sm btn-danger deletepropertyAsset">
                                                                    <i class="fas fa-minus"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <select name="{{ $language->code }}_category[]" class="form-control Category" required>
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($Categories as $Categor)
                                                                        <option value="{{ $Categor->id }}">{{ $Categor->name }}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <select name="{{ $language->code }}_subcategory[]" class="form-control subcategory" required>
                                                                    <option value="">Select Subcategory</option>
                                                                    @foreach ($SubCategories as $subCategor)
                                                                        <option value="{{ $subCategor->id }}">{{ $subCategor->name }}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <input type="text" name="{{ $language->code }}_asset[]" class="form-control" required>

                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($languages as $language)
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <input type="number" name="{{ $language->code }}_quantity[]" class="form-control" required>

                                                            </div>
                                                        @endforeach
                                                    </td>
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger  btn-sm deletepropertyAsset">
                                                                <i class="fas fa-minus"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div id="sliders"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" id="PropertySubmit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $languages = App\Models\Language::get();
    $labels = '';
    $values = '';
    
    $category = '';
    $subcategory = '';
    $asset = '';
    $quantity = '';
    foreach ($languages as $language) {
        $label_name = $language->code . '_label[]';
        $value_name = $language->code . '_value[]';
        if ($language->direction == 1) {
            $direction = 'form-group rtl text-right';
        } else {
            $direction = 'form-group';
        }

        $labels .=
            "<div class='$direction'><input type='text' name='" .
            $label_name .
            "' class='form-control' placeholder='Label ($language->name)'></div>";
        $values .= "<div class='$direction'><input type='text' name='$value_name' class='form-control' placeholder='Value ($language->name)'></div>";
    }

    foreach ($languages as $language) {
        $category_name = $language->code . '_category[]';
        $subcategory_name = $language->code . '_subcategory[]';
        $asset_name = $language->code . '_asset[]';
        $quantity_name = $language->code . '_quantity[]';

        if ($language->direction == 1) {
            $direction = 'form-group rtl text-right';
        } else {
            $direction = 'form-group';
        }

        $category .=  "<div class='$direction'><select name='$category_name' class='form-control Category' required><option value=''>Select Category</option>";
        foreach ($Categories as $Categor) {

            
            $category .=  "<option value='".$Categor["id"]."'>".$Categor["name"]."</option>";
    
        } 
        $category .=  "</select></div>";
        $subcategory .= "<div class='$direction'><select name='$subcategory_name' class='form-control' required><option value=''>Select Subcategory</option>";
        foreach ($SubCategories as $subCategor) {
            $subcategory .=  "<option value='".$subCategor["id"]."'>".$subCategor["name"]."</option>";
        } 
        $subcategory .=  "</select></div>";
       $asset.=  "<div class='$direction'><input type='text' name='$asset_name' class='form-control' placeholder='Assets ($language->name)'></div>";
        $quantity .= "<div class='$direction'><input type='number' name='$quantity_name' class='form-control' placeholder='Quantity ($language->name)'></div>";
 
    
    }


@endphp

@section('script')
    <script>
        'use strict';
        var labels = "{!! $labels !!}";
        var values = "{!! $values !!}";
        var category = "{!! $category !!}";
        var subcategory = "{!! $subcategory !!}";
        var asset = "{!! $asset !!}";
        var quantity = "{!! $quantity !!}";
        var stateUrl = "{{ route('admin.property_specification.get_state_cities') }}";
        var cityUrl = "{{ route('admin.property_specification.get_cities') }}";
        var storeUrl = "{{ route('admin.property.imagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var removeUrl = "{{ route('admin.property.imagermv') }}";
        
        var outdoorstoreUrl = "{{ route('admin.property.outdoorimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var livingroomstoreUrl = "{{ route('admin.property.livingroomimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var bedroomstoreUrl = "{{ route('admin.property.bedroomimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var kitchenstoreUrl = "{{ route('admin.property.kitchenimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var washroomstoreUrl = "{{ route('admin.property.washroomimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var balconystoreUrl = "{{ route('admin.property.balconyimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var terracestoreUrl = "{{ route('admin.property.terraceimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var stairsstoreUrl = "{{ route('admin.property.stairsimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var otherstoreUrl = "{{ route('admin.property.otherimagesupdate', ['vendor_id' => $property->vendor_id]) }}";
        var outdoorremoveUrl = "{{ route('admin.property.outdoorimagermv') }}";

        var livingroomremoveUrl = "{{ route('admin.property.livingroomimagermv') }}";

        var bedroomremoveUrl = "{{ route('admin.property.bedroomimagermv') }}";

        var kitchenremoveUrl = "{{ route('admin.property.kitchenimagermv') }}";

        var washroomremoveUrl = "{{ route('admin.property.washroomimagermv') }}";

        var balconyremoveUrl = "{{ route('admin.property.balconyimagermv') }}";

        var terraceremoveUrl = "{{ route('admin.property.terraceimagermv') }}";

        var stairsremoveUrl = "{{ route('admin.property.stairsimagermv') }}";

        var otherremoveUrl = "{{ route('admin.property.otherimagermv') }}";
        var rmvdbUrl = "{{ route('admin.property.imgdbrmv') }}";
        
        var outdoorrmvdbUrl = "{{ route('admin.property.outdoorimgdbrmv') }}";

var livingroomrmvdbUrl = "{{ route('admin.property.livingroomimgdbrmv') }}";

var bedroomrmvdbUrl = "{{ route('admin.property.bedroomimgdbrmv') }}";

var kitchenrmvdbUrl = "{{ route('admin.property.kitchenimgdbrmv') }}";

var washroomrmvdbUrl = "{{ route('admin.property.washroomimgdbrmv') }}";

var balconyrmvdbUrl = "{{ route('admin.property.balconyimgdbrmv') }}";

var terracermvdbUrl = "{{ route('admin.property.terraceimgdbrmv') }}";

var stairsrmvdbUrl = "{{ route('admin.property.stairsimgdbrmv') }}";

var otherrmvdbUrl = "{{ route('admin.property.otherimgdbrmv') }}";
        let agentUrl = "{{ route('admin.property_management.get_agent') }}";
        var specificationRmvUrl = "{{ route('admin.property_management.specification_delete') }}";
        var subcategoryUrl = "{{ route('admin.subcategory_management.get_subcategory') }}";


        let galleryImages = {{ $uploadGImg }};
        
        let galleryImagesoutdoor = {{ $uploadGImgoutdoor }};


let galleryImageslivingroom = {{ $uploadGImglivingroom }};


let galleryImagesbedroom = {{ $uploadGImgbedroom }};


let galleryImageskitchen = {{ $uploadGImgkitchen }};


let galleryImageswashroom = {{ $uploadGImgwashroom }};


let galleryImagesbalcony = {{ $uploadGImgbalcony }};


let galleryImagesterrace = {{ $uploadGImgterrace }};



let galleryImagesstairs = {{ $uploadGImgstairs }};


let galleryImagesother = {{ $uploadGImgother }};

        
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/admin-partial.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/js/admin-dropzone.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/js/admin-dropzone-propertyG.js') }}"></script>
    <script src="{{ asset('assets/js/property.js') }}"></script>
@endsection
