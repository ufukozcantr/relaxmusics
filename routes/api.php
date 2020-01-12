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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// login route, not use middleware
Route::post('login', 'Api\Auth\LoginController');
Route::post('register', 'Api\Auth\RegisterController');

// user must be login
Route::middleware('auth:api')->group(function () {

    // categories routes
    Route::get('categories', 'Api\Categories\IndexController');
    Route::post('categories', 'Api\Categories\StoreController');
    Route::put('categories/{category}', 'Api\Categories\UpdateController');
    Route::delete('categories/{category}', 'Api\Categories\DeleteController');
    Route::get('categories/{category}', 'Api\Categories\ShowController');

    // songs routes
    Route::get('songs', 'Api\Songs\IndexController');
    Route::post('songs', 'Api\Songs\StoreController');
    Route::put('songs/{song}', 'Api\Songs\UpdateController');
    Route::delete('songs/{song}', 'Api\Songs\DeleteController');
    Route::get('songs/{song}', 'Api\Songs\ShowController');

    // favorites routes
    Route::get('favorites', 'Api\Favorites\IndexController');
    Route::post('favorites', 'Api\Favorites\StoreController');
    Route::delete('favorites/{favorite}', 'Api\Favorites\DeleteController');

});
