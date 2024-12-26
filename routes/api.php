<?php

use App\Http\Middleware\ApiTokenMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/faculties',function (){
    return response()->json(\App\Models\Faculty::all());
})->middleware(ApiTokenMiddleware::class);

Route::get('/departments',function (){
    return response()->json(\App\Models\Department::all());
})->middleware(ApiTokenMiddleware::class);

Route::get('/teachers',function (){
    return response()->json(\App\Models\Teacher::all());
})->middleware(ApiTokenMiddleware::class);
