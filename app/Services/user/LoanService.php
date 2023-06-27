<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;

class LoanService {
   public function makeLoan($request) {
      $loanHeader = LoanHeader::create(['user_id' => auth()->id()]);
      $book = Book::find($request->book_id);

      $loanDueDate = Carbon::parse($loanHeader->loan_date)->addWeeks(2);

      $loanDetail = LoanDetail::create([
         'loan_header_id' => $loanHeader->id,
         'book_id' => $book->id,
         'loan_due_date' => $loanDueDate,
         'loan_returned_date' => $loanDueDate
      ]);

      if ($book->quantity > 0) {
         $book->quantity -= 1;
         $book->save();
      }else {
         $loanDetail->status_id = 1; // change the loan status to 'Queued' if the book is out of stock
         $loanDetail->save();
      }

      return $loanDetail;
   }

   public function returnBook($request) {
      $book = Book::find($request->book_id);

      $loan = LoanDetail::whereHas('loanHeader', function ($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $book->id)->first();
      
      $loan->loan_returned_date = Carbon::now();
      $loan->status_id = 3;
      $loan->save();

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