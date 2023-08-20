<?php

namespace App\Http\Controllers\user;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\user\ReviewService;

class ReviewController extends Controller
{
   private $reviewService;

   public function __construct() {
      $this->reviewService = new ReviewService;
   }

   public function like(Request $request) {
      $this->reviewService->likeReview($request);
      return response()->json();
   }

   public function comment(Request $request, Review $review) {
      $this->reviewService->addComment($request, $review);
      return response()->json();
   }
}