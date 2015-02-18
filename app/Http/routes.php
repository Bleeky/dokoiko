<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@getHome');

Route::controllers([
	'/login'          => 'AuthenticationController',
	'/admin/articles' => 'ArticleAdminController',
	'/admin/pictures' => 'PictureAdminController',
	'/admin/users'    => 'UserAdminController',
	'/admin/places'   => 'PlaceAdminController',
	'/admin/videos'   => 'VideoAdminController',
	'/admin'          => 'AdminController',
	'/articles'       => 'ArticleController',
	'/'               => 'HomeController',
]);
