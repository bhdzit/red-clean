<?php

namespace Database\Seeders;

use App\Models\Caja;
use App\Models\Notas;
use App\Models\Prendas;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<40;$i++){
            Notas::create([
                "nombre"=>$faker->name,
                "domicilio"=>$faker->address,
                "caja_id"=>Caja::orderByRaw("rand()")->first()->id,
                "user_id"=>User::orderByRaw("rand()")->first()->id,
    
            ]);
        }
        for($i=0;$i<500;$i++){
            
            Ventas::create(
                [
                   "nota_id"=>Notas::orderByRaw("rand()")->first()->id,
                   "prenda_id"=>Prendas::orderByRaw("rand()")->first()->id,
                   "cantidad"=>$faker->randomDigit,
                   "total"=>$faker->numberBetween($min = 100, $max = 1000),
                   "created_at"=>$faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)

                ]
            );
        }


        
    }
}
