<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\librarian\LoanService;

class LoanController extends Controller
{
   private $loanService;

   public function __construct() {
      $this->loanService = new LoanService;
   }

   public function showReturnedBooks() {
      $returnedBooks = $this->loanService->fetchReturnedBooks();
      return view('librarian.returns', ['returnedBooks' => $returnedBooks]);
   }

   public function returnConfirmation(Request $request) {
      $this->loanService->confirmReturnedBook($request);
      return response()->json(['message' => 'Book return confirmed!'], 200);
   }

   public function loans() {
      $loanedBooks = $this->loanService->showLoans();
      return view('librarian.loans', ['loanedBooks' => $loanedBooks]);
   }

   public function renewals() {
      $renewals = $this->loanService->fetchRenewalRequests();
      return view('librarian.renewals', ['renewals' => $renewals]);
   }

   public function renewalConfirmation(Request $request) {
      $this->loanService->confirmRenewal($request);
      return response()->json(['message' => 'Loan renewed successfully!'], 200);
   }
}