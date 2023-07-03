<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\user\ProfileService;

class ProfileController extends Controller
{
   private $profileService;

   public function __construct() {
      $this->profileService = new ProfileService;
   }

   public function profile() {
      $borrowHistories = $this->profileService->fetchBorrowHistory();
      return view('user.profile', ['borrowHistories' => $borrowHistories]);
   }
}