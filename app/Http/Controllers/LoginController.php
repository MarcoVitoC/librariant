<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;

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

   public function forgotPassword() {
      return view('auth.forgot-password');
   }

   public function sendEmail(ForgotPasswordRequest $request) {
      $status = $this->loginService->sendResetLink($request);

      return $status === Password::RESET_LINK_SENT
               ? back()->with(['status' => __($status)])
               : back()->withErrors(['email' => __($status)]);
   }

   public function resetPassword(string $token) {
      return view('auth.reset-password', ['token' => $token]);
   }

   public function updatePassword(ResetPasswordRequest $request) {
      $status = $this->loginService->resetPassword($request);

      return $status === Password::PASSWORD_RESET
               ? to_route('login')->with('status', __($status))
               : back()->withErrors(['email' => [__($status)]]);
   }

   public function logout(Request $request) {
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      Auth::logout();
      
      return to_route('login');
   }
}