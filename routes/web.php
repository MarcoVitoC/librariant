<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\BookController as UserBookController;
use App\Http\Controllers\user\LoanController as UserLoanController;
use App\Http\Controllers\librarian\BookController as LibrarianBookController;
use App\Http\Controllers\librarian\LoanController as LibrarianLoanController;
use App\Http\Controllers\librarian\UserController;
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
   Route::get('/search-book', [GuestController::class, 'search'])->name('guest.search_book');
   Route::get('/book-details/{id}', [GuestController::class, 'bookDetails'])->name('guest.book_details');

   Route::get('/login', [LoginController::class, 'login'])->name('login');
   Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

   Route::get('/register', [RegisterController::class, 'register'])->name('register');
   Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
});

Route::middleware(['auth'])->group(function() {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['user'])->prefix('/user')->name('user.')->group(function() {
   Route::get('/', [UserBookController::class, 'index'])->name('home');
   Route::get('/search-book', [UserBookController::class, 'search'])->name('search_book');
   Route::get('/books/book-details/{id}', [UserBookController::class, 'bookDetails'])->name('book_details');
   Route::post('/add-review', [UserBookController::class, 'addReview'])->name('add_review');
   Route::get('/edit-review/{review}', [UserBookController::class, 'editReview'])->name('edit_review');

   Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

   Route::get('/bookmarks', [UserBookController::class, 'bookmarks'])->name('bookmarks');
   Route::post('/add-bookmark', [UserBookController::class, 'addBookmark'])->name('add_bookmark');
   Route::delete('/remove-bookmark', [UserBookController::class, 'removeBookmark'])->name('remove_bookmark');
   
   Route::get('/loans', [UserLoanController::class, 'loans'])->name('loans');
   Route::post('/make-loan', [UserLoanController::class, 'makeLoan'])->name('make_loan');
   Route::post('/enqueue', [UserLoanController::class, 'enqueue'])->name('enqueue');
   Route::delete('/cancel-queue', [UserLoanController::class, 'dequeue'])->name('cancel_queue');
   Route::post('/return-book', [UserLoanController::class, 'returnBook'])->name('return_book');
   Route::post('/renew-loan', [UserLoanController::class, 'loanRenewal'])->name('renew_loan');
});

Route::middleware(['librarian'])->prefix('/librarian')->name('librarian.')->group(function() {
   Route::get('/', function() {
      return view('librarian.dashboard');
   })->name('dashboard');

   Route::get('/book/search-book', [LibrarianBookController::class, 'search'])->name('search_book');
   Route::resource('book', LibrarianBookController::class)->except(['create', 'show']);

   Route::get('/returns', [LibrarianLoanController::class, 'showReturnedBooks'])->name('returns');
   Route::post('/return-confirmation', [LibrarianLoanController::class, 'returnConfirmation'])->name('return_confirmation');
   Route::get('/loans', [LibrarianLoanController::class, 'loans'])->name('loans');

   Route::get('/renewals', [LibrarianLoanController::class, 'renewals'])->name('renewals');
   Route::post('/renewal-confirmation', [LibrarianLoanController::class, 'renewalConfirmation'])->name('renewal_confirmation');

   Route::get('/users', [UserController::class, 'users'])->name('users');

   Route::get('/faq/search-faq', [LibrarianFAQController::class, 'search'])->name('search_faq');
   Route::resource('faq', LibrarianFAQController::class)->except(['create', 'show']);
});