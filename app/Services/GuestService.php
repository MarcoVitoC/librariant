<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Review;

class GuestService {
   public function fetchSomeBooks() {
      return Book::all()->take(5);
   }

   public function fetchAllBooks() {
      return Book::paginate(12)->withQueryString();
   }

   public function fetchBookDetails($id) {
      $reviews = Review::where('book_id', $id)->get();
      $book = Book::find($id);

      return ['book' => $book, 'reviews' => $reviews];
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(12);
   }
}