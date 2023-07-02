<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\Queue;
use App\Models\Bookmark;
use App\Models\LoanDetail;
use App\Models\LoanHeader;

class BookService {
   public function fetchBooks() {
      return Book::paginate(18)->withQueryString();
   }

   public function fetchBookDetails($id) {
      $book = Book::find($id);
      $loan = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $book->id)->latest()->first();

      $bookStatus = ($loan != null && $loan->status_id === 0) ? 'loaned' : 'available';
      $queue = Queue::where('user_id', auth()->id())->where('book_id', $book->id)->first();
      if ($queue != null) {
         $bookStatus = 'queued';
      }else if ($loan != null && $loan->returned_date != null && $loan->status_id === 0) {
         $bookStatus = 'pending';
      }

      $bookmark = Bookmark::where('user_id', auth()->id())->where('book_id', $book->id)->first();
      $isBookmarked = ($bookmark != null) ? true : false;

      $bookDetails = ['book' => $book, 'bookStatus' => $bookStatus, 'isBookmarked' => $isBookmarked];
      return $bookDetails;
   }

   public function fetchBookmarks() {
      return Bookmark::with('book')->where('user_id', auth()->id())->paginate(18);
   }

   public function addToBookmark($request) {
      Bookmark::create(['user_id' => auth()->id(), 'book_id' => $request->book_id]);
   }

   public function removeBookmark($request) {
      $selectedBook = Bookmark::where('user_id', auth()->id())->where('book_id', $request->book_id)->first();
      $selectedBook->delete();
   }
}