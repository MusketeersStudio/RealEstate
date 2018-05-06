<?php

namespace App\Http\Controllers;

use App\Models\PropertyManager;
use Illuminate\Http\Request;

class PropertyManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('property_manager/index');
    }

    /**
     * Return all properties associated with the property manager
     *
     * @return \Illuminate\Http\Response
     */
    public function properties()
    {
        //
        return $this->properties();
    }

    /**
     * Return all units of all properties associated with the property manager
     *
     * @return \Illuminate\Http\Response
     */
    public function units()
    {
        //
        return null;
    }

    /**
     * Return all leases of all units from properties associated with the property manager
     *
     * @return \Illuminate\Http\Response
     */
    public function leases()
    {
        //
    }

    /**
     * Return all tenants of all leases associated with the property manager
     *
     * @return \Illuminate\Http\Response
     */
    public function tenants()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyManager  $propertyManager
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyManager $propertyManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyManager  $propertyManager
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyManager $propertyManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyManager  $propertyManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyManager $propertyManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyManager  $propertyManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyManager $propertyManager)
    {
        //
    }
}
