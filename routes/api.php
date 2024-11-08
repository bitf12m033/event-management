<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\BookController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/unlock-book', [BookController::class, 'unlockBook']);
    Route::get('user-books', [BookController::class, "getUserBooks"]);
});

Route::apiResource('events',EventController::class);
Route::apiResource('events.attendees',AttendeeController::class)
    ->scoped()->except(['update'])
;//->scoped(['attendee' => 'event']); //php artisan route:list






// Auth routes
Route::post('/reset-pin' ,[AuthController::class ,'resetPin']);
Route::post('/verify-otp' ,[AuthController::class ,'verifyOtp']);
Route::post('/forget-pin' ,[AuthController::class ,'forgetPin']);
Route::post('/login' ,[AuthController::class ,'login']);
Route::post('/signup' ,[AuthController::class ,'signup']);
Route::post('/logout' ,[AuthController::class ,'logout'])->middleware(['auth:sanctum']);

// Public routes
Route::get('books', [BookController::class, "getBooks"]);
Route::get('/books/{subjectId}', [BookController::class, 'getBookDetails']);
Route::get('/filter-books', [BookController::class, 'filterBooks']);
Route::get('subject-filters',[ LevelController::class,"filters"]);
Route::apiResource('levels', LevelController::class);