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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'dashboard', 'middleware' => 'auth']);
Route::get('/logout',['as' => 'logout', 'uses' =>'Auth\AuthController@logout']);

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

    Route::get('/view-all', [
        'as' => 'unit.index',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@index'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'unit.edit',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@edit'
    ]);

    Route::post('/update/{num}', [
        'as' => 'unit.update',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@update'
    ]);

    Route::get('/disable/{num}', [
        'as' => 'unit.disable',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@disable'
    ]);
    Route::get('/assign', [
        'as' => 'unit.assign',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@assign_units'
    ]);
    Route::post('/assign', [
        'as' => 'unit.assign.post',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@post_assign_units'
    ]);
    Route::get('/assigned', [
        'as' => 'unit.assigned',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@assigned_subjects'
    ]);
    Route::get('/edit/assigned/{num}', [
        'as' => 'edit.assigned',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@edit_assigned_unit'
    ]);
    Route::post('/update/assigned/{num}', [
        'as' => 'update.assigned',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@update_assigned_unit'
    ]);
    Route::get('/remove/assigned/{num}', [
        'as' => 'remove.assigned',
        'middleware' => ['auth'],
        'uses' => 'UnitsController@remove_assigned_unit'
    ]);

});
