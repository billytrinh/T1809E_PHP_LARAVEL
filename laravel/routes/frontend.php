<?php
Route::get('/', "HomeController@index");
Route::get('/load-more', "HomeController@loadMore");
Route::get('/load-more-html', "HomeController@loadMoreHtml");