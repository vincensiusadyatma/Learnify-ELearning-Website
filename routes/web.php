<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\CourseController;
use App\Http\Controllers\Core\DashboardController;
use App\Http\Controllers\Core\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.main');
})->name('main');

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show-register');
    Route::post('/register/handle', [AuthController::class, 'handleRegister'])->name('handle-register');
    Route::post('/login/handle', [AuthController::class, 'handleLogin'])->name('handle-login');
    Route::get('/redirect', [AuthController::class, 'googleRedirect'])->name('google-redirect');
    Route::get('/google/callback', [AuthController::class, 'googleCallback']);
});

Route::get('/logout', [AuthController::class, 'handleLogout'])->name('handle-logout');


Route::middleware(['CheckRole:user'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard'])->name('show-dashboard');
    Route::get('/course', [CourseController::class, 'showCourse'])->name('show-course');
    Route::get('/course/{id}', [LessonController::class, 'listLesson'])->name('list-lesson');
    //Route::post('/course/{id}/lesson/{path}', [LessonController::class, 'showMaterial'])->name('show-materials');
    Route::get('/lesson{filename}', [LessonController::class, 'showMaterial'])->name('show-materials');
    // Route::get('/course/{id}/lesson/{id}', [DashboardController::class, 'showDashboard'])->name('show-dashboard');
});

