@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="bg-champagne">
      <div class="d-flex align-items-center mx-5">
         <div class="container-text-left px-4">
            <h1 class="title-lg fw-bold">Unleash Your Curiosity: <br>Welcome to Librariant!</h1>
            <h6 class="fw-normal fs-5 lh-sm w-75 my-3">Streamline library operations with our user-friendly platform for cataloging, lending, and returning books. Find books easily, place holds, and receive notifications. Enjoy secure access and data protection. Explore our platform for an organized and accessible library environment!</h6>
            <a class="btn btn-dark" href="/login" role="button">Explore Now</a>
         </div>
         <div class="align-items-center">
            <img src="{{ asset('images/banner.png') }}" alt="Library" width="530px" height="530px">
         </div>
      </div>
   </div>
@endsection