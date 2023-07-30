<div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="editReviewBtn-close"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="editReviewForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <input type="hidden" name="review_id">
               <div class="w-100">
                  <div class="d-flex justify-content-center mb-3">
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star-update" data-index="0" data-value="1"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star-update" data-index="1" data-value="2"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star-update" data-index="2" data-value="3"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star-update" data-index="3" data-value="4"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star-update" data-index="4" data-value="5"></i>
                     <input type="hidden" id="rate_value" name="rate_value">
                  </div>
                  <div class="col-12">
                     <textarea type="text" class="form-control" name="review"></textarea>
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