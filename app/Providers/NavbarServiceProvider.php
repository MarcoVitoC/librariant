<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {
      //
   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot()
   {
      view()->composer(['layouts.librarian.navbar', 'layouts.navbar'], function() {
         $notifications = Notification::where('user_id', auth()->id())->get();
         View::share(compact('notifications'));
      });
   }
}
