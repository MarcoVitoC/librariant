@extends('layouts.main')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="240px" height="310px" class="rounded">
            <div class="my-3">
               @if ($bookStatus !== 'loaned')
                  <button type="submit" class="btn btn-dark col-12 mt-1 borrowBtn" data-book-id="{{ $bookDetails->id }}" data-book-quantity="{{ $bookDetails->quantity }}" data-book-status="{{ $bookStatus }}"><i class="bi bi-book-fill me-2"></i>Borrow</button>
               @endif
               @if ($bookStatus === 'loaned' || $bookStatus === 'limited')
                  <button type="submit" class="btn btn-outline-dark col-12 mt-1 returnBookBtn" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-reply-fill me-2"></i>Return book</button>
               @endif
            </div>
         </div>
         <div>
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>
            <div class="d-flex">
               <button class="btn btn-secondary btn-sm disabled">Quantity: {{ $bookDetails->quantity }}</button>
               @if ($isBookmarked)
                  <button type="submit" class="btn btn-dark btn-sm ms-2 removeBookmarkBtn" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-bookmark-plus-fill me-2"></i>Added to bookmark</button>
               @else
                  <button type="submit" class="btn btn-outline-dark btn-sm ms-2 addToBookmarkBtn" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-bookmark-plus-fill me-2"></i>Add to bookmark</button>
               @endif
               
               @if ($isReviewed != null)
                  <button class="btn btn-dark btn-sm ms-2 editReviewBtn" data-bs-toggle="modal" data-bs-target="#editReviewModal"  data-review-id="{{ $isReviewed->id }}"><i class="bi bi-star-fill me-2"></i>Rated</button>
               @else
                  <button class="btn btn-outline-dark btn-sm ms-2 addReviewBtn" data-bs-toggle="modal" data-bs-target="#addReviewModal" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-star-fill me-2"></i>Rate this book</button>
               @endif
            </div>
            @include('user.modal.add-review-modal')
            @include('user.modal.update-review-modal')
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
                     @if (in_array($review->id, $likedReview))
                        <button class="btn-review bg-transparent likeBtn" data-review-id="{{ $review->id }}"><i class="bi bi-hand-thumbs-up-fill text-secondary me-1"></i>({{ $review->like_count }})</button>
                     @else
                        <button class="btn-review bg-transparent likeBtn" data-review-id="{{ $review->id }}"><i class="bi bi-hand-thumbs-up text-secondary me-1"></i>({{ $review->like_count }})</button>
                     @endif

                     <button class="btn-review bg-transparent commentBtn" data-review-id="{{ $review->id }}"><i class="bi bi-chat-dots text-secondary"></i></button>
                  </div>
                  <div class="bg-body-tertiary mt-2 p-3 rounded comments comment-{{ $review->id }}">
                     <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Add a comment...">
                        <button class="btn btn-dark"><i class="bi bi-send"></i></button>
                     </div>
                     <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle text-secondary fs-4 me-3"></i>
                        <div class="d-flex align-items-baseline">
                           <h6>archeooooo</h6>
                           <p class="mx-3 fs-7 text-secondary">2 days ago</p>
                        </div>
                     </div>
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, vero officia. Cum aut modi illum fugit incidunt nulla quaerat consectetur qui fuga necessitatibus! Alias odit atque similique voluptatum qui harum.</p>
                     <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle text-secondary fs-4 me-3"></i>
                        <div class="d-flex align-items-baseline">
                           <h6>archeooooo</h6>
                           <p class="mx-3 fs-7 text-secondary">2 days ago</p>
                        </div>
                     </div>
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, vero officia. Cum aut modi illum fugit incidunt nulla quaerat consectetur qui fuga necessitatibus! Alias odit atque similique voluptatum qui harum.</p>
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

         $('.addToBookmarkBtn').click(function() {
            let bookId = $(this).data('book-id');

            $.ajax({
               type: 'POST',
               url: "{{ route('user.add_bookmark') }}",
               data: {book_id: bookId},
               dataType: 'json',
               success: function(response) {
                  Swal.fire({
                     position: 'center',
                     title: response.message,
                     background: '#F5F5F5',
                     showConfirmButton: false,
                     timer: 1200
                  }).then(function() {
                     location.reload();
                  });
               },
               error: function(xhr, status, error) {
                  let response = JSON.parse(xhr.responseText);
                  console.log(response.message);
               }
            });
         });

         $('.removeBookmarkBtn').click(function() {
            let bookId = $(this).data('book-id');

            $.ajax({
               type: 'DELETE',
               url: "{{ route('user.remove_bookmark') }}",
               data: {book_id: bookId},
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

         $('.review-rating').each(function() {
            let reviewId = $(this).data('review-id');
            let reviewRating = $(this).data('rating');
               
            for (let i=0; i<=reviewRating-1; i++) {
               $('.star-review-'+reviewId+'').eq(i).removeClass('bi-star').addClass('bi-star-fill');
            }
         });

         let rateIndex = -1;
         let rateValue = -1;
         $('.star').click(function() {
            rateIndex = $(this).data('index');
            rateValue = $(this).data('value');
            $('.submitReviewBtn').removeClass('disabled');
         });
         $('.star-update').click(function() {
            rateIndex = $(this).data('index');
            rateValue = $(this).data('value');
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
               rateValue = -1;
            }
         });

         $('#addReviewForm').submit(function(e) {
            e.preventDefault();

            let bookId = $('.addReviewBtn').data('book-id');
            let addReviewModal = $('#addReviewModal');
            let addReviewForm = addReviewModal.find('form');
            addReviewForm.find('input[name="book_id"]').val(bookId);
            addReviewForm.find('input[name="rate_value"]').val(rateValue);

            $.ajax({
               type: 'POST',
               url: "{{ route('user.add_review') }}",
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
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
         });

         $('.editReviewBtn').click(function() {
            let reviewId = $(this).data('review-id');
            let url = "{{ route('user.edit_review', ':reviewId') }}".replace(':reviewId', reviewId);
            let editReviewModal = $('#editReviewModal');
            let editReviewForm = editReviewModal.find('form');

            $.get(url, {}, function(data) {
               editReviewForm.find('input[name="review_id"]').val(reviewId);
               editReviewForm.find('input[name="rating"]').val(data.review.rating);
               editReviewForm.find('textarea[name="review"]').val(data.review.review);

               $('.star-update').removeClass('bi-star-fill').addClass('bi-star');
               let rating = $('#rating').val();
               for (let i=0; i<=rating-1; i++) {
                  $('.star-update:eq('+i+')').removeClass('bi-star').addClass('bi-star-fill');
               }
            });
         });

         $('#editReviewForm').submit(function(e) {
            e.preventDefault();

            let reviewId = $(this).find('input[name="review_id"]').val();
            let updateReviewUrl = "{{ route('user.update_review', ':reviewId') }}".replace(':reviewId', reviewId);
            $(this).find('input[name="rating"]').val(rateValue);

            $.ajax({
               type: 'POST',
               url: updateReviewUrl,
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
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

         $('.comments').hide();
         $('.commentBtn').click(function(e) {
            e.preventDefault();

            let reviewId = $(this).data('review-id');
            $('.comment-'+reviewId+'').slideToggle();
         });
      });
   </script>
@endsection