@extends('layouts.main')
@section('title', 'Librariant | Home')

@section('content')
   <div class="bg-cornsilk py-5">
      <div class="mx-6">
         <div class="px-4">
            <h2 class="fw-bold">Welcome back, {{ Auth::user()->username }}! 😃</h2>
            <p class="fw-normal lh-sm my-3">We're glad to have you here. Explore our library collection and discover new reading adventures. Happy reading!</p>
            <div class="bg-white rounded p-3">
               @if ($loans->isEmpty())
                  <h6 class="text-center"><i class="bi bi-inbox me-2"></i>You have no books to return at the moment.</h6>
               @else
                  <h6 class="text-center"><i class="bi bi-inbox me-2"></i>You have {{ $loans->count() }} books to return.</h6>
               @endif
            </div>
         </div>
      </div>
   </div>
   @if ($books->isEmpty())
      <div class="d-flex justify-content-center align-items-center m-6">
         <h1 class="text-secondary pt-1">📚 No books available.</h1>
      </div>
   @else
      <div class="mx-6">
         <div class="container pt-4">
            <div class="d-flex justify-content-center">
               <div class="input-group w-50">
                  <input class="form-control" id="search_input" name="search" type="text" placeholder="Search..." aria-label="Search">
                  <button class="btn btn-dark"><i class="bi bi-search"></i></button>
               </div>
               {{-- <button class="btn btn-dark ms-1" type="button"><i class="bi bi-sliders me-2"></i>Filter</button>
               <button class="btn btn-dark mx-1" type="button"><i class="bi bi-arrow-down-up me-2"></i>Sort by</button> --}}
            </div>
         </div>
         <div class="row row-cols-1 row-cols-md-6 gx-1 gy-4 mt-4 mx-1 pb-4" id="book_list">
            @foreach ($books as $book)
               <div class="d-flex justify-content-center">
                  <a href="{{ route('user.book_details', $book->id) }}" class="card w-85 h-100 text-decoration-none">
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
   @endif
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#search_input').keyup(function(e) {
            e.preventDefault();
            
            let searchInput = $('#search_input').val().toLowerCase();
            $.ajax({
               type: 'GET',
               url: "{{ route('user.search_book') }}",
               data: {search_input: searchInput},
               success: function(response) {
                  let searchResults = response.searchedBook.data;

                  $('#book_list').html('');
                  searchResults.forEach(function(book) {
                     $('#book_list').append(
                        `
                        <div class="d-flex justify-content-center">
                           <a href="/user/books/book-details/${book.id}" class="card w-85 h-100 text-decoration-none">
                              <img src="{{ asset('storage/') }}${'/'}${book.book_photo}" class="card-img-top" alt="Book Preview" height="250px">
                              <div class="card-body text-decoration">
                                 <h5 class="card-title">${book.book_title}</h5>
                                 <p class="card-text text-secondary">By: ${book.author}</p>
                              </div>
                           </a>
                        </div>
                        `
                     );
                  });
               }
            });
         });
      });
   </script>
@endsection