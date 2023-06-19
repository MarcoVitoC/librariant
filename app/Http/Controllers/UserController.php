<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\user\BookService;

class UserController extends Controller
{
   private $bookService;

   public function __construct() {
      $this->bookService = new BookService;
   }

   public function index() {
      $books = $this->bookService->fetchBooks();
      return view('user.index', ['books' => $books]);
   }

   public function bookDetails($id) {
      $bookDetails = $this->bookService->fetchBookDetails($id);
      return view('user.book-details', ['bookDetails' => $bookDetails]);
   }
}
