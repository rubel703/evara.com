@extends('admin.master')
@section('title', 'manage product')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">view product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <section class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-header mb-3">
                        <h3 class="text-center fw-bold mb-3">Total Products: {{ $products->count() }}</h3>
                    </div>
                    @if (Session::get('notification'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('notification') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-body table-responsive">
                        <div class="col-12">
                        </div>
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">ID</th>
                                    <th scope="col"class="text-center">No.</th>
                                    <th scope="col" >Category </th>
                                    {{-- <th scope="col" >Sub Category </th>
                                    <th scope="col" >Brand</th>
                                    <th scope="col" >Unit</th> --}}
                                    <th scope="col" >Product Name</th>
                                    <th scope="col" >Product Code</th>
                                    {{-- <th scope="col" >Short Description</th>
                                    <th scope="col" >Long Description</th> --}}
                                    <th scope="col" >Product Image</th>
                                    <th scope="col" >Regular Price</th>
                                    {{-- <th scope="col" >Selling Price</th>
                                    <th scope="col" >Stock Amount</th> --}}
                                    <th scope="col" >Status</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $product->id }}</td>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $product->category->name }}</td>
                                        {{-- <td >{{ $product->subCategory->name }}</td> --}}
                                        {{-- <td >{{ $product->brand->name }}</td>
                                        <td >{{ $product->unit->name }}</td> --}}
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->code }}</td>
                                        {{-- <td >{{ $product->short_description }}</td>
                                        <td >{{ $product->long_description }}</td> --}}
                                        <td class="text-center">
                                            <img src="{{ asset($product->image) }}" alt="" height="50"
                                                width="50" />
                                        </td>
                                        <td class="text-center">{{ $product->regular_price }}(৳)</td>
                                        {{-- <td >{{ $product->selling_price }}</td> --}}
                                        {{-- <td >{{ $product->stock_amount }}</td> --}}
                                        <td class="text-center">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>

                                        <td align="center">
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="btn btn-info mb-1">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary mb-1">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{ route('product.destroy', $product->id) }}"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
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
