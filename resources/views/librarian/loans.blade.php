@extends('layouts.librarian.main')
@section('title', 'Librarian | Loans')

@section('content')
   @if ($loanedBooks->isEmpty())
      <div class="d-flex justify-content-center align-items-center h-75">
         <h1 class="text-secondary">🚫 No loaned books available at the moment.</h1>
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
                     <th scope="col" class="border text-center">Due Date</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($loanedBooks as $loanedBook)
                     <tr class="align-middle">
                        <td class="border text-center"><img src="{{ asset('storage/' . $loanedBook->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                        <td class="border text-center">{{ $loanedBook->book->book_title }}</td>
                        <td class="border text-center">{{ $loanedBook->loanHeader->user->username }}</td>
                        <td class="border text-center">{{ date('M d, Y', strtotime($loanedBook->loanHeader->loan_date)) }}</td>
                        <td class="border text-center">{{ date('M d, Y', strtotime($loanedBook->due_date)) }}</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mx-5">
         {{ $loanedBooks->links() }}
      </div>
   @endif
@endsection