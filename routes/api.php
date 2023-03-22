<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('insert', [userController::class, 'insert']);
Route::get('/show', [UserController::class, 'show']);
Route::get('/show/{id}', [UserController::class, 'show']);


Route::get('edit/{id}', [UserController::class, 'edit']); 
Route::put('/update/{id}', [userController::class, 'update']);

Route::get('/getIdeas', [UserController::class, 'getIdeas']);

Route::put('/status/{id}/{status}', [UserController::class, 'status']);

Route::get('/validIdea', [UserController::class, 'validIdea']);


Route::delete('/delete/{id}', [UserController::class, 'delete']);



// Route::get('/participant/{email}',  userController::class, 'getParticipantsIdea' );

