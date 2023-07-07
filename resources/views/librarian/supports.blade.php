@extends('layouts.librarian.main')
@section('title', 'Librarian | Supports')

@section('content')
   <div class="container mt-4">
      <form class="d-flex justify-content-center" role="search">
         <input class="form-control w-50 me-2" type="search" placeholder="Search..." aria-label="Search">
         <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
         <button class="btn btn-dark mx-1" type="button" data-bs-toggle="modal" data-bs-target="#addFaqModal"><i class="bi bi-plus-circle me-2"></i>Add FAQ</button>
      </form>
   </div>
   @include('librarian.modal.add-faq-modal')
   <div class="d-flex justify-content-center">
      <div class="accordion mx-6 mt-4 w-75" id="accordionExample">
         @foreach ($faqs as $faq => $f)
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq }}" aria-expanded="false" aria-controls="collapse{{ $faq }}">
                     {{ $f->question }}
                  </button>
               </h2>
               <div id="collapse{{ $faq }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     {{ $f->answer }}
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         //...
      });
   </script>
@endsection