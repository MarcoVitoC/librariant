<div class="modal fade updateBookModal" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit book</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="updateBookBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="updateBookForm">
            @method('put')
            @csrf
            <input type="hidden" name="book_id">
            <div class="modal-body d-flex align-items-center justify-content-center">
               <div class="">
                  <img src="" alt="Book Preview" class="me-4 updatedBookPreview" width="330px" height="445px">
                  <input type="hidden" name="oldBookPreview">
               </div>
               <div class="col-8">
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="isbn" class="col-form-label">ISBN:</label>
                        <input type="text" class="form-control update-input-field" id="update-isbn" name="isbn">
                        <div class="isbn-feedback"></div>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="book_title" class="col-form-label">Book Title:</label>
                        <input type="text" class="form-control update-input-field" id="update-book_title" name="book_title">
                        <div class="book_title-feedback"></div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="author" class="col-form-label">Author:</label>
                        <input type="text" class="form-control update-input-field" id="update-author" name="author">
                        <div class="author-feedback"></div>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="pages" class="col-form-label">Pages:</label>
                        <input type="text" class="form-control update-input-field" id="update-pages" name="pages">
                        <div class="pages-feedback"></div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="publisher" class="col-form-label">Publisher:</label>
                        <input type="text" class="form-control update-input-field" id="update-publisher" name="publisher">
                        <div class="publisher-feedback"></div>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="publish_date" class="col-form-label">Publish Date:</label>
                        <input type="date" class="form-control update-input-field" id="update-publish_date" name="publish_date">
                        <div class="publish_date-feedback"></div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="genre" class="col-form-label">Genre:</label>
                        <input type="text" class="form-control update-input-field" id="update-genre" name="genre">
                        <div class="genre-feedback"></div>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="quantity" class="col-form-label">Quantity:</label>
                        <input type="text" class="form-control update-input-field" id="update-quantity" name="quantity">
                        <div class="quantity-feedback"></div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="language" class="form-label">Language:</label>
                        <input type="text" class="form-control update-input-field" id="update-language" name="language">
                        <div class="language-feedback"></div>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="book_photo" class="form-label">Book Photo:</label>
                        <input class="form-control update-input-field" type="file" id="update-book_photo" name="book_photo">
                        <div class="book_photo-feedback"></div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="summary" class="col-form-label">Summary:</label>
                     <textarea class="form-control update-input-field" id="update-summary" name="summary"></textarea>
                     <div class="summary-feedback"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="updateBookBtn-close2">Close</button>
               <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
         </form>
      </div>
   </div>
</div>