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
Auth::routes();

Route::group(["middleware"=> "admin","prefix"=> "admin"],function (){
    include_once("admin.php");
});

include_once("frontend.php");
Route::get("api-chart","HomeController@chart");