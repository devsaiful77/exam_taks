<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ========== Jwt Authentication ===========
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

// =========== Partner Controller ==============
Route::apiResource('/partner','Api\PartnerController');

// ========== Employee Controller ===============
Route::apiResource('/employee','Api\EmployeeController');

// ========== Course Controller ===============
Route::apiResource('/course','Api\CourseController');
// ========== Student Controller ===============
Route::apiResource('/student','Api\StudentController');
// ========== Marks Controller ===============
Route::apiResource('/marks','Api\MarksController');


