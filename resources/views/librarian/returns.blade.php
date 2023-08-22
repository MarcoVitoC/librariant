@extends('layouts.librarian.main')
@section('title', 'Librarian | Returned Books')

@section('content')
   @if ($returnedBooks->isEmpty())
      <div class="d-flex justify-content-center align-items-center h-75">
         <h1 class="text-secondary">🚫 No returned books available at the moment.</h1>
      </div>
   @else
      <div class="m-4">
         <div class="table-responsive">
            <table class="table table-hover border">
               <thead class="align-middle">
                  <tr>
                     <th scope="col" class="border text-center">Book Preview</th>
                     <th scope="col" class="border text-center">Book Title</th>
                     <th scope="col" class="border text-center">Borrower</th>
                     <th scope="col" class="border text-center">Loan Date</th>
                     <th scope="col" class="border text-center">Returned Date</th>
                     <th scope="col" class="border text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($returnedBooks as $returnedBook)
                     <tr class="align-middle">
                        <td class="border text-center"><img src="{{ asset('storage/' . $returnedBook->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                        <td class="border text-center">{{ $returnedBook->book->book_title }}</td>
                        <td class="border text-center">{{ $returnedBook->loanHeader->user->username }}</td>
                        <td class="border text-center">{{ date('M d, Y', strtotime($returnedBook->loanHeader->loan_date)) }}</td>
                        <td class="border text-center">{{ date('M d, Y', strtotime($returnedBook->returned_date)) }}</td>
                        <td class="border text-center">
                           <button class="btn btn-dark returnConfirmBtn" data-book-id="{{ $returnedBook->book->id }}" data-loan-id="{{ $returnedBook->id }}"><i class="bi bi-check-circle-fill me-2"></i>Confirm</button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mx-5">
         {{ $returnedBooks->links() }}
      </div>
   @endif
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('.returnConfirmBtn').click(function() {
            let bookId = $(this).data('book-id');
            let loanId = $(this).data('loan-id');

            Swal.fire({
               icon: 'question',
               title: 'Do you want to confirm this book return?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes',
               reverseButtons: true
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'POST',
                     url: "{{ route('librarian.return_confirmation') }}",
                     data: {book_id: bookId, loan_detail_id: loanId},
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
               }
            });
         });
      });
   </script>
@endsection