<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    //
    public function getIndex(){
        return Tenant::all();
    }
    public function getTenant(Request $request){
        $tenant = Tenant::find($request->input('id'));
        return $tenant;

    }
    public function store(){

    }
    public function deleteTenant(Request $request){
        $tenant = Tenant::find($request->input('id'));
        $tenant->delete();
        return 'Deleted';
    }
    //for future api
    public function show(){
        //
    }

}
