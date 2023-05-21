<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterService {
   public function registerUser($request) {
      $newUser = $request->validated();

      $newUser['id'] = Str::uuid();
      $newUser['password'] = Hash::make($newUser['password']);
      $user = User::create($newUser);

      return $user;
   }
}