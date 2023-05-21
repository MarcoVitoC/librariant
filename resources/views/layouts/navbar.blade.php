<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
   <div class="container-fluid mx-5">
      <a class="navbar-brand" href="/"><img src="{{ asset('images/Librariant Logo Remove BG.png') }}" alt="Librariant" width="160px" height="49px"></a>
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
         <div class="d-flex align-items-center">
            <h5 class="me-3">Hello there 👋</h5>
            <a class="btn btn-dark" href="{{ route('logout') }}" role="button">Log out</a>
         </div>
      @endif
   </div>
 </nav>