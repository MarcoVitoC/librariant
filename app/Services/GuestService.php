<?php

namespace App\Services;

use App\Models\Book;

class GuestService {
   public function fetchBooks() {
      return Book::all();
   }
}