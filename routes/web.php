<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth.admin']], function () {
      
        Route::get('/admin', [OverviewController::class, 'index'])->name('home');
        
        Route::post('/admin/division/delete', [DivisionController::class, 'delete'])->name('division.delete');
        Route::resource('/admin/division', DivisionController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/subject/delete', [SubjectController::class, 'delete'])->name('subject.delete');
        Route::resource('/admin/subject', SubjectController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/test/delete', [TestController::class, 'delete'])->name('test.delete');
        Route::resource('/admin/test', TestController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/applicant/filter', [ApplicantController::class, 'filter'])->name('applicant.filter');
        Route::resource('/admin/applicant', ApplicantController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);
    });

    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'loginPost']);
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['as' => 'web.'], function () {
        Route::get('/', [ClientController::class, 'index'])->name('client');
        Route::get('/personal', [ClientController::class, 'personal']);
});
