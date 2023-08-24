<?php

namespace App\Services\user;

use App\Interfaces\StatusInterface;
use App\Models\LoanDetail;

class ProfileService implements StatusInterface {
   public function fetchBorrowHistory() {
      $borrowHistories = LoanDetail::with(['book', 'loanHeader'])->whereHas('loanHeader', function($query) {
                           $query->where('user_id', auth()->id());
                        })->whereNotNull('returned_date')->where('status_id', self::RETURNED)->latest('returned_date')->get();
      return $borrowHistories;
   }
}