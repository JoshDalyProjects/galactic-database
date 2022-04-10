<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpacecraftController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

// API route for logout user
Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Index for spacecrafts
Route::get('spacecraft', 'SpacecraftController@index');
// Displays information about individual spacecrafts
Route::get('spacecraft/{id}', 'SpacecraftController@show');
// Creates spacecraft
Route::post('spacecraft', 'SpacecraftController@store');
// Updates spacecraft
Route::patch('spacecraft/{id}', 'SpacecraftController@update');
// Deletes spacecraft
Route::delete('spacecraft/{id}', 'SpacecraftController@delete');
