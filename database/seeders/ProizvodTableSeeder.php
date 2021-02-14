<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProizvodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proizvods')->insert(
            [
                ['naslov' => 'Audi A4', 'url' => 'https://images3.polovniautomobili.tv/user-images/thumbs/1158/11582718/9c643dacb24f-800x600.jpg', 'cena' => '12000 evra', 'korisnik' => 'Marko Nikolic', 'opis' => 'Crni Audi A4. Godiste 2015. Kilometraza 72.890km. Auto kao nov, mat crne boje, metalik felne. Precnik felni 19 inci.', 'broj_telefona' => '062/1234567', 'kategorije_id' => 'automobili'],
                ['naslov' => 'Mercedes E300', 'url' => 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6268/6268404_sd.jpg', 'cena' => '12000 evra', 'korisnik' => 'Marko Nikolic', 'opis' => 'Crni Audi A4. Godiste 2015. Kilometraza 72.890km. Auto kao nov, mat crne boje, metalik felne. Precnik felni 19 inci.', 'broj_telefona' => '062/1234567', 'kategorije_id' => 'automobili'],
                ['naslov' => 'TV Samsung LC352H', 'url' => 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6268/6268404_sd.jpg', 'cena' => '12000 evra', 'korisnik' => 'Marko Nikolic', 'opis' => 'Crni Audi A4. Godiste 2015. Kilometraza 72.890km. Auto kao nov, mat crne boje, metalik felne. Precnik felni 19 inci.', 'broj_telefona' => '062/1234567', 'kategorije_id' => 'automobili']
            ]
        );
    }
}
