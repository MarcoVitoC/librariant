<?php

namespace App\Services\librarian;

use App\Models\Book;

class BookService {
   public function addBook($request) {
      $newBook = $request->validated();
      $book = Book::create($newBook);

      return $book;
   }
}