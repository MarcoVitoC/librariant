<?php

namespace App\Http\Requests\librarian;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
         'isbn' => ['numeric'],
         'book_title' => ['max:255'],
         'author' => ['string'],
         'pages' => ['numeric'],
         'publisher' => ['string'],
         'publish_date' => ['date'],
         'genre' => ['string', 'alpha'],
         'quantity' => ['numeric'],
         'language' => ['string', 'alpha'],
         'book_photo' => ['mimes:jpeg, png, jpg', 'file', 'max:1024'],
         'summary' => ['string'],
      ];
   }
}
