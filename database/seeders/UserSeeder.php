<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               //
               User::create(["name"=>"Demo",
               "email"=>"demo@demo.com",
               "password"=>Hash::make('1234567890')]);
    }
}
