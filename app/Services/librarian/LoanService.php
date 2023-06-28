<?php

namespace App\Services\librarian;

use App\Models\Book;
use App\Models\User;
use App\Models\Queue;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;

class LoanService {
   public function fetchReturnedBooks() {
      $returnedBooks = LoanDetail::with(['book', 'loanHeader.user'])
                        ->whereNotNull('returned_date')
                        ->where('status_id', 0)
                        ->get();
      return $returnedBooks;
   }

   public function confirmReturnedBook($request) {
      $returnedBook = LoanDetail::with('loanHeader')
                        ->whereNotNull('returned_date')
                        ->where('id', $request->loan_detail_id)
                        ->first();

      $returnedBook->status_id = 1;
      $returnedBook->save();

      $queue = Queue::where('book_id', $request->book_id)->oldest()->first();
      $book = Book::find($request->book_id);
      if ($queue != null) {
         $loanHeader = LoanHeader::create(['user_id' => $queue->user_id]);
         LoanDetail::create([
            'loan_header_id' => $loanHeader->id,
            'book_id' => $book->id,
            'due_date' => Carbon::parse($loanHeader->loan_date)->addWeeks(2)
         ]);

         $user = User::find($queue->user_id);
         $user->books_borrowed += 1;
         $user->save();

         $queue->delete();
      }else {
         $book->quantity += 1;
         $book->save();
      }
   }

   public function showLoans() {
      $loanedBooks = LoanDetail::with(['book', 'loanHeader.user'])
                     ->whereNull('returned_date')
                     ->where('status_id', 0)
                     ->get();
      return $loanedBooks;
   }
}