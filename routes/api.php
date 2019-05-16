<?php

Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::post('rmh/import', 'RmhImportController');  
    Route::get('rmh/export', 'RmhExportController'); 
    Route::apiResource('rmh', 'RmhController');   
    Route::get('removed-rmh', 'RmhRemovedController@index');
    
    Route::post('rp/import', 'RpImportController');
    Route::get('rp/export', 'RpExportController');
    Route::apiResource('rp', 'RpController');
    Route::get('removed-rp', 'RpRemovedController@index');

    Route::apiResource('mhp', 'MhpController');
    Route::apiResource('vidrl', 'VidrlController');
    Route::apiResource('rmhmobile', 'RmhmobileController');
    Route::apiResource('mhpmobile', 'MhpmobileController');
    Route::apiResource('user', 'UserController');    
});