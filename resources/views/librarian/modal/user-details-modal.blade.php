@foreach ($users as $user)
   <div class="modal fade" id="userDetailsModal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">User Details</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="col-12">
                  <div class="mb-3">
                     <label for="isbn" class="col-form-label">Full Name:</label>
                     <input type="text" class="form-control input-field" value="{{ $user->full_name }}" disabled>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="isbn" class="col-form-label">Username:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->username }}" disabled>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="book_title" class="col-form-label">Email:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->email }}" disabled>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="author" class="col-form-label">Address:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->address }}" disabled>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="pages" class="col-form-label">Phone Number:</label>
                        <input type="text" class="form-control input-field"value="{{ $user->phone_number }}" disabled>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="publisher" class="col-form-label">Date of Birth:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->date_of_birth }}" disabled>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="publish_date" class="col-form-label">Gender:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->gender }}" disabled>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="pe-3 mb-3 col-6">
                        <label for="genre" class="col-form-label">Books Borrowed:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->books_borrowed }}" disabled>
                     </div>
                     <div class="ps-3 mb-3 col-6">
                        <label for="quantity" class="col-form-label">Penalty:</label>
                        <input type="text" class="form-control input-field" value="{{ $user->penalty }}" disabled>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
@endforeach