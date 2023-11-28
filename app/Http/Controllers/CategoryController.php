<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',['category'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
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
            'name.required' => 'Please give a Category Name',
            // 'description.required' => 'please give a category description',
            // 'image.mimes' => 'only the png and jpg formate image'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imageName  = 'category-img'.time().rand().'.'.$image->extension();
            $directory = 'category-img/';
            $image->move($directory, $imageName);
            $category->image = $directory.$imageName; 
        }
        $category->save();
        return to_route('create')->with('notification','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',['category' => $category]);
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
            'name.required' => 'Please give a Category Name',
            // 'description.required' => 'please give a category description',
            // 'image.mimes' => 'only the png and jpg formate image'
        ]);

        $category  =  Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $image = $request->image;
        if($image){
            if(file_exists($category->image))
            {
                unlink($category->image);
            }
            $imageName  = 'category-img'.time().rand().'.'.$image->extension();
            $directory = 'category-img/';
            $image->move($directory, $imageName);
            $category->image = $directory.$imageName;
        } 
        $category->save();
        return to_route('index')->with('notification','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        if($category->image){
            if(file_exists($category->image)){
                unlink($category->image);
            }
        }
        $category->delete();
        return to_route('index')->with('notification','Category Deleted Successfully');
    }
}
