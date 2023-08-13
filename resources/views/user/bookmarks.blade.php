@extends('layouts.main')
@section('title', 'Librariant | Bookmarks')

@section('content')
   @if ($bookmarks->isEmpty())
      <div class="d-flex justify-content-center align-items-center m-6" style="height: 54.2vh;">
         <h1 class="text-secondary pt-1">📑 No bookmarks available.</h1>
      </div>
   @else
      <div class="mx-6">
         <div class="container pt-4">
            <h2 class="text-center pb-3">My Bookmarks</h2>
         </div>
         <div class="row row-cols-1 row-cols-md-6 gx-1 gy-4 mt-4 mx-1 pb-4">
            @foreach ($bookmarks as $bookmark)
               <div class="d-flex justify-content-center">
                  <a href="{{ route('user.book_details', $bookmark->book->id) }}" class="card w-85 h-100 text-decoration-none cursor-pointer">
                     <img src="{{ asset('storage/' . $bookmark->book->book_photo) }}" class="card-img-top" alt="Book Preview" height="250px">
                     <div class="card-body text-decoration">
                        <h5 class="card-title">{{ $bookmark->book->book_title }}</h5>
                        <p class="card-text text-secondary">By: {{ $bookmark->book->author }}</p>
                     </div>
                  </a>
               </div>
            @endforeach
         </div>
      </div>
      <div class="d-flex justify-content-between align-items-center mx-5">
         <p class="text-secondary fw-normal fs-7">
            Showing <span class="fw-medium">{{ $bookmarks->firstItem() }}</span> to <span class="fw-medium">{{ $bookmarks->lastItem() }}</span> of <span class="fw-medium">{{ $bookmarks->total() }}</span> results
         </p>
         <nav>
            <ul class="pagination">
               <li class="page-item {{ $bookmarks->currentPage() === 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $bookmarks->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&lsaquo;</a>
               </li>
               @for ($i = 1; $i <= $bookmarks->lastPage(); $i++)
                  <li class="page-item {{ $bookmarks->currentPage() === $i ? 'active' : '' }}">
                     <a class="page-link" href="{{ $bookmarks->url($i) }}">{{ $i }}</a>
                  </li>
               @endfor
               <li class="page-item {{ $bookmarks->currentPage() === $bookmarks->lastPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $bookmarks->nextPageUrl() }}">&rsaquo;</a>
               </li>
            </ul>
         </nav>
      </div>
   @endif
   @include('layouts.footer')
@endsection