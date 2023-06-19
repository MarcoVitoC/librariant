<?php

namespace App\Services\user;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService {
   public function fetchBooks() {
      return Book::paginate(18)->withQueryString();
   }

   public function fetchBookDetails($id) {
      return Book::find($id);
   }
}