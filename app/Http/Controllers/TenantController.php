<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tenant.index');
    }

    /**
     * Return all leases associated with the tenant
     *
     * @return \Illuminate\Http\Response
     */
    public function leases()
    {
        //
        return $this->leases();
    }

    /**
     * Return all tickets associated with the tenant
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        //
        return null;
    }

    /**
     * Return all payments associated with the tenant
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        //
        return null;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
