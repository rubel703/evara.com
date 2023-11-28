<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.index',['sizes' => Size::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'Size name field is required',
        ]
    );

        Size::newSize($request);
        return back()->with('notification', 'Size Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',['size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'Size name field is required',
        ]
    );
        Size::updateSize($request, $size);
        return to_route('size.index')->with('notification', 'Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return to_route('size.index')->with('notification', 'Size deleted successfully');
    }
}
