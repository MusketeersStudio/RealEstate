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
\App\Util\CRUD\RouteUtils::dynamicAddRoutes('/user','UserController',['web']);
