<?php

namespace App\Services\librarian;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;

class FAQService {
   public function fetchFAQs() {
      return Faq::paginate(10)->withQueryString();
   }

   public function addFAQ($request) {
      $newFAQ = $request->validated();
      
      try {
         DB::beginTransaction();
         
         Faq::create($newFAQ);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function updateFAQ($request, $faq) {
      $updatedFAQ = $request->validated();
      
      try {
         DB::beginTransaction();
         
         $faq->update($updatedFAQ);
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function deleteFAQ($faq) {
      try {
         DB::beginTransaction();
         
         $faq->delete();
         DB::commit();
      } catch (\Exception $e) {
         DB::rollback();
      }
   }

   public function searchFAQ($request) {
      return Faq::where('question', 'like', '%'.$request->search_faq.'%')->paginate(10);
   }
}