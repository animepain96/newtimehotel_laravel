<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BoDemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        DB::table('bodems')->insert([
            'ngay' => $faker->dateTimeThisMonth(),
            'soluong' => $faker->numberBetween(0, 50)
        ]);

    }
}
