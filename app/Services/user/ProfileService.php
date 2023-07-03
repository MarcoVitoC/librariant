<?php

namespace App\Services\user;

use App\Models\LoanDetail;

class ProfileService {
   public function fetchBorrowHistory() {
      $borrowHistories = LoanDetail::with(['book', 'loanHeader'])
                        ->whereHas('loanHeader', function($query) {
                           $query->where('user_id', auth()->id());
                        })
                        ->whereNotNull('returned_date')
                        ->where('status_id', 1)
                        ->get();
      return $borrowHistories;
   }
}