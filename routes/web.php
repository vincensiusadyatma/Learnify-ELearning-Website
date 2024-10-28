<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.main');
});

Route::prefix('auth')->middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'showRegister'])->name('show-register');
    Route::post('/register/handle',[AuthController::class,'handleRegister'])->name('handle-register');
});
