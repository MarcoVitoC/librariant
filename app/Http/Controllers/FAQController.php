<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FAQController extends Controller
{
   public function faq() {
      $faqs = Faq::all();
      return view('visitor.faq', ['faqs' => $faqs]);
   }
}
