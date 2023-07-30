@extends('layouts.main')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="240px" height="310px" class="rounded">
            <div class="my-3">
               {{-- <button type="submit" class="btn btn-dark col-12 mb-1"><i class="bi bi-bag-plus-fill me-2"></i>Add to cart</button> --}}
               <button type="submit" class="btn btn-dark col-12 mt-1 borrowBtn" data-book-id="{{ $bookDetails->id }}" data-book-quantity="{{ $bookDetails->quantity }}" data-book-status="{{ $bookStatus }}"><i class="bi bi-book-fill me-2"></i>Borrow</button>
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
               
               @if ($isReviewed)
                  <button class="btn btn-dark btn-sm ms-2" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-star-fill me-2"></i>Rated</button>
               @else
                  <button class="btn btn-outline-dark btn-sm ms-2 reviewBookBtn" data-bs-toggle="modal" data-bs-target="#addReviewModal" data-book-id="{{ $bookDetails->id }}"><i class="bi bi-star-fill me-2"></i>Rate this book</button>
               @endif
            </div>
            @include('user.modal.add-review-modal')
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
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         let rateIndex = -1;
         let rateValue = -1;
         $('.star').click(function() {
            rateIndex = $(this).data('index');
            rateValue = $(this).data('value');
            $('.submitReviewBtn').removeClass('disabled');
         });

         $('.star').mouseover(function() {
            let currentIndex = $(this).data('index');
            
            for (let i=0; i<=currentIndex; i++) {
               $('.star:eq('+i+')').removeClass('bi-star').addClass('bi-star-fill');
            }
         });

         $('.star').mouseleave(function() {
            $('.star').removeClass('bi-star-fill').addClass('bi-star');
            
            if (rateIndex != -1) {
               for (let i=0; i<=rateIndex; i++) {
                  $('.star:eq('+i+')').removeClass('bi-star').addClass('bi-star-fill');
               }
            }
         });

         $('#addReviewBtn-close').click(function() {
            $('.star').removeClass('bi-star-fill').addClass('bi-star');
            $('.submitReviewBtn').addClass('disabled');
            $('#addReviewForm')[0].reset();
            rateIndex = -1;
            rateValue = -1;
         });

         $('.modal').click(function(e) {
            if ($(e.target).hasClass('modal')) {
               $('.star').removeClass('bi-star-fill').addClass('bi-star');
               $('.submitReviewBtn').addClass('disabled');
               $('#addReviewForm')[0].reset();
               rateIndex = -1;
               rateValue = -1;
            }
         });

         $('#addReviewForm').submit(function(e) {
            e.preventDefault();

            let bookId = $('.reviewBookBtn').data('book-id');
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
               loaned: {
                  icon: 'error',
                  title: 'Sorry!',
                  text: 'Please return the borrowed book first!'
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
                     background: '#FFBF9B',
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
      });
   </script>
@endsection