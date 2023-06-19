<nav class="navbar navbar-expand-lg bg-tertiary shadow-sm">
   <div class="container-fluid mx-5 d-flex justify-content-end py-2">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex align-items-center">
         <div class="border-end pe-3">
            <a href="" class="text-secondary fs-5"><i class="bi bi-bell-fill"></i></a>
         </div>
         <div class="dropdown d-flex align-items-center ms-3">
            <a class="nav-link fs-4 text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="bi bi-person-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
               <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                  <i class="bi bi-box-arrow-right me-2 text-danger"></i>Log out
               </a>
            </div>
         </div>
      </div>
   </div>
 </nav>