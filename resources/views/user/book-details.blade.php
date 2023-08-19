@extends('layouts.main')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="row mx-6 mb-4">
         <div class="col-lg-4 col-xl-3 px-4 d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center mw-100" style="width: 240px; height: auto;">
               <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" class="mw-100 h-auto rounded" alt="Book Photo">
               <div class="my-3 w-100">
                   @if (!$isLoaned)
                     <button type="submit" class="btn btn-dark w-100 mt-1 borrowBtn" data-book-id="{{ $bookDetails->id }}" data-book-quantity="{{ $bookDetails->quantity }}" data-book-status="{{ $bookStatus }}"><i class="bi bi-book-fill me-2"></i>Borrow</button>
                  @else
                     <button type="submit" class="btn btn-outline-dark w-100 mt-1 returnBookBtn" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-reply-fill me-2"></i>Return book</button>
                  @endif
               </div>
           </div>
         </div>
         <div class="col-lg-8 col-xl-9">
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>

            @livewire('metric', ['bookId' => $bookDetails->id, 'isBookmarked' => $isBookmarked, 'isReviewed' => $isReviewed])

            <h5 class="fw-normal mt-4">Summary:</h5>
            <h6 class="fw-normal mb-4">{{ $bookDetails->summary }}</h6>
            <div class="row mx-1">
               <button class="col-xl-4 btn btn-secondary btn-sm disabled me-2 my-1">Language: {{ $bookDetails->language }}</button>
               <button class="col-xl-4 btn btn-secondary btn-sm disabled me-2 my-1">Genre: {{ $bookDetails->genre }}</button>
               <button class="col-xl-4 btn btn-secondary btn-sm disabled me-2 my-1">Pages: {{ $bookDetails->pages }} pages</button>
               <button class="col-xl-4 btn btn-secondary btn-sm disabled my-1">Published on {{ date('M d, Y', strtotime($bookDetails->publish_date)) }}</button>
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
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('.borrowBtn').click(function() {
            let bookId = $(this).data('book-id');
            let bookQuantity = $(this).data('book-quantity');
            let bookStatus = $(this).data('book-status');
            const bookStatuses = {
               queued: {
                  icon: 'info',
                  title: 'Oops...',
                  text: 'You are on the queue list, please wait!'
               },
               pending: {
                  icon: 'info',
                  title: 'Please wait!',
                  text: 'You borrowed this book earlier, and the book return is still in the verification process.'
               },
               limited: {
                  icon: 'error',
                  title: 'Book limit reached!',
                  text: 'Sorry, you cannot borrow any more books at the moment. Please return some books before borrowing new ones.'
               },
               denied: {
                  icon: 'error',
                  title: 'Loan access denied!',
                  text: "Sorry, you won't be able to borrow any books at this time. Please return all overdue books before proceeding with new borrowings."
               }
            };
            const statusMessage = bookStatuses[bookStatus];

            if (statusMessage) {
               Swal.fire(statusMessage);
            }else {
               Swal.fire({
                  icon: 'question',
                  title: 'Are you want to borrow this book?',
                  showCancelButton: true,
                  cancelButtonColor: '#D33',
                  confirmButtonColor: '#3085D6',
                  confirmButtonText: 'Yes',
                  reverseButtons: true
               }).then(function(result) {
                  if (result.isConfirmed) {
                     if (bookQuantity > 0) {
                        $.ajax({
                           type: 'POST',
                           url: "{{ route('user.make_loan') }}",
                           data: {book_id: bookId},
                           dataType: 'json',
                           success: function(response) {
                              Swal.fire({
                                 icon: 'success',
                                 title: response.message
                              }).then(function() {
                                 location.reload();
                              });
                           },
                           error: function(xhr, status, error) {
                              let response = JSON.parse(xhr.responseText);
                              console.log(response.message);
                           }
                        });
                     }else {
                        Swal.fire({
                           icon: 'info',
                           title: 'Sorry... 😓',
                           text: 'Your selected book is currently unavailable. Would you like to join the queue?',
                           showCancelButton: true,
                           cancelButtonColor: '#D33',
                           cancelButtonText: 'No',
                           confirmButtonColor: '#3085D6',
                           confirmButtonText: 'Yes',
                           reverseButtons: true
                        }).then(function(result) {
                           if (result.isConfirmed) {
                              $.ajax({
                                 type: 'POST',
                                 url: "{{ route('user.enqueue') }}",
                                 data: {book_id: bookId},
                                 dataType: 'json',
                                 success: function(response) {
                                    Swal.fire({
                                       icon: 'success',
                                       title: response.message
                                    }).then(function() {
                                       location.reload();
                                    });
                                 },
                                 error: function(xhr, status, error) {
                                    let response = JSON.parse(xhr.responseText);
                                    console.log(response.message);
                                 }
                              });
                           }else {
                              Swal.fire({
                                 icon: 'info',
                                 title: 'Our apologies!',
                                 text: 'We are sorry for the inconvenience. Thank you for your understanding. 🙂🙏',
                                 confirmButtonText: "It's okay"
                              });
                           }
                        });
                     }
                  }
               });
            }
         });

         $('.returnBookBtn').click(function() {
            let bookId = $(this).data('book-id');

            Swal.fire({
               icon: 'question',
               title: 'Are you want to return this book?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes',
               reverseButtons: true
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'POST',
                     url: "{{ route('user.return_book') }}",
                     data: {book_id: bookId},
                     dataType: 'json',
                     success: function(response) {
                        Swal.fire({
                           icon: 'success',
                           title: 'Thank you 🙏',
                           text: response.message
                        }).then(function() {
                           location.reload();
                        });
                     },
                     error: function(xhr, status, error) {
                        let response = JSON.parse(xhr.responseText);
                        console.log(response.message);
                     }
                  });
               }
            });
         });

         $('.review-rating').each(function() {
            let reviewId = $(this).data('review-id');
            let reviewRating = $(this).data('rating');
               
            for (let i=0; i<=reviewRating-1; i++) {
               $('.star-review-'+reviewId+'').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });

         let rateIndex = -1;
         $('.star').click(function() {
            rateIndex = $(this).data('index');
         });
         $('.star-update').click(function() {
            rateIndex = $(this).data('index');
         });

         $('.star').mouseover(function() {
            let currentIndex = $(this).data('index');
            
            for (let i=0; i<=currentIndex; i++) {
               $('.star').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });
         $('.star-update').mouseover(function() {
            let currentIndex = $(this).data('index');
            
            for (let i=0; i<=currentIndex; i++) {
               $('.star-update').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });

         $('.star').mouseleave(function() {
            $('.star').removeClass('bi-star-fill').addClass('bi-star');
            
            if (rateIndex != -1) {
               for (let i=0; i<=rateIndex; i++) {
                  $('.star').eq(i).removeClass('bi-star').addClass('bi-star-fill');
               }
            }
         });
         $('.star-update').mouseleave(function() {
            $('.star-update').removeClass('bi-star-fill').addClass('bi-star');
            
            let updateRate = $('#rating').val();
            if (rateIndex != -1) {
               updateRate = rateIndex + 1;
            }

            for (let i=0; i<=updateRate-1; i++) {
               $('.star-update').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });

         $('.modal, #reviewBtn-close').click(function(e) {
            if ($(e.target).hasClass('modal') || $(e.target).hasClass('btn-close')) {
               $('.star').removeClass('bi-star-fill').addClass('bi-star');
               $('.submitReviewBtn').addClass('disabled');
               $('#addReviewForm')[0].reset();
               rateIndex = -1;
            }
         });

         Livewire.on('reviewAdded', () => {
            Swal.fire({
               icon: 'success',
               title: 'Review added successfully!'
            }).then(function() {
               $('#addReviewModal').modal('hide');
               location.reload();
            });
         });

         Livewire.on('reviewUpdated', () => {
            Swal.fire({
               icon: 'success',
               title: 'Review updated successfully!'
            }).then(function() {
               $('#editReviewModal').modal('hide');
               location.reload();
            });
         });

         $('.likeBtn').click(function(e) {
            e.preventDefault();

            let reviewId = $(this).data('review-id');
            $.ajax({
               type: 'POST',
               url: "{{ route('user.like_review') }}",
               data: {review_id: reviewId},
               dataType: 'json',
               success: function() {
                  location.reload();
               },
               error: function(xhr, status, error) {
                  let response = JSON.parse(xhr.responseText);
                  console.log(response.message);
               }
            });
         });

         $('.comment-input').keyup(function(e) {
            e.preventDefault();

            $('.addCommentBtn').toggleClass('disabled', $(this).val().trim() === '');
         });

         $('.addCommentForm').submit(function(e) {
            e.preventDefault();

            let reviewId = $(this).data('review-id');
            let addCommentUrl = "{{ route('user.add_comment', ':reviewId') }}".replace(':reviewId', reviewId);

            $.ajax({
               type: 'POST',
               url: addCommentUrl,
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: function(response) {
                  location.reload();
               },
               error: function(xhr, status, error) {
                  let response = JSON.parse(xhr.responseText);
                  console.log(response.message);
               }
            });
         });
      });
   </script>
@endsection