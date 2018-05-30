<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $countries = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'));
        foreach ($countries as $country){
            $ct = new Country();
            $ct->name = $country->name;
            $ct->code = $country->alpha2Code;
            $ct->demonym = $country->demonym;
            $ct->save();
        }
    }
}
