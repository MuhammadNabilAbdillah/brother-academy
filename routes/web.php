<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminAuthController;

// Redirect halaman utama ke dashboard/login
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Route Login Admin
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Route Proteksi (Harus Login)
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});