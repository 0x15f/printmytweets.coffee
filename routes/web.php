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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function() {
	Route::get('preview', 'ApiController@generateMockup')->name('api.mockup');

	Route::get('thumbnail/generate', 'ApiController@generateThumbnail')->name('api.thumbnail');
});