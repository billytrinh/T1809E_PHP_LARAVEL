<?php
Route::get("/quan-ly-sach","DemoController@bookList");
Route::get("/quan-ly-tac-gia","DemoController@authorList");
Route::get("/them-sach","DemoController@themsach")->middleware("admin");
Route::post("/them-sach","DemoController@luusach");
Route::get("/sua-sach","DemoController@suasach");
Route::post("/sua-sach","DemoController@capnhatsach");
Route::get("/xoa-sach/{id}","DemoController@xoasach");
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/chi-tiet-tac-gia","DemoController@chitiettacgia");