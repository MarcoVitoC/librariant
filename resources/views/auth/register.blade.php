@extends('layouts.master')
@section('title', 'Register')

@section('content')
   <div class="container d-flex justify-content-center my-5">
      <div class="border p-4 w-75">
         <div class="">
            <h1 class="text-center fs-3">Register</h1>
            <hr>
         </div>
         <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
               <label for="fullName" class="form-label">Full Name</label>
               <input type="text" class="form-control @error('fullName') is-invalid @enderror @if (old('fullName')) is-valid @endif" id="fullName" name="fullName" value="{{ old('fullName') }}">
               @error('fullName')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="d-flex">
               <div class="pe-3 mb-3 col-6">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror @if (old('username')) is-valid @endif" id="username" name="username" value="{{ old('username') }}">
                  @error('username')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
                  <label for="dateOfBirth" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror @if (old('dateOfBirth')) is-valid @endif" id="dateOfBirth" name="dateOfBirth" value="{{ old('dateOfBirth') }}">
                  @error('dateOfBirth')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
               <div class="ps-3 mb-3 col-6">
                  <label for="phoneNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror @if (old('phoneNumber')) is-valid @endif" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
                  @error('phoneNumber')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="mb-3">
               <label for="address" class="form-label">Address</label>
               <input type="text" class="form-control @error('address') is-invalid @enderror  @if (old('address')) is-valid @endif" id="address" name="address" value="{{ old('address') }}">
               @error('address')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror @if (old('email')) is-valid @endif" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
               @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="d-flex">
               <div class="pe-3 mb-3 col-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                  @error('password')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
               <div class="ps-3 mb-3 col-6">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword">
                  @error('confirmPassword')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="form-check">
               <input class="form-check-input @error('termsAndConditions') is-invalid @enderror" type="checkbox" id="termsAndConditions" name="termsAndConditions">
               <label class="form-check-label" for="termsAndConditions">I agree to the terms and conditions</label>
               @error('termsAndConditions')
                  <div class="invalid-feedback">You must agree before submitting.</div>
               @enderror
             </div>
            <button type="submit" class="btn btn-dark col-12 mt-5">Register</button>
         </form>
         <h6 class="text-center my-2">Already have an account? <a href="/login">Log in</a></h6>
      </div>
   </div>
@endsection