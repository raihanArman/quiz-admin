<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return 
    return redirect()->route('dashboard');
});

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('paths', PathController::class);
        Route::resource('chapters', ChapterController::class);
        Route::resource('quizzes', QuizController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('results', ResultController::class);
    });