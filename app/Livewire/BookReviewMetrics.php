<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Review;
use App\Models\Comment;
use Livewire\Component;

class BookReviewMetrics extends Component
{
   public $review,$isLiked, $likeCount = 0, $hasComments = 0;

   public function mount($reviewId) {
      $this->review = Review::find($reviewId);
      $this->isLiked = Like::where('review_id', $this->review->id)->where('user_id', auth()->id())->count();
      $this->likeCount = $this->review->like_count;
      $this->hasComments = Comment::where('review_id', $this->review->id)->count();
   }

   public function like() {
      $like = Like::where('user_id', auth()->id())->where('review_id', $this->review->id)->first();
      $review = Review::find($this->review->id);

      if ($like == null) {
         Like::create([
            'user_id' => auth()->id(),
            'review_id' => $this->review->id
         ]);

         $review->increment('like_count');
      } else {
         $like->delete();
         $review->decrement('like_count');
      }

      $this->isLiked = !$this->isLiked;
      $this->likeCount = $review->like_count;
   }

   public function render() {
      return view('livewire.book-review-metrics');
   }
}