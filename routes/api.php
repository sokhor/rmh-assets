<?php

Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('rmh', 'RmhController');
    Route::apiResource('rp', 'RpController');
    Route::apiResource('mhp', 'MhpController');
    Route::apiResource('vidrl', 'VidrlController');
    Route::apiResource('rmhmobile', 'RmhmobileController');
    Route::apiResource('mhpmobile', 'MhpmobileController');
    Route::apiResource('user', 'UserController');
});