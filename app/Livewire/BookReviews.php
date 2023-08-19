<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Review as Review;
use Livewire\Component;

class BookReviews extends Component
{
   public $book, $reviews;
   protected $listeners = ['reviewAdded'];

   public function mount($bookId, $reviews) {
      $this->book = Book::find($bookId);
      $this->reviews = $reviews;
   }

   public function reviewAdded() {
      $this->reviews = Review::where('book_id', $this->book->id)->get();
   }

   public function reviewUpdated() {
      $this->reviews = Review::where('book_id', $this->book->id)->get();
   }

   public function render() {
      return view('livewire.book-reviews');
   }
}