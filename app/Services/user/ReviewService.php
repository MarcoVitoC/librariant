<?php

namespace App\Services\user;

use App\Models\Like;
use App\Models\Review;
use App\Models\Comment;

class ReviewService {
   public function addComment($request, $review) {
      Comment::create([
         'user_id' => auth()->id(),
         'review_id' => $review->id,
         'comment' => $request->comment
      ]);
   }
}