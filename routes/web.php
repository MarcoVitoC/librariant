<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\BookController as UserBookController;
use App\Http\Controllers\user\LoanController;
use App\Http\Controllers\librarian\LibrarianController;
use App\Http\Controllers\librarian\BookController as LibrarianBookController;

Route::middleware(['visitor'])->group(function() {
   Route::get('/about-us', function() {
      return view('visitor.about-us');
   })->name('visitor.about_us');

   Route::get('/faq', function() {
      return view('visitor.faq');
   })->name('visitor.faq');
});

Route::middleware(['guest'])->group(function() {
   Route::get('/', [GuestController::class, 'welcome'])->name('guest.welcome');
   Route::get('/books', [GuestController::class, 'books'])->name('guest.books');

   Route::get('/login', [LoginController::class, 'login'])->name('login');
   Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

   Route::get('/register', [RegisterController::class, 'register'])->name('register');
   Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
});

Route::middleware(['auth'])->group(function() {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['user'])->prefix('/user')->group(function() {
   Route::get('/', [UserBookController::class, 'index'])->name('user.home');
   Route::get('/book-details/{id}', [UserBookController::class, 'bookDetails'])->name('user.book_details');
   Route::post('/make-loan', [LoanController::class, 'makeLoan'])->name('user.make_loan');
});

Route::middleware(['librarian'])->prefix('/librarian')->group(function() {
   Route::get('/', [LibrarianController::class, 'dashboard'])->name('librarian.dashboard');
   
   Route::get('/books', [LibrarianBookController::class, 'showBooks'])->name('librarian.books');
   Route::get('/book-details', [LibrarianBookController::class, 'showBookDetails'])->name('librarian.book_details');
   Route::post('/add-book', [LibrarianBookController::class, 'addBook'])->name('librarian.add_book');
   Route::put('/update-book', [LibrarianBookController::class, 'updateBook'])->name('librarian.update_book');
   Route::delete('/remove-book', [LibrarianBookController::class, 'removeBook'])->name('librarian.remove_book');

   Route::get('/transactions', [LibrarianController::class, 'transactions'])->name('librarian.transactions');
   Route::get('/reservations', [LibrarianController::class, 'reservations'])->name('librarian.reservations');
   Route::get('/users', [LibrarianController::class, 'users'])->name('librarian.users');
   Route::get('/settings', [LibrarianController::class, 'settings'])->name('librarian.settings');
   Route::get('/supports', [LibrarianController::class, 'supports'])->name('librarian.supports');
});