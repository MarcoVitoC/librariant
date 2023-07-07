@extends('layouts.librarian.main')
@section('title', 'Librarian | FAQ')

@section('content')
   <div class="container mt-4">
      <form class="d-flex justify-content-center" role="search">
         <input class="form-control w-50 me-2" type="search" placeholder="Search..." aria-label="Search">
         <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
         <button class="btn btn-dark mx-1" type="button" data-bs-toggle="modal" data-bs-target="#addFAQModal"><i class="bi bi-plus-circle me-2"></i>Add FAQ</button>
      </form>
   </div>
   @include('librarian.modal.add-faq-modal')
   <div class="d-flex justify-content-center">
      <div class="accordion mx-6 mt-4 w-75" id="accordionExample">
         @foreach ($faqs as $faq => $f)
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq }}" aria-expanded="false" aria-controls="collapse{{ $faq }}">
                     {{ $f->question }}
                  </button>
               </h2>
               <div id="collapse{{ $faq }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     {{ $f->answer }}
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#addFAQBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.add_faq') }}",
               data: new FormData($('#addFAQForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: function(response) {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(function() {
                     $('#addFAQForm')[0].reset();
                     $('#addFAQModal').modal('hide');
                     location.reload();
                  });
               },
               error: function(xhr, status, error) {
                  let response = JSON.parse(xhr.responseText);
                  console.log(response);
                  let inputFields = $('.input-field').map(function() {
                     return this.id;
                  }).get();

                  for (let inputField of inputFields) {
                     let errorMessage = response.errors[inputField];
                     if (response.errors.hasOwnProperty(inputField)) {
                        $('#' +inputField).removeClass('is-valid');
                        $('#' +inputField).addClass('is-invalid');
                        $('.' +inputField+ '-feedback').addClass('invalid-feedback').text(errorMessage);
                     }else {
                        $('#' +inputField).removeClass('is-invalid');
                        $('.' +inputField+ '-feedback').removeClass('invalid-feedback').text('');
                        $('#' +inputField).addClass('is-valid');
                     }
                  }

                  $('#addFAQModal').modal('show');
               }
            });
         });

         $('#addFAQBtn-close1, #addFAQBtn-close2').click(function() {
            $('#addFAQForm')[0].reset();
            $('.input-field').removeClass('is-valid');
            $('.input-field').removeClass('is-invalid');
         });
      });
   </script>
@endsection