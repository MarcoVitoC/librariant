<?php

namespace App\Services\user;

use App\Models\Review;

class ReviewService {
   public function addReview($request) {
      Review::create([
         'user_id' => auth()->id(), 
         'book_id' => $request->book_id, 
         'rating' => $request->rate_value, 
         'review' => $request->review
      ]);
   }

   public function updateReview($request, $review) {
      $review->update($request->all());
   }
}