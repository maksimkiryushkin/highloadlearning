<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['web']], function () {
	Route::get('/welcome', 'AuthController@welcome')->name('welcome');

	Route::get('/register', 'AuthController@register');
	Route::post('/register', 'AuthController@doRegister');
	Route::get('/profile', 'AuthController@profile');
	Route::put('/profile', 'AuthController@updateProfile');

	Route::post('/login', 'AuthController@login');
	Route::get('/logout', 'AuthController@logout');

	Route::get('/', 'MainController@index')->name('home');
	Route::get('/friend/{id}', 'FriendsController@friend');
	Route::get('/person/{id}', 'FriendsController@person');

	Route::put('/make/friendship/with/{id}', 'FriendsController@makeFriendship');
	Route::put('/unfriend/with/{id}', 'FriendsController@unfriend');

	Route::get('/friends', 'FriendsController@index');
	Route::get('/friends/more/{page}', 'FriendsController@friendsMore');
});
