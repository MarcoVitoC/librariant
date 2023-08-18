<div class="w-100">
   <div class="d-flex justify-content-center mb-3">
      @for ($i = 1; $i <= 5; $i++)
         <i class="bi mx-2 fs-3 text-warning cursor-pointer star @if ($rating >= $i) bi-star-fill @else bi-star  @endif" wire:click="rate({{ $i }})" data-index="{{ $i - 1 }}" data-value="{{ $i }}"></i>
      @endfor
   </div>
   <div class="col-12">
      <textarea type="text" class="form-control" name="review" placeholder="Write your review">{{ $rating }}</textarea>
   </div>
</div>