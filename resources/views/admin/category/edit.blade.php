@extends('admin.master')
@section('title', 'edit-category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">edit category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Update Category</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="title"
                        aria-describedby=""/>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $category->description }}"
                        id="title" aria-describedby=""/>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-label"><img src="{{ asset('/') }}{{ $category->image }}" alt=""height="90px"
                            width="60px"></div>
                    <label for="title" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" value="{{ $category->image }}"
                        accept="images/*" aria-describedby=""/>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection
