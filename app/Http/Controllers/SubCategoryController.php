<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        return view('admin.sub-category.index',['subCategories' => SubCategory::all()]);
    }


    public function create()
    {
        return view('admin.sub-category.add', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'category_id' => 'required',
                'name' => 'required',
            ],
            [
                'category_id.required' => 'category name field is required',
                'name.required' => 'sub category name field is required',
            ]
        );

        SubCategory::newSubCategory($request);
        return back()->with('notification', 'Sub Category Added Successfully');
    }


    public function show(SubCategory $subCategory)
    {
    }


    public function edit(SubCategory $subCategory)
    {
        return view('admin.sub-category.edit', ['categories'=>Category::all(),'sub_category'=>$subCategory]);
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request,
            [
                'category_id' => 'required',
                'name' => 'required',
            ],
            [
                'category_id.required' => 'category name field is required',
                'name.required' => 'sub category name field is required',
            ]
        );
        
        SubCategory::updateSubCategory($request, $subCategory);
        return to_route('sub-category.index')->with('notification', 'sub category updated successfully');
    }


    public function destroy(SubCategory $subCategory)
    {
        if($subCategory->image){
            if(file_exists($subCategory->image)){
                unlink($subCategory->image);
            }
        }
        $subCategory->delete();
        return to_route('sub-category.index')->with('notification', 'sub category deleted successfully');
    }
}
