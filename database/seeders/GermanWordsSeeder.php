<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            ['german_word' => 'Haus', 'article' => 'Das', 'english_translation' => 'House', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Auto', 'article' => 'Das', 'english_translation' => 'Car', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Tisch', 'article' => 'Der', 'english_translation' => 'Table', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Stuhl', 'article' => 'Der', 'english_translation' => 'Chair', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Blume', 'article' => 'Die', 'english_translation' => 'Flower', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Buch', 'article' => 'Das', 'english_translation' => 'Book', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Apfel', 'article' => 'Der', 'english_translation' => 'Apple', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Hund', 'article' => 'Der', 'english_translation' => 'Dog', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Katze', 'article' => 'Die', 'english_translation' => 'Cat', 'correct' => 0, 'created_at' => Carbon::now()],
            ['german_word' => 'Mensch', 'article' => 'Der', 'english_translation' => 'Human', 'correct' => 0, 'created_at' => Carbon::now()],
        ];

        // Insert the data into the 'german_words' table
        DB::table('german_words')->insert($germanWords);
    }
}
