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
      $books = $this->guestService->fetchSomeBooks();
      return view('guest.welcome', ['books' => $books]);
   }

   public function books() {
      $books = $this->guestService->fetchAllBooks();
      return view('guest.books', ['books' => $books]);
   }

   public function aboutUs() {
      return view('guest.about-us');
   }

   public function faq() {
      return view('guest.faq');
   }
}
