@extends('admin.master')
@section('title', 'add-brand')
@section('body')
<!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Brand Modules</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                            <li class="breadcrumb-item active" aria-current="page">add brand</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
<div class="container px-4 ">
    <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;" >Add Brand</h3>
    <hr class="text-primary">
    <div class="col-8 offset-2 ">
        @if (Session::get('notification'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('notification') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('storeBrand') }}" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label for="title" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="name" id="title" aria-describedby=""/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="title" aria-describedby=""/>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Image</label>
                <input type="file" id="imgInp" class="form-control" name="image" accept="images/*" aria-describedby=""/>
                <img src="" id="categoryImage" alt=""/>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>
    </div>
</div>
@endsection