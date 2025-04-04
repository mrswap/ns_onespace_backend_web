@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Careerjobs') }}</h4>
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
                <a href="#">{{ __('Careerjobs') }}</a>
            </li>


        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-title d-inline-block">{{ __('All Careerjobs') }}</div>
                            
                        </div>

                        <div class="col-lg-6 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                                class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                                {{ __('Add Careerjobs') }}</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($careerjobs) == 0)
                                <h3 class="text-center mt-2">{{ __('NO Careerjobs FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                
                                                <th scope="col">{{ __('Title') }}</th>
                                               
                                                <th scope="col">{{ __('Status') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($careerjobs as $careerjob)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    
                                                    <td> 
                                                        {{ strlen($careerjob->careersjob_Content?->title) > 50 ? mb_substr($careerjob->careersjob_Content?->title, 0, 50, 'UTF-8') . '...' : $careerjob->careersjob_Content?->title }}

                                                    </td>
                                                    
                                                    <td>
                                                        <form id="statusForm-{{ $careerjob->id }}" class="d-inline-block"
                                                            action="{{ route('admin.job_management.change_status', ['id' => $careerjob->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <select
                                                                class="form-control form-control-sm {{ $careerjob->status == 1 ? 'bg-success' : 'bg-danger' }}"
                                                                name="status"
                                                                onchange="document.getElementById('statusForm-{{ $careerjob->id }}').submit()">
                                                                <option value="1"
                                                                    {{ $careerjob->status == 1 ? 'selected' : '' }}>
                                                                    {{ __('Active') }}
                                                                </option>
                                                                <option value="0"
                                                                    {{ $careerjob->status == 0 ? 'selected' : '' }}>
                                                                    {{ __('Deactive') }}
                                                                </option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>

                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle btn-sm"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ __('Select') }}
                                                            </button>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                                <a class="dropdown-item editBtn" href="#"
                                                                    data-toggle="modal" data-target="#editModal"
                                                                    data-id="{{ $careerjob->id }}"
                                                                    @foreach ($languages as $lang)
                                                                    @php
                                                                        $cate = \App\Models\CareersJob_content::where([["jobs_id",$careerjob->id],['language_id',$lang->id]])->first();
                                                                    @endphp 
                                                                        data-{{ $lang->code }}_title="{{ $cate?->title }}"
                                                                        data-{{ $lang->code }}_description="{{ $cate?->description }}"
                                                                    @endforeach
                                                                    <span class="btn-label">
                                                                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                                                                    </span>
                                                                    

                                                                </a>
                                                                <form class="deleteForm d-block"
                                                                    action="{{ route('admin.job_management.destroy', ['id' => $careerjob->id]) }}"
                                                                    method="post">
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
    @include('backend.careerjobs.create')

    {{-- edit modal --}}
    @include('backend.careerjobs.edit')
@endsection
