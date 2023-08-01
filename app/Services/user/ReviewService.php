<?php

namespace App\Services\user;

use App\Models\Like;
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

   public function likeReview($request) {
      $like = Like::where('user_id', auth()->id())->first();
      $review = Review::find($request->review_id);

      if ($like == null) {
         Like::create([
            'user_id' => auth()->id(),
            'review_id' => $request->review_id
         ]);

         $review->like_count += 1;
         $review->save();
      } else {
         $like->delete();
         
         $review->like_count -= 1;
         $review->save();
      }
   }
}