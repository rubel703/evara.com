<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.color.index',['colors'=>Color::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.add');
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
            'name.required' => 'unit name field is required',
        ]
    );

        Color::newColor($request);
        return back()->with('notification', 'Color Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',['color'=>$color]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'unit name field is required',
        ]
    );
        Color::updateColor($request, $color);
        return to_route('color.index')->with('notification', 'Color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return to_route('color.index')->with('notification', 'Color deleted successfully');
    }
}
