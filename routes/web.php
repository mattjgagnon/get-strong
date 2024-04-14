<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\SetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('exercise', ExerciseController::class);
Route::resource('set', SetController::class);
