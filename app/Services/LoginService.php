<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService {
   public function attemptLogin($request) {
      $validatedUser = $request->validated();

      if (Auth::attempt($validatedUser)) {
         $request->session()->regenerate();
         return true;
      }

      return false;
   }
}