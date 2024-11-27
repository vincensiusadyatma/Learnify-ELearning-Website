<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\CourseController;
use App\Http\Controllers\Core\DashboardController;
use App\Http\Controllers\Core\LessonController;
use App\Http\Controllers\Admin\DashboardAdminController;
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
    Route::get('/course/{course:uuid}', [CourseController::class, 'showCourseDetail'])->name('show-course-detail');
    Route::post('/course/{course:uuid}', [CourseController::class, 'takeCourse'])->name('take-course');
    Route::get('/course/{course:uuid}/lesson/{id}', [LessonController::class, 'showLesson'])->name('show-lesson');
    Route::get('/course/{course:uuid}/continues', [LessonController::class, 'continueLesson'])->name('continue-lesson');






    // Route::get('/course/{id}', [LessonController::class, 'listLesson'])->name('list-lesson');
    //Route::post('/course/{id}/lesson/{path}', [LessonController::class, 'showMaterial'])->name('show-materials');
    // Route::get('/lesson{filename}', [LessonController::class, 'showMaterial'])->name('show-materials');
    // Route::get('/course/{id}/lesson/{id}', [DashboardController::class, 'showDashboard'])->name('show-dashboard');
});

Route::middleware(['CheckRole:admin'])->prefix('admin')->group(function () {
    Route::get('/pulse', function () {
        return view('vendor.pulse.dashboard');
    })->name('healthcheck');

    Route::get('/dashboard', [DashboardAdminController::class, 'showDashboard'])->name('show-dashboard-admin');
    Route::get('/dashboard/users', [DashboardAdminController::class, 'showUserManagement'])->name('show-users-management');
    Route::get('/dashboard/users/{user}', [DashboardAdminController::class, 'showUserDetails'])->name('show-user-details');
    Route::get('/dashboard/users/{user}/setting', [DashboardAdminController::class, 'showUserSetting'])->name('show-user-setting');
});

