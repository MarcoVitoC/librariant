<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
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

      Book::create([
         'isbn' => '9780553381689',
         'book_title' => 'A Game of Thrones',
         'author' => 'George R. R. Martin',
         'pages' => 704,
         'publisher' => 'Bantam Books',
         'publish_date' => '2002-05-28',
         'genre' => 'Fantasy',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/a game of thrones.jpg'),
         'summary' => 'Long ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens. Here an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.'
      ]);
      Book::create([
         'isbn' => '9780857197689',
         'book_title' => 'The Psychology of Money',
         'author' => 'Morgan Housel',
         'pages' => 256,
         'publisher' => 'Harriman House',
         'publish_date' => '2020-09-08',
         'genre' => 'Finance',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/the psychology of money.jpg'),
         'summary' => 'Timeless lessons on wealth, greed, and happiness doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people. How to manage money, invest it, and make business decisions are typically considered to involve a lot of mathematical calculations, where data and formulae tell us exactly what to do. But in the real world, people don’t make financial decisions on a spreadsheet. They make them at the dinner table, or in a meeting room, where personal history, your unique view of the world, ego, pride, marketing, and odd incentives are scrambled together. In the psychology of money, the author shares 19 short stories exploring the strange ways people think about money and teaches you how to make better sense of one of life’s most important matters.'
      ]);
      Book::create([
         'isbn' => '9781410467850',
         'book_title' => 'Insurgent',
         'author' => 'Veronica Roth',
         'pages' => 556,
         'publisher' => 'Thorndike Press',
         'publish_date' => '2012-05-01',
         'genre' => 'Science Fiction',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/insurgent.jpg'),
         'summary' => "One choice can transform you or it can destroy you. But every choice has consequences, and as unrest surges in the factions all around her, Tris Prior must continue trying to save those she loves--and herself--while grappling with haunting questions of grief and forgiveness, identity and loyalty, politics and love. Tris's initiation day should have been marked by celebration and victory with her chosen faction; instead, the day ended with unspeakable horrors. War now looms as conflict between the factions and their ideologies grows. And in times of war, sides must be chosen, secrets will emerge, and choices will become even more irrevocable--and even more powerful. Transformed by her own decisions but also by haunting grief and guilt, radical new discoveries, and shifting relationships, Tris must fully embrace her Divergence, even if she does not know what she may lose by doing so. 'New York Times' bestselling author Veronica Roth's much-anticipated second book of the dystopian 'Divergent' series is another intoxicating thrill ride of a story, rich with hallmark twists, heartbreaks, romance, and powerful insights about human nature."
      ]);
      Book::create([
         'isbn' => '9781627791151',
         'book_title' => 'Book Scavenger',
         'author' => 'Jennifer Chambliss Bertman',
         'pages' => 368,
         'publisher' => 'Henry Holt and Co. (BYR)',
         'publish_date' => '2015-06-02',
         'genre' => 'Adventure',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/book scavenger.jpg'),
         'summary' => "For twelve-year-old Emily, the best thing about moving to San Francisco is that it's the home city of her literary idol: Garrison Griswold, book publisher and creator of the online sensation Book Scavenger (a game where books are hidden in cities all over the country and clues to find them are revealed through puzzles). Upon her arrival, however, Emily learns that Griswold has been attacked and is now in a coma, and no one knows anything about the epic new game he had been poised to launch. Then Emily and her new friend James discover an odd book, which they come to believe is from Griswold himself, and might contain the only copy of his mysterious new game."
      ]);
      Book::create([
         'isbn' => '9781590388983',
         'book_title' => 'Grip of the Shadow Plague',
         'author' => 'Brandon Mull',
         'pages' => 464,
         'publisher' => 'Shadow Mountain',
         'publish_date' => '2008-04-21',
         'genre' => 'Fantasy',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/grip of the shadow plague.jpg'),
         'summary' => "Danger lurks everywhere at Fablehaven, where someone has released a plague that transforms beings of light into creatures of darkness. In dire need of help, the Sorensons question where to turn, now that long trusted allies have been revealed as potential foes. Kendra embarks on a special mission that only she can attempt because of her new abilities as fairykind, while Seth stays behind and discovers an incredible new talent of his own. The siblings are put to the test as the threat grows both abroad and home at the Fablehaven preserve, and Brandon Mull spins his richest and most thrilling fantasy tale yet in this third title of the popular fantasy series."
      ]);
      Book::create([
         'isbn' => '9781410423962',
         'book_title' => 'Under the Dome',
         'author' => 'Stephen King',
         'pages' => 1417,
         'publisher' => 'Thorndike Press',
         'publish_date' => '2013-06-24',
         'genre' => 'Thriller',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/under the dome.jpg'),
         'summary' => "On a beautiful fall day in Chester's mIll, Maine, the town is inexplicably and suddenly sealed off from the rest of the world by an invisible force field. No one can fathom what this barrier is and when--or if--it will go away. Dale Barbara, Iraq vet and now a short-order cook, finds himself teamed with a few intrepid citizens. Agains them stands Big Jim Rennie, a politician who will stop at nothing--even murder--to hold the reins of power, and his sone, who is keeping a horrible secret in a dark pantry. But their main adversary is the Dome itself."
      ]);
      Book::create([
         'isbn' => '9788374801171',
         'book_title' => 'Koralina',
         'author' => 'Neil Gaiman',
         'pages' => 181,
         'publisher' => 'Wydawnictwo MAG',
         'publish_date' => '2009-02-06',
         'genre' => 'Fantasy',
         'quantity' => 3,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/koralina.jpg'),
         'summary' => "When Coraline steps through a door to find another house strangely similar to her own (only better), things seem marvelous. But there's another mother there, and another father, and they want her to stay and be their little girl. They want to change her and never let her go. Coraline will have to fight with all her wit and courage if she is to save herself and return to her ordinary life."
      ]);
      Book::create([
         'isbn' => '9781984896438',
         'book_title' => 'Good Girl, Bad Blood',
         'author' => 'Holly Jackson',
         'pages' => 416,
         'publisher' => 'Ember',
         'publish_date' => '2022-03-01',
         'genre' => 'Mystery',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/good girl bad blood.jpg'),
         'summary' => "More dark secrets are exposed in this addictive, true-crime fueled sequel when Pip finds herself in another deadly case. Pip is not a detective anymore. With the help of Ravi Singh, she released a true-crime podcast about the murder case they solved together last year. The podcast has gone viral, yet Pip insists her investigating days are behind her. But she will have to break that promise when someone she knows goes missing. Jamie Reynolds has disappeared, on the very same night the town hosted a memorial for the sixth-year anniversary of the deaths of Andie Bell and Sal Singh. The police won't do anything about it. And if they won't look for Jamie then Pip will, uncovering more of her town's dark secrets along the way... and this time everyone is listening. But will she find him before it's too late?"
      ]);
      Book::create([
         'isbn' => '9780578643427',
         'book_title' => "You're Too Good to Feel This Bad",
         'author' => 'Nate Dallas',
         'pages' => 256,
         'publisher' => 'Dallas Brother LLC',
         'publish_date' => '2020-02-24',
         'genre' => 'Psychology',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/you are too good to feel this bad.jpg'),
         'summary' => "Are you feeling overwhelmed, stressed, or anxious? You're likely not broken, just a little too normal. The problem isn't your DNA. The problem is culture, and without a definitive strategy to combat social norms, you end up in the “mediocre middle” with everyone else: exhausted, stressed, and unfulfilled. Headaches, stomach trouble, anxiety, and insomnia are all par for the course. It's typical to be burdened, frustrated, and easily triggered today. Feeling trapped in finances, work, or relationships isn’t remarkable, either. Most folks have lost a sense of peace, playfulness, and any semblance of order and simplicity. But the middle is no place for someone of your caliber. You're Too Good to Feel This Bad, and you know it. In this book, Dr. Nate Dallas shares his eye-opening, personal experiment to escape a cultural epidemic. In his unabashed, down-to-earth style, he presents an entertaining and enlightening journey, challenging capable over-achievers alike. Combining potent insights from multiple disciplines, he distills complex processes into practical, achievable steps designed to elevate your life to an all-time high. "
      ]);
      Book::create([
         'isbn' => '9781478923732',
         'book_title' => "The Cruel Prince",
         'author' => 'Holly Black and Caitlin Kelly',
         'pages' => 750,
         'publisher' => 'Little, Brown Young Readers',
         'publish_date' => '2018-01-02',
         'genre' => 'Fantasy',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/the cruel prince.jpg'),
         'summary' => "Jude was seven years old when her parents were murdered and she and her two sisters were stolen away to live in the treacherous High Court of Faerie. Ten years later, Jude wants nothing more than to belong there, despite her mortality. But many of the fey despise humans. Especially Prince Cardan, the youngest and wickedest son of the High King. To win a place at the Court, she must defy him, and face the consequences. "
      ]);
   }
}
