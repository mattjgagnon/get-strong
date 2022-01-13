<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('exercise', ExerciseController::class);
Route::apiResource('session', SessionController::class);
Route::apiResource('set', SetController::class);
Route::apiResource('tag', TagController::class);
