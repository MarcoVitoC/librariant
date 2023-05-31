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
            <div class="card w-85 h-100 cursor-pointer" data-bs-toggle="modal" data-bs-target="#updateBookModal-{{ $book->id }}">
               <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="Book Preview" height="210px">
               <div class="card-body text-decoration">
                  <h5 class="card-title">{{ $book->book_title }}</h5>
                  <p class="card-text text-secondary fst-italic">By: {{ $book->author }}</p>
               </div>
            </div>
         </div>
      @endforeach
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

         $('updateBookBtn').click((e) => {
            e.preventDefault();

            $.ajax({
               type: 'PUT',
               url: "{{ route('librarian.update_book') }}",
               data: new FormData($('#updateBookForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: (response) => {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(() => {
                     $('#updateBookModal').modal('hide');
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

                  $('#updateBookModal').modal('show');
               }
            });
         });

         $('#updateBookBtn-close1, #updateBookBtn-close2').click(() => {
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });
      });

      const addBookPreview = () => {
         const bookImg = document.querySelector('#book_photo');
         const addBookPreview = document.querySelector('.addBookPreview');

         const oFReader = new FileReader();
         oFReader.readAsDataURL(bookImg.files[0]);
         oFReader.onload = (oFREvent) => {
            addBookPreview.src = oFREvent.target.result;
         }
      }

      const updateBookPreview = () => {
         const bookImg = document.querySelector('#book_photo');
         const updateBookPreview = document.querySelector('.updateBookPreview');

         const oFReader = new FileReader();
         oFReader.readAsDataURL(bookImg.files[0]);
         oFReader.onload = (oFREvent) => {
            updateBookPreview.src = oFREvent.target.result;
         }
      }
   </script>
@endsection