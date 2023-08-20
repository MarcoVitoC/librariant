<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Review;
use Livewire\Component;
use App\Models\Bookmark;

class BookDetailMetrics extends Component
{
   public $book, $isBookmarked, $rating = 0, $review = '';

   public function mount($bookId, $isBookmarked) {
      $this->book = Book::find($bookId);
      $this->isBookmarked = $isBookmarked;
   }

   public function bookmark() {
      $bookmark = Bookmark::where('user_id', auth()->id())->where('book_id', $this->book->id)->first();
      
      if ($this->isBookmarked) {
         $bookmark->delete();
      }else {
         Bookmark::create(['user_id' => auth()->id(), 'book_id' => $this->book->id]);
      }

      $this->isBookmarked = !$this->isBookmarked;
   }

   public function rate($rateValue) {
      $this->rating = $rateValue;
   }

   public function addReview() {
      Review::create([
         'user_id' => auth()->id(), 
         'book_id' => $this->book->id, 
         'rating' => $this->rating, 
         'review' => $this->review
      ]);

      $this->dispatch('reviewAdded');
   }

   public function editReview($reviewId) {
      $review = Review::find($reviewId);
      $this->rating = $review->rating;
      $this->review = $review->review;
   }

   public function updateReview($reviewId) {
      $review = Review::find($reviewId);
      $review->update([
         'rating' => $this->rating,
         'review' => $this->review
      ]);

      $this->dispatch('reviewUpdated');
   }

   public function closeModal() {
      $this->rating = 0;
   }

   public function render() {
      $isReviewed = Review::where('user_id', auth()->id())->where('book_id', $this->book->id)->first();
      return view('livewire.book-detail-metrics', ['isReviewed' => $isReviewed]);
   }
}