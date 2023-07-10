<?php

namespace App\Http\Requests\librarian;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'isbn' => ['required', 'numeric'],
         'book_title' => ['required', 'max:255'],
         'author' => ['required', 'string'],
         'pages' => ['required', 'numeric'],
         'publisher' => ['required', 'string'],
         'publish_date' => ['required', 'date'],
         'genre' => ['required', 'string', 'not_regex:/[0-9]/'],
         'quantity' => ['required', 'numeric'],
         'language' => ['required', 'string', 'alpha'],
         'book_photo' => ['mimes:jpeg, png, jpg', 'file', 'max:1024'],
         'summary' => ['required', 'string'],
      ];
   }
}
