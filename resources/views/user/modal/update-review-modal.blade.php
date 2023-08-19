<div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="reviewBtn-close"></button>
         </div>
         <form wire:submit="updateReview({{ $isReviewed->id }})" method="POST" enctype="multipart/form-data" id="editReviewForm">
            @method('put')
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="w-100">
                  <div class="d-flex justify-content-center mb-3">
                     @for ($i = 1; $i <= 5; $i++)
                        <i class="bi mx-2 fs-3 text-warning cursor-pointer star-update @if ($rating >= $i) bi-star-fill @else bi-star  @endif" wire:click="rate({{ $i }})" data-index="{{ $i - 1 }}" data-value="{{ $i }}"></i>
                     @endfor
                     <input type="hidden" id="rating" name="rating" value="{{ $rating }}">
                  </div>
                  <div class="col-12">
                     <textarea type="text" class="form-control" wire:model="review" name="review"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
         </form>
      </div>
   </div>
</div>