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
               <i class="bi bi-check-circle-fill flex-shrink-0 me-1"></i>
               <div class="">
                  {{ session('success') }}
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @elseif (session()->has('loginError'))
         <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
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
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autofocus>
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