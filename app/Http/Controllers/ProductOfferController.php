<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.productOffer.index',['productOffers'=>ProductOffer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productOffer.add',['products'=>Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProductOffer::addProductOffer($request);
        return back()->with('notification', 'Product Offer added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductOffer $productOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOffer $productOffer)
    {
        return view('admin.productOffer.edit',['offerProduct'=>$productOffer,'products'=>Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductOffer $productOffer)
    {
        ProductOffer::updateProductOffer($request, $productOffer);
        return to_route('productOffer.index')->with('notification', 'Product Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOffer $productOffer)
    {
        if($productOffer->image){
            if(file_exists($productOffer->image)){
                unlink($productOffer->image);
            }
        }
        $productOffer->delete();
        return to_route('productOffer.index')->with('notification', 'Product Offer deleted successfully');
    }
}
