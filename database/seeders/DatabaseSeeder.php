<?php

namespace Database\Seeders;

use App\Models\Egresos;
use App\Models\Prendas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PrendasSeeder::class,
            IngresosSeeders::class,
            EgresosSeeders::class,
            CajaSeeder::class,
        ]);

    }
}
