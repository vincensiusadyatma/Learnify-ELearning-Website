<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\QuizController;
use App\Http\Controllers\Core\CourseController;
use App\Http\Controllers\Core\LessonController;
use App\Http\Controllers\Core\SettingController;
use App\Http\Controllers\Core\DashboardController;
use App\Http\Controllers\Core\UserController;
use App\Http\Controllers\Admin\DashboardAdminController;


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
    Route::get('/course/{course:uuid}/lesson/{lesson}', [LessonController::class, 'showLesson'])->name('show-lesson');
    Route::get('/course/{course:uuid}/continues', [LessonController::class, 'continueLesson'])->name('continue-lesson');
    
    Route::get('/lesson{filename}', [LessonController::class, 'showMaterial'])->name('show-materials');
    Route::get('/setting', [SettingController::class, 'showSetting'])->name('show-setting');
    Route::get('/profile', [SettingController::class, 'showProfile'])->name('show-profile');

    // user access quiz
    Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('show-quiz'); 
    Route::get('/quiz/{quiz}', [QuizController::class, 'showQuizDetail'])->name('show-quiz-detail'); //nampilin web sebelum masuk ke soal
    Route::get('/quiz/{quiz}/question/{question}', [QuizController::class, 'showQuestion'])->name('show-question'); //buka soal
    Route::post('/quiz/{quiz}/question/{question}/answer', [QuizController::class, 'storeAnswer'])->name('store-answer'); //nyimpen jawaban user lewat tombol next / submit
    // Route::get('/quiz/{quiz}/question/{question}', [QuizController::class, 'showQuestion'])->name('show-question');
});




    // Route::get('/course/{id}', [LessonController::class, 'listLesson'])->name('list-lesson');
    //Route::post('/course/{id}/lesson/{path}', [LessonController::class, 'showMaterial'])->name('show-materials');

 

    // Route::get('/lesson{filename}', [LessonController::class, 'showMaterial'])->name('show-materials');


Route::middleware(['CheckRole:admin'])->prefix('admin')->group(function () {
    Route::get('/pulse', function () {
        return view('vendor.pulse.dashboard');
    })->name('healthcheck');

    Route::get('/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('show-dashboard-admin');
    Route::get('/dashboard/users', [UserController::class, 'showUserManagement'])->name('show-users-management');
    Route::get('/dashboard/users/{user}', [UserController::class, 'showUserDetails'])->name('show-user-details');
    Route::put('/dashboard/users/{user}', [UserController::class, 'updateUser'])->name('handle-update-user');
    Route::put('/dashboard/users/setting/{user}', [UserController::class, 'updateUserSetting'])->name('handle-update-user-setting');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'deleteUser'])->name('handle-delete-user');
    Route::get('/dashboard/users/{user}/setting', [UserController::class, 'showUserSetting'])->name('show-user-setting');

    Route::get('/dashboard/course', [CourseController::class, 'showCourseManagement'])->name('show-course-management');
    Route::get('/dashboard/course/{course}', [CourseController::class, 'showCourseDetails'])->name('show-course-admin-detail');
    Route::get('/dashboard/course/{course}/lesson/manage', [LessonController::class, 'showLessonCMS'])->name('show-add-lesson-cms');
    Route::post('/dashboard/course/{course}/lesson/manage', [LessonController::class, 'store'])->name('handle-add-lesson');
    Route::delete('/dashboard/course/{course}/lesson/{lesson}', [LessonController::class, 'delete'])->name('handle-delete-lesson');
    Route::put('/dashboard/course/{course}', [CourseController::class, 'update'])->name('handle-update-course');

    Route::get('/dashboard/quiz', [QuizController::class, 'showQuizManagement'])->name('show-quiz-management');
    Route::get('/dashboard/quiz/{course}', [QuizController::class, 'showQuizDetails'])->name('show-quiz-admin-detail');
    Route::get('/dashboard/quiz/{quiz}/details', [QuizController::class, 'showquizDetailsForUpdate'])->name('show-quiz-admin-detail-for-update');
    Route::put('/dashboard/quiz/{quiz}/details', [QuizController::class, 'update'])->name('handle-quiz-update');
    Route::delete('/dashboard/quiz/{quiz}', [QuizController::class, 'delete'])->name('handle-delete-quiz');
    Route::put('/dashboard/quiz/{quiz}', [QuizController::class, 'showQuizDetails'])->name('handle-update-quiz');
    Route::get('/dashboard/quiz/{course}/questions/manage', [QuizController::class, 'showquizCMS'])->name('show-add-quiz-cms');
    Route::post('/dashboard/quiz/{course}/questions/manage', [QuizController::class, 'store'])->name('handle-store-quiz');
    
});

Route::post('/upload-image', [LessonController::class, 'uploadImage']);
