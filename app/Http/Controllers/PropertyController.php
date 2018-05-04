<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Property::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $property = array();
        $property->type_id = $request->input('type_id');
        $property->manager_id = $request->input('manager_id');
        $property->name = $request->input('name');
        $property->status = $request->input('status');
        $property->description = $request->input('unit_prefix');
        $property->total_units = $request->input('total_units');
        $property->created_by = $request->input('created_by');
        $property->modified_by = $request->input('modified_by');
        
        $query_insert = DB::table('property')->insert($property);
        if($query_insert){
            return "Successul";

        }
        return "Failed";
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $property = array();
        $property->type_id = $request->input('type_id');
        $property->manager_id = $request->input('manager_id');
        $property->name = $request->input('name');
        $property->status = $request->input('status');
        $property->description = $request->input('unit_prefix');
        $property->total_units = $request->input('total_units');
        $property->created_by = $request->input('created_by');
        $property->modified_by = $request->input('modified_by');
        
        $query_insert = DB::table('property')->update($property);
    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $property = Property::find();
        $property->destroy();
        if($property){
            return "destroyed";
        }
    }
}
