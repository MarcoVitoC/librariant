<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibrarianController extends Controller
{
   public function dashboard() {
      return view('librarian.dashboard');
   }

   public function transactions() {
      return view('librarian.transactions');
   }

   public function reservations() {
      return view('librarian.reservations');
   }

   public function users() {
      return view('librarian.users');
   }

   public function settings() {
      return view('librarian.settings');
   }

   public function supports() {
      return view('librarian.supports');
   }
}
