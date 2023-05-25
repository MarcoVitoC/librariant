<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
         'full_name' => ['required', 'string'],
         'username' => ['required', 'unique:users'],
         'gender' => ['required'],
         'date_of_birth' => ['required'],
         'phone_number' => ['required', 'digits:12', 'numeric', 'unique:users'],
         'address' => ['required'],
         'email' => ['required', 'email:strict', 'unique:users'],
         'password' => ['required', 'min:5'],
         'confirm_password' => ['required', 'same:password'],
         'terms_and_conditions' => ['required']
      ];
   }
}
