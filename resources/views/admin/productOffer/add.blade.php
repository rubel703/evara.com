@extends('admin.master')
@section('title', 'product offer')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">add offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Product Offer Form</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('productOffer.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Product Name</label>
                    <select class="form-control" name="product_id">
                        <option value="" disabled selected >--select product--</option>
                        @foreach ($products as $product )
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">First Title</label>
                    <input type="text" class="form-control" name="title_one" id="title_one" aria-describedby=""/>
                    @error('title_one')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Second Title</label>
                    <input type="text" class="form-control" name="title_two" id="title_two" aria-describedby=""/>
                    @error('title_two')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Third Title</label>
                    <input type="text" class="form-control" name="title_three" id="title_three" aria-describedby=""/>
                    @error('title_three')
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
                <div class="mb-4">
                    <label class="col-md-3 form-label mt-3">Publications status</label>
                    <div class="col-md-9 pt-3">
                        <label><input type="radio" value="1" checked name="status"><span>Published</span></label>
                        <label><input type="radio" value="0" name="status"><span>Unpublished</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product Offer</button>
            </form>
        </div>
    </div>
@endsection
