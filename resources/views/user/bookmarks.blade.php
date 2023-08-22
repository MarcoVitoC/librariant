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
         <div class="row my-4 mx-4" id="book_list">
            @foreach ($bookmarks as $bookmark)
               <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center my-2">
                  <a href="{{ route('user.book_details', $bookmark->id) }}" class="card w-100 text-decoration-none">
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
      <div class="d-flex justify-content-center align-items-center mx-5">
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