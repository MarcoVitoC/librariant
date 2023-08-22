<?php

namespace App\Services\librarian;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookService {
   public function showBooks() {
      return Book::paginate(10)->withQueryString();
   }
   
   public function addBook($request) {
      $newBook = $request->validated();

      $newBook["book_photo"] = $request->file('book_photo')->store('book-photos');

      try {
         DB::beginTransaction();
         
         $book = Book::create($newBook);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }

      return $book;
   }

   public function updateBook($request, $book) {
      $updatedBook = $request->validated();

      if ($request->file('book_photo')) {
         $updatedBook['book_photo'] = $request->file('book_photo')->store('book-photos');
         Storage::delete($request->oldBookPreview);
      }

      try {
         DB::beginTransaction();

         $book->update($updatedBook);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function removeBook($book) {
      Storage::delete($book->book_photo);

      try {
         DB::beginTransaction();
         
         $book->delete();
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(10);
   }
}