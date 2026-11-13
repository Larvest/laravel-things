<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

// Route::get('/', [DBFetchController::class, 'showView'])->name('home');

// Route::get('/form', [FormController::class, 'showForm'])->name('form1');
// Route::post('/result', [FormController::class, 'store'])->name('store');

// Route::get('/form2', [FormController::class, 'showForm2']);
// Route::post('/result2', [FormController::class, 'store2'])->name('store2');

// Route::get('/form3', [FormController::class, 'showForm3']);
// Route::post('/result3', [FormController::class, 'store3'])->name('store3');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login']);

Route::view('/', 'index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

});

require __DIR__.'/settings.php';
