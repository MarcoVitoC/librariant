@extends('layouts.main')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="240px" height="310px" class="rounded">
            <div class="my-3">
               <a href="{{ route('login') }}" class="btn btn-dark col-12 mt-1">
                  <i class="bi bi-book-fill me-2"></i>Borrow
               </a>
            </div>
         </div>
         <div>
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>
            <button class="btn btn-dark btn-sm disabled">Quantity: {{ $bookDetails->quantity }}</button>
            <h5 class="fw-normal mt-4">Summary:</h5>
            <h6 class="fw-normal mb-4">{{ $bookDetails->summary }}</h6>
            <div class="d-flex">
               <button class="btn btn-secondary btn-sm disabled me-2">Language: {{ $bookDetails->language }}</button>
               <button class="btn btn-secondary btn-sm disabled me-2">Genre: {{ $bookDetails->genre }}</button>
               <button class="btn btn-secondary btn-sm disabled me-2">Pages: {{ $bookDetails->pages }} pages</button>
               <button class="btn btn-secondary btn-sm disabled">Published on {{ date('M d, Y', strtotime($bookDetails->publish_date)) }}</button>
            </div>
         </div>
      </div>
   </div>
   @if ($reviews->isNotEmpty())
      <div class="mx-6 my-4">
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
                        <i class="bi bi-star me-1 text-warning review-rating star-review-{{ $review->id }}" data-review-id="{{ $review->id }}" data-index="0" data-rating="{{ $review->rating }}"></i>
                        <i class="bi bi-star me-1 text-warning review-rating star-review-{{ $review->id }}" data-index="1"></i>
                        <i class="bi bi-star me-1 text-warning review-rating star-review-{{ $review->id }}" data-index="2"></i>
                        <i class="bi bi-star me-1 text-warning review-rating star-review-{{ $review->id }}" data-index="3"></i>
                        <i class="bi bi-star me-1 text-warning review-rating star-review-{{ $review->id }}" data-index="4"></i>
                     </div>
                     <p>{{ date('M d, Y', strtotime($review->updated_at)) }}</p>
                  </div>
                  <p>{{ $review->review }}</p>
                  <div class="d-flex align-items-center">
                     <a href="{{ route('login') }}" class="btn-review bg-transparent text-decoration-none text-dark" role="button" data-review-id="{{ $review->id }}">
                        <i class="bi bi-hand-thumbs-up text-secondary me-1"></i>
                        @if ($review->like_count > 0)
                           ({{ $review->like_count }})
                        @endif
                     </a>
                     <button class="btn-review bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $review->id }}" aria-expanded="false" aria-controls="collapse-{{ $review->id }}">
                        <i class="bi bi-chat-dots text-secondary me-1"></i>
                        @if ($review->comments->where('review_id', $review->id)->count())
                           ({{ $review->comments->where('review_id', $review->id)->count() }})
                        @endif
                     </button>
                  </div>
                  <div class="mt-2 rounded collapse" id="collapse-{{ $review->id }}">
                     <div class="bg-body-tertiary card card-body">
                        @foreach ($review->comments as $comment)
                           <div class="pb-2">
                              <div class="d-flex align-items-center">
                                 <i class="bi bi-person-circle text-secondary fs-4 me-3"></i>
                                 <div class="d-flex align-items-baseline">
                                    <h6>{{ $comment->user->username }}</h6>
                                    <p class="mx-3 fs-7 text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
                                 </div>
                              </div>
                              <p>{{ $comment->comment }}</p>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   @else
      <div class="d-flex justify-content-center align-items-center m-6">
         <h1 class="text-secondary pt-1">📑 No reviews available.</h1>
      </div>
   @endif
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('.review-rating').each(function() {
            let reviewId = $(this).data('review-id');
            let reviewRating = $(this).data('rating');
               
            for (let i=0; i<=reviewRating-1; i++) {
               $('.star-review-'+reviewId+'').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });
      });
   </script>
@endsection