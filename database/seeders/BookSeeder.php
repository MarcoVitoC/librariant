<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
   public function run()
   {
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
         'isbn' => '9781250809711',
         'book_title' => 'Family Style: Memories of an American from Vietnam',
         'author' => 'Thien Pham',
         'pages' => 240,
         'publisher' => 'First Second',
         'publish_date' => '2023-06-20',
         'genre' => 'Comics',
         'quantity' => 3,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/family style.jpg'),
         'summary' => "A moving young adult graphic memoir about a Vietnamese immigrant boy's search for belonging in America, perfect for fans of American Born Chinese and The Best We Could Do !

         Thien's first memory isn't a sight or a sound. It's the sweetness of watermelon and the saltiness of fish. It's the taste of the foods he ate while adrift at sea as his family fled Vietnam.
         
         After the Pham family arrives at a refugee camp in Thailand, they struggle to survive. Things don't get much easier once they resettle in California. And through each chapter of their lives, food takes on a new meaning. Strawberries come to signify struggle as Thien's mom and dad look for work. Potato chips are an indulgence that bring Thien so much joy that they become a necessity.
         
         Behind every cut of steak and inside every croissant lies a story. And for Thien Pham, that story is about a search for belonging, for happiness, for the American dream."
      ]);

      Book::create([
         'isbn' => '9781627791151',
         'book_title' => 'Book Scavenger',
         'author' => 'Jennifer Chambliss Bertman',
         'pages' => 368,
         'publisher' => 'Henry Holt and Co.',
         'publish_date' => '2015-06-02',
         'genre' => 'Adventure',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/book scavenger.jpg'),
         'summary' => "For twelve-year-old Emily, the best thing about moving to San Francisco is that it's the home city of her literary idol: Garrison Griswold, book publisher and creator of the online sensation Book Scavenger (a game where books are hidden in cities all over the country and clues to find them are revealed through puzzles). Upon her arrival, however, Emily learns that Griswold has been attacked and is now in a coma, and no one knows anything about the epic new game he had been poised to launch. Then Emily and her new friend James discover an odd book, which they come to believe is from Griswold himself, and might contain the only copy of his mysterious new game."
      ]);

      Book::create([
         'isbn' => '9781302948542',
         'book_title' => 'Star Wars: The High Republic - The Blade',
         'author' => 'Charles Soule, Marco Castiello, Jethro Morales',
         'pages' => 112,
         'publisher' => 'Marvel',
         'publish_date' => '2023-06-27',
         'genre' => 'Comics',
         'quantity' => 1,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/star wars.jpg'),
         'summary' => "The dynamic new Star Wars era of the High Republic continues to expand, focusing on the legendary Jedi Knight Porter Engle

         Hundreds of years before the Skywalker saga, witness the birth of a Jedi legend: Porter Engle! He is perhaps the most skilled lightsaber wielder in the High Republic. With his sister Barash, he travels the galaxy, serving as a guardian of peace and justice. But even Porter Engle has enemies he cannot defeat…"
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
         'isbn' => '9781250805140',
         'book_title' => 'The Talk',
         'author' => 'Darrin Bell',
         'pages' => 352,
         'publisher' => 'Henry Holt and Co.',
         'publish_date' => '2023-06-06',
         'genre' => 'Comics',
         'quantity' => 7,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/the talk.jpg'),
         'summary' => "Darrin Bell was six years old when his mother told him he couldn’t have a realistic water gun. She said she feared for his safety, that police tend to think of little Black boys as older and less innocent than they really are.

         Through evocative illustrations and sharp humor, Bell examines how The Talk shaped intimate and public moments from childhood to adulthood. While coming of age in Los Angeles—and finding a voice through cartooning—Bell becomes painfully aware of being regarded as dangerous by white teachers, neighbors, and police officers and thus of his mortality. Drawing attention to the brutal murders of African Americans and showcasing revealing insights and cartoons along the way, he brings us up to the moment of reckoning when people took to the streets protesting the murders of George Floyd and Breonna Taylor. And now Bell must decide whether he and his own six-year-old son are ready to have The Talk."
      ]);

      Book::create([
         'isbn' => '9780062943514',
         'book_title' => 'The Diamond Eye',
         'author' => 'Kate Quinn',
         'pages' => 435,
         'publisher' => 'William Morrow',
         'publish_date' => '2022-03-29',
         'genre' => 'Historical',
         'quantity' => 4,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/the diamond eye.jpg'),
         'summary' => "The New York Times bestselling author of The Rose Code returns with an unforgettable World War II tale of a quiet bookworm who becomes history's deadliest female sniper. Based on a true story.

         In 1937 in the snowbound city of Kyiv, wry and bookish history student Mila Pavlichenko organizes her life around her library job and her young son--but Hitler's invasion of Ukraine and Russia sends her on a different path. Given a rifle and sent to join the fight, Mila must forge herself from studious girl to deadly sniper--a lethal hunter of Nazis known as Lady Death. When news of her three hundredth kill makes her a national heroine, Mila finds herself torn from the bloody battlefields of the eastern front and sent to America on a goodwill tour.
         
         Still reeling from war wounds and devastated by loss, Mila finds herself isolated and lonely in the glittering world of Washington, DC--until an unexpected friendship with First Lady Eleanor Roosevelt and an even more unexpected connection with a silent fellow sniper offer the possibility of happiness. But when an old enemy from Mila's past joins forces with a deadly new foe lurking in the shadows, Lady Death finds herself battling her own demons and enemy bullets in the deadliest duel of her life.
         
         Based on a true story, The Diamond Eye is a haunting novel of heroism born of desperation, of a mother who became a soldier, of a woman who found her place in the world and changed the course of history forever."
      ]);

      Book::create([
         'isbn' => '9781779518392',
         'book_title' => 'Batman - One Bad Day: The Riddler',
         'author' => 'Tom King, Mitch Gerads',
         'pages' => 88,
         'publisher' => 'Dc Comics',
         'publish_date' => '2023-06-20',
         'genre' => 'Comics',
         'quantity' => 5,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/batman - one bad day.jpg'),
         'summary' => "The Most Dangerous Game of Wits Batman and Riddler have ever played...
         The Riddler is one of Batman's most intellectual villains and the one who lays out his clues the most deliberately. The Riddler is always playing a game, there are always rules. But what happens when The Riddler kills someone in broad daylight for seemingly no reason? No game to play. No cypher to breakdown. Batman will reach his wit's end trying to figure out the Riddler's true motivation in this incredible thriller!"
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

      Book::create([
         'isbn' => '9780765318411',
         'book_title' => 'Boneshaker',
         'author' => 'Cherie Priest',
         'pages' => 416,
         'publisher' => 'Tor Books',
         'publish_date' => '2009-09-29',
         'genre' => 'Fantasy',
         'quantity' => 3,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/boneshaker.jpg'),
         'summary' => "In the early days of the Civil War, rumors of gold in the frozen Klondike brought hordes of newcomers to the Pacific Northwest. Anxious to compete, Russian prospectors commissioned inventor Leviticus Blue to create a great machine that could mine through Alaska’s ice. Thus was Dr. Blue’s Incredible Bone-Shaking Drill Engine born.

         But on its first test run the Boneshaker went terribly awry, destroying several blocks of downtown Seattle and unearthing a subterranean vein of blight gas that turned anyone who breathed it into the living dead.
         
         Now it is sixteen years later, and a wall has been built to enclose the devastated and toxic city. Just beyond it lives Blue’s widow, Briar Wilkes. Life is hard with a ruined reputation and a teenaged boy to support, but she and Ezekiel are managing. Until Ezekiel undertakes a secret crusade to rewrite history.
         
         His quest will take him under the wall and into a city teeming with ravenous undead, air pirates, criminal overlords, and heavily armed refugees. And only Briar can bring him out alive."
      ]);

      Book::create([
         'isbn' => '9780316081054',
         'book_title' => 'Feed',
         'author' => 'Mira Grant',
         'pages' => 599,
         'publisher' => 'Orbit',
         'publish_date' => '2010-05-01',
         'genre' => 'Horror',
         'quantity' => 5,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/feed.jpg'),
         'summary' => "The year was 2014. We had cured cancer. We had beaten the common cold. But in doing so we created something new, something terrible that no one could stop.

         The infection spread, virus blocks taking over bodies and minds with one, unstoppable command: FEED. Now, twenty years after the Rising, bloggers Georgia and Shaun Mason are on the trail of the biggest story of their lives—the dark conspiracy behind the infected.
         
         The truth will get out, even if it kills them."
      ]);

      Book::create([
         'isbn' => '9780385534260',
         'book_title' => 'The Wager: A Tale of Shipwreck, Mutiny and Murder',
         'author' => 'David Grann',
         'pages' => 352,
         'publisher' => 'Doubleday',
         'publish_date' => '2023-04-18',
         'genre' => 'Adventure',
         'quantity' => 6,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/the wager.jpg'),
         'summary' => "From the #1 New York Times bestselling author of Killers of the Flower Moon, a page-turning story of shipwreck, survival, and savagery, culminating in a court martial that reveals a shocking truth. The powerful narrative reveals the deeper meaning of the events on The Wager, showing that it was not only the captain and crew who ended up on trial, but the very idea of empire.

         On January 28, 1742, a ramshackle vessel of patched-together wood and cloth washed up on the coast of Brazil. Inside were thirty emaciated men, barely alive, and they had an extraordinary tale to tell. They were survivors of His Majesty's Ship the Wager, a British vessel that had left England in 1740 on a secret mission during an imperial war with Spain. While the Wager had been chasing a Spanish treasure-filled galleon known as 'the prize of all the oceans,' it had wrecked on a desolate island off the coast of Patagonia. The men, after being marooned for months and facing starvation, built the flimsy craft and sailed for more than a hundred days, traversing nearly 3,000 miles of storm-wracked seas. They were greeted as heroes.
         
         But then ... six months later, another, even more decrepit craft landed on the coast of Chile. This boat contained just three castaways, and they told a very different story. The thirty sailors who landed in Brazil were not heroes - they were mutineers. The first group responded with countercharges of their own, of a tyrannical and murderous senior officer and his henchmen. It became clear that while stranded on the island the crew had fallen into anarchy, with warring factions fighting for dominion over the barren wilderness. As accusations of treachery and murder flew, the Admiralty convened a court martial to determine who was telling the truth. The stakes were life-and-death--for whomever the court found guilty could hang.
         
         The Wager is a grand tale of human behavior at the extremes told by one of our greatest nonfiction writers. Grann's recreation of the hidden world on a British warship rivals the work of Patrick O'Brian, his portrayal of the castaways' desperate straits stands up to the classics of survival writing such as The Endurance, and his account of the court martial has the savvy of a Scott Turow thriller. As always with Grann's work, the incredible twists of the narrative hold the reader spellbound."
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
         'isbn' => '9781982198107',
         'book_title' => 'Little Monsters',
         'author' => 'Adrienne Brodeur',
         'pages' => 320,
         'publisher' => 'Avid Reader Press / Simon & Schuster',
         'publish_date' => '2023-06-27',
         'genre' => 'Psychology',
         'quantity' => 2,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/little monsters.jpg'),
         'summary' => "Ken and Abby Gardner lost their mother when they were small and they have been haunted by her absence ever since. Their father, Adam, a brilliant oceanographer, raised them mostly on his own in his remote home on Cape Cod, where the attachment between Ken and Abby deepened into something complicated—and as adults their relationship is strained. Now, years later, the siblings’ lives are still deeply entwined. Ken is a successful businessman with political ambitions and a picture-perfect family and Abby is a talented visual artist who depends on her brother’s goodwill, in part because he owns the studio where she lives and works.

         As the novel opens, Adam is approaching his seventieth birthday, staring down his mortality and fading relevance. He has always managed his bipolar disorder with medication, but he’s determined to make one last scientific breakthrough and so he has secretly stopped taking his pills, which he knows will infuriate his children. Meanwhile, Abby and Ken are both harboring secrets of their own, and there is a new person on the periphery of the family—Steph, who doesn’t make her connection known. As Adam grows more attuned to the frequencies of the deep sea and less so to the people around him, Ken and Abby each plan the elaborate gifts they will present to their father on his birthday, jostling for primacy in this small family unit.
         
         Set in the fraught summer of 2016, and drawing on the biblical tale of Cain and Abel, Little Monsters is an absorbing, sharply observed family story by a writer who knows Cape Cod inside and out—its Edenic lushness and its snakes."
      ]);

      Book::create([
         'isbn' => '9780593543764',
         'book_title' => 'My Murder',
         'author' => 'Katie Williams',
         'pages' => 304,
         'publisher' => 'Riverhead Books',
         'publish_date' => '2023-06-23',
         'genre' => 'Thriller',
         'quantity' => 4,
         'language' => 'English',
         'book_photo' => Storage::putFile('book-photos', 'public/images/Book Photos/my murder.jpg'),
         'summary' => "Lou is a happily married mother of an adorable toddler. She's also the victim of a local serial killer. Recently brought back to life and returned to her grieving family by a government project, she is grateful for this second chance. But as the new Lou re-adapts to her old routines, and as she bonds with other female victims, she realizes that disturbing questions remain about what exactly preceded her death and how much she can really trust those around her.

         Now it's not enough to care for her child, love her husband, and work the job she's always enjoyed--she must also figure out the circumstances of her death. Darkly comic, tautly paced, and full of surprises, My Murder is a devour-in-one-sitting, clever twist on the classic thriller."
      ]);
   }
}
