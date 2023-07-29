<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function loanDetails() {
      return $this->hasMany(LoanDetail::class);
   }

   public function bookmarks() {
      return $this->hasMany(Bookmark::class);
   }

   public function queues() {
      return $this->hasMany(Queue::class);
   }

   public function reviews() {
      return $this->hasMany(Review::class);
   }
}