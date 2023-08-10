@extends('layouts.main')
@section('title', 'Librariant')

@section('content')
   <div class="container">
      <div class="welcome">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="welcome-component">
         <span class="fs-3">📗</span>
         <span class="fs-1">📕</span>
         <span class="fs-1">📘</span>
         <span class="fs-2">📙</span>
         <span class="fs-1">📔</span>
         <span class="fs-3">📗</span>
      </div>
      <div class="row d-flex align-items-center justify-content-center flex-md-row">
         <div class="text-center col-md-9" style="margin: 9rem 0 7rem 0;">
            <h1 class="title-lg fw-bold"><span class="text-underline-wavy">Unleash</span> Your Curiosity: Welcome to <span class="text-highlight">Librariant</span>! 📚</h1>
            <h5 class="fw-normal fs-header text-secondary lh-sm my-4" style="padding: 0px 100px;">Streamline library operations with our user-friendly platform for cataloging, lending, and returning books. Find books easily, place holds, and receive notifications. Explore our platform for an organized and accessible library environment!</h5>
            <a class="btn btn-dark btn-lg exploreBtn" href="{{ route('guest.books') }}" role="button">Explore now</a>
         </div>
      </div>
   </div>
   <div class="m-6">
      <h2 class="text-center pt-5 pb-4">Our Features & Services</h2>
      <div class="row px-4">
         <div class="col-md-4 text-center">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/Extensive Collection.png') }}" alt="Extensive Collection" class="mw-100 h-auto" width="250px" height="250px">
               <h4>Extensive Collection</h4>
               <p>Our library boasts a vast and diverse collection of books, articles, and resources, catering to a wide range of interests and disciplines.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/Easy Accessibility.png') }}" alt="Easy Accessibility" class="mw-100 h-auto" width="250px" height="250px">
               <h4>Easy Accessibility</h4>
               <p>Our website provides convenient access to our library's resources from anywhere, at any time, with just a few clicks.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/User Friendly Interface.png') }}" alt="User Friendly Interface" class="mw-100 h-auto" width="250px" height="250px">
               <h4>User-Friendly Interface</h4>
               <p>Our intuitive interface and search functionality make it easy for users to navigate and find the materials they need quickly and efficiently.</p>
            </div>
        </div>
      </div>
   </div>
   <div class="m-6">
      <div class="d-flex align-items-baseline justify-content-between mb-3 px-4">
         <h2 class="fw-medium">Popular Books</h2>
         <a href="{{ route('guest.books') }}" class="fw-medium cursor-pointer link-dark link-offset-1 link-underline-opacity-0 link-underline-opacity-100-hover">View all</a>
      </div>
      <div class="d-flex justify-content-between px-4">
         @foreach ($books as $book)
            <a href="{{ route('guest.book_details', $book->id) }}" class="card text-decoration-none" style="width: 18rem;">
               <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="" height="350px">
               <div class="card-body">
                  <h5 class="card-title">{{ $book->book_title }}</h5>
                  <p class="card-text">by: {{ $book->author }}</p>
               </div>
            </a>
         @endforeach
      </div>
   </div>
   @include('layouts.footer')
@endsection