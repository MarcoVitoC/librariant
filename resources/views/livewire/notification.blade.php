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
         <span class="badge rounded-pill bg-danger badge-size">{{ $notifications->count() }}</span>
      </button>
      <div class="dropdown-menu dropdown-menu-end overflow-y-auto" style="width: 300px; max-height: 600px;">
         @foreach ($notifications as $notification)
            <div class="dropdown-item py-2 text-wrap">
               <div class="d-flex align-items-center">
                  {{ $notification->content }}
                  <div>
                     <button class="btn btn-sm ms-1" wire:click="dismiss({{ $notification->id }})"><i class="bi bi-x-circle-fill text-secondary"></i></button>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   @endif
</div>