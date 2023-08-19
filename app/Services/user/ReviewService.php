<?php

namespace App\Services\user;

use App\Models\Like;
use App\Models\Review;
use App\Models\Comment;

class ReviewService {
   public function likeReview($request) {
      $like = Like::where('user_id', auth()->id())->where('review_id', $request->review_id)->first();
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

   public function addComment($request, $review) {
      Comment::create([
         'user_id' => auth()->id(),
         'review_id' => $review->id,
         'comment' => $request->comment
      ]);
   }
}