<?php

namespace Database\Seeders;

use App\Models\Caja;
use App\Models\User;
use Illuminate\Database\Seeder;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++){
            Caja::create([
                "caja"=>($i+1),
                "status"=>true,
                "user_id"=>User::orderByRaw("rand()")->first()->id,
            ]);
        }
        Caja::create([
            "caja"=>21,
            "status"=>false,
            "user_id"=>User::orderByRaw("rand()")->first()->id,
        ]);

    }
}
