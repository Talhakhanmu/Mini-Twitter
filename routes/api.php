<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
/*
ALLE ROUTES IN DIESEM FILE SIND MIT DEM PRÄFIX /api ERREICHBAR
*/

Route::get("/test-me", function () {
    return 'Hallo vom Laravel Backend!';
});
Route::get('/tweets', [TweetController::class, 'index']);
Route::post('/tweets', [TweetController::class, 'store']);
Route::put('/tweets/{id}', [TweetController::class, 'update']); 
Route::delete('/tweets/{id}', [TweetController::class, 'destroy']); 
Route::get('/tweets/{id}', [TweetController::class, 'edit']); 
Route::get('/tweets/{id}', [TweetController::class, 'show']);
