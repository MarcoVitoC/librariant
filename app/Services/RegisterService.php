<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterService {
   public function registerUser($request) {
      $newUser = $request->validated();

      $newUser['id'] = Str::uuid();
      $newUser['password'] = Hash::make($newUser['password']);

      try {
         DB::beginTransaction();
         
         User::create($newUser);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }
}