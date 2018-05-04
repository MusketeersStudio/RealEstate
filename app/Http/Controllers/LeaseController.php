<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    
    public function getIndex()
    {
        $leases = Lease::all();
        return $lease;
    }
    public function retrieveUserLeases(Request $request){
        
        $lease = Lease::find($request->input('id'));
        return $lease;
    }
    public function update(Request $request){
        
        
    }
    public function edit_lease(Request $request){
        $lease = new lease;
        $lease->tenant_id= $request->input('tenant_id');
        $lease->rental_unit_id = $request->input('rental_unit_id');
        $lease->payment_details_id = $request->input('payment_details_id');
        $lease->status = $request->input('status');
        $lease->duration = $request->input('duration');
        $lease->start_date = $request->input('start_date');
        $lease->end_date = $request->input('end_date');

        $query_insert = DB::table('lease')->insert($lease);
        if($query_insert){
        return "Successful";
        }
        else "return failed";

    }
    public function add_lease(Request $request){
        $lease = new lease;
        $lease->tenant_id= $request->input('tenant_id');
        $lease->rental_unit_id = $request->input('rental_unit_id');
        $lease->payment_details_id = $request->input('payment_details_id');
        $lease->status = $request->input('status');
        $lease->duration = $request->input('duration');
        $lease->start_date = $request->input('start_date');
        $lease->end_date = $request->input('end_date');

        $query_insert = DB::table('lease')->insert($lease);
        
        return "Successful";
    
    }

    //For api. Ignore
    public function show(Request $request){
        
        
    }



    
}
