<?php

namespace App\Services;

use App\Models\Book;

class GuestService {
   public function fetchSomeBooks() {
      return Book::all()->take(4);
   }

   public function fetchAllBooks() {
      return Book::paginate(12)->withQueryString();
   }

   public function fetchBookDetails($id) {
      return Book::find($id);
   }
}