<?php

namespace App\Services\user;

use App\Interfaces\StatusInterface;
use App\Models\Book;
use App\Models\Queue;
use App\Models\Bookmark;
use App\Models\LoanDetail;

class BookService implements StatusInterface {
   public function fetchIndexDatas() {
      $loans = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->whereIn('status_id', [self::LOANED, self::RENEWED])->get();

      $books = Book::paginate(12)->withQueryString();

      $lateReturns = LoanDetail::with(['book', 'loanHeader'])
                     ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id())->whereDate('due_date', '<', now());
                     })->get();

      return ['loans' => $loans, 'books' => $books, 'lateReturns' => $lateReturns];
   }

   public function fetchBookDetails($id) {
      $book = Book::find($id);
      $loan = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->where('book_id', $book->id)->latest()->first();

      $isLoaned = ($loan != null && in_array($loan->status_id, [self::LOANED, self::RENEWED]));

      $queue = Queue::where('user_id', auth()->id())->where('book_id', $book->id)->first();

      $borrowAmount = LoanDetail::whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id());
                     })->whereIn('status_id', [self::LOANED, self::RENEWED])->count();

      $lateReturns = LoanDetail::with(['book', 'loanHeader'])
                     ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id())->whereDate('due_date', '<', now());
                     })->count();
      
      $bookStatus = '';
      if ($queue != null) {
         $bookStatus = 'queued';
      }else if ($loan != null && $loan->returned_date != null && $loan->status_id === self::RETURN_PENDING) {
         $bookStatus = 'pending';
      }else if ($borrowAmount === 8) {
         $bookStatus = 'limited';
      }
      
      if ($lateReturns > 0) {
         $bookStatus = 'denied';
      }

      $isBookmarked = Bookmark::where('user_id', auth()->id())->where('book_id', $book->id)->count();

      $bookDetails = [
         'book' => $book, 
         'isLoaned' => $isLoaned,
         'bookStatus' => $bookStatus, 
         'isBookmarked' => $isBookmarked
      ];
      
      return $bookDetails;
   }

   public function fetchBookmarks() {
      return Bookmark::with('book')->where('user_id', auth()->id())->paginate(18);
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(12);
   }
}