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

// Есть возможность регистрации, создавать персональные страницы, возможность подружиться, список друзей.

//Auth
//Main
//Friends

Route::group(['middleware' => ['web']], function () {
	Route::get('/welcome', 'AuthController@welcome')->name('welcome');
	Route::get('/login', 'AuthController@login');
	Route::get('/logout', 'AuthController@logout');

	Route::get('/', 'MainController@index')->name('home');
});
