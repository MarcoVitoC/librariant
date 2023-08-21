<div>
   <div class="d-flex align-items-center">
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
   <div class="mt-2 rounded collapse" id="collapse-{{ $review->id }}" wire:ignore>
      <div class="bg-body-tertiary card card-body">
         <form wire:submit="addComment" class="input-group mb-3" enctype="multipart/form-data">
            @csrf
            <textarea class="form-control comment-input rounded" type="text" wire:model="comment" placeholder="Add a comment..."></textarea>
            <button class="btn btn-dark disabled addCommentBtn" type="submit"><i class="bi bi-send"></i></button>
         </form>
         @livewire('book-review-comments', ['reviewId' => $review->id])
      </div>
   </div>
</div>