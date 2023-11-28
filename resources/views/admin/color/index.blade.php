@extends('admin.master')
@section('title', 'manage color')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">view color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <section class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-header mb-2">
                        <h3 class="text-center fw-bold mb-2">Total Color: {{ $colors->count() }}</h3>
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
                                    <th scope="col" class="text-center">Color Name</th>
                                    <th scope="col" class="text-center">Code</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $colors as $color)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{$color->name }}</td>
                                        <td class="text-center">{{$color->code }}</td>
                                        <td class="text-center">{{$color->description }}</td>
                                        <td class="text-center">{{ $color->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td align="center">
                                            <a href="{{ route('color.edit', $color->id) }}" class="btn btn-primary mb-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('color.destroy', $color->id) }}"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure delete this');"><i class="fa fa-trash"></i></button>
                                            </form>
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
