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


Auth::routes();

//Admin route
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        //Book rescource routes
        Route::resource('/books', 'BookController');

        //Genre route
        Route::get('/genres/{id}', 'GenreController@show')->name('genre');

        //Language route
        Route::get('/languages/index', 'languageController@index')->name('languages');
    });

//Home front-office route
Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*');
