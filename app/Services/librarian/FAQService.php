<?php

namespace App\Services\librarian;

use App\Models\Faq;

class FAQService {
   public function fetchAllFaq() {
      return Faq::all();
   }
}