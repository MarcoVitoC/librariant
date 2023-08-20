<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Review as Review;

class BookReviews extends Component
{
   public $reviews;
   protected $listeners = ['reviewAdded' => 'render', 'reviewUpdated' => 'render'];

   public function mount($bookId) {
      $this->reviews = Review::where('book_id', $bookId)->get();
   }

   public function render() {
      return view('livewire.book-reviews');
   }
}