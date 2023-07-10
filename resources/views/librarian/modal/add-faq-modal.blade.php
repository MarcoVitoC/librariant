<div class="modal fade" id="addFAQModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add FAQ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="addFAQBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="addFAQForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="col-10">
                  <label for="question" class="col-form-label">Question:</label>
                  <textarea type="text" class="form-control input-field" id="question" name="question" value="{{ old('question') }}"></textarea>
                  <div class="question-feedback"></div>
                  <div class="mb-3">
                     <label for="answer" class="col-form-label">Answer:</label>
                     <textarea class="form-control input-field" id="answer" name="answer">{{ old('answer') }}</textarea>
                     <div class="answer-feedback"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="addFAQBtn-close2">Close</button>
               <button type="submit" class="btn btn-primary">Add FAQ</button>
            </div>
         </form>
      </div>
   </div>
</div>