<?php

namespace App\Livewire;

use App\Models\Review;
use App\Models\Comment;
use Livewire\Component;

class BookReviewComments extends Component
{
   public $review;
   protected $listeners = ['commentAdded' => 'render'];

   public function mount($reviewId) {
      $this->review = Review::find($reviewId);
   }

   public function render() {
      $comments = Comment::with('user')->where('review_id', $this->review->id)->get();
      return view('livewire.book-review-comments', ['comments' => $comments]);
   }
}