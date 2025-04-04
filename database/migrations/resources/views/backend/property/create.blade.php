@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Add Poperty') }}</h4>
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
                <a href="#">{{ __('Porperty Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Add Porperty') }}@if (request('type') == 'residential')
                       {{"(Residential)"}}
                    @else
                        {{ "(Commercial)" }}
                    @endif
                </a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{ __('Add Porperty') }}</div>
                </div>
                

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="alert alert-danger pb-1 dis-none" id="carErrors">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul></ul>
                            </div>
                            <div class="col-lg-12">
                                <label for="" class="mb-2"><strong>{{ __('Gallery Images') }} **</strong></label>
                                <form action="{{ route('admin.property.imagesstore') }}" id="my-dropzone"
                                    enctype="multipart/form-data" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                                
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Outdoor Images') }} **</strong></label>
                                <form action="{{ route('admin.property.outdoorimagesstore') }}" id="my-dropzoneoutdoor"
                                        enctype="multipart/form-data" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Living Room Images') }} **</strong></label>
                                <form action="{{ route('admin.property.livingroomimagesstore') }}" id="my-dropzonelivingroom"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Bedroom Images') }} **</strong></label>
                                <form action="{{ route('admin.property.bedroomimagesstore') }}" id="my-dropzonebedroom"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Kitchen Images') }} **</strong></label>
                                <form action="{{ route('admin.property.kitchenimagesstore') }}" id="my-dropzonekitchen"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Washroom Images') }} **</strong></label>
                                <form action="{{ route('admin.property.washroomimagesstore') }}" id="my-dropzonewashroom"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Balcony Images') }} **</strong></label>
                                <form action="{{ route('admin.property.balconyimagesstore') }}" id="my-balconydropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Terrace Images') }} **</strong></label>
                                <form action="{{ route('admin.property.terraceimagesstore') }}" id="my-terracedropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Stairs Images') }} **</strong></label>
                                <form action="{{ route('admin.property.stairsimagesstore') }}" id="my-stairsdropzone"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="mb-2"><strong>{{ __('Other Images') }} **</strong></label>
                                <form action="{{ route('admin.property.otherimagesstore') }}" id="my-dropzoneother"
                                    enctype="multipart/formdata" class="dropzone create">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>

                            </div>
                            
                                <form id="carForm" action="{{ route('admin.property_management.store_property') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="{{ request()->type }}">
                                <div id="sliders"></div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ __('Thumbnail Image') . '*' }}</label>
                                            <br>
                                            <div class="thumb-preview ">
                                                <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..."
                                                    class="uploaded-img">

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
                                                <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..."
                                                    class="uploaded-img2">

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
                                                <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..."
                                                    class="uploaded-img3">

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
                                                placeholder="Enter video url">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Purpose') }}*</label>

                                            <select name="purpose" class="form-control">
                                                <option selected disabled value=""> {{ __('Select a Purpose') }}
                                                </option>
                                                <option value="rent">{{ __('Rent') }}</option>
                                                <option value="sale">{{ __('Sale') }}</option>
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
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->categoryContent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($propertySettings->property_country_status == 1)
                                        <div class="col-lg-3">
                                            <div class="form-group">


                                                <label>{{ __('Country') }} *</label>
                                                <select name="country_id"
                                                    class="form-control country js-example-basic-single3">
                                                    <option disabled selected>{{ __('Select Country') }}
                                                    </option>

                                                    @foreach ($propertyCountries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->countryContent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($propertySettings->property_state_status == 1)
                                        <div class="col-lg-3 state">
                                            <div class="form-group  ">

                                                <label>{{ __('State') }} *</label>
                                                <select onchange="getCities(event)" name="state_id"
                                                    class="form-control state_id states js-example-basic-single3">
                                                    <option selected disabled>{{ __('Select State') }}
                                                    </option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">
                                                            {{ $state->stateContent->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-3 city">
                                        <div class="form-group ">


                                            <label>{{ __('City') }} *</label>
                                            <select name="city_id" class="form-control city_id js-example-basic-single3">
                                                <option selected disabled>{{ __('Select City') }}
                                                </option>
                                                @if ($propertySettings->property_state_status == 0 && $propertySettings->property_country_status == 0)
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">
                                                            {{ $city->cityContent->name }}</option>
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
                                                    <option value="{{ $amenity->id }}">
                                                        {{ $amenity->amenityContent->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                   

                                    @if (request('type') == 'residential')
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Beds') }} *</label>
                                                <input type="text" class="form-control" name="beds"
                                                    placeholder="Enter number of bed">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Baths') }} *</label>
                                                <input type="text" class="form-control" name="bath"
                                                    placeholder="Enter number of bath">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Balcony') }} *</label>
                                                <input type="text" class="form-control" name="balcony"
                                                    placeholder="Enter number of balcony">
                                            </div>
                                        </div>
                                    @endif
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Total Floor') }} *</label>
                                                <input type="text" class="form-control" name="TotalFloor"
                                                    placeholder="Enter number of total floor">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{ __('Floor Number') }} *</label>
                                                <input type="text" class="form-control" name="FloorNo"
                                                    placeholder="Enter floor number">
                                            </div>
                                        </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Super Buildup Area') }} *</label>
                                            <input type="text" class="form-control" name="area"
                                                placeholder="Enter buildup area ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Carpet Area') }} *</label>
                                            <input type="text" class="form-control" name="carpetArea"
                                                placeholder="Enter carpet area ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Expected Price') }} * </label>
                                            <input type="text" class="form-control" name="expectedPrice"
                                                placeholder="Enter expected Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Per sqr Price') }} * </label>
                                            <input type="text" class="form-control" name="sqrPrice"
                                                placeholder="Enter sqr Price">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Price') . ' (' . $settings->base_currency_text . ')' }} </label>
                                            <input type="number" class="form-control" name="price"
                                                placeholder="Enter Current Price">

                                            <p class="text-warning">
                                                {{ __('If you leave it blank, price will be negotiable.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Furnished Status') }} *</label>
                                            <select name="furnishedStatus" id="" class="form-control">
                                            <option value="Non funrnished">{{ __('Non funrnished') }}</option>
                                                <option value="Furnished">{{ __('Furnished') }}</option>
                                                <option value="Semi funrnished">{{ __('Semi funrnished') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Availability Status') }} *</label>
                                            <select name="availability" id="" class="form-control">
                                            <option value="Ready to move">{{ __('Ready to move') }}</option>
                                                <option value="Under Construction">{{ __('Under Construction') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Status') }} *</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0">{{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Latitude') }} * </label>
                                            <input type="text" class="form-control" name="latitude"
                                                placeholder="Enter Latitude">
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>{{ __('Longitude') }} * </label>
                                            <input type="text" class="form-control" name="longitude"
                                                placeholder="Enter Longitude">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">{{ __('[Property owner') }}</label>
                                            <select name="vendor_id" class="form-control vendor js-example-basic-single1">
                                                <option value="0" selected>{{ __('Please Select') }}
                                                </option>
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->username }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-warning">
                                                {{ __('if you do not select any property owner, then this property will be listed under you') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{ __('Extra') }} * </label>
                                            <ul>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="smokingallowed" value="Smoking allowed"> <label for="smokingallowed">{{ __('Smoking allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="drinkingallowed" value="Drinking allowed"> <label for="drinkingallowed">{{ __('Drinking allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="petsallowed" value="Pets allowed"> <label for="petsallowed">{{ __('Pets allowed') }}</label>
                                            </li>
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="nonvegallowed" value="Non veg allowed"> <label for="nonvegallowed">{{ __('Non veg allowed') }}</label>
                                            </li>
                                            
                                            <li>
                                                <input type="checkbox"  name="extras[]" id="independedallowed" value="Independed allowed"> <label for="independedallowed">{{ __('Independed allowed') }}</label>
                                            </li>
                                            </ul>

                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group agent d-none">
                                            <label for="">{{ __('Agent') }}</label>
                                            <select name="agent_id"
                                                class="form-control agent_id js-example-basic-single1">
                                                <option value="" selected>{{ __('Please Select') }}
                                                </option> 
                                            </select>
                                            <p class="text-warning">
                                                {{ __('if you do not select any agent, then this property will be listed under Vendor') }}
                                            </p>
                                        </div>
                                    </div>



                                </div>

                                <div id="accordion" class="mt-3">
                                    @foreach ($languages as $language)
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
                                                                <label>{{ __('Title') }} *</label>
                                                                <input type="text" class="form-control"
                                                                    name="{{ $language->code }}_title"
                                                                    placeholder="Enter Title">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Address') . '*' }}</label>
                                                                <input type="text"
                                                                    name="{{ $language->code }}_address"
                                                                    class="form-control" placeholder="Enter Address">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Description') }} *</label>
                                                                <textarea id="{{ $language->code }}_description" class="form-control summernote"
                                                                    name="{{ $language->code }}_description" data-height="300"></textarea>
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
                                                                    data-role="tagsinput">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="form-group {{ $language->direction == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Meta Description') }} *</label>
                                                                <textarea class="form-control" name="{{ $language->code }}_meta_description" rows="5"
                                                                    placeholder="Enter Meta Description"></textarea>
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
                                                    <th><a href="" class="btn btn-sm btn-success addRow"><i
                                                                class="fas fa-plus-circle"></i></a></th>
                                                </tr>
                                            <tbody id="tbody">
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
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" id="variation_Assets">
                                        <h4 for="">{{ __('Additional Features (Optional)') }}</h4>
                                        <table class="table table-bordered table-striped addassets">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Category') }}</th>
                                                    <th>{{ __('SubCategory') }}</th>
                                                    <th>{{ __('AssetsName') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th><a href="" class="btn btn-sm btn-success addassetsRow"><i
                                                                class="fas fa-plus-circle"></i></a></th>
                                                </tr>
                                            <tbody id="tAssetsbody">
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
                            <button type="submit" id="PropertySubmit" class="btn btn-success">
                                {{ __('Save') }}
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
        var storeUrl = "{{ route('admin.property.imagesstore', ['vendor_id' => 0]) }}";

        var outdoorstoreUrl = "{{ route('admin.property.outdoorimagesstore', ['vendor_id' => 0]) }}";
        var livingroomstoreUrl = "{{ route('admin.property.livingroomimagesstore', ['vendor_id' => 0]) }}";
        var bedroomstoreUrl = "{{ route('admin.property.bedroomimagesstore', ['vendor_id' => 0]) }}";
        var kitchenstoreUrl = "{{ route('admin.property.kitchenimagesstore', ['vendor_id' => 0]) }}";
        var washroomstoreUrl = "{{ route('admin.property.washroomimagesstore', ['vendor_id' => 0]) }}";
        var balconystoreUrl = "{{ route('admin.property.balconyimagesstore', ['vendor_id' => 0]) }}";
        var terracestoreUrl = "{{ route('admin.property.terraceimagesstore', ['vendor_id' => 0]) }}";
        var stairsstoreUrl = "{{ route('admin.property.stairsimagesstore', ['vendor_id' => 0]) }}";
        var otherstoreUrl = "{{ route('admin.property.otherimagesstore', ['vendor_id' => 0]) }}";
        var removeUrl = "{{ route('admin.property.imagermv') }}";
        
        var outdoorremoveUrl = "{{ route('admin.property.outdoorimagermv') }}";

        var livingroomremoveUrl = "{{ route('admin.property.livingroomimagermv') }}";

        var bedroomremoveUrl = "{{ route('admin.property.bedroomimagermv') }}";

        var kitchenremoveUrl = "{{ route('admin.property.kitchenimagermv') }}";

        var washroomremoveUrl = "{{ route('admin.property.washroomimagermv') }}";

        var balconyremoveUrl = "{{ route('admin.property.balconyimagermv') }}";

        var terraceremoveUrl = "{{ route('admin.property.terraceimagermv') }}";

        var stairsremoveUrl = "{{ route('admin.property.stairsimagermv') }}";

        var otherremoveUrl = "{{ route('admin.property.otherimagermv') }}";
        var stateUrl = "{{ route('admin.property_specification.get_state_cities') }}";
        var subcategoryUrl = "{{ route('admin.subcategory_management.get_subcategory') }}";
        let cityUrl = "{{ route('admin.property_specification.get_cities') }}";
        let agentUrl = "{{ route('admin.property_management.get_agent') }}";
        let galleryImages = 999999;
          let galleryImagesoutdoor = 999999;


let galleryImageslivingroom = 999999;


let galleryImagesbedroom = 999999;


let galleryImageskitchen = 999999;


let galleryImageswashroom = 999999;


let galleryImagesbalcony = 999999;


let galleryImagesterrace = 999999;



let galleryImagesstairs = 999999;


let galleryImagesother =999999;

    </script>

    <script type="text/javascript" src="{{ asset('assets/js/admin-partial.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/js/admin-dropzone.js') }}"></script> -->
     <script type="text/javascript" src="{{ asset('assets/js/admin-dropzone-propertyG.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/property.js') }}"></script>
@endsection
