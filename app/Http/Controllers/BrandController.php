<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',['brand' => Brand::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required | max:30',
            // 'image' => 'image | mimes:png,jpg',
            // 'description' => 'required'
        ], 
        [
            'name.required' => 'Please give a Brand Name',
            // 'description.required' => 'please give a brand description',
            // 'image.mimes' => 'only the png and jpg formate image'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imageName  = 'brand-img'.time().'.'.$image->extension();
            $directory = 'brand-img/';
            $image->move($directory, $imageName);
            $brand->image = $directory.$imageName; 
        }
        $brand->save();
        return to_route('createBrand')->with('notification','Brand Module Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $brand = Brand::where('id',$id)->first();
        return view('admin.brand.edit',['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name'  => 'required | max:30',
            // 'image' => 'image | mimes:png,jpg',
            // 'description' => 'required'
        ], 
        [
            'name.required' => 'Please give a brand Name',
            // 'description.required' => 'please give a brand description',
            // 'image.mimes' => 'only the png and jpg formate image'
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $image = $request->image;
        if($image){
            if(file_exists($brand->image))
            {
                unlink($brand->image);
            }
            $imageName  = 'brand-img'.time().'.'.$image->extension();
            $directory = 'brand-img/';
            $image->move($directory, $imageName);
            $brand->image = $directory.$imageName;
        } 
        $brand->save();
        return to_route('indexBrand')->with('notification','Brand Module Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $brand = Brand::find($id);
        if($brand->image){
            if(file_exists($brand->image)){
                unlink($brand->image);
            }
        }
        $brand->delete();
        return to_route('indexBrand')->with('notification','Brand Deleted Successfully');
    }
}
