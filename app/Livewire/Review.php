<?php

namespace App\Livewire;

use Livewire\Component;

class Review extends Component
{
   public $rating;
   protected $listeners = ['resetRating'];

   public function resetRating($rating) {
      $this->rating = $rating;
   }

   public function rate($rateValue) {
      $this->rating = $rateValue;
   }

   public function render()
   {
      return view('livewire.review');
   }
}
