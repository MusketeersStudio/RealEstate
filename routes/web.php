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


Route::get('/property-manager', 'PropertyManagerController@index');

Route::get('/service-provider', 'ServiceProviderController@index');

Route::get('/tenant', 'TenantController@index');


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        // Matches The "/admin/users" URL
    });
});