<?php

namespace Database\Seeders;

use App\Models\Faq;
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

      Faq::create([
         'question' => 'What are the library opening hours?',
         'answer' => 'Our library operates from 9:00 a.m. to 6:00 p.m. from monday to saturday. Please note that hours may vary on public holidays or special occasions.'
      ]);
      Faq::create([
         'question' => 'How many books can I borrow at a time?',
         'answer' => 'As a member, you can borrow 8 books at a time.'
      ]);
      Faq::create([
         'question' => 'How long can I keep borrowed books?',
         'answer' => 'The standard loan period for books is 2 weeks, but you may be able to renew items if there are no holds or requests from other members.'
      ]);
      Faq::create([
         'question' => 'How can I renew my borrowed items?',
         'answer' => "You can renew your borrowed items by logging into your library account on our website and selecting the option to renew the books. Alternatively, you can call our library's circulation desk or visit in person to renew items."
      ]);
      Faq::create([
         'question' => 'What happens if I return books late?',
         'answer' => 'Late return fees may apply if you exceed the due date for borrowed books. The specific fine amount and policies can be found on our website or by contacting the library staff.'
      ]);
      Faq::create([
         'question' => 'Can I reserve or place a hold on a book?',
         'answer' => 'Yes, you can place a hold on a book that is currently checked out by another member. This can be done through our online catalog, by phone, or by visiting the library in person. You will be notified when the item becomes available.'
      ]);
      Faq::create([
         'question' => 'Can I suggest a book or resource for the library to acquire?',
         'answer' => 'Absolutely! We welcome suggestions for new books, resources, or materials to enhance our collection. You can submit your suggestions through our website, or you can speak with a staff member during your visit.'
      ]);
   }
}
