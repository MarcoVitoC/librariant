@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="px-3 pt-5 pb-4">
      <div class="d-flex justify-content-center">
         <h2><i class="bi bi-question-circle text-pale me-3"></i>Frequently Asked Questions</h2>
      </div>
      <h6 class="fw-normal text-body-tertiary text-center">New user? Let's get started with these basics.</h6>
      <div class="d-flex justify-content-center">
         <div class="accordion mx-6 mt-4 w-75" id="accordionExample">
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                     What are the library opening hours?
                  </button>
               </h2>
               <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     Our library operates from <strong>9:00 a.m.</strong> to <strong>6:00 p.m.</strong> from <strong>monday</strong> to <strong>saturday</strong>. Please note that hours may vary on public holidays or special occasions.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                     How many books can I borrow at a time?
                  </button>
               </h2>
               <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     As a member, you can borrow <strong>8 books</strong> at a time. However, certain materials like reference books or special collections may have different borrowing limits.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                     How long can I keep borrowed books?
                  </button>
               </h2>
               <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     The standard loan period for books is <strong>2 weeks</strong>, but you may be able to renew items if there are no holds or requests from other members.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                     How can I renew my borrowed items?
                  </button>
               </h2>
               <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     You can renew your borrowed items by logging into your library account on our website and selecting the option to renew the books. Alternatively, you can call our library's circulation desk or visit in person to renew items.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                     What happens if I return books late?
                  </button>
               </h2>
               <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     Late return fees may apply if you exceed the due date for borrowed books. The specific fine amount and policies can be found on our website or by contacting the library staff.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                     Can I reserve or place a hold on a book?
                  </button>
               </h2>
               <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     Yes, you can place a hold on a book that is currently checked out by another member. This can be done through our online catalog, by phone, or by visiting the library in person. You will be notified when the item becomes available.
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                     Can I suggest a book or resource for the library to acquire?
                  </button>
               </h2>
               <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     Absolutely! We welcome suggestions for new books, resources, or materials to enhance our collection. You can submit your suggestions through our website, or you can speak with a staff member during your visit.
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection