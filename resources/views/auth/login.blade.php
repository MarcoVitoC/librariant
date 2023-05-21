@extends('layouts.master')
@section('title', 'Login')

@section('content')
   <div class="position-absolute top-50 start-50 translate-middle w-30 h-50">
      <div class="border p-4">
         <div class="">
            <h1 class="text-center fs-3">Login</h1>
            <hr>
         </div>
         @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" aria-label="Success:">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
               <div class="">
                  {{ session('success') }}
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @elseif (session()->has('loginError'))
         <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">
               <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div class="">
               {{ session('loginError') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
         <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
               @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="mb-2">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
               @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
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