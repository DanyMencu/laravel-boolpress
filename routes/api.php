<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//End point Api routes
Route::namespace('Api')->group(function () {

    //Books Archive
    Route::get('/books', 'BookController@index');

    //Book details
    Route::get('/books/{slug}','BookController@show');

    //Languages list
    Route::get('/languages', 'LanguageController@index');

    //Contact
    Route::post('/contacts', 'ContactController@store');
});
