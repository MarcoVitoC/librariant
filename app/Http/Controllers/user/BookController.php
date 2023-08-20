<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Services\user\BookService;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
   private $bookService;

   public function __construct() {
      $this->bookService = new BookService;
   }

   public function index() {
      $indexData = $this->bookService->fetchIndexDatas();
      return view('user.index', [
         'loans' => $indexData['loans'], 
         'books' => $indexData['books'], 
         'lateReturns' => $indexData['lateReturns']
      ]);
   }

   public function bookDetails($id) {
      $bookDetails = $this->bookService->fetchBookDetails($id);
      return view('user.book-details', [
         'bookDetails' => $bookDetails['book'], 
         'isLoaned' => $bookDetails['isLoaned'], 
         'bookStatus' => $bookDetails['bookStatus'],
         'isBookmarked' => $bookDetails['isBookmarked']
      ]);
   }

   public function bookmarks() {
      $bookmarks = $this->bookService->fetchBookmarks();
      return view('user.bookmarks', ['bookmarks' => $bookmarks]);
   }

   public function search(Request $request) {
      $searchedBook = $this->bookService->searchBook($request);
      return response()->json(['searchedBook' => $searchedBook]);
   }
}