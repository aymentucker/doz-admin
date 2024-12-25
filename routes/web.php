<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PodcastsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/podcasts', [PodcastsController::class, 'index'])->name('podcasts.index');
Route::get('/podcasts/create', [PodcastsController::class, 'create'])->name('podcasts.create');
Route::post('/podcasts', [PodcastsController::class, 'store'])->name('podcasts.store');
Route::get('/podcasts/{podcast}', [PodcastsController::class, 'show'])->name('podcasts.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
