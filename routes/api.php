<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ChapterController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\PathController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [UserController::class, 'fetch']);
    Route::get('category', [CategoryController::class, 'all']);
    Route::get('path/popular', [PathController::class, 'popular']);
    Route::get('path', [PathController::class, 'all']);
    Route::get('path/category/{id}', [PathController::class, 'byCategory']);
    Route::get('chapter/path/{id}', [ChapterController::class, 'byPath']);
    Route::get('chapter/{id}', [ChapterController::class, 'byId']);
    Route::get('quiz/search', [QuizController::class, 'search']);
    Route::get('quiz/path/{id}', [QuizController::class, 'byPath']);
    Route::get('quiz/check', [QuizController::class, 'check']);
    Route::get('question/{id}', [QuestionController::class, 'byQuiz']);
    Route::post('history/add', [HistoryController::class, 'addHistory']);
    Route::get('history/user/{id}', [HistoryController::class, 'byUser']);
    Route::post('logout', [UserController::class, 'logout']);
    // Route::post('user', [UserController::class, 'updateProfile']);
    // Route::post('user/photo', [UserController::class, 'updatePhoto']);
    // Route::post('logout', [UserController::class, 'logout']);

    // Route::get('transaction', [TransactionController::class, 'all']);
    // Route::post('transaction/{id}', [TransactionController::class, 'update']);

    // Route::post('checkout', [TransactionController::class], 'checkout');

});


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);