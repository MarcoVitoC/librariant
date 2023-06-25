<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\LoanHeader;
use Illuminate\Support\Facades\Auth;

class BookService {
   public function fetchBooks() {
      return Book::paginate(18)->withQueryString();
   }

   public function fetchBookDetails($id) {
      $book = Book::find($id);
      $loan = LoanHeader::with('loanDetails')
               ->join('loan_details', 'loan_details.loan_header_id', '=', 'loan_headers.id')
               ->where('user_id', Auth::user()->id)
               ->where('book_id', $book->id)
               ->first();

      $bookStatus = ($loan != null) ? $loan->status_id : 3;
      $bookDetails = ['book' => $book, 'bookStatus' => $bookStatus];

      return $bookDetails;
   }
}