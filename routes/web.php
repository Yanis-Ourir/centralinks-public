<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/feed', [FeedController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('feed');

Route::get('/feed/{category}', [CategoryController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('feed.category');

Route::resource('categories', \App\Http\Controllers\CategoryController::class)
    ->middleware(['auth'])
    ->except(['show']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->middleware(['auth'])
    ->name('categories.show');

Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('categories.store');


Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->middleware(['auth'])
    ->name('categories.edit');

Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->middleware(['auth'])
    ->name('categories.update');




require __DIR__.'/auth.php';
