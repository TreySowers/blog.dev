<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/', 'HomeController@showWelcome');

Route::get('/resume', 'HomeController@showResume');

Route::get('/my-resume', 'HomeController@showMyResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('/my-portfolio', 'HomeController@showMyPortfolio');

Route::get('/random-guess', 'HomeController@randomguess');

Route::get('/roll-dice/{guess?}', 'HomeController@rolldice');

Route::get('/forecast', 'HomeController@showForecast');

Route::resource('posts', 'PostsController');




	
