<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
   public function run()
   {
      Status::create([
         'id' => 0,
         'status_name' => 'Loaned'
      ]);

      Status::create([
         'id' => 1,
         'status_name' => 'Returned'
      ]);

      Status::create([
         'id' => 2,
         'status_name' => 'Returned Pending'
      ]);
      
      Status::create([
         'id' => 3,
         'status_name' => 'Renewed'
      ]);
   }
}
