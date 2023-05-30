<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Support\Facades\Session;

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
      session()->flash('registrationSuccess', 'Registration succeed. Please login!');

      return response()->json(['message' => 'Registration succeed. Please login!'], 200);
   }
}
