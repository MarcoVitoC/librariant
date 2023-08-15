@extends('layouts.librarian.main')
@section('title', 'Librarian | Dashboard')

@section('content')
   <div class="d-flex align-items-center m-4">
      <div class="container">
         <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 my-2">
               <div class="d-flex align-items-center h-100 bg-body-tertiary rounded p-3">
                  <h1 class="py-3"><span class="alert alert-info p-2">📖</span></h1>
                  <div class="ps-3">
                     <h4>{{ $booksTotal }}</h4>
                     <p>Books</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 my-2">
               <div class="d-flex align-items-center h-100 bg-body-tertiary rounded p-3">
                  <h1 class="py-3"><span class="alert alert-danger p-2">📝</span></h1>
                  <div class="ps-3">
                     <h4>{{ $loansTotal }}</h4>
                     <p>Loans</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 my-2">
               <div class="d-flex align-items-center h-100 bg-body-tertiary rounded p-3">
                  <h1 class="py-3"><span class="alert alert-primary p-2">🔄</span></h1>
                  <div class="px-3">
                     <h4>{{ $renewalsTotal }}</h4>
                     <p>Renewals</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 my-2">
               <div class="d-flex align-items-center h-100 bg-body-tertiary rounded p-3">
                  <h1 class="py-3"><span class="alert alert-success p-2">✅</span></h1>
                  <div class="ps-3">
                     <h4>{{ $returnsTotal }}</h4>
                     <p>Returns</p>
                  </div>
               </div>
            </div>
         </div>
      </div>      
   </div>
@endsection