<?php

namespace App\Http\Requests\librarian;

use Illuminate\Foundation\Http\FormRequest;

class AddFAQRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'question' => ['required', 'string', 'unique:faqs'],
         'answer' => ['required', 'string', 'unique:faqs']
      ];
   }
}
