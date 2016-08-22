<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/', ['uses' => 'HomeController@index', 'middleware' => 'auth']);

Route::group(['prefix'=>'unit'], function() {
    Route::get('/create', [
        'as' => 'unit.create',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@create'
    ]);

    Route::post('/store', [
        'as' => 'unit.store',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@store'
    ]);
});
