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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware', 'web'], function () {
	Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
});

Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);

Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	//admin
	Route::get('/', function () {

	});

	//admin/pages
	Route::group(['prefix' => 'pages'], function () {
		//admin/pages
		Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

		//admin/add
		Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);
		//admin/edit/id
		Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
	});

	//admin/portfolio
	Route::group(['prefix' => 'portfolio'], function () {
		//admin/portfolio
		Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);

		//admin/add
		Route::match(['get', 'post'], '/add', ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);
		//admin/edit/id
		Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);
	});

	//admin/services
	Route::group(['prefix' => 'services'], function () {
		//admin/services
		Route::get('/', ['uses' => 'ServiceController@execute', 'as' => 'services']);

		//admin/add
		Route::match(['get', 'post'], '/add', ['uses' => 'ServiceAddController@execute', 'as' => 'servicesAdd']);
		//admin/edit/id
		Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'ServiceEditController@execute', 'as' => 'servicesEdit']);
	});
});
