<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\user\LoanService;

class LoanController extends Controller
{
   private $loanService;

   public function __construct() {
      $this->loanService = new LoanService;
   }

   public function makeLoan(Request $request) {
      $this->loanService->makeLoan($request);
      return response()->json(['message' => 'Book borrowed successfully!'], 200);
   }

   public function enqueueLoan(Request $request) {
      $this->loanService->enqueueLoan($request);
      return response()->json(['message' => 'You are in queue! 😃'], 200);
   }
}
