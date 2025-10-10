<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [RegisteredUserController::class, 'editUser'])->name('users.edit');
    Route::get('/register-users', [RegisteredUserController::class, 'create'])->name('register-users.create');
    Route::post('/register-users', [RegisteredUserController::class, 'store'])->name('register-users.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
