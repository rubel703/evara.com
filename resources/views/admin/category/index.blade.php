@extends('admin.master')
@section('title', 'manage-category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">view category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <section class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-header mb-3">
                        <h3 class="text-center fw-bold mb-3">Total Categories: {{ $category->count() }}</h3>
                    </div>
                    @if (Session::get('notification'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('notification') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-body">
                        <div class="col-12">
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($category as $categories)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $categories->id }}</th>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $categories->name }}</td>
                                        <td class="text-center">{{ $categories->description }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset($categories->image) }}" alt="" height="50"
                                                width="50" />
                                        </td>
                                        <td class="text-center">{{ $categories->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td align="center">
                                            <a href="{{ route('edit', $categories->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit  "></i>
                                            </a>
                                            <a href="{{ route('destroy', $categories->id) }}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
