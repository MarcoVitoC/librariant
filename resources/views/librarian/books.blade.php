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
   <div class="m-4">
      <table class="table table-hover border">
         <thead class="align-middle">
            <tr>
              <th scope="col" class="border text-center">ISBN</th>
              <th scope="col" class="border text-center">Book Preview</th>
              <th scope="col" class="border text-center">Book Title</th>
              <th scope="col" class="border text-center">Author</th>
              <th scope="col" class="border text-center">Quantity</th>
              <th scope="col" class="border text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($books as $book)
               <tr class="align-middle">
                  <td class="border text-center">{{ $book->isbn }}</td>
                  <td class="border text-center"><img src="{{ asset('storage/' . $book->book_photo) }}" alt="Book Preview" width="60px" height="70px" id="displayBookPhoto"></td>
                  <td class="border text-center">{{ $book->book_title }}</td>
                  <td class="border text-center">{{ $book->author }}</td>
                  <td class="border text-center">{{ $book->quantity }}</td>
                  <td class="border text-center">
                     <button type="button" class="btn btn-warning updateBookBtn" data-book-id="{{ $book->id }}">
                        <i class="bi bi-pencil-square"></i>
                     </button>
                     <button type="button" class="btn btn-danger removeBookBtn" data-book-id="{{ $book->id }}">
                        <i class="bi bi-trash"></i>
                     </button>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   @include('librarian.modal.update-book-modal')
   <div class="d-flex justify-content-between align-items-center mx-5">
      <p class="text-secondary fw-normal fs-7">
         Showing <span class="fw-medium">{{ $books->firstItem() }}</span> to <span class="fw-medium">{{ $books->lastItem() }}</span> of <span class="fw-medium">{{ $books->total() }}</span> results
      </p>
      {{ $books->links() }}
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#addBookBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.add_book') }}",
               data: new FormData($('#addBookForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: function(response) {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(function() {
                     $('#addBookForm')[0].reset();
                     $('.addBookPreview').attr('src', "{{ asset('images/banner.png') }}");
                     $('#addBookModal').modal('hide');
                  });
               },
               error: function(xhr, status, error) {
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

         $('input[type="file"][id="book_photo"]').on('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
               $('.addBookPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL($(this)[0].files[0]);
         });

         $('#addBookBtn-close1, #addBookBtn-close2').click(function() {
            $('#addBookForm')[0].reset();
            $('.addBookPreview').attr('src', "{{ asset('images/banner.png') }}");
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });

         $('.updateBookBtn').click(function() {
            let bookId = $(this).data('book-id');
            let url = "{{ route('librarian.book_details') }}";
            let updateBookModal = $('.updateBookModal');
            let updateBookForm = updateBookModal.find('form');

            $.get(url, {id: bookId}, function(data) {
               updateBookForm.find('input[name="book_id"]').val(data.book.id);
               $('.updatedBookPreview').attr('src', "{{ asset('storage/') }}" + '/' + data.book.book_photo);
               updateBookForm.find('input[name="oldBookPreview"]').val(data.book.book_photo);
               updateBookForm.find('input[name="isbn"]').val(data.book.isbn);
               updateBookForm.find('input[name="book_title"]').val(data.book.book_title);
               updateBookForm.find('input[name="author"]').val(data.book.author);
               updateBookForm.find('input[name="pages"]').val(data.book.pages);
               updateBookForm.find('input[name="publisher"]').val(data.book.publisher);
               updateBookForm.find('input[name="publish_date"]').val(data.book.publish_date);
               updateBookForm.find('input[name="genre"]').val(data.book.genre);
               updateBookForm.find('input[name="quantity"]').val(data.book.quantity);
               updateBookForm.find('input[name="language"]').val(data.book.language);
               updateBookForm.find('textarea[name="summary"]').val(data.book.summary);

               updateBookModal.modal('show');
            });
         });

         $('input[type="file"][id="update-book_photo"]').on('change', function() {
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
               success: function(response) {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(function() {
                     $('.updateBookModal').modal('hide');
                     location.reload();
                  });
               },
               error: function(xhr, status, error) {
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

                  $('.updateBookModal').modal('show');
               }
            });
         });

         $('#updateBookBtn-close1, #updateBookBtn-close2').click(function() {
            $('#updateBookForm')[0].reset();
            $('.update-input-field').removeClass('is-valid');
            $('.update-input-field').removeClass('is-invalid');
         });

         $('.removeBookBtn').click(function() {
            let bookId = $(this).data('book-id');
            let url = "{{ route('librarian.remove_book') }}";

            Swal.fire({
               icon: 'warning',
               title: 'Are you sure want to remove this book?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes'
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'DELETE',
                     url: url,
                     data: {id: bookId},
                     dataType: 'json',
                     success: function(response) {
                        Swal.fire({
                           icon: 'success',
                           title: response.message
                        }).then(function() {
                           location.reload();
                        });
                     }
                  });
               }
            });
         });
      });
   </script>
@endsection