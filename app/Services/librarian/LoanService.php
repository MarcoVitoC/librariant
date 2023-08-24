<?php

namespace App\Services\librarian;

use App\Interfaces\StatusInterface;
use App\Models\Book;
use App\Models\User;
use App\Models\Queue;
use App\Models\Renewal;
use App\Models\LoanDetail;
use App\Models\LoanHeader;
use App\Models\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoanService implements StatusInterface {
   public function fetchDashboardData() {
      $booksTotal = Book::count();
      $loansTotal = LoanDetail::whereNull('returned_date')->whereIn('status_id', [self::LOANED, self::RENEWED])->count();
      $renewalsTotal = Renewal::count();
      $returnsTotal = LoanDetail::whereNotNull('returned_date')->where('status_id', self::RETURN_PENDING)->count();

      return [
         'booksTotal' => $booksTotal,
         'loansTotal' => $loansTotal,
         'renewalsTotal' => $renewalsTotal, 
         'returnsTotal' => $returnsTotal
      ];
   }

   public function fetchReturnedBooks() {
      $returnedBooks = LoanDetail::with(['book', 'loanHeader.user'])
                        ->whereNotNull('returned_date')->where('status_id', self::RETURN_PENDING)->paginate(10);
      return $returnedBooks;
   }

   public function confirmReturnedBook($request) {
      $returnedBook = LoanDetail::with(['book', 'loanHeader'])
                        ->whereNotNull('returned_date')->where('id', $request->loan_detail_id)->first();

      try {
         DB::beginTransaction();

         Notification::create([
            'user_id' => $returnedBook->loanHeader->user_id,
            'content' => '✅ Your "'.$returnedBook->book->book_title.'" returned book has been successfully verified.'
         ]);
   
         $returnedBook->status_id = self::RETURNED;
         $returnedBook->save();

         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }

      $queue = Queue::with('book')->where('book_id', $request->book_id)->oldest()->first();
      $book = Book::find($request->book_id);

      try {
         DB::beginTransaction();

         if ($queue != null) {
            $loanHeader = LoanHeader::create(['user_id' => $queue->user_id]);
            LoanDetail::create([
               'loan_header_id' => $loanHeader->id,
               'book_id' => $book->id,
               'due_date' => Carbon::parse($loanHeader->loan_date)->addWeeks(2)
            ]);
   
            $user = User::find($queue->user_id);
            $user->increment('books_borrowed');
   
            Notification::create([
               'user_id' => $queue->user_id,
               'content' => '🎉 Your queue for the book "'.$queue->book->book_title.'" can now be borrowed.'
            ]);
   
            $queue->delete();
         }else {
            $book->increment('quantity');
         }

         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function showLoans() {
      $loanedBooks = LoanDetail::with(['book', 'loanHeader.user'])
                     ->whereNull('returned_date')->whereIn('status_id', [self::LOANED, self::RENEWED])->oldest('due_date')->paginate(10);
      return $loanedBooks;
   }

   public function fetchRenewalRequests() {
      return Renewal::with(['user', 'loanDetail.loanHeader', 'loanDetail.book'])->paginate(10);
   }
 
   public function confirmRenewal($request) {
      $renewedLoan = LoanDetail::where('id', $request->loan_detail_id)->first();
      $renewal = Renewal::with('loanDetail.book')->where('id', $request->renewal_id)->first();

      try {
         DB::beginTransaction();
         
         $renewedLoan->status_id = self::RENEWED;
         $renewedLoan->due_date = $renewal->renewed_due_date;
         $renewedLoan->save();

         Notification::create([
            'user_id' => $renewal->user_id,
            'content' => '🎉 Your renewal request for the book "'.$renewal->loanDetail->book->book_title.'" has been verified.'
         ]);

         $renewal->delete();
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }
}