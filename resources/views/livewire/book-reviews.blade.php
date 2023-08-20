<div class="mx-6 my-4">
   @if ($reviews->isNotEmpty())
      <div class="mx-4">
         <h2 class="pb-4">Reviews</h2>
         @foreach ($reviews as $review)
            <div class="bg-body-secondary rounded mb-3 p-3">
               <div class="d-flex align-items-center">
                  <i class="bi bi-person-circle text-secondary fs-2 me-3"></i>
                  <h4>{{ $review->user->username }}</h4>
               </div>
               <div class="d-flex align-items-baseline mt-2">
                  <div class="d-flex me-3">
                     @for ($i = 1; $i <= 5; $i++)
                        <i class="bi me-1 text-warning review-rating star-review-{{ $review->id }} @if ($review->rating >= $i) bi-star-fill @else bi-star  @endif" data-review-id="{{ $review->id }}" data-index="{{ $i - 1 }}" data-rating="{{ $review->rating }}"></i>
                     @endfor
                  </div>
                  <p>{{ date('M d, Y', strtotime($review->updated_at)) }}</p>
               </div>
               <p>{{ $review->review }}</p>

               @livewire('book-review-metrics', ['reviewId' => $review->id])
            </div>
         @endforeach
      </div>
   @else
      <div class="d-flex justify-content-center align-items-center m-6" style="height: 45vh;">
         <h1 class="text-secondary pt-1">📑 No reviews available.</h1>
      </div>
   @endif
</div>