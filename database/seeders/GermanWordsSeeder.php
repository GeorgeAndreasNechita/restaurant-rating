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
            ['article' => 'das',	'german_word' => 'Jahr',	'german_word_plural' => 'Jahre',	'english_translation' => 'year',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Mal',	'german_word_plural' => 'Male',	'english_translation' => 'time',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Beispiel',	'german_word_plural' => 'Beispiele',	'english_translation' => 'example',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Zeit',	'german_word_plural' => 'Zeiten',	'english_translation' => 'time (hour)',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Frau',	'german_word_plural' => 'Frauen',	'english_translation' => 'woman, wife, Mrs.',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Mensch',	'german_word_plural' => 'Menschen',	'english_translation' => 'human being, man',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Deutsch',	'german_word_plural' => '',	'english_translation' => 'German',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Kind',	'german_word_plural' => 'Kinder',	'english_translation' => 'child',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Tag',	'german_word_plural' => 'Tage',	'english_translation' => 'day',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Mann',	'german_word_plural' => 'Männer',	'english_translation' => 'man',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Land',	'german_word_plural' => 'Länder',	'english_translation' => 'land, country, state',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Frage',	'german_word_plural' => 'Fragen',	'english_translation' => 'question',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Haus',	'german_word_plural' => 'Häuser',	'english_translation' => 'house',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Fall',	'german_word_plural' => 'Fälle',	'english_translation' => 'fall, case',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Leute',	'german_word_plural' => '',	'english_translation' => 'people',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Arbeit',	'german_word_plural' => 'Arbeiten',	'english_translation' => 'work',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Prozent',	'german_word_plural' => 'Prozente',	'english_translation' => 'percent',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Hand',	'german_word_plural' => 'Hände',	'english_translation' => 'hand',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Stadt',	'german_word_plural' => 'Städte',	'english_translation' => 'city, town',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Herr',	'german_word_plural' => 'Herren',	'english_translation' => 'man, Mr.',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Problem',	'german_word_plural' => 'Probleme',	'english_translation' => 'problem',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Welt',	'german_word_plural' => 'Welten',	'english_translation' => 'world',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Recht',	'german_word_plural' => 'Rechte',	'english_translation' => 'right, law',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Ende',	'german_word_plural' => 'Enden',	'english_translation' => 'end',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Million',	'german_word_plural' => 'Millionen',	'english_translation' => 'million',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Schule',	'german_word_plural' => 'Schulen',	'english_translation' => 'school',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Woche',	'german_word_plural' => 'Wochen',	'english_translation' => 'week',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Vater',	'german_word_plural' => 'Väter',	'english_translation' => 'father',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Seite',	'german_word_plural' => 'Seiten',	'english_translation' => 'side, page',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Leben',	'german_word_plural' => 'Leben',	'english_translation' => 'life',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Mutter',	'german_word_plural' => 'Mütter',	'english_translation' => 'mother',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Grund',	'german_word_plural' => 'Gründe',	'english_translation' => 'reason, basis',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Auge',	'german_word_plural' => 'Augen',	'english_translation' => 'eye',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Wort',	'german_word_plural' => 'Wörter',	'english_translation' => 'word',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Geld',	'german_word_plural' => 'Gelder',	'english_translation' => 'money',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Art',	'german_word_plural' => 'Arten',	'english_translation' => 'type, kind',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Bereich',	'german_word_plural' => 'Bereiche',	'english_translation' => 'area, region',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Weg',	'german_word_plural' => 'Wege',	'english_translation' => 'path, way',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Stunde',	'german_word_plural' => 'Stunden',	'english_translation' => 'hour',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Name',	'german_word_plural' => 'Namen',	'english_translation' => 'name',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Geschichte',	'german_word_plural' => 'Geschichten',	'english_translation' => 'history, story',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Gesellschaft',	'german_word_plural' => 'Gesellschaften',	'english_translation' => 'society, company',	'created_at' => Carbon::now()],
['article' => 'der',	'german_word' => 'Kopf',	'german_word_plural' => 'Köpfe',	'english_translation' => 'head',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Paar',	'german_word_plural' => 'Paare',	'english_translation' => 'pair, couple',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Möglichkeit',	'german_word_plural' => 'Möglichkeiten',	'english_translation' => 'possibility',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Unternehmen',	'german_word_plural' => 'Unternehmen',	'english_translation' => 'enterprise, company',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Bild',	'german_word_plural' => 'Bilder',	'english_translation' => 'picture',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Buch',	'german_word_plural' => 'Bücher',	'english_translation' => 'book',	'created_at' => Carbon::now()],
['article' => 'das',	'german_word' => 'Wasser',	'german_word_plural' => 'Wasser',	'english_translation' => 'water',	'created_at' => Carbon::now()],
['article' => 'die',	'german_word' => 'Stelle',	'german_word_plural' => 'Stellen',	'english_translation' => 'place',	'created_at' => Carbon::now()],

        ];
        
        

        // Insert the data into the 'german_words' table
        GermanWord::insert($germanWords);
    }
}
