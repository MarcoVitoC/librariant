@extends('layouts.librarian.main')
@section('title', 'Librarian | Renewals')

@section('content')
   @if ($renewals->isEmpty())
      <div class="d-flex justify-content-center align-items-center h-75">
         <h1 class="text-secondary">🚫 No renewal requests available at the moment.</h1>
      </div>
   @else
      <div class="m-4">
         <table class="table table-hover border">
            <thead class="align-middle">
               <tr>
                  <th scope="col" class="border text-center">Book Preview</th>
                  <th scope="col" class="border text-center">Book Title</th>
                  <th scope="col" class="border text-center">Borrower</th>
                  <th scope="col" class="border text-center">Loan Date</th>
                  <th scope="col" class="border text-center">Renewal Date</th>
                  <th scope="col" class="border text-center">Current Due Date</th>
                  <th scope="col" class="border text-center">Renewed Due Date</th>
                  <th scope="col" class="border text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($renewals as $renewal)
                  <tr class="align-middle">
                     <td class="border text-center"><img src="{{ asset('storage/' . $renewal->loanDetail->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                     <td class="border text-center">{{ $renewal->loanDetail->book->book_title }}</td>
                     <td class="border text-center">{{ $renewal->user->username }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($renewal->loanDetail->loanHeader->loan_date)) }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($renewal->renewal_date)) }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($renewal->loanDetail->due_date)) }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($renewal->renewed_due_date)) }}</td>
                     <td class="border text-center">
                        <button class="btn btn-dark returnConfirmBtn" data-loan-id="{{ $renewal->id }}"><i class="bi bi-check-circle-fill me-2"></i>Renew</button>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   @endif
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         //
      });
   </script>
@endsection