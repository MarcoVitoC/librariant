<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
   public function run()
   {
      Storage::deleteDirectory('book-photos');
      
      $this->call([
         UserSeeder::class,
         RoleSeeder::class,
         StatusSeeder::class,
         FAQSeeder::class,
         BookSeeder::class
      ]);
   }
}
