@extends('layouts.master')
@section('title', 'Librariant | Home')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="mx-6">
         <div class="px-4">
            <h2 class="fw-bold">Welcome back, User! 😃</h2>
            <p class="fw-normal lh-sm my-3">We're glad to have you here. Explore our library collection and discover new reading adventures. Happy reading!</p>
            <div class="bg-white rounded p-3">
               <h6 class="text-center"><i class="bi bi-inbox me-2"></i>You have no books to return at the moment.</h6>
            </div>
         </div>
      </div>
   </div>
   <div class="mx-6">
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
               <a href="/books/book-details" class="card w-85 h-100 text-decoration-none cursor-pointer">
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
   <div class="d-flex justify-content-between align-items-center mx-5">
      <p class="text-secondary fw-normal fs-7">
         Showing <span class="fw-medium">{{ $books->firstItem() }}</span> to <span class="fw-medium">{{ $books->lastItem() }}</span> of <span class="fw-medium">{{ $books->total() }}</span> results
      </p>
      <nav>
         <ul class="pagination">
            <li class="page-item {{ $books->currentPage() === 1 ? 'disabled' : '' }}">
               <a class="page-link" href="{{ $books->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&lsaquo;</a>
            </li>
            @for ($i = 1; $i <= $books->lastPage(); $i++)
               <li class="page-item {{ $books->currentPage() === $i ? 'active' : '' }}">
                  <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
               </li>
            @endfor
            <li class="page-item {{ $books->currentPage() === $books->lastPage() ? 'disabled' : '' }}">
               <a class="page-link" href="{{ $books->nextPageUrl() }}">&rsaquo;</a>
            </li>
         </ul>
      </nav>
   </div>
@endsection