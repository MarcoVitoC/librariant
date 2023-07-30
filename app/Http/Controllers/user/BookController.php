<?php

namespace App\Http\Controllers\user;

use App\Models\Review;
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
      return view('user.index', ['loans' => $indexData['loans'], 'books' => $indexData['books']]);
   }

   public function bookDetails($id) {
      $bookDetails = $this->bookService->fetchBookDetails($id);
      return view('user.book-details', [
         'bookDetails' => $bookDetails['book'], 
         'bookStatus' => $bookDetails['bookStatus'],
         'isBookmarked' => $bookDetails['isBookmarked'],
         'review' => $bookDetails['review']
      ]);
   }

   public function bookmarks() {
      $bookmarks = $this->bookService->fetchBookmarks();
      return view('user.bookmarks', ['bookmarks' => $bookmarks]);
   }

   public function addBookmark(Request $request) {
      $this->bookService->addToBookmark($request);
      return response()->json(['message' => 'Added to bookmark!'], 200);
   }

   public function removeBookmark(Request $request) {
      $this->bookService->removeBookmark($request);
      return response()->json(['message' => 'Removed from bookmark!'], 200);
   }

   public function search(Request $request) {
      $searchedBook = $this->bookService->searchBook($request);
      return response()->json(['searchedBook' => $searchedBook]);
   }

   public function addReview(Request $request) {
      $this->bookService->addReview($request);
      return response()->json(['message' => 'Review added successfully!'], 200);
   }

   public function editReview(Review $review) {
      return response()->json(['review' => $review]);
   }
}