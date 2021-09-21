<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    "prefix" => "customers", "as" => "customers."
], function ()
{

    Route::get("{customer}", "CustomersController@show")
        ->name("show");

    Route::post("create", "CustomersController@store")
        ->name("store");

    Route::put("{customer}/edit", "CustomersController@update")
        ->name("update");

});