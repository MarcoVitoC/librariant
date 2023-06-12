@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="bg-champagne">
      <div class="d-flex align-items-center mx-5">
         <div class="px-4">
            <h1 class="title-lg fw-bold">Unleash Your Curiosity: <br>Welcome to Librariant!</h1>
            <h5 class="fw-normal lh-sm w-75 my-3">Streamline library operations with our user-friendly platform for cataloging, lending, and returning books. Find books easily, place holds, and receive notifications. Enjoy secure access and data protection. Explore our platform for an organized and accessible library environment!</h5>
            <a class="btn btn-dark" href="/login" role="button">Explore Now</a>
         </div>
         <div class="align-items-center">
            <img src="{{ asset('images/banner.png') }}" alt="Library" width="490px" height="490px">
         </div>
      </div>
   </div>
   <div class="m-5">
      <div class="d-flex align-items-baseline justify-content-between mb-3 px-4">
         <h1 class="fw-bold">Books</h1>
         <a href="/books" class="fw-bold cursor-pointer link-dark link-offset-1 link-underline-opacity-0 link-underline-opacity-100-hover">See all</a>
      </div>
      <div class="d-flex align-items-baseline justify-content-between px-4">
         @php
            $counter = 0;
         @endphp
         @foreach ($books as $book)
            @if ($counter < 4)
               <div class="card h-100" style="width: 18rem;">
                  <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="">
                  <div class="card-body">
                  <h5 class="card-title">{{ $book->book_title }}</h5>
                  <p class="card-text">by: {{ $book->author }}</p>
                  <a href="/login" class="btn btn-dark">Borrow</a>
                  </div>
               </div>
               @php
                  $counter++;
               @endphp
            @else
               @break
            @endif
         @endforeach
      </div>
   </div>
@endsection