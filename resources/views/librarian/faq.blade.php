@extends('layouts.librarian.main')
@section('title', 'Librarian | FAQ')

@section('content')
   <div class="container mt-4">
      <div class="d-flex justify-content-center">
         <div class="input-group w-50">
            <input class="form-control" id="search_faq" type="text" placeholder="Search..." aria-label="Search">
            <button class="btn btn-dark"><i class="bi bi-search"></i></button>
         </div>
         <button class="btn btn-dark mx-1" type="button" data-bs-toggle="modal" data-bs-target="#addFAQModal"><i class="bi bi-plus-circle me-2"></i>Add FAQ</button>
      </div>
   </div>
   @include('librarian.modal.add-faq-modal')
   <div class="m-4">
      <table class="table table-hover border">
         <thead class="align-middle">
            <tr>
               <th scope="col" class="border text-center">Question</th>
               <th scope="col" class="border text-center">Answer</th>
               <th scope="col" class="border text-center">Action</th>
            </tr>
         </thead>
         <tbody id="faq_list">
            @foreach ($faqs as $faq)
               <tr class="align-middle">
                  <td class="border text-center w-30 py-4">{{ $faq->question }}</td>
                  <td class="border text-center w-50">{{ $faq->answer }}</td>
                  <td class="border text-center">
                     <button type="button" class="btn updateFAQBtn" data-faq-id="{{ $faq->id }}" data-bs-toggle="modal" data-bs-target="#updateFAQModal">
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
         $('#search_faq').keyup(function(e) {
            e.preventDefault();

            let searchFAQ = $('#search_faq').val().toLowerCase();
            let url = "{{ route('librarian.search_faq') }}";

            $.get(url, {search_faq: searchFAQ}, function(response) {
               let searchResults = response.searchedFAQ.data;

               $('#faq_list').html('');
               searchResults.forEach(function(faq) {
                  $('#faq_list').append(
                     `
                     <tr class="align-middle">
                        <td class="border text-center w-30 py-4">${faq.question}</td>
                        <td class="border text-center w-50">${faq.answer}</td>
                        <td class="border text-center">
                           <button type="button" class="btn updateFAQBtn" data-faq-id="${faq.id}" data-bs-toggle="modal" data-bs-target="#updateFAQModal">
                              <i class="bi bi-pencil-fill"></i>
                           </button>
                           <button type="button" class="btn removeFAQBtn" data-faq-id="${faq.id}">
                              <i class="bi bi-trash-fill"></i>
                           </button>
                        </td>
                     </tr>
                     `
                  );
               });
            });
         });

         $('#addFAQForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('librarian.faq.store') }}",
               data: new FormData(this),
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

         $('#faq_list').on('click', '.updateFAQBtn', function() {
            let faqId = $(this).data('faq-id');
            let url = "{{ route('librarian.faq.edit', ':faqId') }}".replace(':faqId', faqId);
            let updateFAQModal = $('#updateFAQModal');
            let updateFAQForm = updateFAQModal.find('form');

            $.get(url, {}, function(data) {
               updateFAQForm.find('input[name="faq_id"]').val(data.faq.id);
               updateFAQForm.find('textarea[name="question"]').val(data.faq.question);
               updateFAQForm.find('textarea[name="answer"]').val(data.faq.answer);

               updateFAQModal.modal('show');
            });
         });

         $('#updateFAQBtn-close1, #updateFAQBtn-close2').click(function() {
            $('#updateFAQForm')[0].reset();
            $('.update-input-field').removeClass('is-valid');
            $('.update-input-field').removeClass('is-invalid');
         });

         $('#updateFAQForm').submit(function(e) {
            e.preventDefault();

            let faqId = $(this).find('input[name="faq_id"]').val();
            let updateFAQUrl = "{{ route('librarian.faq.update', ':faqId') }}".replace(':faqId', faqId);

            $.ajax({
               type: 'POST',
               url: updateFAQUrl,
               data: new FormData(this),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: function(response) {
                  Swal.fire({
                     icon: 'success',
                     title: response.message,
                  }).then(function() {
                     $('#updateFAQModal').modal('hide');
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

                  $('#updateFAQModal').modal('show');
               }
            });
         });

         $('#faq_list').on('click', '.removeFAQBtn', function() {
            let faqId = $(this).data('faq-id');
            let url = "{{ route('librarian.faq.destroy', ':faqId') }}".replace(':faqId', faqId);

            Swal.fire({
               icon: 'warning',
               title: 'Are you sure want to remove this FAQ?',
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