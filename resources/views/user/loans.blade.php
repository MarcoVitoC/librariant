@extends('layouts.main')
@section('title', 'Librariant | Loans')

@section('content')
   @if ($loanedBooks->isEmpty() && $unconfirmedReturns->isEmpty() && $queues->isEmpty())
      <div class="d-flex justify-content-center align-items-center h-75 my-5">
         <h1 class="text-secondary">🚫 No loans available at the moment.</h1>
      </div>
   @else
      @if ($renewableLoans->isNotEmpty())
         <div class="bg-cornsilk py-5">
            <div class="mx-6">
               <div class="px-4">
                  <h2 class="">Loan Renewal</h2>
                  <p class="fw-normal lh-sm my-3">Need a little extra reading time? Remember, you can make a request to extend your borrowed books within <b>10 days</b> after the loan date.</p>
                  <div class="bg-white rounded px-5 py-3 ">
                     <form action="" method="POST" enctype="multipart/form-data" id="loanRenewalForm" class="d-flex align-items-end justify-content-between">
                        @csrf
                        <div class="w-75">
                           <label for="selected_loan" class="col-form-label">Select loaned book to renew:</label>
                           <select class="form-select text-center" aria-label="Default select example" id="selected_loan" name="selected_loan">
                              @foreach ($renewableLoans as $renewableLoan)
                                 <option value="{{ $renewableLoan->id }}">{{ $renewableLoan->book->book_title }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="ms-3 w-30">
                           <label for="renewed_due_date" class="col-form-label">Renewed due date:</label>
                           <input type="date" class="form-control input-field" id="renewed_due_date" name="renewed_due_date" value="{{ old('renewed_due_date') }}">
                           <div class="renewed_due_date-feedback"></div>
                        </div>
                        <button type="submit" class="btn btn-dark ms-3">Request</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      @endif
      @if ($loanedBooks->isNotEmpty())
         <div class="mx-6 my-5">
            <div class="mx-4">
               <h2 class="pb-3">My Loans</h2>
               <table class="table table-hover border">
                  <thead class="align-middle">
                     <tr>
                        <th scope="col" class="border text-center">Book Preview</th>
                        <th scope="col" class="border text-center">Book Title</th>
                        <th scope="col" class="border text-center">Loan Date</th>
                        <th scope="col" class="border text-center">Due Date</th>
                        <th scope="col" class="border text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($loanedBooks as $loanedBook)
                        <tr class="align-middle">
                           <td class="border text-center"><img src="{{ asset('storage/' . $loanedBook->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                           <td class="border text-center">{{ $loanedBook->book->book_title }}</td>
                           <td class="border text-center">{{ date('M d, Y', strtotime($loanedBook->loanHeader->loan_date)) }}</td>
                           <td class="border text-center">{{ date('M d, Y', strtotime($loanedBook->due_date)) }}</td>
                           <td class="border text-center">
                              <button type="submit" class="btn btn-outline-dark col-7 mt-1 returnBookBtn" data-book-id="{{ $loanedBook->book->id }}"><i class="bi bi-reply-fill"></i> Return book</button>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      @endif
      @if ($unconfirmedReturns->isNotEmpty())
         <div class="mx-6 my-5">
            <div class="mx-4">
               <h2 class="pb-3">Unconfirmed Returned Books</h2>
               <table class="table table-hover border">
                  <thead class="align-middle">
                     <tr>
                        <th scope="col" class="border text-center">Book Preview</th>
                        <th scope="col" class="border text-center">Book Title</th>
                        <th scope="col" class="border text-center">Returned Date</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($unconfirmedReturns as $unconfirmedReturn)
                        <tr class="align-middle">
                           <td class="border text-center"><img src="{{ asset('storage/' . $unconfirmedReturn->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                           <td class="border text-center">{{ $unconfirmedReturn->book->book_title }}</td>
                           <td class="border text-center">{{ date('M d, Y', strtotime($unconfirmedReturn->due_date)) }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      @endif
      @if ($queues->isNotEmpty())
         <div class="mx-6 my-5">
            <div class="mx-4">
               <h2 class="pb-3">Queues</h2>
               <table class="table table-hover border">
                  <thead class="align-middle">
                     <tr>
                        <th scope="col" class="border text-center">Book Preview</th>
                        <th scope="col" class="border text-center">Book Title</th>
                        <th scope="col" class="border text-center">Author</th>
                        <th scope="col" class="border text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($queues as $queue)
                        <tr class="align-middle">
                           <td class="border text-center"><img src="{{ asset('storage/' . $queue->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                           <td class="border text-center">{{ $queue->book->book_title }}</td>
                           <td class="border text-center">{{ $queue->book->author }}</td>
                           <td class="border text-center">
                              <button type="submit" class="btn btn-outline-dark col-6 mt-1 cancelQueueBtn" data-queue-id="{{ $queue->id }}" ><i class="bi bi-x-circle-fill me-2"></i>Cancel</button>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      @endif
   @endif
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
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

         $('.cancelQueueBtn').click(function() {
            let queueId = $(this).data('queue-id');

            Swal.fire({
               icon: 'question',
               title: 'Are you sure about canceling this queue?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes',
               reverseButtons: true
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'DELETE',
                     url: "{{ route('user.cancel_queue') }}",
                     data: {queue_id: queueId},
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

         $('#loanRenewalForm').submit(function(e) {
            e.preventDefault();

            let loanRenewalRequest = this;

            Swal.fire({
               icon: 'question',
               title: 'Are you sure want to renew this loan?',
               showCancelButton: true,
               cancelButtonColor: '#D33',
               confirmButtonColor: '#3085D6',
               confirmButtonText: 'Yes',
               reverseButtons: true
            }).then(function(result) {
               if (result.isConfirmed) {
                  $.ajax({
                     type: 'POST',
                     url: "{{ route('user.renew_loan') }}",
                     data: new FormData(loanRenewalRequest),
                     dataType: 'json',
                     processData: false,
                     contentType: false,
                     success: function(response) {
                        Swal.fire({
                           icon: 'success',
                           title: '📩 Request Forwaded!',
                           text: response.message
                        }).then(function() {
                           $('#loanRenewalForm')[0].reset();
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
                              Swal.fire({
                                 icon: 'error',
                                 title: 'Invalid Input!',
                                 text: 'Please ensure that you have filled in the renewed due date field and that the date selected is within a maximum of one week from the current due date.'
                              });
                           }
                        }
                     }
                  });
               }
            });
         });
      });
   </script>
@endsection