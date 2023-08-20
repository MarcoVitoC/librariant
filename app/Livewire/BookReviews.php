<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Review as Review;
use Livewire\Component;

class BookReviews extends Component
{
   public $book;
   protected $listeners = ['reviewAdded' => 'render', 'reviewUpdated' => 'render'];

   public function mount($bookId) {
      $this->book = Book::find($bookId);
   }

   public function render() {
      $reviews = Review::where('book_id', $this->book->id)->get();
      return view('livewire.book-reviews', ['reviews' => $reviews]);
   }
}