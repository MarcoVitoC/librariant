<?php

namespace App\Http\Requests\librarian;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFAQRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'question' => ['required', 'string'],
         'answer' => ['required', 'string']
      ];
   }
}
