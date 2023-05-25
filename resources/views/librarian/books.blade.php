@extends('layouts.librarian.master')
@section('title', 'Librarian | Books')

@section('content')
   <div class="container mt-4">
      <form class="d-flex justify-content-center" role="search">
         <input class="form-control w-50 me-2" type="search" placeholder="Search..." aria-label="Search">
         <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
         <button class="btn btn-dark ms-1" type="button"><i class="bi bi-sliders me-2"></i>Filter</button>
         <button class="btn btn-dark mx-1" type="button"><i class="bi bi-arrow-down-up me-2"></i>Sort by</button>
         <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-journal-plus me-2"></i>Add book</button>
      </form>
   </div>
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Add book</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('librarian.books') }}" method="POST">
               @csrf
               <div class="modal-body d-flex align-items-center justify-content-center">
                  <div class="">
                     <img src="{{ asset('images/banner.png') }}" alt="" class="me-4" width="330px" height="445px">
                     {{-- <input type="hidden" class="form-control" id="book-photo"> --}}
                  </div>
                  <div class="col-8">
                     {{-- <form action="{{ route('librarian.books') }}" method="POST">
                        @csrf --}}
                        <div class="d-flex">
                           <div class="pe-3 mb-3 col-6">
                              <label for="isbn" class="col-form-label">ISBN:</label>
                              <input type="text" class="form-control @error('isbn') is-invalid @enderror @if (old('isbn')) is-valid @endif" id="isbn" name="isbn" value="{{ old('isbn') }}">
                              @error('isbn')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="ps-3 mb-3 col-6">
                              <label for="book_title" class="col-form-label">Book Title:</label>
                              <input type="text" class="form-control @error('book_title') is-invalid @enderror @if (old('book_title')) is-valid @endif" id="book-title" name="book_title">
                              @error('book_title')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="d-flex">
                           <div class="pe-3 mb-3 col-6">
                              <label for="author" class="col-form-label">Author:</label>
                              <input type="text" class="form-control @error('author') is-invalid @enderror @if (old('author')) is-valid @endif" id="author">
                              @error('author')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="ps-3 mb-3 col-6">
                              <label for="publication_year" class="col-form-label @error('publication_year') is-invalid @enderror @if (old('publication_year')) is-valid @endif">Publication Year:</label>
                              <input type="text" class="form-control" id="publication_year" name="publication_year">
                              @error('publication_year')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="d-flex">
                           <div class="pe-3 mb-3 col-6">
                              <label for="genre" class="col-form-label @error('genre') is-invalid @enderror @if (old('genre')) is-valid @endif">Genre:</label>
                              <input type="text" class="form-control" id="genre" name="genre">
                              @error('genre')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="ps-3 mb-3 col-6">
                              <label for="quantity" class="col-form-label @error('quantity') is-invalid @enderror @if (old('quantity')) is-valid @endif">Quantity:</label>
                              <input type="text" class="form-control" id="quantity" name="quantity">
                              @error('quantity')
                                 <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="summary" class="col-form-label @error('summary') is-invalid @enderror @if (old('summary')) is-valid @endif">Summary:</label>
                           <textarea class="form-control" id="summary" name="summary"></textarea>
                           @error('summary')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="book_photo" class="form-label @error('book_photo') is-invalid @enderror @if (old('book_photo')) is-valid @endif">Book Photo</label>
                           <input class="form-control" type="file" id="book_photo" name="book_photo">
                           @error('book_photo')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add book</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection