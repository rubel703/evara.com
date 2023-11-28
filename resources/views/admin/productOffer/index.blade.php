@extends('admin.master')
@section('title', 'manage offer')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Modules</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">view offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <section class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-header mb-2">
                        <h3 class="text-center fw-bold mb-2">Total Product Offer: {{ $productOffers->count() }}</h3>
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
                                    <th scope="col" class="text-center">Product Name</th>
                                    <th scope="col" class="text-center">First Title</th>
                                    <th scope="col" class="text-center">Second Title</th>
                                    <th scope="col" class="text-center">Third Title</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productOffers as $productOffer)
                                    <tr>
                                        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $productOffer->product->name }}</td>
                                        <td class="text-center">{{ $productOffer->title_one }}</td>
                                        <td class="text-center">{{ $productOffer->title_two }}</td>
                                        <td class="text-center">{{ $productOffer->title_two }}</td>
                                        <td class="text-center">{{ $productOffer->description }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset($productOffer->image) }}" alt="" height="50"
                                                width="50" />
                                        </td>
                                        <td class="text-center">{{ $productOffer->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td align="center">
                                            <a href="{{ route('productOffer.edit', $productOffer->id) }}" class="btn btn-primary mb-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('productOffer.destroy', $productOffer->id) }}"method="POST">
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
