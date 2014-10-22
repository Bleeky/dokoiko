<?php

Route::get('/', function()
{
    return View::make('Home.home')->with('pictures', Picture::where('status', '=', '1')->orderBy('date', 'desc')->take(8)->get());
});

Route::controller('/articles', 'ArticleController');
Route::controller('/admin', 'AdminController');
Route::controller('/login', 'LoginController');
Route::controller('/', 'HomeController');