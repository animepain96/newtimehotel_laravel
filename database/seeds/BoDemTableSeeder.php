<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
            'soluong' => $faker->numberBetween(0, 50),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
