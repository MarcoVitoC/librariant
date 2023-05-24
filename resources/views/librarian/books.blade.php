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
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="">
                  <img src="{{ asset('images/banner.png') }}" alt="" class="me-4" width="330px" height="445px">
                  {{-- <input type="text" class="form-control" id="book-photo"> --}}
               </div>
               <div class="col-8">
                  <form action="{{ route('librarian.books') }}" method="POST">
                     @csrf
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="title" class="col-form-label">ISBN:</label>
                           <input type="text" class="form-control" id="title">
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="title" class="col-form-label">Book Title:</label>
                           <input type="text" class="form-control" id="title">
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="author" class="col-form-label">Author:</label>
                           <input type="text" class="form-control" id="author">
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="title" class="col-form-label">Publication Year:</label>
                           <input type="text" class="form-control" id="title">
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="author" class="col-form-label">Genre:</label>
                           <input type="text" class="form-control" id="author">
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="author" class="col-form-label">Quantity:</label>
                           <input type="text" class="form-control" id="author">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="message-text" class="col-form-label">Summary:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                     </div>
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Book Photo</label>
                        <input class="form-control" type="file" id="formFile">
                     </div>
                  </form>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Add book</button>
            </div>
         </div>
      </div>
   </div>
@endsection