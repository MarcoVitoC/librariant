@extends('layouts.main')
@section('title', 'Register')

@section('content')
   <div class="row d-flex justify-content-center my-5">
      <div class="border p-4 col-sm-10 col-md-10 col-lg-10 col-xl-8">
         <div class="">
            <h1 class="text-center fs-3">Register</h1>
            <hr>
         </div>
         <form action="{{ route('register.create') }}" method="POST" id="registerForm">
            @csrf
            <div class="mb-3">
               <label for="full_name" class="form-label">Full Name</label>
               <input type="text" class="form-control input-field" id="full_name" name="full_name" value="{{ old('full_name') }}">
               <div class="full_name-feedback"></div>
            </div>
            <div class="d-flex">
               <div class="pe-3 mb-3 col-6">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control input-field" id="username" name="username" value="{{ old('username') }}">
                  <div class="username-feedback"></div>
               </div>
               <div class="ps-3 mb-3 col-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" aria-label="Default select example" name="gender">
                     <option selected value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
               </div>
            </div>
            <div class="d-flex">
               <div class="pe-3 mb-3 col-6">
                  <label for="date_of_birth" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control input-field" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                  <div class="date_of_birth-feedback"></div>
               </div>
               <div class="ps-3 mb-3 col-6">
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input type="text" class="form-control input-field" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                  <div class="phone_number-feedback"></div>
               </div>
            </div>
            <div class="mb-3">
               <label for="address" class="form-label">Address</label>
               <input type="text" class="form-control input-field" id="address" name="address" value="{{ old('address') }}">
               <div class="address-feedback"></div>
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control input-field" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
               <div class="email-feedback"></div>
            </div>
            <div class="d-flex">
               <div class="pe-3 mb-3 col-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control input-field" id="password" name="password">
                  <div class="password-feedback"></div>
               </div>
               <div class="ps-3 mb-3 col-6">
                  <label for="confirm_password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control input-field" id="confirm_password" name="confirm_password">
                  <div class="confirm_password-feedback"></div>
               </div>
            </div>
            <div class="form-check">
               <input class="form-check-input input-field" type="checkbox" id="terms_and_conditions" name="terms_and_conditions">
               <label class="form-check-label" for="terms_and_conditions">I agree to the terms and conditions</label>
               <div class="terms_and_conditions-feedback"></div>
             </div>
            <button type="submit" class="btn btn-dark col-12 mt-5" id="registerBtn">Register</button>
         </form>
         <h6 class="text-center text-secondary my-2">Already have an account? <a href="/login" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Log in</a></h6>
      </div>
   </div>
@endsection

@section('js-extra')
<script>
   $(document).ready(() => {
      $('#registerBtn').click((e) => {
         e.preventDefault();

         $.ajax({
            type: 'POST',
            url: "{{ route('register.create') }}",
            data: new FormData($('#registerForm')[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: (response) => {
               window.location.href = "{{ route('login') }}"
            },
            error: (xhr, status, error) => {
               let response = JSON.parse(xhr.responseText);
               let inputFields = $('.input-field').map(function() {
                  return this.id;
               }).get();

               for (let inputField of inputFields) {
                  let errorMessage = response.errors[inputField];
                  if (response.errors.hasOwnProperty(inputField)) {
                     $('#' +inputField).removeClass('is-valid');
                     $('#' +inputField).addClass('is-invalid');
                     $('.' +inputField+ '-feedback').addClass('invalid-feedback').text(errorMessage);
                  } else {
                     $('#' +inputField).removeClass('is-invalid');
                     $('.' +inputField+ '-feedback').removeClass('invalid-feedback').text('');
                     $('#' +inputField).addClass('is-valid');
                  }
               }
            }
         });
      });
   });
</script>
@endsection