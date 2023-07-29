<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="addReviewBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="addReviewForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="w-100">
                  <div class="d-flex justify-content-center mb-3">
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star" data-index="0"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star" data-index="1"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star" data-index="2"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star" data-index="3"></i>
                     <i class="bi bi-star mx-2 fs-3 text-warning cursor-pointer star" data-index="4"></i>
                  </div>
                  <div class="col-12">
                     <textarea type="text" class="form-control input-field" id="review" name="review" placeholder="Write your review"></textarea>
                     <div class="review-feedback"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>