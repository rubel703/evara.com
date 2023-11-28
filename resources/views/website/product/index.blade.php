@extends('website.master')
@section('title', 'product details page')
@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> {{ $product->category->name }}
                <span></span> {{ $product->name }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12" style="height: 30%">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">

                                            @foreach ($product->productImages as $productImage)
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset($productImage->image) }}" width="100%" height="600px"/>
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach ($product->productImages as $productImage)
                                                <div><img src="{{ asset($productImage->image) }}" /></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="#">{{ $product->brand->name }}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">TK.{{ $product->selling_price }}</span></ins>
                                                <ins><span
                                                        class="old-price font-md ml-15">TK.{{ $product->regular_price }}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->short_description }}!</p>
                                        </div>

                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color:</strong>
                                            <div class="mt-2">
                                                @foreach ($product->colors as $key=>$color)
                                                    <label><input type="radio"name="color" {{$key==0 ? 'checked' : ' '}} style="width: 20px;height:10px;" value="{{ $color->color->name }}">{{ $color->color->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size:</strong>
                                            <div class="mt-2">
                                                @foreach ($product->sizes as $key=>$size)
                                                    <label><input type="radio"name="size"  {{$key==0 ? 'checked' : ' '}} style="width: 20px;height:10px;" value="{{ $size->size->code }}">{{ $size->size->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="row" style="width: 70px;">
                                              <input type="number" class="form-control" name="qty" value="1" min="1"/>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart ms-3">Add to
                                                    cart</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="#"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>

                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                            <li class="mb-5">Tags: <a href="#"
                                                    rel="tag">{{ $product->subCategory->name }}</a>, <a href="#"
                                                    rel="tag">{{ $product->brand->name }}</a>, <a href="#"
                                                    rel="tag">{{ $product->name }}</a> </li>
                                            <li>Availability:<span
                                                    class="in-stock text-success ml-5">{{ $product->stock_amount }}
                                                    items</span>
                                            </li>
                                        </ul>
                                    </div>
                                    </form>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 m-auto entry-main-content">
                                    <h2 class="section-title style-1 mb-30">Description</h2>
                                    <div class="description mb-50">
                                        <p>{!! $product->long_description !!}</p>
                                    </div>
                                </div>
                                    <div class="col-12 social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="{{ asset('/') }}/website/assets/imgs/theme/icons/icon-facebook.svg"
                                                        alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img
                                                        src="{{ asset('/') }}/website/assets/imgs/theme/icons/icon-twitter.svg"
                                                        alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="{{ asset('/') }}/website/assets/imgs/theme/icons/icon-instagram.svg"
                                                        alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="{{ asset('/') }}/website/assets/imgs/theme/icons/icon-pinterest.svg"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="section-title style-1 mb-30 mt-30">Reviews (3)</h3>
                                    <!--Comments-->
                                    <div class="comments-area style-2">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="{{ asset('/') }}/website/assets/imgs/page/avatar-6.jpg"
                                                                    alt="">
                                                                <h6><a href="#">Jacky Chan</a></h6>
                                                                <p class="font-xxs">Since 2012</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Thank you very fast shipping from Poland only 3days.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at 3:12
                                                                            pm
                                                                        </p>
                                                                        <a href="#"
                                                                            class="text-brand btn-reply">Reply
                                                                            <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%;"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                                                    </div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings
                                                    calculated?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-15">Add a review</h4>
                                        <div class="product-rate d-inline-block mb-30">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="#" id="commentForm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                    placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" id="name"
                                                                    type="text" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email"
                                                                    type="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input class="form-control" name="website" id="website"
                                                                    type="text" placeholder="Website">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review</button>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Related products</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                       @foreach ($category_products as $category_product)
                                       <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img"
                                                            src="{{ asset($category_product->image) }}"
                                                            alt="">
                                                        <img class="hover-img"
                                                            src="{{ asset($category_product->image) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                        href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                        href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="#" tabindex="0">{{$category_product->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>TK.{{$category_product->selling_price}}</span>
                                                    <span class="old-price">TK.{{$category_product->regular_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                       @endforeach

                                    </div>
                                </div>
                            </div>
                            {{-- <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                                <img class="border-radius-10"
                                    src="{{ asset('/') }}/website/assets/imgs/banner/banner-4.png" alt="">
                                <div class="banner-text">
                                    <h4 class="mb-15 mt-40">Repair Services</h4>
                                    <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection







 