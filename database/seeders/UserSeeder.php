<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
   public function run()
   {
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
   }
}
