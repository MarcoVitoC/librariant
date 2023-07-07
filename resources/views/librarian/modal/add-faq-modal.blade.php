<div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add FAQ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="addFaqBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="addFaqForm">
            @csrf
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="col-10">
                  <label for="FAQquestion" class="col-form-label">Question:</label>
                  <input type="text" class="form-control input-field" id="question" name="question" value="{{ old('question') }}">
                  <div class="question-feedback"></div>
   
                  <div class="mb-3">
                     <label for="FAQAnswer" class="col-form-label">Answer:</label>
                     <textarea class="form-control input-field" id="answer" name="answer">{{ old('answer') }}</textarea>
                     <div class="answer-feedback"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="addFaqBtn-close2">Close</button>
               <button type="submit" class="btn btn-primary" id="addFaqBtn">Add FAQ</button>
            </div>
         </form>
      </div>
   </div>
</div>