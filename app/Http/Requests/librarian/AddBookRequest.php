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
         'isbn' => ['required', 'numeric', 'unique:books'],
         'book_title' => ['required', 'max:255', 'unique:books'],
         'author' => ['required', 'string'],
         'pages' => ['required', 'numeric'],
         'publisher' => ['required', 'string'],
         'publish_date' => ['required', 'date'],
         'genre' => ['required', 'string', 'alpha'],
         'quantity' => ['required', 'numeric'],
         'language' => ['required', 'string', 'alpha'],
         'book_photo' => ['required', 'mimes:jpeg, png, jpg', 'file', 'max:1024'],
         'summary' => ['required', 'string'],
      ];
   }
}
