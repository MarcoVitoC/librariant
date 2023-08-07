<?php

namespace App\Providers;

use App\Models\LoanDetail;
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
         $loans = LoanDetail::with(['book', 'loanHeader'])->whereDate('due_date', '<=', now()->addDays(3))->get();
         
         if ($loans->isNotEmpty()) {
            foreach ($loans as $loan) {
               Notification::create([
                  'user_id' => $loan->loanHeader->user_id,
                  'content' => '📚 Friendly Reminder: The book "'.$loan->book->book_title.'" you borrowed is due in 3 days! Please return it by '.date('F d, Y,', strtotime($loan->due_date)).' to avoid any late fees. Happy reading!'
               ]);
            }
         }

         $notifications = Notification::where('user_id', auth()->id())->get();
         View::share(compact('notifications'));
      });
   }
}
