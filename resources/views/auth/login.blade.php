@extends('layouts.main')
@section('title', 'Login')

@section('content')
   <div class="row">
      <div class="position-absolute top-50 start-50 translate-middle col-sm-8 col-md-8 col-lg-6 col-xl-4">
         <div class="border p-4">
            <div class="">
               <h1 class="text-center fs-3">Login</h1>
               <hr>
            </div>
            @if (session()->has('registrationSuccess'))
               <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                  <i class="bi bi-check-circle-fill flex-shrink-0 me-2 text-success"></i>
                  <div class="text-success fw-bold">
                     {{ session('registrationSuccess') }}
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            <div class="d-none" id="loginFailedAlert">
               <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                  <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2 text-danger"></i>
                  <div class="text-danger fw-bold" id="loginFailedAlertMessage"></div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
            <form action="{{ route('login.authenticate') }}" method="POST" id="loginForm">
               @csrf
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" autofocus>
                  <div class="email-feedback"></div>
               </div>
               <div class="mb-2">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control input-field" id="password" name="password">
                  <div class="password-feedback"></div>
               </div>
               <div class="d-flex justify-content-between">
                  <div class="mb-3 form-check">
                     <input type="checkbox" class="form-check-input" id="exampleCheck1">
                     <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  </div>
                  <div class="mb-3">
                     <a href="/forgot-password" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Forgot Password?</a>
                  </div>
               </div>
               <button type="submit" class="btn btn-dark col-12 mt-4" id="loginBtn">Log in</button>
            </form>
            <h6 class="text-center text-secondary my-2">Don't have an account? <a href="/register" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a></h6>
         </div>
      </div>
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         $('#loginBtn').click((e) => {
            e.preventDefault();

            $.ajax({
               type: 'POST',
               url: "{{ route('login.authenticate') }}",
               data: new FormData($('#loginForm')[0]),
               dataType: 'json',
               processData: false,
               contentType: false,
               success: (response) => {
                  if (response.status === 'loginSuccess') {
                     window.location.href = (response.role === 1) ? "{{ route('librarian.dashboard') }}" : "{{ route('user.home') }}";
                  } else {
                     $('#loginFailedAlert').removeClass('d-none');
                     $('#loginFailedAlertMessage').text('Login failed! Please check your input.');
                  }
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