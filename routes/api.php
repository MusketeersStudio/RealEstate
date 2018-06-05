<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/user', 'middleware'=>['web']],function () {

    Route::post('/login', [
        'uses' => 'Auth\LoginController@login',
    ]);

    Route::post('/logout', [
        'uses' => 'Auth\LoginController@logout',
    ]);

});

Route::group(['prefix'=>'/temp'],function () {
    Route::post('/storeTempPic',[
        'uses' => 'TempController@storeTempPic',
    ]);

    Route::post('/storeTempDoc',[
        'uses' => 'TempController@storeTempDoc',
    ]);
});

\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/user','UserController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/lease','LeaseController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/maintenance','MaintenanceController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/payment_details','PaymentDetailsController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/property','PropertyController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/property_type','PaymentTypeController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/unit','UnitController',['web']);
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/unit_type','UnitTypeController',['web']);
