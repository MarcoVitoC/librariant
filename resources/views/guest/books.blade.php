@extends('layouts.main')
@section('title', 'Librariant')

@section('content')
   <div class="">
      <div class="container pt-4">
         <div class="d-flex justify-content-center">
            <div class="input-group w-50">
               <input class="form-control" id="search_book" type="text" placeholder="Search..." aria-label="Search">
               <button class="btn btn-dark"><i class="bi bi-search"></i></button>
            </div>
         </div>
      </div>
      <div class="row row-cols-1 row-cols-md-6 gx-1 gy-4 mt-4 mx-4 pb-5" id="book_list">
         @foreach ($books as $book)
            <div class="d-flex justify-content-center">
               <a href="{{ route('guest.book_details', $book->id) }}" class="card w-85 h-100 text-decoration-none">
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
   @include('layouts.footer')
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#search_book').keyup(function(e) {
            e.preventDefault();
            
            let searchBook = $('#search_book').val().toLowerCase();
            let url = "{{ route('guest.search_book') }}";

            $.get(url, {search_book: searchBook}, function(response) {
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
            });
         });
      });
   </script>
@endsection