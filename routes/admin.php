<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('levels', LevelController::class)->names('admin.levels');
    Route::resource('classes', ClassesController::class)->names('admin.classes');
    Route::resource('subjects', SubjectController::class)->names('admin.subjects');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('files', FileController::class)->names('admin.files');
    Route::get('/users/{user}/purchases', [UserController::class, 'purchases'])->name('admin.users.purchases');
    Route::post('/subjects/{subject}/toggle-lock', [SubjectController::class, 'toggleLock'])->name('admin.subjects.toggle-lock');
});
// Route::apiResource('levels', LevelController::class);

// Route::fallback(function () {
//     return redirect()->route('admin.login');
// });