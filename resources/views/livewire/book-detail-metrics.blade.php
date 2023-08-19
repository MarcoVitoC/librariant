<div class="d-flex">
   <button class="btn btn-dark btn-sm disabled">Quantity: {{ $book->quantity }}</button>

   @if ($isBookmarked)
      <button class="btn btn-dark btn-sm ms-2" wire:click="bookmark"><i class="bi bi-bookmark-plus-fill"></i></button>
   @else
      <button class="btn btn-outline-dark btn-sm ms-2" wire:click="bookmark"><i class="bi bi-bookmark-plus-fill"></i></button>
   @endif

   @if ($isReviewed != null)
      <button class="btn btn-dark btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editReviewModal" wire:click="editReview({{ $isReviewed->id }})"><i class="bi bi-star-fill"></i></button>
      @include('user.modal.update-review-modal')
   @else
      <button class="btn btn-outline-dark btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#addReviewModal"><i class="bi bi-star-fill"></i></button>
      @include('user.modal.add-review-modal')
   @endif
</div>
