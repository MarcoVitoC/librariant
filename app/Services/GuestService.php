<?php

namespace App\Services;

use App\Models\Book;

class GuestService {
   public function fetchSomeBooks() {
      return Book::all();
   }

   public function fetchAllBooks() {
      return Book::paginate(12)->withQueryString();
   }
}