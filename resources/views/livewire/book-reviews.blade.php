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
                  @if ($review->likes->where('review_id', $review->id)->where('user_id', auth()->id())->count())
                     <button class="btn-review bg-transparent likeBtn" data-review-id="{{ $review->id }}">
                        <i class="bi bi-hand-thumbs-up-fill text-secondary me-1"></i>
                        @if ($review->like_count > 0)
                           ({{ $review->like_count }})
                        @endif
                     </button>
                  @else
                     <button class="btn-review bg-transparent likeBtn" data-review-id="{{ $review->id }}">
                        <i class="bi bi-hand-thumbs-up text-secondary me-1"></i>
                        @if ($review->like_count > 0)
                           ({{ $review->like_count }})
                        @endif
                     </button>
                  @endif

                  <button class="btn-review bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $review->id }}" aria-expanded="false" aria-controls="collapse-{{ $review->id }}">
                     <i class="bi bi-chat-dots text-secondary me-1"></i>
                     @if ($review->comments->where('review_id', $review->id)->count())
                        ({{ $review->comments->where('review_id', $review->id)->count() }})
                     @endif
                  </button>
               </div>
               <div class="mt-2 rounded collapse" id="collapse-{{ $review->id }}">
                  <div class="bg-body-tertiary card card-body">
                     <form class="input-group mb-3 addCommentForm" enctype="multipart/form-data" data-review-id="{{ $review->id }}">
                        @csrf
                        <textarea class="form-control comment-input rounded" type="text" name="comment" placeholder="Add a comment..."></textarea>
                        <button class="btn btn-dark disabled addCommentBtn" type="submit"><i class="bi bi-send"></i></button>
                     </form>
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
   <div class="d-flex justify-content-center align-items-center m-6" style="height: 45vh;">
      <h1 class="text-secondary pt-1">📑 No reviews available.</h1>
   </div>
@endif