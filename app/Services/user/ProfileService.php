<?php

namespace App\Services\user;

use App\Interfaces\StatusInterface;
use App\Models\LoanDetail;

class ProfileService implements StatusInterface {
   public function fetchBorrowHistory() {
      return LoanDetail::with(['book', 'loanHeader'])->whereHas('loanHeader', function($query) {
         $query->where('user_id', auth()->id());
      })->where('status_id', self::RETURNED)->latest('returned_date')->get();
   }
}