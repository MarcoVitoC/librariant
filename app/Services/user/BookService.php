<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\LoanDetail;
use App\Models\LoanHeader;

class BookService {
   public function fetchBooks() {
      return Book::paginate(18)->withQueryString();
   }

   public function fetchBookDetails($id) {
      $book = Book::find($id);
      $loan = LoanDetail::whereHas('loanHeader', function ($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $book->id)
               ->first();
      
      $bookStatus = ($loan != null) ? $loan->status_id : 3;
      $bookDetails = ['book' => $book, 'bookStatus' => $bookStatus];

      return $bookDetails;
   }
}