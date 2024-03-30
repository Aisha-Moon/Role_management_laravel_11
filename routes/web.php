<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration_post', [AuthController::class, 'registration_post']);
Route::get('login', [AuthController::class, 'login']);
Route::get('forgot', [AuthController::class, 'forgot_pass']);
Route::post('forgot_post', [AuthController::class, 'forgot_post']);
Route::get('reset/{token}', [AuthController::class, 'getReset']);
Route::post('reset_post/{token}', [AuthController::class, 'ResetPost']);
Route::post('login_post', [AuthController::class, 'login_post']);

Route::group(['middleware'=>'superadmin'],function(){
    Route::get('superadmin/dashboard',[DashboardController::class, 'dashboard']);

});
Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class, 'dashboard']);

});
Route::group(['middleware'=>'user'],function(){
    Route::get('user/dashboard',[DashboardController::class, 'dashboard']);

});

Route::get('logout',[AuthController::class, 'logout']);

