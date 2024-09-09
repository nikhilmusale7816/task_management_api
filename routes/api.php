<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

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

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Task Management Routes (Protected)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    // Comment Management Routes
    Route::get('/tasks/{taskId}/comments', [CommentController::class, 'index']);
    Route::post('/tasks/{taskId}/comments', [CommentController::class, 'store']);
    Route::get('/tasks/{taskId}/comments/{id}', [CommentController::class, 'show']);
    Route::put('/tasks/{taskId}/comments/{id}', [CommentController::class, 'update']);
    Route::delete('/tasks/{taskId}/comments/{id}', [CommentController::class, 'destroy']);
});

// Example of an authenticated user route (optional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
