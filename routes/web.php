<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\ApplicantController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth.admin']], function () {
      
        Route::get('/admin', [OverviewController::class, 'index'])->name('home');

        Route::post('/admin/applicant/action', [ApplicantController::class, 'action'])->name('applicant.action');
        Route::resource('/admin/applicant', ApplicantController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);


       
    });

    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'loginPost']);
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::group(['as' => 'web.'], function () {
//         Route::get('/', [ApplicantController::class, 'index'])->name('home');
// });
