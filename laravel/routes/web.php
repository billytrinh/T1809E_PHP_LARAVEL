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
Route::get('/', function () {
    return view('welcome');
});
Route::get("/quan-ly-sach","DemoController@bookList");
Route::get("/quan-ly-tac-gia","DemoController@authorList");

Route::get("/them-sach","DemoController@themsach")->middleware("admin");

Route::group(["middleware"=> "admin"],function (){
    Route::post("/them-sach","DemoController@luusach");

    Route::get("/sua-sach","DemoController@suasach");
    Route::post("/sua-sach","DemoController@capnhatsach");

    Route::get("/xoa-sach/{id}","DemoController@xoasach");
});

Route::get('/home', 'HomeController@index')->name('home');
