<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'api', 'namespace' => 'Api'], function($router) {
	$router->get('/seller', 'SellController@seller');
	$router->get('/goods', 'SellController@goods');
	$router->get('/ratings', 'SellController@ratings');

	$router->group(['prefix' => 'lol'], function($router) {
		$router->any('/test', 'LolController@test');
		$router->any('/save_news', 'LolController@saveNews');
		$router->any('/update/news', 'LolController@updateNews');
		$router->any('/news/cates', 'LolController@getNewsCates');
		$router->any('/news/{cid}/lists', 'LolController@getNewsLists');
	});
});
