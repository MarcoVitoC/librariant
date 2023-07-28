<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FAQSeeder extends Seeder
{
   public function run()
   {
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
         'question' => 'How can I renew my borrowed books?',
         'answer' => "You can renew your borrowed books ten days after the loan date by logging into your library account on our website and selecting the option to renew the books. Alternatively, you can call our library's circulation desk or visit in person to renew books."
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
