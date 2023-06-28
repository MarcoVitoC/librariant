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

   public function enqueue(Request $request) {
      $this->loanService->enqueue($request);
      return response()->json(['message' => 'You are in queue! 😃'], 200);
   }

   public function returnBook(Request $request) {
      $this->loanService->returnBook($request);
      return response()->json(['message' => 'Your book return has been forwarded to the librarian!'], 200);
   }
}
