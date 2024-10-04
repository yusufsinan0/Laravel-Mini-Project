<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();

})->middleware('auth:sanctum');

Route::post('/login',[AuthController::class,'login']);

Route::controller(ApiController::class)->prefix('/user')->name('user.')->group(function(){
    Route::get('/all','index');
    Route::get('/details/{userId}', 'userDetailsId')->name('userDetails');
    Route::delete('/delete/{userId}','userDeleteId')->name('userDelete');

})->middleware('auth.sanctum');
