@extends('layouts.librarian.main')
@section('title', 'Librarian | Books')

@section('content')
   <div class="container mt-4">
      <div class="d-flex justify-content-center">
         <div class="input-group w-50">
            <input class="form-control" id="search_book" type="text" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-dark" id="button-addon2"><i class="bi bi-search"></i></button>
         </div>
         {{-- <button class="btn btn-dark ms-1" type="button"><i class="bi bi-sliders me-2"></i>Filter</button>
         <button class="btn btn-dark mx-1" type="button"><i class="bi bi-arrow-down-up me-2"></i>Sort by</button> --}}
         <button class="btn btn-dark ms-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal"><i class="bi bi-journal-plus me-2"></i>Add book</button>
      </div>
   </div>
   @include('librarian.modal.add-book-modal')
   @if ($books->isEmpty())
      <div class="d-flex justify-content-center align-items-center h-75">
         <h1 class="text-secondary">📚 No books available.</h1>
      </div>
   @else
      <div class="m-4">
         <div class="table-responsive">
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
               <tbody id="book_list">
                  @foreach ($books as $book)
                     <tr class="align-middle">
                        <td class="border text-center">{{ $book->isbn }}</td>
                        <td class="border text-center"><img src="{{ asset('storage/' . $book->book_photo) }}" alt="Book Preview" width="60px" height="70px" id="displayBookPhoto"></td>
                        <td class="border text-center">{{ $book->book_title }}</td>
                        <td class="border text-center">{{ $book->author }}</td>
                        <td class="border text-center">{{ $book->quantity }}</td>
                        <td class="border text-center">
                           <button type="button" class="btn updateBookBtn" data-book-id="{{ $book->id }}">
                              <i class="bi bi-pencil-fill"></i>
                           </button>
                           <button type="button" class="btn removeBookBtn" data-book-id="{{ $book->id }}">
                              <i class="bi bi-trash-fill"></i>
                           </button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mx-5">
         {{ $books->links() }}
      </div>
   @endif
   @include('librarian.modal.update-book-modal')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#search_book').keyup(function(e) {
            e.preventDefault();

            let searchBook = $('#search_book').val().toLowerCase();
            let url = "{{ route('librarian.search_book') }}";

            $.get(url, {search_book: searchBook}, function(response) {
               let searchResults = response.searchedBook.data;

               $('#book_list').html('');
               searchResults.forEach(function(book) {
                  $('#book_list').append(
                     `
                     <tr class="align-middle">
                        <td class="border text-center">${book.isbn}</td>
                        <td class="border text-center"><img src="{{ asset('storage/') }}${'/'}${book.book_photo}" alt="Book Preview" width="60px" height="70px" id="displayBookPhoto"></td>
                        <td class="border text-center">${book.book_title}</td>
                        <td class="border text-center">${book.author}</td>
                        <td class="border text-center">${book.quantity}</td>
                        <td class="border text-center">
                           <button type="button" class="btn updateBookBtn" data-book-id="${book.id}">
                              <i class="bi bi-pencil-fill"></i>
                           </button>
                           <button type="button" class="btn removeBookBtn" data-book-id="${book.id}">
                              <i class="bi bi-trash-fill"></i>
                           </button>
                        </td>
                     </tr>
                     `
                  );
               });
            });
         });

         $('#addBookForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.book.store') }}",
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: function(response) {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(function() {
                     $('#addBookForm')[0].reset();
                     $('.addBookPreview').attr('src', "{{ asset('images/Book Preview.png') }}");
                     $('#addBookModal').modal('hide');
                     location.reload();
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
            $('.addBookPreview').attr('src', "{{ asset('images/Book Preview.png') }}");
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });

         $('#book_list').on('click', '.updateBookBtn', function() {
            let bookId = $(this).data('book-id');
            let url = "{{ route('librarian.book.edit', ':bookId') }}".replace(':bookId', bookId);
            let updateBookModal = $('.updateBookModal');
            let updateBookForm = updateBookModal.find('form');

            $.get(url, {}, function(data) {
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

            let bookId = $(this).find('input[name="book_id"]').val();
            let updateBookUrl = "{{ route('librarian.book.update', ':bookId') }}".replace(':bookId', bookId);
            
            $.ajax({
               type: 'POST',
               url: updateBookUrl,
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

         $('#book_list').on('click', '.removeBookBtn', function() {
            let bookId = $(this).data('book-id');
            let url = "{{ route('librarian.book.destroy', ':bookId') }}".replace(':bookId', bookId);

            Swal.fire({
               icon: 'warning',
               title: 'Are you sure want to remove this book?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes',
               reverseButtons: true
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'DELETE',
                     url: url,
                     data: {},
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