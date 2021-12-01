<?php

namespace Database\Seeders;

use App\Models\Prendas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PrendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i = 0; $i < 15; $i++) {
            Prendas::create(
                [
                    "descripcion"=>$faker->word,
                    "precio"=>$faker->randomDigit
                ]
            );
        }

      
    }
}
