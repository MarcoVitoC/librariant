<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanHeader extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function loanDetails() {
      return $this->hasMany(LoanDetail::class);
   }

   public function user() {
      return $this->belongsTo(User::class);
   }

   public function status() {
      return $this->belongsTo(Status::class);
   }
}
