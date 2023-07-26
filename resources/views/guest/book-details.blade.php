@extends('layouts.main')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="240px" height="310px" class="rounded">
            <div class="my-3">
               <a href="{{ route('login') }}" class="btn btn-dark col-12 mt-1">
                  <i class="bi bi-book-fill me-2"></i>Borrow
               </a>
            </div>
         </div>
         <div>
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>
            <button class="btn btn-dark btn-sm disabled">Quantity: {{ $bookDetails->quantity }}</button>
            <h5 class="fw-normal mt-4">Summary:</h5>
            <h6 class="fw-normal mb-4">{{ $bookDetails->summary }}</h6>
            <h6 class="fw-normal">Language: {{ $bookDetails->language }}</h6>
            <h6 class="fw-normal">Genre: {{ $bookDetails->genre }}</h6>
            <h6 class="fw-normal">Pages: {{ $bookDetails->pages }} pages</h6>
            <h6 class="fw-normal">Published on {{ date('M d, Y', strtotime($bookDetails->publish_date)) }}</h6>
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection