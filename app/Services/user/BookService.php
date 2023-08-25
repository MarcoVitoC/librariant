<?php

namespace App\Services\user;

use App\Interfaces\StatusInterface;
use App\Models\Book;
use App\Models\Queue;
use App\Models\Bookmark;
use App\Models\LoanDetail;

class BookService implements StatusInterface {
   public function fetchIndexDatas() {
      $loans = $this->getLoans();
      $books = Book::paginate(12)->withQueryString();
      $lateReturns = $this->getLateReturns();

      return ['loans' => $loans, 'books' => $books, 'lateReturns' => $lateReturns];
   }

   public function fetchBookDetails($id) {
      $book = Book::find($id);
      $loan = $this->getLatestLoanByBook($book);
      $isLoaned = ($loan != null && in_array($loan->status_id, [self::LOANED, self::RENEWED]));
      $bookStatus = $this->checkBookStatus($book, $loan);

      $bookDetails = [
         'book' => $book, 
         'isLoaned' => $isLoaned,
         'bookStatus' => $bookStatus, 
         'isBookmarked' => $this->isBookmarked($book)
      ];
      
      return $bookDetails;
   }

   public function fetchBookmarks() {
      return Bookmark::with('book')->where('user_id', auth()->id())->paginate(18);
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(12);
   }

   private function getLoans() {
      return LoanDetail::whereHas('loanHeader', function($query) {
         $query->where('user_id', auth()->id());
      })->whereIn('status_id', [self::LOANED, self::RENEWED])->get();
   }

   private function getLateReturns() {
      return LoanDetail::with(['book', 'loanHeader'])
      ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
         $query->where('user_id', auth()->id())->whereDate('due_date', '<', now());
      })->get();
   }

   private function getLatestLoanByBook($book) {
      return LoanDetail::whereHas('loanHeader', function($query) {
         $query->where('user_id', auth()->id());
      })->where('book_id', $book->id)->latest()->first();
   }

   private function isQueued($book) {
      return Queue::where('user_id', auth()->id())->where('book_id', $book->id)->count();
   }

   private function checkBookStatus($book, $loan) {
      $hasLateReturns = $this->getLateReturns()->count();
      $isQueued = $this->isQueued($book);
      $isReturnPending = ($loan != null && $loan->status_id === self::RETURN_PENDING);
      $borrowAmount = $this->getLoans()->count();

      $bookStatus = '';
      if ($hasLateReturns) {
         $bookStatus = 'denied';
      }else if ($isQueued) {
         $bookStatus = 'queued';
      }else if ($isReturnPending) {
         $bookStatus = 'pending';
      }else if ($borrowAmount === 8) {
         $bookStatus = 'limited';
      }

      return $bookStatus;
   }

   private function isBookmarked($book) {
      return Bookmark::where('user_id', auth()->id())->where('book_id', $book->id)->count();
   }
}