<?php

use App\Models\GermanWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Create
Route::post('/addRestaurant', [RestaurantController::class, 'store']);
// Read
Route::get('/restaurants', [RestaurantController::class, 'index']);
// Update
Route::put('/restaurants/{restaurant}', [RestaurantController::class, 'update']);
// Delete
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);

// get words
Route::any('/german_words', function () {
    return [GermanWord::where('correctAnswersCount','<=', 10)->get()->shuffle(), GermanWord::where('correctAnswersCount','<=', 10)->get()->count()];
});
Route::any('/german_words_only', function () {
    return GermanWord::select('german_word')->get()->pluck('german_word')->shuffle();
});
// routes/api.php
Route::post('/german-words/{id}', 'App\Http\Controllers\GermanWordController@updateCorrect');
