<div>
   @foreach ($comments as $comment)
      <div class="pb-2">
         <div class="d-flex align-items-center">
            <i class="bi bi-person-circle text-secondary fs-4 me-3"></i>
            <div class="d-flex align-items-baseline">
               <h6>{{ $comment->user->username }}</h6>
               <p class="mx-3 fs-7 text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
         </div>
         <p>{{ $comment->comment }}</p>
      </div>
   @endforeach
</div>