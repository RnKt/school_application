<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OverviewController;

Route::group(['as' => 'admin.'], function () {
    
    Route::get('/', [OverviewController::class, 'index'])->name('home');
   

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
