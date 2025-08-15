<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function(){
    Route::post('/login',[AuthController::class,'login']);
});