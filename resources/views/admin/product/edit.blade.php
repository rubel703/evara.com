@extends('admin.master')
@section('title', 'edit-product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">edit product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Update Product Form</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('product.update',$products->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Category Name</label>
                    <select class="form-control" name="category_id" onchange="setSubCategory(this.value)">
                        <option value=" "  disabled selected>--select category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"  @selected($category->id==$products->category_id)>{{ $category->name }}</option>
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
                            <option value="{{ $sub_category->id }}" @selected($sub_category->id==$products->sub_category_id)>{{ $sub_category->name }}</option>
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
                            <option value="{{ $brand->id }}"  @selected($brand->id==$products->brand_id)>{{ $brand->name }}</option>
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
                            <option value="{{ $unit->id }}"  @selected($unit->id==$products->unit_id)>{{ $unit->name }}</option>
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
                            <option value="{{ $color->id }}" @foreach ($products->colors as $singleColor)@selected($color->id==$singleColor->color_id)
                            @endforeach>{{ $color->name }}</option>
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
                            <option value="{{ $size->id }}"@foreach ($products->sizes as $singleSize)@selected($size->id==$singleSize->size_id)
                                @endforeach>>{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('sizes')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$products->name}}"id="title"
                        aria-describedby=" " />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Code</label>
                    <input  type="text" value="{{$products->code}}"class="form-control" name="code" id="title"
                        aria-describedby="" />
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Short Description</label>
                    <textarea class="form-control"  name="short_description" id="short_description" cols="20" rows="2">{{$products->short_description}}</textarea>
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Long Description </label>
                    <textarea class="form-control"  name="long_description" id="summernote" cols="25" rows="5">{{$products->long_description}}</textarea>
                    @error('long_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-5">
                    <label for="title" class="form-label">Product Image</label>
                    <div class="form-label"><img src="{{ asset('/') }}{{ $products->image }}" alt=""height="90px"
                        width="60px"></div>
                    <input type="file" class="dropify" name="image" value="{{$products->image}}" data-height="200" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-5">
                    <label for="title" class="form-label">Others Image</label>
                    @foreach ($products->productImages as $productImage)
                    <img src="{{ asset('/') }}{{ $productImage->image }}" alt=""height="90px"
                    width="60px">
                    @endforeach
                    <input type="file" class="form-control" name="other_image[]"  multiple />
                    @error('other_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Product Price</label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="number" class="form-control" value="{{$products->regular_price}}" name="regular_price" placeholder="regular price"
                                aria-describedby=" " />
                            @error('regular_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-control" name="selling_price" value="{{$products->selling_price}}" placeholder="selling price" type="number"
                                 aria-describedby=" " />
                            @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Stock Amount</label>
                    <input type="number" class="form-control" value="{{$products->stock_amount}}" name="stock_amount" id="title"
                        aria-describedby=" " />
                    @error('stock_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 d-flex ">
                    <label class="col-md-3 form-label mt-3">Publications status</label>
                    <div class="col-md-9 pt-3">
                        <label><input type="radio" value="1" {{$products->status==1 ? 'checked' : ' '}} name="status"><span>Published</span></label>
                        <label><input type="radio" value="0" {{$products->status==0 ? 'checked' : ' '}} name="status"><span>Unpublished</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3 ">Update Product</button>
            </form>
        </div>
    </div>
@endsection
