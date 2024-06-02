<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// All controllers 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

// Products group for all the diffrent routes 
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->middleware('auth:sanctum'); // Get all the products + category id and categoryname
    Route::post('/product', 'store')->middleware('auth:sanctum'); // Post the product to the database
    Route::put('/product/{id}', 'update')->middleware('auth:sanctum'); // Update the product on the database, id is needed to update
    Route::delete('/product/{id}', 'destroy')->middleware('auth:sanctum'); // Delete an product in the database, id is needed to delete
    Route::get('/product/{search}', 'getSearch'); // Search function to search the product_name column in the database 
});

// Categories group for all the difftent routes
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->middleware('auth:sanctum'); // Gets all the categories in the database
    Route::get('/category/{id}', 'show')->middleware('auth:sanctum'); // Gets a specific category from the database, id is needed to update
    Route::post('/category', 'store')->middleware('auth:sanctum'); // Post a new catrgory to the database
    Route::put('/category', 'update')->middleware('auth:sanctum'); // Update a category in the database
    Route::delete('/category/{id}', 'destroy')->middleware('auth:sanctum'); // Delete a category in the database, id is needed to delete
});

// User group for the diffrent routes
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register'); // Adds a new user to the database
    Route::post('/login', 'login'); // Login the user, check if user is in database
    Route::post('/logout', 'logout')->middleware('auth:sanctum'); // Logout the user, deletes the token
});