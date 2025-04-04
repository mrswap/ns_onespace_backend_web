@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Contact Us Detail') }}</h4>
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
                <a href="#">{{ __('Contact Us Detail') }}</a>
            </li>


        </ul>
    </div>
    <!-- <div class="col-lg-3">
                            @includeIf('backend.partials.languages')
                        </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                       <div class="col-lg-6">
                            <div class="card-title d-inline-block">{{ __('All Contacts') }}</div>
                           
                        </div>

                       
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($Inspections) == 0)
                                <h3 class="text-center mt-2">{{ __('NO contacts FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                               
                                                <th scope="col">{{ __('Name') }}</th>                                     
                                                <th scope="col">{{ __('Email') }}</th>
                                                <th scope="col">{{ __('Phone') }}</th>
                                                <th scope="col">{{ __('Subject') }}</th>
                                                <th scope="col">{{ __('Feedback') }}</th>
                                                <th scope="col">{{ __('Enquiry Date') }}</th>  
                                                <th scope="col">{{ __('Contact Status') }}</th>
                                                <th scope="col">{{ __('Seen Status') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Inspections as $Inspection)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $Inspection->name }}</td>
                                                   
                                                <td>{{ $Inspection->email }}</td>
                                                <td>{{ $Inspection->phone }}</td>
                                                <td>{{ $Inspection->subject }}</td>
                                                
                                                <td>{{ $Inspection->feedback }}</td>
                                                <td>{{ $Inspection->created_at }}</td> 
                                                    <td>
                                                        <form id="approvestatusForm-{{ $Inspection->id }}" class="d-inline-block"
                                                            action="{{ route('admin.ContactUs_management.approve_status', ['id' => $Inspection->id]) }}"
                                                            method="post">
                                                       
                                                            @csrf
                                                            
                                                            <select
                                                                onchange="$('.request-loader').addClass('show'); this.form.submit();"
                                                                class="form-control  @if ($Inspection->contact_status == 1) bg-success @elseif($Inspection->contact_status == 0)
                                                                bg-warning @else bg-danger @endif form-control-sm"
                                                                name="contact_status">
                                                                
                                                                <option value="1"
                                                                    {{ $Inspection->contact_status == 1 ? 'selected' : '' }}>
                                                                    {{ __('Yes') }}
                                                                </option>
                                                                <option value="0"
                                                                    {{ $Inspection->contact_status == 0 ? 'selected' : '' }}>
                                                                    {{ __('No') }}
                                                                </option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form id="statusForm-{{ $Inspection->id }}" class="d-inline-block"
                                                            action="{{ route('admin.ContactUs_management.change_status', ['id' => $Inspection->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <select
                                                                class="form-control form-control-sm {{ $Inspection->seen_status == 1 ? 'bg-success' : 'bg-danger' }}"
                                                                name="status"
                                                                onchange="document.getElementById('statusForm-{{ $Inspection->id }}').submit()">
                                                                <option value="1"
                                                                    {{ $Inspection->status == 1 ? 'selected' : '' }}>
                                                                    {{ __('Yes') }}
                                                                </option>
                                                                <option value="0"
                                                                    {{ $Inspection->status == 0 ? 'selected' : '' }}>
                                                                    {{ __('No') }}
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
                                                                    data-id="{{ $Inspection->id }}"
                                                                   data-name="{{ $Inspection->name }}"
                                                                   data-remark="{{ $Inspection->remark }}"
                                                                    data-feedback="{{ $Inspection->feedback }}"
                                                                    
                                                                    >

                                                                    {{ __('Remark/Feedback') }}

                                                                </a>
                                                                
                                                                
                                                                <form class="deleteForm d-block"
                                                                    action="{{ route('admin.ContactUs_management.destroy', ['id' => $Inspection->id]) }}"
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

   
    {{-- edit modal --}}
    @include('backend.ContactUs.edit')
@endsection
