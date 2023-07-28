<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
   public function run()
   {
      Role::create([
         'id' => 0,
         'role_name' => 'user'
      ]);
      
      Role::create([
         'id' => 1,
         'role_name' => 'librarian'
      ]);
   }
}
