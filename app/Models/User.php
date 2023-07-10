<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable, HasUuids;

   protected $guarded = ['id'];
   protected $hidden = [
      'password',
      'remember_token',
   ];
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   public function role() {
      return $this->belongsTo(Role::class);
   }

   public function bookmarks() {
      return $this->hasMany(Bookmark::class);
   }

   public function loanHeaders() {
      return $this->hasMany(LoanHeader::class);
   }

   public function queues() {
      return $this->hasMany(Queue::class);
   }

   public function renewals() {
      return $this->hasMany(Renewal::class);
   }
}