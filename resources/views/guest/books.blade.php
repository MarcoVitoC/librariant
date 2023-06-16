@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="bg-champagne">
      <div class="container pt-4">
         <form class="d-flex justify-content-center" role="search">
            <input class="form-control w-50 me-2" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
            <button class="btn btn-dark ms-1" type="button"><i class="bi bi-sliders me-2"></i>Filter</button>
            <button class="btn btn-dark mx-1" type="button"><i class="bi bi-arrow-down-up me-2"></i>Sort by</button>
         </form>
      </div>
      <div class="row row-cols-1 row-cols-md-6 gx-1 gy-4 mt-4 mx-4 pb-5">
         @foreach ($books as $book)
            <div class="d-flex justify-content-center">
               <a href="{{ route('guest.book_details') }}" class="card w-85 h-100 text-decoration-none cursor-pointer">
                  <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="Book Preview" height="250px">
                  <div class="card-body text-decoration">
                     <h5 class="card-title">{{ $book->book_title }}</h5>
                     <p class="card-text text-secondary">By: {{ $book->author }}</p>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
@endsection