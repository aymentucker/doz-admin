<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesPodcastController;
use App\Http\Controllers\Api\PodcastsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories-podcast', CategoriesPodcastController::class);
Route::apiResource('podcasts', PodcastsController::class);

