@extends('layouts.master')
@section('title', 'Login')

@section('content')
   <div class="position-absolute top-50 start-50 translate-middle w-25">
      <div class="border p-4">
         <div class="">
            <h1 class="text-center fs-3">Login</h1>
            <hr>
         </div>
         @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" aria-label="Success:">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
               <div>
                  {{ session('success') }}
               </div>
            </div>
         @endif
         <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="d-flex justify-content-between">
               <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
               </div>
               <div class="mb-3">
                  <a href="/forgot-password" class="text-decoration-none">Forgot Password?</a>
               </div>
            </div>
            <button type="submit" class="btn btn-dark col-12 mt-4">Log in</button>
         </form>
         <h6 class="text-center my-2">Don't have an account? <a href="/register">Register</a></h6>
      </div>
   </div>
@endsection