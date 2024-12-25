<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesPodcastController;
use App\Http\Controllers\Api\PodcastsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories-podcast', CategoriesPodcastController::class);

// Fetch all podcasts
Route::get('/podcasts', [PodcastsController::class, 'index']);

// Store a new podcast
Route::post('/podcasts', [PodcastsController::class, 'store']);

// Fetch a single podcast
Route::get('/podcasts/{id}', [PodcastsController::class, 'show']);

// Update a podcast
Route::put('/podcasts/{id}', [PodcastsController::class, 'update']);

// Delete a podcast
Route::delete('/podcasts/{id}', [PodcastsController::class, 'destroy']);

// Fetch podcasts by category
Route::get('/categories/{categoryId}/podcasts', [PodcastsController::class, 'getByCategory']);

// Fetch episodes for a podcast
Route::get('/podcasts/{podcastId}/episodes', [PodcastsController::class, 'getEpisodes']);

// Fetch episodes for a podcast and save them
Route::post('/podcasts/{podcast}/fetch-episodes', [PodcastsController::class, 'fetchEpisodes']);
