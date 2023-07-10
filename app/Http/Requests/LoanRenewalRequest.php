<?php

namespace App\Http\Requests;

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
    
      return [
         'renewed_due_date' => [
            'required',
            'date',
            'after:' . Carbon::parse($renewableLoan->due_date)->toDateString(),
            'before_or_equal:' . Carbon::parse($renewableLoan->due_date)->addWeek()->toDateString()
         ]
      ];
   }
}
