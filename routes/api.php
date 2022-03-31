<?php

use App\Http\Controllers\displayProjectController;
use App\Http\Controllers\projectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//header parameters to allow external server to access

Route::middleware(['cors'])->group(function () {
    Route::get('/projectData', [displayProjectController::class, 'index']);
    Route::post('/store', [projectController::class, 'store'])->name('store');
    Route::post('/update/{id}', [projectController::class, 'update']);
    Route::resource('/project', projectController::class);
    Route::get('/projectData/edit/{id}', [displayProjectController::class, 'edit']);
    Route::post('/destroy/{id}', [projectController::class, 'destroy']);
});
