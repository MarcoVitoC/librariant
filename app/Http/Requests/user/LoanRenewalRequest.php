<?php

namespace App\Http\Requests\user;

use App\Models\LoanDetail;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class LoanRenewalRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      $renewableLoan = LoanDetail::find($this->input('selected_loan'));
      $renewalStartDate = Carbon::parse($renewableLoan->due_date)->toDateString();
      $renewalEndDate = Carbon::parse($renewableLoan->due_date)->addWeek()->toDateString();

      return [
         'renewed_due_date' => [
            'required',
            'date',
            'after:' . $renewalStartDate,
            'before_or_equal:' . $renewalEndDate
         ]
      ];
   }
}
