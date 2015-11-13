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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function (){
    Route::group(['prefix' => 'spendings'], function (){
        Route::get('','SpendingController@getAll');
        Route::get('calculated-rate','SpendingController@getCalculatedRate');
        Route::post('create', 'SpendingController@create');
        Route::post('delete','SpendingController@delete');
    });

    Route::group(['prefix' => 'predictions'], function (){
        Route::get('','PredictionController@getAll');
        Route::get('date-range/{start}/{end}','PredictionController@getPredictionsByRange');
        Route::post('create', 'PredictionController@create');
        Route::post('delete','PredictionController@delete');
    });
});
