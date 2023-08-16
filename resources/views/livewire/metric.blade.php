<div class="d-flex">
   <button class="btn btn-dark btn-sm disabled">Quantity: {{ $book->quantity }}</button>

   @if ($isBookmarked)
      <button class="btn btn-dark btn-sm ms-2" wire:click="bookmark"><i class="bi bi-bookmark-plus-fill"></i></button>
   @else
      <button class="btn btn-outline-dark btn-sm ms-2" wire:click="bookmark"><i class="bi bi-bookmark-plus-fill"></i></button>
   @endif

   @if ($isReviewed != null)
      <button class="btn btn-dark btn-sm ms-2 editReviewBtn" data-bs-toggle="modal" data-bs-target="#editReviewModal"  data-review-id="{{ $isReviewed->id }}"><i class="bi bi-star-fill"></i></button>
   @else
      <button class="btn btn-outline-dark btn-sm ms-2 addReviewBtn" data-bs-toggle="modal" data-bs-target="#addReviewModal" data-book-id="{{ $book->id }}"><i class="bi bi-star-fill"></i></button>
   @endif
</div>
