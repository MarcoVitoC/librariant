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

   public function searchFAQ($request) {
      return Faq::where('question', 'like', '%'.$request->search_faq.'%')->paginate(10);
   }
}