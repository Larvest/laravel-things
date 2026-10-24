<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

//Route::get('/', [DBFetchController::class, 'showView'])->name('home');

Route::get('/form1', [FormController::class, 'showForm']);
Route::post('/result1', [FormController::class, 'store'])->name('store');

Route::get('/form2', [FormController::class, 'showForm2']);
Route::post('/result2', [FormController::class, 'store2'])->name('store2');

Route::get('/form3', [FormController::class, 'showForm3']);
Route::post('/result3', [FormController::class, 'store3'])->name('store3');

Route::view('/', 'index')->name('home');
//Route::view('/', 'index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

});

require __DIR__.'/settings.php';
