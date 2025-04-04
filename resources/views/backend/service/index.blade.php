@extends('backend.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Services') }}</h4>
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
            <a href="#">{{ __('Services') }}</a>
        </li>


    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-title d-inline-block">{{ __('All  Services') }}</div>

                    </div>

                    <div class="col-lg-6 mt-2 mt-lg-0">
                        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                            {{ __('Add  Service') }}</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($Services) == 0)
                        <h3 class="text-center mt-2">{{ __('NO  Service FOUND') . '!' }}</h3>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped mt-3" id="basic-datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Icon') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Services as $Service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ strlen($Service->Service_content?->title) > 50 ? mb_substr($Service->Service_content?->title, 0, 50, 'UTF-8') . '...' : $Service->Service_content?->title }}

                                        </td>
                                        <td>
                                            <img src="{{ asset('assets/img/' . $Service->Service_content?->iconimage) }}" alt="ad image" width="45">
                                        </td>
                                        <td>
                                            {{ strlen($Service->Service_content?->type) > 50 ? mb_substr($Service->Service_content?->type, 0, 50, 'UTF-8') . '...' : $Service->Service_content?->type }}

                                        </td>
                                        <td>
                                            <form id="statusForm-{{ $Service->id }}" class="d-inline-block" action="{{ route('admin.service_management.change_status', ['id' => $Service->id]) }}" method="post">
                                                @csrf
                                                <select class="form-control form-control-sm {{ $Service->status == 1 ? 'bg-success' : 'bg-danger' }}" name="status" onchange="document.getElementById('statusForm-{{ $Service->id }}').submit()">
                                                    <option value="1" {{ $Service->status == 1 ? 'selected' : '' }}>
                                                        {{ __('Active') }}
                                                    </option>
                                                    <option value="0" {{ $Service->status == 0 ? 'selected' : '' }}>
                                                        {{ __('Deactive') }}
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('Select') }}
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a class="dropdown-item editBtn" href="#" data-toggle="modal" data-target="#editModal" data-id="{{ $Service->id }}" data-image="{{ $Service->Service_content?->iconimage ? asset('assets/img/' . $Service->Service_content?->iconimage) : asset('assets/img/noimage.jpg') }}" @foreach ($languages as $lang) @php $cate=\App\Models\Service_content::where([["service_id",$Service->id],['language_id',$lang->id]])->first();
                                                        @endphp
                                                        data-{{ $lang->code }}_title="{{ $cate->title ? $cate->title : "" }}"
                                                        data-{{ $lang->code }}_description="{{ $cate->description ? $cate->description : "" }}"
                                                        data-{{ $lang->code }}_type="{{ $cate->type ? $cate->type : "" }}"
                                                        @endforeach
                                                        <span class="btn-label">
                                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                                        </span>


                                                    </a>
                                                    <form class="deleteForm d-block" action="{{ route('admin.service_management.destroy', ['id' => $Service->id]) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="deleteBtn">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>



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

            <div class="card-footer"></div>
        </div>
    </div>
</div>

{{-- create modal --}}
@include('backend.service.create')

{{-- edit modal --}}
@include('backend.service.edit')
@endsection
