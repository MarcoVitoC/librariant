@extends('layouts.main')
@section('title', 'Librariant')

@section('content')
   <div class="container">
      <div class="welcome">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="welcome-component">
         <span class="fs-3">📗</span>
         <span class="fs-1">📕</span>
         <span class="fs-1">📘</span>
         <span class="fs-2">📙</span>
         <span class="fs-1">📔</span>
         <span class="fs-3">📗</span>
      </div>
      <div class="row d-flex align-items-center justify-content-center flex-md-row">
         <div class="text-center col-md-9" style="margin: 9rem 0 7rem 0;" data-aos="fade-in" data-aos-duration="1500">
            <h1 class="title-lg fw-bold"><span class="text-underline-wavy">Unleash</span> Your Curiosity: Welcome to <span class="text-highlight">Librariant</span>! 📚</h1>
            <h5 class="fw-normal fs-header text-secondary lh-sm my-4" style="padding: 0px 100px;">Streamline library operations with our user-friendly platform for cataloging, lending, and returning books. Find books easily, place holds, and receive notifications. Explore our platform for an organized and accessible library environment!</h5>
            <a class="btn btn-dark btn-lg exploreBtn mx-2" href="{{ route('guest.books') }}" role="button">Explore now</a>
            <a class="btn btn-dark btn-lg learnMoreBtn mx-2" href="{{ route('visitor.about_us') }}" role="button">Learn More</a>
         </div>
      </div>
   </div>
   <div class="m-6">
      <h2 class="text-center pt-5 pb-4" data-aos="fade-down" data-aos-duration="1000">✨ Our Features & Services</h2>
      <div class="row px-4">
         <div class="col-md-4 text-center" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/Extensive Collection.png') }}" alt="Extensive Collection" class="mw-100 h-auto" width="250px" height="250px">
               <h4>Extensive Collection</h4>
               <p>Our library boasts a vast and diverse collection of books, articles, and resources, catering to a wide range of interests and disciplines.</p>
            </div>
        </div>
        <div class="col-md-4 text-center" data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/Easy Accessibility.png') }}" alt="Easy Accessibility" class="mw-100 h-auto" width="250px" height="250px">
               <h4>Easy Accessibility</h4>
               <p>Our website provides convenient access to our library's resources from anywhere, at any time, with just a few clicks.</p>
            </div>
        </div>
        <div class="col-md-4 text-center" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
            <div class="d-flex flex-column align-items-center h-100 bg-body-tertiary rounded p-3">
               <img src="{{ asset('images/User Friendly Interface.png') }}" alt="User Friendly Interface" class="mw-100 h-auto" width="250px" height="250px">
               <h4>User-Friendly Interface</h4>
               <p>Our intuitive interface and search functionality make it easy for users to navigate and find the materials they need quickly and efficiently.</p>
            </div>
        </div>
      </div>
   </div>
   <div class="m-6">
      <div class="row align-items-center mx-4 p-3 rounded">
         <div class="col-md-5 how-it-works-background"  data-aos="fade-right" data-aos-duration="1000">
            <img src="{{ asset('images/How It Works.png') }}" alt="How It Works" class="mw-100 h-auto" width="450px" height="450px">
         </div>
         <div class="col-md-7" data-aos="fade-left" data-aos-duration="1000">
            <h2 class="fw-semibold">📝 How It Works?</h2>
            <hr class="text-secondary">
            <div class="d-flex">
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 me-2 p-3">
                  <h5>1️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Search and Explore</h5>
                     <p class="text-secondary">Explore the catalog to find and select your desired books.</p>
                  </div>
               </div>
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 p-3">
                  <h5>2️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Borrow or Queue</h5>
                     <p class="text-secondary">Book selected books or join a queue for unavailable ones.</p>
                  </div>
               </div>
            </div>
            <div class="d-flex">
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 me-2 p-3">
                  <h5>3️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Enjoy and Learn</h5>
                     <p class="text-secondary">Engage actively with borrowed book content for insights.</p>
                  </div>
               </div>
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 p-3">
                  <h5>4️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Renewal</h5>
                     <p class="text-secondary">Submit a renewal request to extend the loan period of borrowed books.</p>
                  </div>
               </div>
            </div>
            <div class="d-flex">
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 me-2 p-3">
                  <h5>5️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Return</h5>
                     <p class="text-secondary">Ensure books are returned either on or before the due date.</p>
                  </div>
               </div>
               <div class="col-6 d-flex bg-body-tertiary rounded my-2 p-3">
                  <h5>6️⃣</h5>
                  <div class="lh-sm ms-2">
                     <h5>Rate and Review</h5>
                     <p class="text-secondary">Provide feedback or ratings for the borrowed book.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="m-6">
      <div class="d-flex align-items-baseline justify-content-between mb-3 px-4">
         <h2 class="fw-medium" data-aos="fade-in" data-aos-duration="1000">Popular Books</h2>
         <a href="{{ route('guest.books') }}" class="fw-medium cursor-pointer link-dark link-offset-1 link-underline-opacity-0 link-underline-opacity-100-hover">View all</a>
      </div>
      <div class="d-flex justify-content-between mx-4">
         @foreach ($books as $book)
            <a href="{{ route('guest.book_details', $book->id) }}" class="card text-decoration-none" style="width: 15rem;" data-aos="fade-up" data-aos-delay="{{100 * $loop->iteration }}">
               <img src="{{ asset('storage/' . $book->book_photo) }}" class="card-img-top" alt="" height="300px">
               <div class="card-body">
                  <h5 class="card-title">{{ $book->book_title }}</h5>
                  <p class="card-text text-secondary">by: {{ $book->author }}</p>
               </div>
            </a>
         @endforeach
      </div>
   </div>
   <div class="m-6">
      <div class="row align-items-center mx-4 rounded">
         <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
            <h6>📖 Journey through words, <span class="text-highlight">curiosity's</span> spark.</h6>
            <h1 class="fw-bold"><span class="text-underline-wavy">Ready</span> to embark your journey through <span class="text-highlight">knowledge</span>?</h1>
            <p class="text-secondary py-3">Experience the joy of discovery by signing up for a library account today. Our treasure trove of resources awaits your exploration – from timeless classics to cutting-edge research. Don't miss out on the chance to expand your horizons and indulge your curiosity. Join us and start your journey into the world of endless possibilities.</p>
            <a class="btn btn-dark getStartedBtn" href="{{ route('register') }}" role="button">Let's Get Started</a>
         </div>
         <div class="col-md-6 get-started-background" data-aos="fade-left" data-aos-duration="1000">
            <img src="{{ asset('images/Lets Get Started.png') }}" alt="Get Started" class="mw-100 h-auto" width="550px" height="550px">
         </div>
      </div>
   </div>
   @include('layouts.footer')
@endsection