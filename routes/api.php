<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/stories', [StoryController::class, 'index']);
    Route::post('/stories', [StoryController::class, 'store']);
    Route::get('/stories/{story}', [StoryController::class, 'show']);
    Route::put('/stories/{story}', [StoryController::class, 'update']);
    Route::delete('/stories/{story}', [StoryController::class, 'destroy']);

    Route::get('/stories/{story}/chapters', [ChapterController::class, 'index']);
    Route::post('/stories/{story}/chapters', [ChapterController::class, 'store']);
    Route::get('/stories/{story}/chapters/{chapter}', [ChapterController::class, 'show']);
    Route::put('/stories/{story}/chapters/{chapter}', [ChapterController::class, 'update']);
    Route::delete('/stories/{story}/chapters/{chapter}', [ChapterController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
});



