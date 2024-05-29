<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('articles', ArticleController::class);


Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

// Route to handle the update submission
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');


Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
