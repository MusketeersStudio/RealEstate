<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/properties', function () {
    return view('properties');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/inquiry', function () {
    return view('inquiry');
});
Route::get('/', function () {
    return view('index');
});


//Route::get('/property-manager', 'PropertyManagerController@index');

Route::get('/service-provider', 'ServiceProviderController@index');

Route::get('/tenant', 'TenantController@index');


Route::prefix('property-manager')->group(function () {
    Route::get('/', 'PropertyManagerController@index');
    Route::get('/properties', 'PropertyManagerController@properties');
    Route::get('/units', 'PropertyManagerController@units');
    Route::get('/leases', 'PropertyManagerController@leases');
    Route::get('/tenants', 'PropertyManagerController@tenants');
});

Route::prefix('tenant')->group(function () {
    Route::get('/', 'TenantController@index');
    Route::get('/leases', 'TenantController@leases');
    Route::get('/payments', 'TenantController@payments');
    Route::get('/tickets', 'TenantController@tickets');

});

Route::prefix('service-provider')->group(function () {
    Route::get('/', 'ServiceProviderController@index');
    Route::get('/tickets', 'ServiceProviderController@tickets');

});