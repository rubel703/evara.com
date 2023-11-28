@extends('admin.master')
@section('title', 'edit sub-category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">update sub category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-4 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Update Sub-Category</h3>
        <hr class="text-primary">
        <div class="col-8 offset-2 ">
            @if (Session::get('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('notification') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{route('sub-category.update',$sub_category->id)}}" enctype="multipart/form-data">
                @method('PUT')  
                {{-- @method('PATCH') --}}
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Category Name</label>
                    <select class="form-control" name="category_id">
                        <option value="" disabled selected >--select category--</option>
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}" {{$sub_category->category_id==$category->id?'selected':' '}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    {{-- <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id'):' '}}</span>  --}}
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Sub Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{$sub_category->name}}" id="title" aria-describedby=""/>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$sub_category->description}}" id="title" aria-describedby=""/>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Image</label>
                    <input type="file" id="imgInp" class="form-control" name="image" accept="images/*" aria-describedby=""/>
                    <img src="{{asset($sub_category->image)}}" id="categoryImage" class="pt-2" alt="not found" width="120px" height="100px" />
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 d-flex ">
                    <label class="col-md-3 form-label mt-3">Publications status</label>
                    <div class="col-md-9 pt-3">
                        <label><input type="radio" value="1" {{$sub_category->status==1 ? 'checked' : ' '}} name="status"><span>Published</span></label>
                        <label><input type="radio" value="0" {{$sub_category->status==1 ? 'checked' : ' '}} name="status"><span>Unpublished</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Sub Category</button>
            </form>
        </div>
    </div>
@endsection
