@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="bg-champagne">
      <div class="d-flex align-items-center mx-6">
         <div class="px-4">
            <h1 class="title-lg fw-bold">Unleash Your Curiosity: <br>Welcome to Librariant!</h1>
            <h5 class="fw-normal fs-header lh-sm w-75 my-3">Streamline library operations with our user-friendly platform for cataloging, lending, and returning books. Find books easily, place holds, and receive notifications. Enjoy secure access and data protection. Explore our platform for an organized and accessible library environment!</h5>
            <a class="btn btn-dark" href="/login" role="button">Explore now</a>
         </div>
         <div class="align-items-center">
            <img src="{{ asset('images/banner.png') }}" alt="Library" width="430px" height="450px">
         </div>
      </div>
   </div>
   <div class="m-6">
      <h1 class="text-center">Why Librariant?</h1>
      <div class="d-flex align-items-baseline justify-content-between my-5 px-4">
         <div class="w-30 text-center bg-champagne rounded p-3" style="height: 280px;">
            <i class="bi bi-bookshelf fs-1"></i>
            <h4>Extensive Collection</h4>
            <p>Our library boasts a vast and diverse collection of books, articles, and resources, catering to a wide range of interests and disciplines. From fiction to non-fiction, academic research to popular literature, we have something for everyone.</p>
         </div>
         <div class="w-30 text-center bg-champagne rounded p-3" style="height: 280px;">
            <i class="bi bi-globe fs-1"></i>
            <h4>Easy Accessbility</h4>
            <p>Our website provides convenient access to our library's resources from anywhere, at any time. Whether you're at home, in the office, or on the go, you can explore our digital collection with just a few clicks.</p>
         </div>
         <div class="w-30 text-center bg-champagne rounded p-3" style="height: 280px;">
            <i class="bi bi-columns-gap fs-1"></i>
            <h4>User-Friendly Interface</h4>
            <p>We have designed our website with user convenience in mind. Our intuitive interface and search functionality make it easy for users to navigate and find the materials they need quickly and efficiently.</p>
         </div>
      </div>
   </div>
   <div class="m-6">
      <div class="d-flex align-items-baseline justify-content-between mb-3 px-4">
         <h1 class="fw-bold">Popular Books</h1>
         <a href="/books" class="fw-bold cursor-pointer link-dark link-offset-1 link-underline-opacity-0 link-underline-opacity-100-hover">See all</a>
      </div>
      <div class="d-flex align-items-baseline justify-content-between px-4">
         @php
            $counter = 0;
         @endphp
         @foreach ($books as $book)
            @if ($counter < 4)
               <div class="card" style="width: 18rem;">
                  <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="" height="300px">
                  <div class="card-body">
                     <h5 class="card-title">{{ $book->book_title }}</h5>
                     <p class="card-text">by: {{ $book->author }}</p>
                     <a href="/register" class="btn btn-dark">Borrow</a>
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