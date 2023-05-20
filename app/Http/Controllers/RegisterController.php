<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;

class RegisterController extends Controller
{
   private $registerService;

   public function __construct() {
      $this->registerService = new RegisterService();
   }

   public function register() {
      return view('auth.register');
   }

   public function create(RegisterRequest $request) {
      $this->registerService->registerUser($request);
      return to_route('login')->with('success', 'Registration succeed. Please Login!');
   }
}
