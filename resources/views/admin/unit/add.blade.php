@extends('admin.master')
@section('title', 'add-unit')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">add unit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Add Unit</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route("unit.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Unit Name</label>
                    <input type="text" class="form-control" name="name" id="title" aria-describedby=""/>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Code</label>
                    <input type="text" class="form-control" name="code" id="title" aria-describedby=""/>
                    @error('details')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" id="title" aria-describedby=""/>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 d-flex">
                    <label class="col-md-3 form-label mt-3">Publications status</label>
                    <div class="col-md-9 pt-3">
                        <label><input type="radio" value="1" checked name="status"/><span>Published</span></label>
                        <label><input type="radio" value="0" name="status"/><span>Unpublished</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3 ">Add Unit</button>
            </form>
        </div>
    </div>
@endsection
