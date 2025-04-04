@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Inspection History') }}</h4>
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
                <a href="{{  route('admin.Inspection_management.index') }}">{{ __('Inspection') }}</a>
            </li>


        </ul>
    </div>
    <div class="col-lg-3">
                           
                        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                        @php
                        
                        @endphp
                            <div class="card-title d-inline-block">{{ __('All Inspection history of ') }}{{ $Inspections->propertyContents[0]["title"]}}</div>
                            
                        </div>

                        <!-- <div class="col-lg-6 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                                class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                                {{ __('Add Inspection') }}</a>
                        </div> -->
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($Inspectionshistory) == 0)
                                <h3 class="text-center mt-2">{{ __('NO History FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                
                                               
                                                <th scope="col">{{ __('Inspection Title') }}</th>
                                                <th scope="col">{{ __('Remark') }}</th>
                                                
                                                <th scope="col">{{ __('Verification Date') }}</th>
                                                <th scope="col">{{ __('Next Verification Date') }}</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Inspectionshistory as $Inspection)

                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                    
                                                    
                                                    <td>{{ $Inspection->name }}</td>
                                                    <td>{{$Inspection->remark}}</td>
                                                    
                                                    <td>{{ $Inspection->verificationDate }}</td>
                                                    
                                                    <td>{{ $Inspection->nextverificationDate }}</td>

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
   
@endsection
