<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTeamController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

//----------- Route user API--------------
Route::get('users',[UserController::class, 'index']);
Route::post('users',[UserController::class, 'store']);
Route::get('users/{id}',[UserController::class, 'show']);
Route::put('users/{id}',[UserController::class, 'update']);
Route::put('users/{id}',[UserController::class, 'destroy']);


///-----Route Event-------API----------------------------
Route::get('events',[EventController::class, 'index']);
Route::get('events/{id}',[EventController::class, 'show']);
Route::post('events',[EventController::class, 'store']);
Route::put('events/{id}',[EventController::class, 'update']);
Route::delete('events/{id}',[EventController::class, 'destroy']);




///------Route Ticket API-----------------
Route::get('tickets',[TicketController::class, 'index']);
Route::get('tickets/{id}',[TicketController::class, 'show']);
Route::post('tickets',[TicketController::class, 'store']);
Route::put('tickets/{id}',[TicketController::class, 'update']);
Route::delete('tickets/{id}',[TicketController::class, 'destroy']);


///-----------Route Teams--------------------
Route::get('teams',[TeamController::class, 'index']);
Route::get('teams/{id}',[TeamController::class, 'show']);
Route::post('teams',[TeamController::class, 'store']);
Route::put('teams/{id}',[TeamController::class, 'update']);
Route::delete('teams/{id}',[TeamController::class, 'destroy']);






