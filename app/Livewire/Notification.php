<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LoanDetail;
use App\Models\Notification as NotificationModel;

class Notification extends Component
{
   protected $listeners = ['dismissed' => 'render'];

   public function mount() {
      $loans = LoanDetail::with(['book', 'loanHeader'])
               ->where('is_notified', false)->whereDate('due_date', '<=', now()->addDays(3))->get();
      
      if ($loans->isNotEmpty()) {
         foreach ($loans as $loan) {
            $loan->is_notified = true;
            $loan->save();
            
            NotificationModel::create([
               'user_id' => $loan->loanHeader->user_id,
               'content' => '📚 Friendly Reminder: The book "'.$loan->book->book_title.'" you borrowed is due in 3 days! Please return it by '.date('F d, Y,', strtotime($loan->due_date)).' to avoid any late fees. Happy reading!'
            ]);
         }
      }
   }

   public function dismiss($notificationId) {
      $notification = NotificationModel::find($notificationId);
      $notification->delete();

      $this->dispatch('dismissed');
   }

   public function render() {
      $notifications = NotificationModel::where('user_id', auth()->id())->get();
      return view('livewire.notification', ['notifications' => $notifications]);
   }
}