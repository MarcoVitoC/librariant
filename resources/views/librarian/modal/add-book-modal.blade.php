<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add book</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="addBookBtn-close1"></button>
         </div>
         <form action="" method="POST" enctype="multipart/form-data" id="addBookForm">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12 col-lg-4 mb-3 d-flex align-items-center justify-content-center">
                     <img src="{{ asset('images/Book Preview.png') }}" alt="Book Preview" class="me-4 addBookPreview img-fluid">
                  </div>
                  <div class="col-md-12 col-lg-8">
                     <div class="row">
                        <div class="col-sm-6 mb-3">
                           <label for="isbn" class="col-form-label">ISBN:</label>
                           <input type="text" class="form-control input-field" id="isbn" name="isbn" value="{{ old('isbn') }}">
                           <div class="isbn-feedback"></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                           <label for="book_title" class="col-form-label">Book Title:</label>
                           <input type="text" class="form-control input-field" id="book_title" name="book_title" value="{{ old('book_title') }}">
                           <div class="book_title-feedback"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 mb-3">
                           <label for="author" class="col-form-label">Author:</label>
                           <input type="text" class="form-control input-field" id="author" name="author" value="{{ old('author') }}">
                           <div class="author-feedback"></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                           <label for="pages" class="col-form-label">Pages:</label>
                           <input type="text" class="form-control input-field" id="pages" name="pages" value="{{ old('pages') }}">
                           <div class="pages-feedback"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 mb-3">
                           <label for="publisher" class="col-form-label">Publisher:</label>
                           <input type="text" class="form-control input-field" id="publisher" name="publisher" value="{{ old('publisher') }}">
                           <div class="publisher-feedback"></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                           <label for="publish_date" class="col-form-label">Publish Date:</label>
                           <input type="date" class="form-control input-field" id="publish_date" name="publish_date" value="{{ old('publish_date') }}">
                           <div class="publish_date-feedback"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 mb-3">
                           <label for="genre" class="col-form-label">Genre:</label>
                           <input type="text" class="form-control input-field" id="genre" name="genre" value="{{ old('genre') }}">
                           <div class="genre-feedback"></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                           <label for="quantity" class="col-form-label">Quantity:</label>
                           <input type="text" class="form-control input-field" id="quantity" name="quantity" value="{{ old('quantity') }}">
                           <div class="quantity-feedback"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 mb-3">
                           <label for="language" class="form-label">Language:</label>
                           <input type="text" class="form-control input-field" id="language" name="language" value="{{ old('language') }}">
                           <div class="language-feedback"></div>
                        </div>
                        <div class="col-sm-6 mb-3">
                           <label for="book_photo" class="form-label">Book Photo:</label>
                           <input class="form-control input-field" type="file" id="book_photo" name="book_photo">
                           <div class="book_photo-feedback"></div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="summary" class="col-form-label">Summary:</label>
                        <textarea class="form-control input-field" id="summary" name="summary">{{ old('summary') }}</textarea>
                        <div class="summary-feedback"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="addBookBtn-close2">Close</button>
               <button type="submit" class="btn btn-primary">Add book</button>
            </div>
         </form>
      </div>
   </div>
</div>