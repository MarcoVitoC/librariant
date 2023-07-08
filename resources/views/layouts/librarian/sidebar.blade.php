<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 220px; height: 100vh;">
   <a class="navbar-brand d-flex justify-content-center" href="/">
      <img src="{{ asset('images/Librariant Logo (Dark).png') }}" alt="Librariant" width="160px" height="50px">
   </a>
   <hr>
   <div class="nav nav-pills flex-column mb-auto">
      <a href="{{ route('librarian.dashboard') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.dashboard') ? 'active' : '' }}">
         <i class="bi bi-speedometer2 me-3"></i>Dashboard
      </a>
      <a href="{{ route('librarian.book.index') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.book.index') ? 'active' : '' }}">
         <i class="bi bi-book me-3"></i>Books
      </a>
      <a href="{{ route('librarian.returns') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.returns') ? 'active' : '' }}">
         <i class="bi bi-arrow-repeat me-3"></i>Returns
      </a>
      <a href="{{ route('librarian.loans') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.loans') ? 'active' : '' }}">
         <i class="bi bi-table me-3"></i>Loans
      </a>
      <a href="{{ route('librarian.users') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.users') ? 'active' : '' }}">
         <i class="bi bi-people me-3"></i>Users
      </a>
      <a href="{{ route('librarian.faq.index') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.faq.index') ? 'active' : '' }}">
         <i class="bi bi-question-circle me-3"></i>FAQs
      </a>
   </div>
 </div>