<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class LoginService {
   public function attemptLogin($request) {
      $validatedUser = $request->validated();

      if (Auth::attempt($validatedUser)) {
         $request->session()->regenerate();
         return true;
      }

      return false;
   }

   public function sendResetLink($request) {
      $forgotPassword = $request->validated();
      $status = Password::sendResetLink($forgotPassword);

      return $status;
   }

   public function resetPassword($request) {
      $newPassword = $request->validated();
      $status = Password::reset($newPassword, function (User $user, string $newPassword) {
         $user->forceFill([
            'password' => Hash::make($newPassword)
         ])->setRememberToken(Str::random(60));
         
         $user->save();

         event(new PasswordReset($user));
      });

      return $status;
   }
}