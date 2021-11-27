<?php

namespace Database\Seeders;

use App\Models\Ingresos;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class IngresosSeeders extends Seeder
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
            Ingresos::create(
                [
                    "descripcion"=>$faker->name,
                    "cantidad"=>$faker->randomDigit
                ]
            );
        }
    }
}
