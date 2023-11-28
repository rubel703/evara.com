@extends('admin.master')
@section('title', 'add-product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">add product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Add Product Form</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Category Name</label>
                    <select class="form-control" name="category_id" onchange="setSubCategory(this.value)">
                        <option value="" disabled selected>--select category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Sub Category Name</label>
                    <select class="form-control" name="sub_category_id" id="subCategoryId" >
                        <option value="" disabled selected>--select sub category--</option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Brand Name</label>
                    <select class="form-control" name="brand_id">
                        <option value="" disabled selected>--select brand--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Unit Name</label>
                    <select class="form-control" name="unit_id">
                        <option value="" disabled selected>--select unit--</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Color Name</label>
                    <select multiple class="form-control form-select select2-show-search" name="colors[]" data-placeholder="select product color" required>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('colors')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Size Name</label>
                    <select multiple class="form-control form-select select2-show-search" name="sizes[]" data-placeholder="select product size" required>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('sizes')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="title"
                        aria-describedby=" " />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Code</label>
                    <input  type="text" value="{{ old('code') }}" class="form-control" name="code" id="title"
                        aria-describedby="" />
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Short Description</label>
                    <textarea class="form-control"  name="short_description" id="short_description" cols="30" rows="2"></textarea>
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Long Description </label>
                    <textarea class="form-control"  name="long_description" id="summernote" cols="30" rows="5"></textarea>
                    @error('long_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Image</label>
                    <input type="file" class="dropify" name="image" data-height="200" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Others Image</label>
                    <input type="file" class="form-control" name="other_image[]" multiple />
                    @error('other_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="title" class="form-label">Others Image</label>
                    <input id="demo" type="file" name="other_image" accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Product Price</label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="number" class="form-control" name="regular_price" placeholder="regular price"
                                aria-describedby=" " />
                            @error('regular_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-control" name="selling_price" placeholder="selling price" type="number"
                                 aria-describedby=" " />
                            @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Stock Amount</label>
                    <input type="number" class="form-control" name="stock_amount" id="title"
                        aria-describedby=" " />
                    @error('stock_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 d-flex">
                    <label class="col-md-3 form-label mt-3">Publications status</label>
                    <div class="col-md-9 pt-3">
                        <label><input type="radio" value="1" checked name="status" /><span>Published</span></label>
                        <label><input type="radio" value="0" name="status" /><span>Unpublished</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3 ">Add Product</button>
            </form>
        </div>
    </div>
@endsection
