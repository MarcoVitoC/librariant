<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable, HasUuids, CanResetPassword;

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

   public function reviews() {
      return $this->hasMany(Review::class);
   }

   public function likes() {
      return $this->hasMany(Like::class);
   }

   public function comments() {
      return $this->hasMany(Comment::class);
   }

   public function notifications() {
      return $this->hasMany(Notification::class);
   }
}