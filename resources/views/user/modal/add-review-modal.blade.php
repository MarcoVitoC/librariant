<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="reviewBtn-close" wire:click="closeModal"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="addReviewForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               {{-- <input type="hidden" name="book_id"> --}}
               @livewire('review', ['rating' => $rating])
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit" class="btn btn-primary disabled submitReviewBtn">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>