<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group(['middleware' => 'auth:sanctum'], function(){
   
    Route::post('/create', [FormController::class, 'create']);

    Route::get('/edit/{id}', [FormController::class, 'edit']);

    Route::put('/update/{id}', [FormController::class, 'update']);
    
    Route::delete('/delete/{id}', [FormController::class, 'delete']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/read', [FormController::class, 'read']);
    
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
