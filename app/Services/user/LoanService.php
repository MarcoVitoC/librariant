<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoanService {
   public function makeLoan($request) {
      $loanHeader = LoanHeader::create(['user_id' => Auth::user()->id]);

      $book = Book::find($request->book_id);
      if ($book->quantity > 0) {
         $loanHeader->status_id = 2; // change the loan status to 'Loaned' if the book's quantity is still available
         $loanHeader->save();

         $book->quantity -= 1; // reduce the book's quantity
         $book->save();
      }

      $loanDueDate = Carbon::parse($loanHeader->loan_date)->addWeeks(2);
      $loanDetail = LoanDetail::create([
         'loan_header_id' => $loanHeader->id,
         'book_id' => $book->id,
         'loan_due_date' => $loanDueDate
      ]);

      return $loanDetail;
   }
}