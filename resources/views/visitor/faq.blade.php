@extends('layouts.main')
@section('title', 'Librariant')

@section('content')
   <div class="px-3 pt-5 pb-4">
      <div class="d-flex justify-content-center">
         <h2>🗂️ Frequently Asked Questions</h2>
      </div>
      <h6 class="fw-normal text-body-tertiary text-center">New user? Let's get started with these basics.</h6>
      <div class="d-flex justify-content-center">
         <div class="accordion mx-6 mt-4 w-75" id="accordionExample">
            @foreach ($faqs as $faq => $f)
               <div class="accordion-item border rounded my-2">
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
   </div>
   @include('layouts.footer')
@endsection