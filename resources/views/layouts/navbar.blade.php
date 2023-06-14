<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
   <div class="container-fluid mx-6">
      <a class="navbar-brand" href="/"><img src="{{ asset('images/Librariant Logo (Light Mode).png') }}" alt="Librariant" width="160px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mx-2" id="navbarNavAltMarkup">
         <div class="navbar-nav mx-2">
         <a class="nav-link active mx-3 fw-semibold" aria-current="page" href="/">Home</a>
         @if (!Auth::check())
            <a class="nav-link mx-3 fw-semibold" href="/books">Books</a>
         @else
            <a class="nav-link mx-3 fw-semibold" href="/mybooks">My Books</a>
            <a class="nav-link mx-3 fw-semibold" href="/requests">Requests</a>
         @endif
            <a class="nav-link mx-3 fw-semibold" href="/about">About</a>
            <a class="nav-link mx-3 fw-semibold" href="/faq">FAQ</a>
         </div>
      </div>
      @if (!Auth::check())
         <a class="btn btn-dark" href="/login" role="button">Log in</a>
      @else
         <div class="dropdown d-flex align-items-center">
            <a class="nav-link fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Hello there 👋
            </a>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="{{ route('logout') }}">
                  <i class="bi bi-box-arrow-right me-2 text-body-tertiary"></i>Log out
               </a>
            </div>
         </div>
      @endif
   </div>
 </nav>