<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\librarian\UserService;

class UserController extends Controller
{
   private $userService;

   public function __construct() {
      $this->userService = new UserService;
   }

   public function users() {
      $users = $this->userService->fetchAllUsers();
      return view('librarian.users', ['users' => $users]);
   }
}
