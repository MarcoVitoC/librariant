<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
   <div class="container-fluid mx-6">
      <a class="navbar-brand" href="{{ route('guest.welcome') }}"><img src="{{ asset('images/Librariant Logo (Light).png') }}" alt="Librariant" width="160px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mx-2" id="navbarNavAltMarkup">
         <div class="navbar-nav mx-2">
         @if (!Auth::check())
            <a class="nav-link {{ Route::currentRouteNamed('guest.welcome') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('guest.welcome') }}">Home</a>
            <a class="nav-link {{ Route::currentRouteNamed('guest.books') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('guest.books') }}">Books</a>
         @else
            <a class="nav-link {{ Route::currentRouteNamed('user.home') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('user.home') }}">Home</a>
            <a class="nav-link {{ Route::currentRouteNamed('user.books') ? 'active' : '' }} mx-3 fw-semibold" href="/mybooks">My Books</a>
            <a class="nav-link {{ Route::currentRouteNamed('user.requests') ? 'active' : '' }} mx-3 fw-semibold" href="/requests">Requests</a>
         @endif
            <a class="nav-link {{ Route::currentRouteNamed('visitor.about_us') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('visitor.about_us') }}">About</a>
            <a class="nav-link {{ Route::currentRouteNamed('visitor.faq') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('visitor.faq') }}">FAQ</a>
         </div>
      </div>
      @if (!Auth::check())
         <a class="btn btn-dark" href="/login" role="button">Log in</a>
      @else
      <div class="d-flex align-items-center">
         <div class="border-end pe-3">
            <a href="" class="text-secondary fs-5 me-3"><i class="bi bi-bookmarks-fill"></i></a>
            <a href="" class="text-secondary fs-5 me-3"><i class="bi bi-bag-plus-fill"></i></a>
            <a href="" class="text-secondary fs-5"><i class="bi bi-bell-fill"></i></a>
         </div>
         <div class="dropdown d-flex align-items-center ms-3">
            <a class="nav-link fs-2 text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="bi bi-person-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
               <a class="dropdown-item" href="#">
                  <i class="bi bi-person me-2"></i>My Profile
               </a>
               <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                  <i class="bi bi-box-arrow-right me-2 text-danger"></i>Log out
               </a>
            </div>
         </div>
      </div>
      @endif
   </div>
 </nav>