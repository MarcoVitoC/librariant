@extends('layouts.main')
@section('title', 'Forgot Password')

@section('content')
   <div class="row">
      <div class="position-absolute top-50 start-50 translate-middle col-sm-9 col-md-8 col-lg-6 col-xl-5">
         <div class="border p-4 rounded">
            <div>
               <h3 class="text-center">Forgot Password?</h3>
               <p class="text-center text-secondary">Enter the email address associated with your account.</p>
               <hr>
            </div>
            @if (session()->has('status'))
               <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                  <i class="bi bi-check-circle-fill flex-shrink-0 me-2 text-success"></i>
                  <div class="text-success fw-bold">{{ session()->get('status') }}</div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            @if ($errors->any())
               <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                  <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2 text-danger"></i>
                  @foreach ($errors->all() as $error)
                     <div class="text-danger fw-bold">{{ $error }}</div>
                  @endforeach
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
               @csrf
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" autofocus>
               </div>
               <button type="submit" class="btn btn-dark col-12 mt-5">Reset Password</button>
            </form>
         </div>
      </div>
   </div>
@endsection