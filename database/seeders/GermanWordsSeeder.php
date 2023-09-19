<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\GermanWord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GermanWordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $germanWords = [
            ['german_word' => 'Mensch', 'article' => 'Der', 'english_translation' => 'Human', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Haus', 'article' => 'Das', 'english_translation' => 'House', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Zeit', 'article' => 'Die', 'english_translation' => 'Time', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Leben', 'article' => 'Das', 'english_translation' => 'Life', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Jahr', 'article' => 'Das', 'english_translation' => 'Year', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Weg', 'article' => 'Der', 'english_translation' => 'Way', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Frau', 'article' => 'Die', 'english_translation' => 'Woman', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Kind', 'article' => 'Das', 'english_translation' => 'Child', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Mann', 'article' => 'Der', 'english_translation' => 'Man', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Freund', 'article' => 'Der', 'english_translation' => 'Friend', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Stadt', 'article' => 'Die', 'english_translation' => 'City', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Land', 'article' => 'Das', 'english_translation' => 'Country', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Welt', 'article' => 'Die', 'english_translation' => 'World', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Sache', 'article' => 'Die', 'english_translation' => 'Thing', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Arbeit', 'article' => 'Die', 'english_translation' => 'Work', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Hund', 'article' => 'Der', 'english_translation' => 'Dog', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Katze', 'article' => 'Die', 'english_translation' => 'Cat', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Buch', 'article' => 'Das', 'english_translation' => 'Book', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Himmel', 'article' => 'Der', 'english_translation' => 'Sky', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Sonne', 'article' => 'Die', 'english_translation' => 'Sun', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Mond', 'article' => 'Der', 'english_translation' => 'Moon', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Wasser', 'article' => 'Das', 'english_translation' => 'Water', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Feuer', 'article' => 'Das', 'english_translation' => 'Fire', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Luft', 'article' => 'Die', 'english_translation' => 'Air', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Nacht', 'article' => 'Die', 'english_translation' => 'Night', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Tag', 'article' => 'Der', 'english_translation' => 'Day', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Geld', 'article' => 'Das', 'english_translation' => 'Money', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Stunde', 'article' => 'Die', 'english_translation' => 'Hour', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Morgen', 'article' => 'Der', 'english_translation' => 'Morning', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Abend', 'article' => 'Der', 'english_translation' => 'Evening', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Gesicht', 'article' => 'Das', 'english_translation' => 'Face', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Auge', 'article' => 'Das', 'english_translation' => 'Eye', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Ohr', 'article' => 'Das', 'english_translation' => 'Ear', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Mund', 'article' => 'Der', 'english_translation' => 'Mouth', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Hand', 'article' => 'Die', 'english_translation' => 'Hand', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Fuss', 'article' => 'Der', 'english_translation' => 'Foot', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Tisch', 'article' => 'Der', 'english_translation' => 'Table', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Stuhl', 'article' => 'Der', 'english_translation' => 'Chair', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Fenster', 'article' => 'Das', 'english_translation' => 'Window', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Tür', 'article' => 'Die', 'english_translation' => 'Door', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Auto', 'article' => 'Das', 'english_translation' => 'Car', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Flugzeug', 'article' => 'Das', 'english_translation' => 'Airplane', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Zug', 'article' => 'Der', 'english_translation' => 'Train', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Schiff', 'article' => 'Das', 'english_translation' => 'Ship', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Hafen', 'article' => 'Der', 'english_translation' => 'Harbor', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Fluss', 'article' => 'Der', 'english_translation' => 'River', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'See', 'article' => 'Der', 'english_translation' => 'Lake', 'correct' => 0, 'created_at' => Carbon::now()],
        ];
        
        

        // Insert the data into the 'german_words' table
        GermanWord::insert($germanWords);
    }
}
