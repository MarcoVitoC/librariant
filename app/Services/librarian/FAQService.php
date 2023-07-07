<?php

namespace App\Services\librarian;

use App\Models\Faq;

class FAQService {
   public function fetchFAQs() {
      return Faq::all();
   }

   public function addFAQ($request) {
      $newFAQ = $request->validated();
      Faq::create($newFAQ);
   }
}