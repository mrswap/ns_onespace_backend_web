@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Posts ') }}</h4>
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
                <a href="#">{{ __('Blog Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Posts ') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">{{ __('Posts ') }}</div>
                        </div>

                        <div class="col-lg-3">
                            @includeIf('backend.partials.languages')
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="{{ route('admin.blog_management.create_blog') }}"
                                class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i>
                                {{ __('Add Post') }}</a>

                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                data-href="{{ route('admin.blog_management.bulk_delete_blog') }}">
                                <i class="flaticon-interface-5"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($blogs) == 0)
                                <h3 class="text-center mt-2">{{ __('NO BLOG FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">{{ __('Title') }}</th>
                                                <th scope="col">{{ __('Category') }}</th>
                                                <th scope="col">{{ __('Publish Date') }}</th>
                                                <th scope="col">{{ __('Status') }}</th>
                                                <th scope="col">{{ __('Serial Number') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="{{ $blog->id }}">
                                                    </td>
                                                    <td class="table-title">
                                                        {{ strlen($blog->title) > 100 ? mb_substr($blog->title, 0, 100, 'UTF-8') . '...' : $blog->title }}
                                                    </td>
                                                    <td>{{ $blog->categoryName }}</td>
                                                    <td>
                                                        @php
                                                            // first, convert the string into date object
                                                            $date = Carbon\Carbon::parse($blog->created_at);
                                                        @endphp

                                                        {{ date_format($date, 'M d, Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($blog->isActive)
                                                            <span class="badge badge-success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $blog->serial_number }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle btn-sm"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ __('Select') }}
                                                            </button>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.blog_management.edit_blog', ['id' => $blog->id]) }}">
                                                                    <span class="btn-label">
                                                                        <i class="fas fa-edit"></i>
                                                                        {{ __('Edit') }}
                                                                    </span>
                                                                </a>

                                                                <form class="deleteForm d-block p-0 dropdown-item"
                                                                    action="{{ route('admin.blog_management.delete_blog', ['id' => $blog->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button type="submit" class=" deleteBtn">
                                                                        <span class="btn-label">
                                                                            <i class="fas fa-trash"></i>
                                                                            {{ __('Delete') }}
                                                                        </span>
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
@endsection
