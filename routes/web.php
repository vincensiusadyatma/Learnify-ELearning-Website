<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Components/dashboard');
});
