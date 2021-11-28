<?php

namespace Database\Seeders;

use App\Models\Egresos;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class EgresosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i = 0; $i < 5; $i++) {
            Egresos::create(
                [
                    "descripcion"=>$faker->name,
                    "cantidad"=>$faker->randomDigit
                ]
            );
        }
    }
}
