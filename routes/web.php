<?php

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

Route::prefix('threads')->group(function() {
    Route::post('/{thread}/replies', 'RepliesController@store')->middleware('auth');
    Route::get('/{thread}', 'ThreadsController@show');
    Route::get('/', 'ThreadsController@index')->name('threads-list');
    Route::post('/', 'ThreadsController@store')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
