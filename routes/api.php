<?php

use App\Http\Controllers\Api\BodyController;
use App\Http\Controllers\Api\CarImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\CarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group.
|
*/

// Authentication routes
Route::post('login', [AuthController::class, 'login'])->name('login');

// Public routes
Route::get('cars', [CarController::class, 'index']); // Get all cars
Route::get('cars/dropdown', [CarController::class, 'dropdown']); // Get dropdown options for cars
Route::get('cars/{id}', [CarController::class, 'show']); // Get details of a specific car
Route::get('bodies', [BodyController::class, 'index']); // Get all body types
Route::post('is_login', [AuthController::class, 'validateToken']); // Check if the user is authenticated

// Protected routes (require authentication)
Route::middleware('auth:api')->group(function () {
    // Car routes
    Route::post('/cars', [CarController::class, 'store']); // Create a new car
    Route::put('/cars/{id}', [CarController::class, 'update']); // Update an existing car
    Route::delete('/cars/{id}', [CarController::class, 'destroy']); // Delete a car

    // Car image routes
    Route::post('/images/store', [CarImageController::class, 'store']); // Upload car images
    Route::delete('/images/{name}', [CarImageController::class, 'destroy']); // Delete a car image

    // Logout route
    Route::post('logout', [LogoutController::class, 'logout']); // Logout user
});

