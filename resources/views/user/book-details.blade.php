@extends('layouts.master')
@section('title', 'Librariant | Book Details')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="d-flex align-items-center mx-6 mb-4">
         <div class="px-4">
            <img src="{{ asset('storage/' . $bookDetails->book_photo) }}" alt="Book Photo" width="280px" height="350px" class="rounded">
         </div>
         <div>
            <h2 class="fw-semibold">{{ $bookDetails->book_title }}</h2>
            <h5 class="fw-normal text-secondary">{{ $bookDetails->author }}</h5>
            <h5 class="fw-normal mt-4">Summary:</h5>
            <h6 class="fw-normal mb-4">{{ $bookDetails->summary }}</h6>
            <h6 class="fw-normal">Language: {{ $bookDetails->language }}</h6>
            <h6 class="fw-normal">Genre: {{ $bookDetails->genre }}</h6>
            <h6 class="fw-normal">Pages: {{ $bookDetails->pages }} pages</h6>
            <h6 class="fw-normal">Published on {{ $bookDetails->publish_date }}</h6>
         </div>
      </div>
      <div class="mx-6">
         <div class="mx-4 mb-2">
            <button class="btn btn-dark me-2"><i class="bi bi-bookmark-plus-fill me-2"></i>Add to bookmark</button>
            <button class="btn btn-dark"><i class="bi bi-bag-plus-fill me-2"></i>Add to cart</button>
         </div>
         <div class="mx-4 mt-2 row">
            <button class="btn btn-dark col-3"><i class="bi bi-book-fill me-2"></i>Borrow</button>
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection