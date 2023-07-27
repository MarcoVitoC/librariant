<?php

namespace App\Services\librarian;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService {
   public function showBooks() {
      return Book::paginate(10)->withQueryString();
   }
   
   public function addBook($request) {
      $newBook = $request->validated();

      $newBook["book_photo"] = $request->file('book_photo')->store('book-photos');
      $book = Book::create($newBook);

      return $book;
   }

   public function updateBook($request, $book) {
      $updatedBook = $request->validated();
      
      if ($request->file('book_photo')) {
         $updatedBook['book_photo'] = $request->file('book_photo')->store('book-photos');
         Storage::delete($request->oldBookPreview);
      }
      
      $book->update($updatedBook);
   }

   public function removeBook($book) {
      Storage::delete($book->book_photo);
      $book->delete();
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_input.'%')->paginate(10);
   }
}