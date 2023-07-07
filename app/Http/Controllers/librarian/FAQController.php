<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\librarian\FAQService;

class FAQController extends Controller
{
   private $faqService;

   public function __construct() {
      $this->faqService = new FAQService;
   }

   public function faq() {
      $faqs = $this->faqService->fetchAllFaq();
      return view('librarian.supports', ['faqs' => $faqs]);
   }
}
