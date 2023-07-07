<?php

namespace App\Http\Controllers\librarian;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\librarian\AddFAQRequest;
use App\Http\Controllers\Controller;
use App\Services\librarian\FAQService;

class FAQController extends Controller
{
   private $faqService;

   public function __construct() {
      $this->faqService = new FAQService;
   }

   public function index() {
      $faqs = $this->faqService->fetchFAQs();
      return view('librarian.faq', ['faqs' => $faqs]);
   }

   public function create() {
      //...
   }

   public function store(AddFAQRequest $request) {
      $this->faqService->addFAQ($request);
      return response()->json(['message' => 'New FAQ added successfully!'], 200);
   }

   public function show(Faq $faq) {
      //...
   }

   public function edit(Faq $faq) {
      //...
   }

   public function update(Request $request, Faq $faq) {
      //...
   }

   public function destroy(Faq $faq) {
      //...
   }
}
