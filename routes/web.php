<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibrarianController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function() {
   Route::get('/', [GuestController::class, 'welcome'])->name('welcome');

   Route::get('/login', [LoginController::class, 'login'])->name('login');
   Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

   Route::get('/register', [RegisterController::class, 'register'])->name('register');
   Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
});

Route::middleware(['auth'])->group(function() {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['user'])->prefix('/user')->group(function() {
   Route::get('/', [UserController::class, 'index'])->name('user.home');
});

Route::middleware(['librarian'])->prefix('/librarian')->group(function() {
   Route::get('/', [LibrarianController::class, 'index'])->name('librarian.home');
});