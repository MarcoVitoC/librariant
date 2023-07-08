<div class="modal fade" id="updateFAQModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update FAQ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="updateFAQBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="updateFAQForm">
            @method('put')
            @csrf
            <input type="hidden" name="faq_id">
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="col-10">
                  <label for="question" class="col-form-label">Question:</label>
                  <textarea type="text" class="form-control update-input-field" id="update-question" name="question"></textarea>
                  <div class="question-feedback"></div>
                  <div class="mb-3">
                     <label for="answer" class="col-form-label">Answer:</label>
                     <textarea class="form-control update-input-field" id="update-answer" name="answer"></textarea>
                     <div class="answer-feedback"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="updateFAQBtn-close2">Close</button>
               <button type="submit" class="btn btn-primary" id="updateFAQBtn">Save Changes</button>
            </div>
         </form>
      </div>
   </div>
</div>