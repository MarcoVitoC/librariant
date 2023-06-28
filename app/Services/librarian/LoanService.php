<?php

namespace App\Services\librarian;

use App\Models\Book;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;

class LoanService {
   public function fetchReturnedBooks() {
      $returnedBooks = LoanDetail::with(['book', 'loanHeader.user'])->whereNotNull('returned_date')->get();
      return $returnedBooks;
   }

   public function confirmReturnedBook($request) {
      $book = Book::find($request->book_id);
      $returnedBooks = LoanDetail::with('loanHeader')->whereNotNull('returned_date')->get();

      foreach ($returnedBooks as $returnedBook) {
         $returnedBook['is_returned'] = true;
      }
      // $queueLoan = LoanHeader::with('loanDetails')
      //             ->join('loan_details', 'loan_details.loan_header_id', '=', 'loan_headers.id')
      //             ->where('book_id', $book->id)
      //             ->where('status_id', 1)
      //             ->first('loan_date');
      // if ($queueLoan != null) {
      //    $queueLoan->loan_date = $loan->loan_details->loan_returned_date;
      //    $queueLoan->status_id = 2;
      //    $queueLoan->save();

      //    $queueLoan->loan_details->loan_due_date = Carbon::parse($queueLoan->loan_date)->addWeeks(2);
      //    $queueLoan->loan_details->loan_returned_date = $queueLoan->loan_details->loan_due_date;
      //    $queueLoan->loan_details->save();
      // }else {
      //    $book->quantity += 1;
      //    $book->save();
      // }
   }
}