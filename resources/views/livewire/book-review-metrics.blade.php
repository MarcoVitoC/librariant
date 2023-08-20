<div>
   @if ($isLiked)
      <button class="btn-review bg-transparent" wire:click="like">
         <i class="bi bi-hand-thumbs-up-fill text-secondary me-1"></i>
         @if ($likeCount > 0)
            ({{ $likeCount }})
         @endif
      </button>
   @else
      <button class="btn-review bg-transparent" wire:click="like">
         <i class="bi bi-hand-thumbs-up text-secondary me-1"></i>
         @if ($likeCount > 0)
            ({{ $likeCount }})
         @endif
      </button>
   @endif

   <button class="btn-review bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $review->id }}" aria-expanded="false" aria-controls="collapse-{{ $review->id }}">
      <i class="bi bi-chat-dots text-secondary me-1"></i>
      @if ($hasComments)
         ({{ $hasComments }})
      @endif
   </button>
</div>