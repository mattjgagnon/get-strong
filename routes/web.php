<?php

use App\Http\Controllers\ExerciseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exercise', [ExerciseController::class, 'index']);
//Route::apiResource('exercise', ExerciseController::class);
//Route::apiResource('session', SessionController::class);
//Route::apiResource('set', SetController::class);
//Route::apiResource('tag', TagController::class);
