<?php

// importo il model per avere i dati
use App\Comic;
// importo il faker
use Faker\Generator as Faker;


use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {

        $comicsList = config('comics');
        // con un ciclo foreach creo tante righe per la tabella quanti sono i dati presenti nel mio array
        foreach ($comicsList as $comic) {
            // come primo passo istanzio una nuova classe
            $newComic = new Comic();

            $newComic->title = $comic['title'];
            $newComic->type = $comic['type'];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->price = $comic['price'];
            $newComic->thumb = $faker->url();
            $newComic->description = $comic['description'];
            // ricordarsi di salvare i dati inseriti
            $newComic->save();
        }   
    }
}
