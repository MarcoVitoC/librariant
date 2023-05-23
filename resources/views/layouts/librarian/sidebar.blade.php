<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 220px; height: 100vh;">
   <a class="navbar-brand d-flex justify-content-center" href="/">
      <img src="{{ asset('images/Librariant Logo (Dark Mode).png') }}" alt="Librariant" width="160px" height="50px">
   </a>
   <hr>
   <div class="nav nav-pills flex-column mb-auto">
      <a href="{{ route('librarian.dashboard') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.dashboard') ? 'active' : '' }}">
         <i class="bi bi-speedometer2 me-3"></i>Dashboard
      </a>
      <a href="{{ route('librarian.books') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.books') ? 'active' : '' }}">
         <i class="bi bi-book me-3"></i>Books
      </a>
      <a href="{{ route('librarian.transactions') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.transactions') ? 'active' : '' }}">
         <i class="bi bi-arrow-repeat me-3"></i>Transactions
      </a>
      <a href="{{ route('librarian.reservations') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.reservations') ? 'active' : '' }}">
         <i class="bi bi-table me-3"></i>Reservations
      </a>
      <a href="{{ route('librarian.users') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.users') ? 'active' : '' }}">
         <i class="bi bi-people me-3"></i>Users
      </a>
      <a href="{{ route('librarian.settings') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.settings') ? 'active' : '' }}">
         <i class="bi bi-gear me-3"></i>Settings
      </a>
      <a href="{{ route('librarian.supports') }}" class="nav-link text-white mb-1 {{ Route::currentRouteNamed('librarian.supports') ? 'active' : '' }}">
         <i class="bi bi-question-circle me-3"></i>Supports
      </a>
   </div>
 </div>