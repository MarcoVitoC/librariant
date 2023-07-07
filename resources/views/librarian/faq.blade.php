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
   <div class="m-4">
      <table class="table table-hover border">
         <thead class="align-middle">
            <tr>
               <th scope="col" class="border text-center">No.</th>
               <th scope="col" class="border text-center">Question</th>
               <th scope="col" class="border text-center">Answer</th>
               <th scope="col" class="border text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($faqs as $faq)
               <tr class="align-middle">
                  <td class="border text-center">{{ $loop->iteration }}</td>
                  <td class="border text-center w-30 py-4">{{ $faq->question }}</td>
                  <td class="border text-center w-50">{{ $faq->answer }}</td>
                  <td class="border text-center">
                     <button type="button" class="btn" data-faq-id="{{ $faq->id }}" data-bs-toggle="modal" data-bs-target="#updateFAQModal">
                        <i class="bi bi-pencil-fill"></i>
                     </button>
                     <button type="button" class="btn removeFAQBtn" data-faq-id="{{ $faq->id }}">
                        <i class="bi bi-trash-fill"></i>
                     </button>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   @include('librarian.modal.update-faq-modal')
   <div class="d-flex justify-content-between align-items-center mx-5">
      <p class="text-secondary fw-normal fs-7">
         Showing <span class="fw-medium">{{ $faqs->firstItem() }}</span> to <span class="fw-medium">{{ $faqs->lastItem() }}</span> of <span class="fw-medium">{{ $faqs->total() }}</span> results
      </p>
      <nav>
         <ul class="pagination">
            <li class="page-item {{ $faqs->currentPage() === 1 ? 'disabled' : '' }}">
               <a class="page-link" href="{{ $faqs->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&lsaquo;</a>
            </li>
            @for ($i = 1; $i <= $faqs->lastPage(); $i++)
               <li class="page-item {{ $faqs->currentPage() === $i ? 'active' : '' }}">
                  <a class="page-link" href="{{ $faqs->url($i) }}">{{ $i }}</a>
               </li>
            @endfor
            <li class="page-item {{ $faqs->currentPage() === $faqs->lastPage() ? 'disabled' : '' }}">
               <a class="page-link" href="{{ $faqs->nextPageUrl() }}">&rsaquo;</a>
            </li>
         </ul>
      </nav>
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

         $('#updateFAQBtn').click(function() {
            
         });
      });
   </script>
@endsection