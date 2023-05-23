<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
   public function dashboard() {
      return view('librarian.dashboard');
   }

   public function books() {
      return view('librarian.books');
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
