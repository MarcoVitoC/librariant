<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="reviewBtn-close" wire:click="closeModal"></button>
         </div>
         <form wire:submit="addReview" method="POST" enctype="multipart/form-data" id="addReviewForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="w-100">
                  <div class="d-flex justify-content-center mb-3">
                     @for ($i = 1; $i <= 5; $i++)
                        <i class="bi mx-2 fs-3 text-warning cursor-pointer star @if ($rating >= $i) bi-star-fill @else bi-star @endif" wire:click="rate({{ $i }})" data-index="{{ $i - 1 }}"></i>
                     @endfor
                  </div>
                  <div class="col-12">
                     <textarea type="text" class="form-control" wire:model="review" name="review" placeholder="Write your review"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit" class="btn btn-primary @if ($rating == 0) disabled @endif submitReviewBtn">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>