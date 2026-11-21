<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\EnrollmentController;

Route::prefix('course-admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('courses', CourseController::class)->except('show');
        Route::resource('courses.lessons', LessonController::class)->except('show');
        Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    });
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login']);

Route::view('/', 'index')->name('home');

Route::resource('/courses', CourseController::class)->except('show');
Route::resource('/courses.lessons', LessonController::class)->except('show');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

});

require __DIR__.'/settings.php';
