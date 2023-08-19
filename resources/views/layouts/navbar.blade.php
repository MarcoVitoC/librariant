<nav class="navbar navbar-expand-lg bg-white sticky-top">
   <div class="container-fluid mx-6">
      <a class="navbar-brand" href="{{ route('guest.welcome') }}"><img src="{{ asset('images/Librariant Logo (Light).png') }}" alt="Librariant" width="160px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mx-2" id="navbarNavAltMarkup">
         <div class="d-flex align-items-center justify-content-between w-100 mx-2">
            <div class="navbar-nav">
               @if (!Auth::check())
                  <a class="nav-link {{ Route::currentRouteNamed('guest.welcome') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('guest.welcome') }}">Home</a>
                  <a class="nav-link {{ Route::currentRouteNamed('guest.books') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('guest.books') }}">Books</a>
               @else
                  <a class="nav-link {{ Route::currentRouteNamed('user.home') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('user.home') }}">Home</a>
               @endif
               <a class="nav-link {{ Route::currentRouteNamed('visitor.about_us') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('visitor.about_us') }}">About</a>
               <a class="nav-link {{ Route::currentRouteNamed('visitor.faq') ? 'active' : '' }} mx-3 fw-semibold" href="{{ route('visitor.faq') }}">FAQ</a>
            </div>

            @if (!Auth::check())
               <a class="btn btn-dark" href="{{ route('login') }}" role="button">Log in</a>
            @else
               <div class="d-flex align-items-center">
                  <div class="dropdown">
                     @if ($notifications->isEmpty())
                        <button class="nav-link text-secondary fs-4 position-relative" data-bs-toggle="dropdown">
                           <i class="bi bi-bell-fill"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item py-2" href="">
                              <i class="bi bi-bell-slash me-2"></i>You have no notifications at the moment.
                           </a>
                        </div>
                     @else
                        <button class="nav-link text-secondary fs-4 position-relative" data-bs-display="static" data-bs-toggle="dropdown">
                           <i class="bi bi-bell-fill"></i>
                           <span class="badge rounded-pill bg-danger badge-size">
                              {{ $notifications->count() }}
                           </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end overflow-y-auto" style="width: 300px; max-height: 600px;">
                           @foreach ($notifications as $notification)
                              <div class="dropdown-item py-2 text-wrap">{{ $notification->content }}</div>
                           @endforeach
                        </div>
                     @endif
                  </div>
                  <div class="vr mx-3 text-secondary"></div>
                  <div class="dropdown">
                     <a class="nav-link fs-4 text-secondary" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item py-2" href="{{ route('user.profile') }}">
                           <i class="bi bi-person me-2"></i>My Profile
                        </a>
                        <a class="dropdown-item py-2" href="{{ route('user.bookmarks') }}">
                           <i class="bi bi-bookmarks me-2"></i>Bookmarks
                        </a>
                        <a class="dropdown-item py-2" href="{{ route('user.loans') }}">
                           <i class="bi bi-book me-2"></i>Loans
                        </a>
                        <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}">
                           <i class="bi bi-box-arrow-right me-2 text-danger"></i>Log out
                        </a>
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
   </div>
</nav>