<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'review' => ['string']
      ];
   }
}
