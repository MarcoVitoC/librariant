<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function user() {
      return $this->belongsTo(User::class);
   }

   public function book() {
      return $this->belongsTo(Book::class);
   }

   public function likes() {
      return $this->hasMany(Like::class);
   }

   public function comments() {
      return $this->hasMany(Comment::class);
   }
}
