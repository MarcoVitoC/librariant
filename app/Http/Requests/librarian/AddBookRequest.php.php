<?php

namespace App\Http\Requests\librarian;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
   public function rules()
   {
      return [
         'isbn' => ['required'],
         'book_title' => ['required', 'max:255', 'unique:books'],
         'author' => ['required'],
         'publication_year' => ['required'],
         'genre' => ['required'],
         'quantity' => ['required', 'numeric'],
         'summary' => ['required', 'min:5'],
         'book_photo' => ['required']
      ];
   }
}
