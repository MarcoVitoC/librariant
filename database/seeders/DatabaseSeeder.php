<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      // \App\Models\User::factory(10)->create();
      User::create([
         'role_id' => 1,
         'full_name' => 'Librariant',
         'username' => 'librarianttt',
         'gender' => 'Male',
         'date_of_birth' => '2003-01-23',
         'phone_number' => '000000000000',
         'address' => 'Library Center',
         'email' => 'librariant@gmail.com',
         'password' => Hash::make('librariant')
      ]);
      User::create([
         'role_id' => 0,
         'full_name' => 'User',
         'username' => 'userrr',
         'gender' => 'Male',
         'date_of_birth' => '2002-02-02',
         'phone_number' => '111111111111',
         'address' => 'User Street No.2B',
         'email' => 'user@gmail.com',
         'password' => Hash::make('users')
      ]);

      Role::create([
         'id' => 0,
         'role_name' => 'user'
      ]);
      Role::create([
         'id' => 1,
         'role_name' => 'librarian'
      ]);

      Status::create([
         'id' => 0,
         'status_name' => 'loaned'
      ]);
      Status::create([
         'id' => 1,
         'status_name' => 'returned'
      ]);
   }
}
