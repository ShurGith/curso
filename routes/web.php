<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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


Route::get('/posts',[PostController::class, 'index'])->name('post.index');
Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
Route::get('/post/show/{post}',[PostController::class, 'show'])->name('post.show');
Route::post('/post/store',[PostController::class, 'store'])->name('post.store');
Route::delete('/post/delete/{post}',[PostController::class, 'destroy'])->name('post.delete');

