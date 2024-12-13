<?php

use App\Http\Controllers\MathController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MathController::class,'index']);
Route::post('/calculate', [MathController::class, 'calculate'])->name('calculate');
