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

use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function() {
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/buy/{id}', function (Request $request, $id) {
	    return view('buy', ['id' => $id, 'url' => $request->query('url')]);
	});

	Route::get('/order/{id}', 'ApiController@viewOrder')->name('order');

	Route::post('/buy/{id}', 'ApiController@handlePurchase');

	Route::group(['prefix' => 'api'], function() {
		Route::get('preview', 'ApiController@generateMockup')->name('api.mockup');

		Route::get('thumbnail/generate', 'ApiController@generateThumbnail')->name('api.thumbnail');

		Route::post('shipping/calculate', 'ApiController@calculateShippingRate');

		Route::post('printful/webhook', 'ApiController@handleWebhook');
	});
});