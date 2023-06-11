<?php

namespace App\Services\librarian;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService {
   public function addBook($request) {
      $newBook = $request->validated();

      $newBook["book_photo"] = $request->file('book_photo')->store('book-photos');
      $book = Book::create($newBook);

      return $book;
   }

   public function showBooks() {
      return Book::paginate(10)->withQueryString();
   }

   public function showBookDetails($request) {
      return Book::find($request->id);
   }

   public function updateBook($request) {
      $book = Book::find($request->book_id);
      $updatedBook = $request->validated();
      
      if ($request->file('book_photo')) {
         $updatedBook['book_photo'] = $request->file('book_photo')->store('book-photos');
         Storage::delete($request->oldBookPreview);
      }
      
      $book->update($updatedBook);
   }

   public function removeBook($request) {
      $book = Book::find($request->id);

      Storage::delete($book->book_photo);
      $book->delete();
   }
}