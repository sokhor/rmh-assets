<?php

Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::apiResource('rmh', 'RmhController');
    Route::post('rmh/import', 'RmhImportController');  
    Route::get('rmh/export', 'RmhExportController');    
    Route::get('removed-rmh', 'RmhRemovedController@index');
    
    Route::apiResource('rp', 'RpController');
    Route::post('rp/import', 'RpImportController');
    Route::get('rp/export', 'RpExportController');
    Route::get('removed-rp', 'RpRemovedController@index');

    Route::apiResource('mhp', 'MhpController');
    Route::apiResource('vidrl', 'VidrlController');
    Route::apiResource('rmhmobile', 'RmhmobileController');
    Route::apiResource('mhpmobile', 'MhpmobileController');
    Route::apiResource('user', 'UserController');    
});