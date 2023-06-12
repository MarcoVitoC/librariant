<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuestService;

class GuestController extends Controller
{
   private $guestService;

   public function __construct() {
      $this->guestService = new GuestService();
   }

   public function welcome() {
      $books = $this->guestService->fetchBooks();
      return view('welcome', ['books' => $books]);
   }
}
