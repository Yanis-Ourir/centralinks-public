<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LinkController;
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

Route::resource('categories', CategoryController::class)
    ->middleware(['auth'])
    ->except(['show']);

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->middleware(['auth'])
    ->name('categories.show');

Route::post('/categories', [CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('categories.store');


Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->middleware(['auth'])
    ->name('categories.edit');

Route::patch('/categories/{category}', [CategoryController::class, 'update'])
    ->middleware(['auth'])
    ->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('categories.destroy');

Route::get('/links', [LinkController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('links.create');

Route::post('/links', [LinkController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('links.store');



require __DIR__.'/auth.php';
