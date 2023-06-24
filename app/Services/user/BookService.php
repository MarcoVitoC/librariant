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
      $bookStatus = LoanHeader::with('loanDetails')
                     ->join('loan_details', 'loan_details.loan_header_id', '=', 'loan_headers.id')
                     ->where('user_id', Auth::user()->id)
                     ->where('book_id', $book->id)
                     ->where('status_id', 3)
                     ->first();

      if ($bookStatus) {
         $bookDetails = ['book' => $book, 'bookStatus' => $bookStatus->status_id];
      }else {
         $bookDetails = ['book' => $book, 'bookStatus' => 3];
      }
      return $bookDetails;
   }
}