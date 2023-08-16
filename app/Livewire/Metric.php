<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Bookmark;

class Metric extends Component
{
   public $book, $isBookmarked, $isReviewed;

   public function mount($bookId, $isBookmarked, $isReviewed) {
      $this->book = Book::find($bookId);
      $this->isBookmarked = $isBookmarked;
      $this->isReviewed = $isReviewed;
   }

   public function bookmark() {
      $bookmark = Bookmark::where('user_id', auth()->id())->where('book_id', $this->book->id)->first();
      
      if ($this->isBookmarked) {
         $bookmark->delete();
      }else {
         Bookmark::create(['user_id' => auth()->id(), 'book_id' => $this->book->id]);
      }

      $this->isBookmarked = !$this->isBookmarked;
   }

   public function render()
   {
      return view('livewire.metric');
   }
}
