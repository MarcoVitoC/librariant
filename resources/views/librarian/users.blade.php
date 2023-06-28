@extends('layouts.librarian.main')
@section('title', 'Librarian | Users')

@section('content')
   <div class="d-flex align-items-center m-4">
      <h3 class="container bg-body-secondary text-secondary fs-5 px-3 py-2">Users</h3>
   </div>
   <div class="m-4">
      <table class="table table-hover border">
         <thead class="align-middle">
            <tr>
               <th scope="col" class="border text-center">Full Name</th>
               <th scope="col" class="border text-center">Username</th>
               <th scope="col" class="border text-center">Phone Number</th>
               <th scope="col" class="border text-center">Email</th>
               <th scope="col" class="border text-center">Books Borrowed</th>
               <th scope="col" class="border text-center">Penalty</th>
               <th scope="col" class="border text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
               <tr class="align-middle">
                  <td class="border text-center">{{ $user->full_name }}</td>
                  <td class="border text-center">{{ $user->username }}</td>
                  <td class="border text-center">{{ $user->phone_number }}</td>
                  <td class="border text-center">{{ $user->email }}</td>
                  <td class="border text-center">{{ $user->books_borrowed }}</td>
                  <td class="border text-center">{{ $user->penalty }}</td>
                  <td class="border text-center">
                     <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#userDetailsModal-{{ $user->id }}"><i class="bi bi-info-circle-fill me-2"></i>View Details</button>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   @include('librarian.modal.user-details-modal')
@endsection