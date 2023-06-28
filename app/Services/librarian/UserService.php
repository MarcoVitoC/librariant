<?php

namespace App\Services\librarian;

use App\Models\User;

class UserService {
   public function fetchAllUsers() {
      return User::all()->where('role_id', 0);
   }
}