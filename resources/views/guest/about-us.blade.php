@extends('layouts.master')
@section('title', 'Librariant')

@section('content')
   <div class="bg-cornsilk mb-5 py-5">
      <h1 class="text-center">About Us</h1>
      <div class="line mt-5 mb-4 mx-auto"></div>
      <h2 class="fw-normal text-center w-75 m-auto">"<span class="text-pale">Empowering</span> minds through the fusion<br> of <span class="text-pale">knowledge and readers.</span>"</h2>
      <div class="line mt-4 mb-2 mx-auto"></div>
   </div>
   <div class="d-flex mx-6">
      <div class="ms-3 w-85 pe-5">
         <p>Welcome to Librariant, your gateway to knowledge, exploration, and inspiration. As a cherished institution in our community, we are dedicated to providing a nurturing and inclusive environment for individuals of all ages and backgrounds.</p>
         <p>At Librariant, we believe in the power of books and information to transform lives. Our library is more than just a building filled with shelves; it's a vibrant hub where ideas flourish, imaginations soar, and connections are made. Step through our doors, and you'll discover a world of possibilities. </p>
      </div>
      <div class="me-3 w-85">
         <p>Our extensive collection spans a diverse range of subjects, from classic literature to cutting-edge research, from captivating novels to practical guides. Whether you're seeking enlightenment, entertainment, or a little bit of both, you'll find the resources you need to satisfy your thirst for knowledge.</p>
         <p>At the heart of our library is a dedicated team of passionate librarians and staff members. With their extensive expertise and unwavering commitment to service, they are here to guide you on your intellectual journey, answer your questions, and help you navigate the vast sea of knowledge that awaits you.</p>
      </div>
   </div>
   <div class="mt-3 mx-6 mb-6">
      <img src="{{ asset('images/Librariant.jpg') }}" alt="Librariant" width="1330px" height="300px" class="img-fluid object-fit-cover">
   </div>
   <h1 class="text-center mt-5">Our Mission</h1>
   <div class="my-5 mx-6">
      <div class="d-flex align-items-baseline justify-content-between px-4">
         <div class="w-30 text-center border border-3 border-pale rounded p-3" style="height: 280px;">
            <i class="bi bi-book-fill fs-1"></i>
            <h4>Access to Knowledge</h4>
            <p>Our mission is to provide open and equitable access to a wide range of information resources, including books, digital media, and educational materials. We strive to be a trusted source of knowledge for our community.</p>
         </div>
         <div class="w-30 text-center border border-3 border-pale rounded p-3" style="height: 280px;">
            <i class="bi bi-people-fill fs-1"></i>
            <h4>Inclusivity and Diversity</h4>
            <p>Our library is a welcoming and inclusive space for individuals of all backgrounds, abilities, and identities. We are dedicated to building diverse collections and creating an environment where everyone feels valued, respected, and represented.</p>
         </div>
         <div class="w-30 text-center border border-3 border-pale rounded p-3" style="height: 280px;">
            <i class="bi bi-gear-fill fs-1"></i>
            <h4>Innovation and Adaptability</h4>
            <p>As the world changes, so does the role of libraries. We embrace technological advancements and continually seek innovative ways to serve our patrons.</p>
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection