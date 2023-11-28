<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.index',['units'=>Unit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.add');
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

        Unit::newUnit($request);
        return back()->with('notification', 'Unit Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit',['unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'unit name field is required',
        ]
    );
        Unit::updateUnit($request, $unit);
        return to_route('unit.index')->with('notification', 'Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return to_route('unit.index')->with('notification', 'Unit deleted successfully');
    }
}
