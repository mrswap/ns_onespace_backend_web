@extends('backend.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('backend.partials.rtl_style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Enquiry Properties') }}</h4>
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
                <a href="#">{{ __('Property Enquiry Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Enquiry Properties') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card-title d-inline-block">{{ __('Enquiry Properties') }}</div>
                        </div>
                        <a href="{{ route('export.propertyenquiry') }}" class="btn btn-success">
                        Export to Excel
                    </a>

                        <div class="col-lg-3">
                            <form action="{{ route('admin.property_management.properties') }}" method="get"
                                id="carSearchForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select name="vendor_id" id="" class="select2"
                                            onchange="document.getElementById('carSearchForm').submit()">
                                            <option value="" selected>{{ __('All') }}</option>
                                            <option value="admin" @selected(request()->input('vendor_id') == 'admin')>
                                                {{ Auth::guard('admin')->user()->username }} <span
                                                    class="badge bg-success">{{ '(' . __('Admin') . ')' }}</span> </option>
                                            @foreach ($vendors as $vendor)
                                                <option @selected($vendor->id == request()->input('vendor_id')) value="{{ $vendor->id }}">
                                                    {{ $vendor->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="title" value="{{ request()->input('title') }}"
                                            class="form-control" placeholder="Title">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="col-lg-3">
                            @includeIf('backend.partials.languages')
                        </div> -->

                        
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($properties) == 0)
                                <h3 class="text-center">{{ __('NO PROPERTY FOUND!') }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">{{ __('Title') }}</th>
                                                <th scope="col">{{ __('Post by') }}</th>
                                                <th scope="col">{{ __('Type') }}</th>
                                                <th scope="col">{{ __('City') }}</th>
                                                <th scope="col">{{ __('Approval Status') }}</th>
                                               
                                                <th scope="col">{{ __('Status') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties as $property)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="{{ $property->id }}">
                                                    </td>
                                                    <td class="table-title">
                                                        @php
                                                            $property_content = $property->getContent($language->id);
                                                            if (is_null($property_content)) {
                                                                $property_content = $property
                                                                    ->propertyContents()
                                                                    ->first();
                                                            }
                                                        @endphp
                                                        @if (!empty($property_content))
                                                            <a href="{{ route('frontend.property.details', ['slug' => $property_content->slug]) }}"
                                                                target="_blank">
                                                                {{ strlen(@$property_content->title) > 100 ? mb_substr(@$property_content->title, 0, 100, 'utf-8') . '...' : @$property_content->title }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($property->vendor_id != 0)
                                                            <a
                                                                href="{{ route('admin.vendor_management.vendor_details', ['id' => @$property->vendor->id, 'language' => $defaultLang->code]) }}">{{ @$property->vendor->username }}</a>
                                                        @else
                                                            <span class="badge badge-success">{{ __('Admin') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $property->type }}
                                                    </td>
                                                    <td>
                                                        {{ $property->cityContent?->name }}
                                                    </td>
                                                    <td>
                                                        @if ($property->approve_status == 2)
                                                        {{ __('Rejected') }}
                                                        @elseif ($property->approve_status == 1)
                                                        {{ __('Approve') }}
                                                        @else
                                                        {{ __('Pending') }}
                                                        @endif
                                                   
                                                    </td>
                                                    
                                                    <td>
                                                    @if ($property->status == 1)
                                                        {{ __('Active') }}
                                                       
                                                        @else
                                                        {{ __('Inactive') }}
                                                        @endif
                                                       
                                                    </td>

                                                    <td>
                                                    <a class=""
                                                                    href="{{ route('admin.PropertyEnquiry_management.getEnquiry', $property->id) }}">
                                                                    <span class="btn btn-secondary ">
                                                                        <i class="fas fa-edit"></i> {{ __('Property Enquiry') }}
                                                                    </span>
                                                                </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {{ $properties->appends([
                            'vendor_id' => request()->input('vendor_id'),
                            'title' => request()->input('title'),
                        ])->links() }}
                </div>

            </div>
        </div>
    </div>

  
@endsection
