<?php

use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\InfoSessionController;
use App\Http\Controllers\Api\SubscriberController;
use App\Models\InfoSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/attendence/create", [AttendenceController::class, "store"]);
Route::get("/events", [AttendenceController::class, "show"]);

Route::get('/blogs', [BlogController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

Route::post('/subscriber', [SubscriberController::class, 'store']);
Route::post('/cowork', [ContactController::class, 'cowork']);

Route::post('/infosession', [InfoSessionController::class, 'store']);