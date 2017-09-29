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

Route::get('/404', function()
{
    return View::make('errors/404');
});

Route::get('/500', function()
{
    return View::make('errors/500');
});

//route for subfolders api
Route::get('cpanel', 'LoginController@showLogin');
Route::post('/api/login', 'LoginController@doLogin');
Route::post('/api/password', [
    'before' => 'csrf',
    'uses' => 'RemindersController@postRemind'
]);

Route::get('register', 'RegisterController@showRegister');
Route::post('/api/register', [
    'before' => 'csrf',
    'uses' => 'RegisterController@doRegister'
]);
//end of api folder

Route::get('/', 'HomeController@showWelcome');
Route::get('/logout', 'LoginController@doLogout');
Route::get('/password', 'RemindersController@getRemind');
Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::get('/home', [
    'before' => 'auth',
    'uses' => 'HomeController@showHome'
]);



