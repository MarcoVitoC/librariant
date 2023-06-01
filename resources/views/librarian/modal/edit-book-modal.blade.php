@foreach ($books as $book)
   <div class="modal fade" id="editBookModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Edit book</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="editBookBtn-close1"></button>
            </div>
            <form action="{{ route('librarian.update_book') }}" method="POST" enctype="multipart/form-data" id="updateBookForm">
               @method('put')
               @csrf
               <div class="modal-body d-flex align-items-center justify-content-center">
                  <div class="">
                     <img src="{{ asset('storage/' . $book->book_photo) }}" alt="Book Preview" class="me-4 updatedBookPreview_{{ $book->id }}" width="330px" height="445px">
                     <input type="hidden" name="oldBookPreview" value="{{ $book->book_photo }}">
                  </div>
                  <div class="col-8">
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="isbn" class="col-form-label">ISBN:</label>
                           <input type="text" class="form-control input-field" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
                           <div class="isbn-feedback"></div>
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="book_title" class="col-form-label">Book Title:</label>
                           <input type="text" class="form-control input-field" id="book_title" name="book_title" value="{{ old('book_title', $book->book_title) }}">
                           <div class="book_title-feedback"></div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="author" class="col-form-label">Author:</label>
                           <input type="text" class="form-control input-field" id="author" name="author" value="{{ old('author', $book->author) }}">
                           <div class="author-feedback"></div>
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="pages" class="col-form-label">Pages:</label>
                           <input type="text" class="form-control input-field" id="pages" name="pages" value="{{ old('pages', $book->pages) }}">
                           <div class="pages-feedback"></div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="publisher" class="col-form-label">Publisher:</label>
                           <input type="text" class="form-control input-field" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}">
                           <div class="publisher-feedback"></div>
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="publish_date" class="col-form-label">Publish Date:</label>
                           <input type="date" class="form-control input-field" id="publish_date" name="publish_date" value="{{ old('publish_date', $book->publish_date) }}">
                           <div class="publish_date-feedback"></div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="genre" class="col-form-label">Genre:</label>
                           <input type="text" class="form-control input-field" id="genre" name="genre" value="{{ old('genre', $book->genre) }}">
                           <div class="genre-feedback"></div>
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="quantity" class="col-form-label">Quantity:</label>
                           <input type="text" class="form-control input-field" id="quantity" name="quantity" value="{{ old('quantity', $book->quantity) }}">
                           <div class="quantity-feedback"></div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="pe-3 mb-3 col-6">
                           <label for="language" class="form-label">Language:</label>
                           <input type="text" class="form-control input-field" id="language" name="language" value="{{ old('language', $book->language) }}">
                           <div class="language-feedback"></div>
                        </div>
                        <div class="ps-3 mb-3 col-6">
                           <label for="book_photo" class="form-label">Book Photo:</label>
                           <input class="form-control input-field" type="file" id="book_photo_{{ $book->id }}" name="book_photo"  onchange="bookPreview(this.id, 'updatedBookPreview_{{ $book->id }}')">
                           <div class="book_photo-feedback"></div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="summary" class="col-form-label">Summary:</label>
                        <textarea class="form-control input-field" id="summary" name="summary">{{ old('summary', $book->summary) }}</textarea>
                        <div class="summary-feedback"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="editBookBtn-close2">Close</button>
                  <form action="{{ route('librarian.remove_book') }}" method="POST">
                     @method('delete')
                     @csrf
                     <button type="submit" class="btn btn-danger" id="removeBookBtn">Remove Book</button>
                  </form>
                  <button type="submit" class="btn btn-primary" id="updateBookBtn">Update Book</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endforeach