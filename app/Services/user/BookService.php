<?php

namespace App\Services\user;

use App\Models\Book;
use App\Models\Like;
use App\Models\Queue;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Bookmark;
use App\Models\LoanDetail;
use App\Models\LoanHeader;

class BookService {
   public function fetchIndexDatas() {
      $loans = LoanDetail::whereHas('loanHeader', function($query) {
                  $query->where('user_id', auth()->id());
               })->whereIn('status_id', [0, 3])->get();
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

      $isLoaned = ($loan != null && ($loan->status_id === 0 || $loan->status_id === 3)) ? true : false;

      $queue = Queue::where('user_id', auth()->id())->where('book_id', $book->id)->first();
      $borrowAmount = LoanDetail::whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id());
                     })->whereIn('status_id', [0, 3])->count();
      $lateReturns = LoanDetail::with(['book', 'loanHeader'])
                     ->whereNull('returned_date')->whereHas('loanHeader', function($query) {
                        $query->where('user_id', auth()->id())->whereDate('due_date', '<', now());
                     })->count();
      
      $bookStatus = '';
      if ($queue != null) {
         $bookStatus = 'queued';
      }else if ($loan != null && $loan->returned_date != null && $loan->status_id === 2) {
         $bookStatus = 'pending';
      }else if ($borrowAmount === 8) {
         $bookStatus = 'limited';
      }
      
      if ($lateReturns > 0) {
         $bookStatus = 'denied';
      }

      $bookmark = Bookmark::where('user_id', auth()->id())->where('book_id', $book->id)->first();
      $isBookmarked = ($bookmark != null) ? true : false;

      $isReviewed = Review::where('user_id', auth()->id())->where('book_id', $book->id)->first();
      $reviews = Review::where('book_id', $book->id)->get();

      $bookDetails = [
         'book' => $book, 
         'isLoaned' => $isLoaned,
         'bookStatus' => $bookStatus, 
         'isBookmarked' => $isBookmarked, 
         'isReviewed' => $isReviewed, 
         'reviews' => $reviews
      ];
      
      return $bookDetails;
   }

   public function fetchBookmarks() {
      return Bookmark::with('book')->where('user_id', auth()->id())->paginate(18);
   }

   public function addToBookmark($request) {
      Bookmark::create(['user_id' => auth()->id(), 'book_id' => $request->book_id]);
   }

   public function removeBookmark($request) {
      $selectedBook = Bookmark::where('user_id', auth()->id())->where('book_id', $request->book_id)->first();
      $selectedBook->delete();
   }

   public function searchBook($request) {
      return Book::where('book_title', 'like', '%'.$request->search_book.'%')->paginate(12);
   }
}