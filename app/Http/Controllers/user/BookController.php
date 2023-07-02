<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\user\BookService;

class BookController extends Controller
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
      return view('user.book-details', [
         'bookDetails' => $bookDetails['book'], 
         'bookStatus' => $bookDetails['bookStatus'],
         'isBookmarked' => $bookDetails['isBookmarked']
      ]);
   }

   public function bookmarks() {
      $bookmarks = $this->bookService->fetchBookmarks();
      return view('user.bookmarks', ['bookmarks' => $bookmarks]);
   }

   public function bookmark(Request $request) {
      $this->bookService->addToBookmark($request);
      return response()->json(['message' => 'Added to bookmark!'], 200);
   }

   public function removeBookmark(Request $request) {
      $this->bookService->removeBookmark($request);
      return response()->json(['message' => 'Removed from bookmark!'], 200);
   }
}
