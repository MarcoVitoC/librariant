<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   public function loanHeader() {
      return $this->belongsTo(LoanHeader::class);
   }

   public function book() {
      return $this->belongsTo(Book::class);
   }
}
