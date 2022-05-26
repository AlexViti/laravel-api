<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::post('/slug', 'HomeController@slug')->name('slug');
        Route::get('/posts/my-posts', 'PostController@myindex')->name('myindex');
        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');
    });

Route::view("{any?}", 'welcome')->where("any", ".*");
