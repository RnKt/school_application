<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamCategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PersonalController;
use App\Http\Controllers\Client\ResultController;
use App\Http\Controllers\Client\CodeController;

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

        Route::post('/admin/exam/delete', [ExamController::class, 'delete'])->name('exam.delete');
        Route::resource('/admin/exam', ExamController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy', 'question']);

        
        Route::post('/admin/examCategory/delete', [ExamCategoryController::class, 'delete'])->name('examCategory.delete');
        Route::resource('/admin/examCategory', ExamCategoryController::class)
            ->only(['index', 'show', 'store', 'create', 'update', 'destroy']);
    });

    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'loginPost']);
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [ClientController::class, 'index'])->name('client');


Route::group(['as' => 'login.'], function () {
    Route::resource('/login/personal', PersonalController::class)
    ->only(['index', 'store']);

    Route::resource('/login/result', ResultController::class)
    ->only(['index', 'store']);

    Route::resource('/login/code', CodeController::class)
    ->only(['index', 'store']);
});


Route::group(['as' => 'testclient.'], function () {
    Route::resource('/test', TestClientController::class)
    ->only(['index']);
});



