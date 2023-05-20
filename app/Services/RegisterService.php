<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService {
   public function registerUser($request) {
      $newUser = $request->validated();

      $newUser['password'] = Hash::make($newUser['password']);
      $user = User::create($newUser);

      return $user;
   }
}