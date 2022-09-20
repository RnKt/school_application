<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth.admin']], function () {
      
        Route::get('/admin', [DivisionController::class, 'index'])->name('home');

        Route::post('/admin/applicant/action', [ApplicantController::class, 'action'])->name('applicant.action');
        Route::resource('/admin/applicant', ApplicantController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/division/action', [DivisionController::class, 'action'])->name('division.action');
        Route::resource('/admin/division', DivisionController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/class/action', [ClassController::class, 'action'])->name('class.action');
        Route::resource('/admin/class', ClassController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);

        Route::post('/admin/subject/action', [SubjectController::class, 'action'])->name('subject.action');
        Route::resource('/admin/subject', SubjectController::class)
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
