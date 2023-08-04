<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;

class NotificationController extends Controller
{
   private $notificationService;

   public function __construct() {
      $this->notificationService = new NotificationService;
   }

   //
}
