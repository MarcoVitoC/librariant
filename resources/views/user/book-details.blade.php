@extends('layouts.master')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="240px" height="310px" class="rounded">
            <div class="my-3">
               <button class="btn btn-dark col-12 mb-1"><i class="bi bi-bag-plus-fill me-2"></i>Add to cart</button>
               <button class="btn btn-dark col-12 mt-1"><i class="bi bi-book-fill me-2"></i>Borrow</button>
            </div>
         </div>
         <div>
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>
            <div class="d-flex">
               <button class="btn btn-dark btn-sm disabled">Quantity: {{ $bookDetails->quantity }}</button>
               <button class="btn btn-dark btn-sm ms-2"><i class="bi bi-bookmark-plus-fill"></i></button>
            </div>
            <h5 class="fw-normal mt-4">Summary:</h5>
            <h6 class="fw-normal mb-4">{{ $bookDetails->summary }}</h6>
            <h6 class="fw-normal">Language: {{ $bookDetails->language }}</h6>
            <h6 class="fw-normal">Genre: {{ $bookDetails->genre }}</h6>
            <h6 class="fw-normal">Pages: {{ $bookDetails->pages }} pages</h6>
            <h6 class="fw-normal">Published on {{ $bookDetails->publish_date }}</h6>
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection