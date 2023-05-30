<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   private $loginService;

   public function __construct() {
      $this->loginService = new LoginService();
   }

   public function login() {
      return view ('auth.login');
   }

   public function authenticate(LoginRequest $request) {
      $loginSuccess = $this->loginService->attemptLogin($request);

      if ($loginSuccess) {
         return response()->json(['status' => 'loginSuccess', 'role' => auth()->user()->role_id], 200);
      }

      return response()->json(['loginFailed' => 'Failed to login!'], 200);
   }

   public function logout(Request $request) {
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      Auth::logout();
      
      return to_route('login');
   }
}
