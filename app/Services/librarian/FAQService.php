<?php

namespace App\Services\librarian;

use App\Models\Faq;

class FAQService {
   public function fetchFAQs() {
      return Faq::paginate(10)->withQueryString();
   }

   public function addFAQ($request) {
      $newFAQ = $request->validated();
      Faq::create($newFAQ);
   }

   public function updateFAQ($request, $faq) {
      $updatedFAQ = $request->validated();
      $faq->update($updatedFAQ);
   }

   public function deleteFAQ($faq) {
      $faq->delete();
   }
}