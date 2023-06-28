<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\User;
use App\Models\Queue;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;

class LoanService {
   public function makeLoan($request) {
      $book = Book::find($request->book_id);

      $loanHeader = LoanHeader::create(['user_id' => auth()->id()]);
      $loanDetail = LoanDetail::create([
         'loan_header_id' => $loanHeader->id,
         'book_id' => $book->id,
         'due_date' => Carbon::parse($loanHeader->loan_date)->addWeeks(2)
      ]);

      $user = User::find(auth()->id());
      $user->books_borrowed += 1;
      $user->save();
      
      $book->quantity -= 1;
      $book->save();

      return $loanDetail;
   }

   public function enqueue($request) {
      $book = Book::find($request->book_id);
      Queue::create(['user_id' => auth()->id(), 'book_id' => $book->id]);
   }

   public function returnBook($request) {
      $book = Book::find($request->book_id);

      $loan = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $book->id)->first();
      $loan->returned_date = Carbon::now();
      $loan->save();
   }
}