<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    //
    public function getIndex(){
        $units = Unit::all();
        return $units;

    }
    public function getSingleUnit(Request $request){
        $unit = Unit::find($request->input('id'));
        return $unit;
    }
    public function deleteUnit(Request $request){
        $unit = Unit::find($request->input('id'));
        $unit->delete();
        return "deleted";
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return ProductsResource
     */
    public function show(Request $request){
        //


    }
}
