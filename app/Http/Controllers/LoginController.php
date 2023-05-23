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
         return (auth()->user()->role_id === 0) ? redirect()->intended(route('user.home')) : redirect()->intended(route('librarian.dashboard'));
      }

      return back()->with('loginError', 'Login failed! Please check your input.');
   }

   public function logout(Request $request) {
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      Auth::logout();
      
      return to_route('login');
   }
}
