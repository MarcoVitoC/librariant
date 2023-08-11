<?php

namespace App\Services;

use App\Models\Book;

class GuestService {
   public function fetchSomeBooks() {
      return Book::all()->take(5);
   }

   public function fetchAllBooks() {
      return Book::paginate(12)->withQueryString();
   }

   public function fetchBookDetails($id) {
      return Book::find($id);
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(12);
   }
}