@extends('layouts.main')
@section('title', 'Librariant | My Profile')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="mx-6 bg-white rounded">
         <div class="px-4 row d-flex align-items-center">
            <div class="col-xl-2 d-flex justify-content-center">
               <i class="bi bi-person-circle profile-logo"></i>
            </div>
            <div class="col-xl-10">
               <div class="d-flex flex-wrap">
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <label for="full_name" class="col-form-label fw-semibold">📛 Full Name:</label>
                     <input type="text" class="form-control" value="{{ Auth::user()->full_name }}" disabled>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 ps-md-3 ps-xl-3 mb-3">
                     <label for="username" class="col-form-label fw-semibold">🔍 Username:</label>
                     <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 ps-lg-3 ps-xl-3 mb-3">
                     <label for="email" class="col-form-label fw-semibold">📧 Email:</label>
                     <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 ps-md-3 ps-lg-0 ps-xl-0 mb-3">
                     <label for="phone_number" class="col-form-label fw-semibold">📞 Phone Number:</label>
                     <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}" disabled>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 ps-lg-3 ps-xl-3 mb-3">
                     <label for="dob" class="col-form-label fw-semibold">🎂 Date of Birth:</label>
                     <input type="text" class="form-control" value="{{ date('F d, Y', strtotime(Auth::user()->date_of_birth)) }}" disabled>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 ps-md-3 ps-xl-3 mb-3">
                     <label for="dob" class="col-form-label fw-semibold">📆 Joined Since:</label>
                     <input type="text" class="form-control" value="{{ date('F d, Y', strtotime(Auth::user()->created_at)) }}" disabled>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @if ($borrowHistories->isEmpty())
      <div class="d-flex justify-content-center align-items-center m-6" style="height: 54.2vh">
         <h2 class="text-secondary pt-1">📚 You haven't borrowed any books yet.</h2>
      </div>
   @else
      <div class="mx-6 pt-5">
         <h2 class="text-center pb-3">⌛ Borrow History</h2>
         <div class="table-responsive">
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
      </div>
   @endif
   @include('layouts.footer')
@endsection