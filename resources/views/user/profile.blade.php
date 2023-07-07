@extends('layouts.main')
@section('title', 'Librariant | My Profile')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="mx-6">
         <div class="px-4 d-flex align-items-center">
            <i class="bi bi-person-circle profile-logo me-5"></i>
            <div class="">
               <div class="lh-0">
                  <h1 class="fw-bold">{{ Auth::user()->full_name }}</h1>
                  <p class="fw-normal text-secondary fs-4">{{ Auth::user()->username }}</p>
               </div>
               <div class="d-flex">
                  <p class="fw-normal fs-6 me-3"><i class="bi bi-envelope-fill"></i> {{ Auth::user()->email }}</p>
                  <p class="fw-normal fs-6 me-3"><i class="bi bi-clock-fill"></i> Joined since {{ Auth::user()->created_at }}</p>
                  <p class="fw-normal fs-6 me-3"><i class="bi bi-geo-alt-fill"></i> {{ Auth::user()->address }}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   @if ($borrowHistories->isEmpty())
      <div class="d-flex justify-content-center align-items-center m-6">
         <h1 class="text-secondary pt-1">📚 You haven't borrowed any books yet.</h1>
      </div>
   @else
      <div class="mx-6 pt-5">
         <h2 class="text-center pb-3">Borrow History</h2>
         <table class="table table-hover border">
            <thead class="align-middle">
               <tr>
                  <th scope="col" class="border text-center">Book Preview</th>
                  <th scope="col" class="border text-center">Book Title</th>
                  <th scope="col" class="border text-center">Loan Date</th>
                  <th scope="col" class="border text-center">Returned Date</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($borrowHistories as $borrowHistory)
                  <tr class="align-middle">
                     <td class="border text-center"><img src="{{ asset('storage/' . $borrowHistory->book->book_photo) }}" alt="Book Preview" width="60px" height="70px"></td>
                     <td class="border text-center">{{ $borrowHistory->book->book_title }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($borrowHistory->loanHeader->loan_date)) }}</td>
                     <td class="border text-center">{{ date('M d, Y', strtotime($borrowHistory->returned_date)) }}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   @endif
   @include('layouts.footer')
@endsection