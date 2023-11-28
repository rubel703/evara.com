@extends('admin.master')
@section('title', 'show product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">show product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container px-2 ">
        <h3 class="text-center fw-bold text-dark" style="margin-top: 3%;margin-bottom:2%;">Product Information</h3>
        <hr class="text-white">
        <div class="col-12 ">
            <table class="table table-bordered table-responsive">
                <tr>
                    <th class="fw-bold" style="width: 20%">Product ID :</th>
                    <td style="width: 100%" class="ps-5">{{ $products->id }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Name :</th>
                    <td class="ps-5">{{ $products->name }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Code :</th>
                    <td class="ps-5">{{ $products->code }}</td>
                </tr>

                <tr>
                    <th class="fw-bold pt-5">Product Image :</th>
                    <td class="ps-5"> <img src="{{ asset($products->image) }}" alt="" height="70"
                            width="60" /></td>
                </tr>

                <tr>
                    <th class="fw-bold">Other Image :</th>
                    <td class="ps-5">
                        @foreach ($products->productImages as $productImage)
                        <img src="{{ asset($productImage->image) }}" alt="" height="70"
                        width="60" />
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Category :</th>
                    <td class="ps-5">{{ $products->category->name }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Sub-Category :</th>
                    <td class="ps-5">{{ $products->subCategory->name }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Brand Name :</th>
                    <td class="ps-5">{{ $products->brand->name }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Unit Name :</th>
                    <td class="ps-5">{{ $products->unit->name }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Color :</th>
                    <td class="ps-5">
                        @foreach ($products->colors as $color)
                            <span>{{ $color->color->name . ',' }}</span>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="fw-bold">Product Size :</th>
                    <td class="ps-5">
                        @foreach ($products->sizes as $size)
                            <span>{{ $size->size->name . ',' }}</span>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="fw-bold">Short Description :</th>
                    <td class="ps-5">{{ $products->short_description }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Long Description :</th>
                    <td class="ps-5">{!! $products->long_description !!}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Regular price :</th>
                    <td class="ps-5">{{ $products->regular_price }}(৳)</td>
                </tr>

                <tr>
                    <th class="fw-bold">Selling Price :</th>
                    <td class="ps-5">{{ $products->selling_price }}(৳)</td>
                </tr>

                <tr>
                    <th class="fw-bold">Stock Amount :</th>
                    <td class="ps-5">{{ $products->stock_amount }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Total View :</th>
                    <td class="ps-5">{{ $products->hit_count }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Total Sales :</th>
                    <td class="ps-5">{{ $products->sales_count }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Featured Status :</th>
                    <td class="ps-5">{{ $products->featured_status == 1 ? "Featured" : "Not Featured" }}</td>
                </tr>

                <tr>
                    <th class="fw-bold">Status :</th>
                    <td class="ps-5">{{ $products->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>

                <tr>
                    <th class="text-warning">Back to Manage Table :</th>
                    <td>
                        <a href="{{ route('product.index') }}" class="btn btn-warning mb-1">
                            <i class="fa fa-book"></i>
                        </a>
                    </td>
                </tr>

            </table>

        </div>
    </div>
@endsection
