<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\librarian\UserController;
use App\Http\Controllers\user\BookController as UserBookController;
use App\Http\Controllers\user\LoanController as UserLoanController;
use App\Http\Controllers\librarian\BookController as LibrarianBookController;
use App\Http\Controllers\librarian\LoanController as LibrarianLoanController;
use App\Http\Controllers\librarian\FAQController as LibrarianFAQController;

Route::middleware(['visitor'])->group(function() {
   Route::get('/about-us', function() {
      return view('visitor.about-us');
   })->name('visitor.about_us');

   Route::get('/faq', [FAQController::class, 'faq'])->name('visitor.faq');
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

   Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');

   Route::get('/bookmarks', [UserBookController::class, 'bookmarks'])->name('user.bookmarks');
   Route::post('/add-bookmark', [UserBookController::class, 'bookmark'])->name('user.add_bookmark');
   Route::delete('/remove-bookmark', [UserBookController::class, 'removeBookmark'])->name('user.remove_bookmark');
   
   Route::get('/loans', [UserLoanController::class, 'loans'])->name('user.loans');
   Route::post('/make-loan', [UserLoanController::class, 'makeLoan'])->name('user.make_loan');
   Route::post('/enqueue', [UserLoanController::class, 'enqueue'])->name('user.enqueue');
   Route::delete('/cancel-queue', [UserLoanController::class, 'dequeue'])->name('user.cancel_queue');
   Route::post('/return-book', [UserLoanController::class, 'returnBook'])->name('user.return_book');
});

Route::middleware(['librarian'])->prefix('/librarian')->group(function() {
   Route::get('/', function() {
      return view('librarian.dashboard');
   })->name('librarian.dashboard');
   
   Route::get('/books', [LibrarianBookController::class, 'showBooks'])->name('librarian.books');
   Route::get('/book-details', [LibrarianBookController::class, 'showBookDetails'])->name('librarian.book_details');
   Route::post('/add-book', [LibrarianBookController::class, 'addBook'])->name('librarian.add_book');
   Route::put('/update-book', [LibrarianBookController::class, 'updateBook'])->name('librarian.update_book');
   Route::delete('/remove-book', [LibrarianBookController::class, 'removeBook'])->name('librarian.remove_book');

   Route::get('/returns', [LibrarianLoanController::class, 'showReturnedBooks'])->name('librarian.returns');
   Route::post('/return-confirmation', [LibrarianLoanController::class, 'returnConfirmation'])->name('librarian.return_confirmation');
   Route::get('/loans', [LibrarianLoanController::class, 'loans'])->name('librarian.loans');

   Route::get('/users', [UserController::class, 'users'])->name('librarian.users');

   Route::get('/supports', [LibrarianFAQController::class, 'faq'])->name('librarian.supports');
});