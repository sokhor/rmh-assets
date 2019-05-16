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

    Route::post('mhp/import', 'MhpImportController');
    Route::get('mhp/export', 'MhpExportController');
    Route::apiResource('mhp', 'MhpController');
    Route::get('removed-mhp', 'MhpRemovedController@index');

    Route::post('vidrl/impoty', 'VidrlImportController');
    Route::get('vidrl/export', 'VidrlExportController');
    Route::apiResource('vidrl', 'VidrlController');
    Route::get('removed-vidrl', 'VidrlRemovedController@index');
    
    Route::post('rmhmobile/import', 'RmhmobileImportController');
    Route::get('rmhmobile/export', 'RmhmobileExportController');
    Route::apiResource('rmhmobile', 'RmhmobileController');

    Route::post('mhpmobile/import', 'MhpmobileImportController');
    Route::get('mhpmobile/export', 'MhpmobileExportController');
    Route::apiResource('mhpmobile', 'MhpmobileController');
    
    Route::apiResource('user', 'UserController');    
});