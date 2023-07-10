<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

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
