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

      $loanDueDate = Carbon::parse($loanHeader->loan_date)->addWeeks(2);
      
      if ($book->quantity > 0) {
         $book->quantity -= 1;
         $book->save();
      }else {
         $loanHeader->status_id = 1; // change the loan status to 'Queued' if the book is out of stock
         $loanHeader->save();
      }

      $loanDetail = LoanDetail::create([
         'loan_header_id' => $loanHeader->id,
         'book_id' => $book->id,
         'loan_due_date' => $loanDueDate,
         'loan_returned_date' => $loanDueDate
      ]);

      return $loanDetail;
   }
}