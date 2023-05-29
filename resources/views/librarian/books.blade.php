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

@endsection

@section('js-extra')
   <script>
      $(document).ready(() => {
         $('#addBookBtn').click((e) => {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.add_book') }}",
               data: new FormData($('#addbookForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: (response) => {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(() => {
                     $('#addbookForm')[0].reset();
                     $('.bookPreview').attr('src', "{{ asset('images/banner.png') }}");
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

         $('#btn-close1, #btn-close2').click(() => {
            $('#addbookForm')[0].reset();
            $('.bookPreview').attr('src', "{{ asset('images/banner.png') }}");
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });
      });

      const bookPreview = () => {
         const bookImg = document.querySelector('#book_photo');
         const bookPreview = document.querySelector('.bookPreview');

         const oFReader = new FileReader();
         oFReader.readAsDataURL(bookImg.files[0]);
         oFReader.onload = function(oFREvent) {
            bookPreview.src = oFREvent.target.result;
         }
      }
   </script>
@endsection