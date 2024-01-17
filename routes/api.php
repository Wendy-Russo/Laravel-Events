<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\EventUserController;

Route::apiResource("users", UserController::class); // Les routes "users.*" de l'API
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

// Event routes
Route::apiResource('events', EventController::class);

// User routes
Route::apiResource('users', UserController::class);

// EventUser routes
Route::post('/users/{user}/events/{event}/register', [EventUserController::class, 'register']);
Route::delete('/users/{user}/events/{event}/unregister', [EventUserController::class, 'unregister']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
