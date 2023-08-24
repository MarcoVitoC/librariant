<?php

namespace App\Services\librarian;

use App\Interfaces\RoleInterface;
use App\Models\User;

class UserService implements RoleInterface {
   public function fetchAllUsers() {
      return User::all()->where('role_id', self::USER);
   }
}