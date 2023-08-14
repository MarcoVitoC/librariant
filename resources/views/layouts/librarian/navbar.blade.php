<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
   <div class="container-fluid mx-5 py-2">
      <div class="d-flex align-items-center justify-content-between justify-content-lg-end w-100">
         <button class="btn btn-dark d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><i class="bi bi-list"></i></button>
         <div class="dropdown">
            <a class="nav-link fs-4 text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="bi bi-three-dots-vertical"></i>
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