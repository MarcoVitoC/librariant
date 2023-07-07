<?php

namespace App\Services\librarian;

use App\Models\Faq;

class FAQService {
   public function fetchFAQs() {
      return Faq::paginate(5)->withQueryString();
   }

   public function addFAQ($request) {
      $newFAQ = $request->validated();
      Faq::create($newFAQ);
   }
}