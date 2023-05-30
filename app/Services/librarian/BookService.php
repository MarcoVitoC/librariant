<?php

namespace App\Services\librarian;

use App\Models\Book;

class BookService {
   public function addBook($request) {
      $newBook = $request->validated();

      $newBook["book_photo"] = $request->file('book_photo')->store('book-photos');
      $book = Book::create($newBook);

      return $book;
   }

   public function showBooks() {
      return Book::all();
   }
}