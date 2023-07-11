<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Services\user\LoanService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoanRenewalRequest;

class LoanController extends Controller
{
   private $loanService;

   public function __construct() {
      $this->loanService = new LoanService;
   }

   public function loans() {
      $loans = $this->loanService->fetchLoans();
      return view('user.loans', [
         'loanedBooks' => $loans['loanedBooks'],
         'unconfirmedReturns' => $loans['unconfirmedReturns'],
         'queues' => $loans['queues'],
         'renewableLoans' => $loans['renewableLoans']
      ]);
   }

   public function makeLoan(Request $request) {
      $this->loanService->makeLoan($request);
      return response()->json(['message' => 'Book borrowed successfully!'], 200);
   }

   public function enqueue(Request $request) {
      $this->loanService->enqueue($request);
      return response()->json(['message' => 'You are in queue! 😃'], 200);
   }

   public function dequeue(Request $request) {
      $this->loanService->cancelQueue($request);
      return response()->json(['message' => 'Queue canceled successfully!'], 200);
   }

   public function returnBook(Request $request) {
      $this->loanService->returnBook($request);
      return response()->json(['message' => 'Your book return has been forwarded to the librarian!'], 200);
   }

   public function loanRenewal(LoanRenewalRequest $request) {
      $this->loanService->renewLoan($request);
      return response()->json(['message' => 'Your loan renewal request has been forwarded to the librarian!'], 200);
   }
}