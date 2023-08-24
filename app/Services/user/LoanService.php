<?php

namespace App\Services\user;

use App\Interfaces\StatusInterface;
use App\Models\Book;
use App\Models\User;
use App\Models\Queue;
use App\Models\Renewal;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoanService implements StatusInterface {
   public function fetchLoans() {
      $loanedBooks = LoanDetail::with(['book', 'loanHeader'])
                     ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id());
                     })->oldest('due_date')->get();

      $unconfirmedReturns = LoanDetail::with('book')
                           ->whereNotNull('returned_date')
                           ->where('status_id', self::RETURN_PENDING)->oldest('returned_date')->get();

      $queues = Queue::with('book')->where('user_id', auth()->id())->oldest()->get();

      $renewableLoans = LoanDetail::with(['book', 'loanHeader'])
                        ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
                           $query->where('user_id', auth()->id())->whereDate('loan_date', '<=', now()->subDays(10));
                        })->whereDoesntHave('renewal', function($query) {
                           $query->whereColumn('loan_detail_id', 'id');
                        })->get();

      return [
         'loanedBooks' => $loanedBooks,
         'unconfirmedReturns' => $unconfirmedReturns,
         'queues' => $queues,
         'renewableLoans' => $renewableLoans
      ];
   }

   public function makeLoan($request) {
      $book = Book::find($request->book_id);

      try {
         DB::beginTransaction();

         $loanHeader = LoanHeader::create(['user_id' => auth()->id()]);
         LoanDetail::create([
            'loan_header_id' => $loanHeader->id,
            'book_id' => $book->id,
            'due_date' => Carbon::parse($loanHeader->loan_date)->addWeeks(2)
         ]);

         $user = User::find(auth()->id());
         $user->increment('books_borrowed');
         
         $book->decrement('quantity');

         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function enqueue($request) {
      try {
         DB::beginTransaction();

         Queue::create(['user_id' => auth()->id(), 'book_id' => $request->book_id]);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function cancelQueue($request) {
      $queue = Queue::find($request->queue_id);

      try {
         DB::beginTransaction();

         $queue->delete();
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function returnBook($request) {
      $loan = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $request->book_id)->whereIn('status_id', [self::LOANED, self::RENEWED])->first();

      try {
         DB::beginTransaction();
         
         $loan->returned_date = now();
         $loan->status_id = self::RETURN_PENDING;
         $loan->save();

         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function renewLoan($request) {
      $loanRenewal = $request->validated();

      try {
         DB::beginTransaction();

         Renewal::create([
            'user_id' => auth()->id(),
            'loan_detail_id' => $request->selected_loan,
            'renewal_date' => now(),
            'renewed_due_date' => $loanRenewal['renewed_due_date']
         ]);

         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }
}