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

   public function addReview(Request $request) {
      $this->reviewService->addReview($request);
      return response()->json(['message' => 'Review added successfully!'], 200);
   }

   public function editReview(Review $review) {
      return response()->json(['review' => $review]);
   }

   public function updateReview(Request $request, Review $review) {
      $this->reviewService->updateReview($request, $review);
      return response()->json(['message' => 'Review updated successfully!'], 200);
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