@extends('layouts.librarian.master')
@section('title', 'Librarian | Books')

@section('content')
   <div class="container mt-4">
      <form class="d-flex justify-content-center" role="search">
         <input class="form-control w-50 me-2" type="search" placeholder="Search..." aria-label="Search">
         <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
         <button class="btn btn-dark ms-1" type="button"><i class="bi bi-sliders me-2"></i>Filter</button>
         <button class="btn btn-dark mx-1" type="button"><i class="bi bi-arrow-down-up me-2"></i>Sort by</button>
         <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal"><i class="bi bi-journal-plus me-2"></i>Add book</button>
      </form>
   </div>
   @include('librarian.modal.add-book-modal')
   <div class="row row-cols-1 row-cols-md-6 gx-1 gy-4 m-4">
      @foreach ($books as $book)
         <div class="d-flex justify-content-center">
            <div class="card w-85 h-100 cursor-pointer bookCard" data-book-id="{{ $book->id }}">
               <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="Book Preview" height="210px" id="displayBookPhoto">
               <div class="card-body text-decoration">
                  <h5 class="card-title">{{ $book->book_title }}</h5>
                  <p class="card-text text-secondary fst-italic">By: {{ $book->author }}</p>
               </div>
            </div>
         </div>
      @endforeach
   </div>
   @include('librarian.modal.edit-book-modal')
   <div class="d-flex justify-content-between align-items-center mx-5">
      <p class="text-secondary fw-normal fs-7">
         Showing <span class="fw-medium">{{ $books->firstItem() }}</span> to <span class="fw-medium">{{ $books->lastItem() }}</span> of <span class="fw-medium">{{ $books->total() }}</span> results
      </p>
      {{ $books->links() }}
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(() => {
         $('#addBookBtn').click((e) => {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.add_book') }}",
               data: new FormData($('#addBookForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: (response) => {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(() => {
                     $('#addBookForm')[0].reset();
                     $('.addBookPreview').attr('src', "{{ asset('images/banner.png') }}");
                     $('#addBookModal').modal('hide');
                  });
               },
               error: (xhr, status, error) => {
                  let response = JSON.parse(xhr.responseText);
                  let inputFields = $('.input-field').map(function() {
                     return this.id;
                  }).get();

                  for (let inputField of inputFields) {
                     let errorMessage = response.errors[inputField];
                     if (response.errors.hasOwnProperty(inputField)) {
                        $('#' +inputField).removeClass('is-valid');
                        $('#' +inputField).addClass('is-invalid');
                        $('.' +inputField+ '-feedback').addClass('invalid-feedback').text(errorMessage);
                     } else {
                        $('#' +inputField).removeClass('is-invalid');
                        $('.' +inputField+ '-feedback').removeClass('invalid-feedback').text('');
                        $('#' +inputField).addClass('is-valid');
                     }
                  }

                  $('#addBookModal').modal('show');
               }
            });
         });

         $('#addBookBtn-close1, #addBookBtn-close2').click(() => {
            $('#addBookForm')[0].reset();
            $('.addBookPreview').attr('src', "{{ asset('images/banner.png') }}");
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });

         // $('#removeBookBtn').click((e) => {
         //    e.preventDefault();
         //    console.log('REMOVE');
         //    Swal.fire({
         //       icon: 'warning',
         //       title: 'Are you sure want to remove this book?',
         //       text: 'Removed book cannot be undo!',
         //       showCancelButton: true,
         //       cancelButtonColor: '#D33',
         //       confirmButtonColor: '#3085D6',
         //       confirmButtonText: 'Yes'
         //    }).then((result) => {
         //       if (result.isConfirmed) {
         //          Swal.fire(
         //             icon: 'success',
         //             title: 'Book removed successfully!'
         //          )
         //       }
         //       $('#editBookModal').modal('hide');
         //    });
         // });

         $('.bookCard').click(function() {
            let bookId = $(this).data('book-id');
            let url = "{{ route('librarian.book_details') }}";
            let editBookModal = $('.editBookModal');
            let editBookForm = editBookModal.find('form');
            $.get(url, {id: bookId}, function(data) {
               editBookForm.find('input[name="book_id"]').val(data.book.id);
               $('.updatedBookPreview').attr('src', "{{ asset('storage/') }}" + '/' + data.book.book_photo);
               editBookForm.find('input[name="oldBookPreview"]').val(data.book.book_photo);
               editBookForm.find('input[name="isbn"]').val(data.book.isbn);
               editBookForm.find('input[name="book_title"]').val(data.book.book_title);
               editBookForm.find('input[name="author"]').val(data.book.author);
               editBookForm.find('input[name="pages"]').val(data.book.pages);
               editBookForm.find('input[name="publisher"]').val(data.book.publisher);
               editBookForm.find('input[name="publish_date"]').val(data.book.publish_date);
               editBookForm.find('input[name="genre"]').val(data.book.genre);
               editBookForm.find('input[name="quantity"]').val(data.book.quantity);
               editBookForm.find('input[name="language"]').val(data.book.language);
               editBookForm.find('textarea[name="summary"]').val(data.book.summary);
               $('.editBookModal').modal('show');
            }, 'json');
         });

         $('input[type="file"][name="book_photo"]').on('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
               $('.updatedBookPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL($(this)[0].files[0]);
         });

         $('#updateBookForm').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.update_book') }}",
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: (response) => {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(() => {
                     $('.editBookModal').modal('hide');
                  });
               },
               error: (xhr, status, error) => {
                  let response = JSON.parse(xhr.responseText);
                  let updateInputFields = $('.update-input-field').map(function() {
                     return this.id;
                  }).get();

                  for (let updateInputField of updateInputFields) {
                     let inputField = updateInputField.split('-')[1];
                     let errorMessage = response.errors[inputField];

                     if (response.errors.hasOwnProperty(inputField)) {
                        $('#update-' +inputField).removeClass('is-valid');
                        $('#update-' +inputField).addClass('is-invalid');
                        $('.' +inputField+ '-feedback').addClass('invalid-feedback').text(errorMessage);
                     } else {
                        $('#update-' +inputField).removeClass('is-invalid');
                        $('.' +inputField+ '-feedback').removeClass('invalid-feedback').text('');
                        $('#update-' +inputField).addClass('is-valid');
                     }
                  }

                  $('.editBookModal').modal('show');
               }
            });
         });

         $('#editBookBtn-close1, #editBookBtn-close2').click(() => {
            $('#updateBookForm')[0].reset();
            $('.update-input-field').removeClass('is-valid');
            $('.update-input-field').removeClass('is-invalid');
         });
      });

      const bookPreview = (bookPhoto, bookPreview) => {
         const bookImg = document.querySelector('#' +bookPhoto);
         const bookPreviewDisplay = document.querySelector('.' +bookPreview);

         const oFReader = new FileReader();
         oFReader.readAsDataURL(bookImg.files[0]);
         oFReader.onload = (oFREvent) => {
            bookPreviewDisplay.src = oFREvent.target.result;
         }
      }
   </script>
@endsection