<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NhanTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 10) as $i){
            DB::table('nhantins')->insert([
               'email' => $faker->email,
               'ngayyeucau' => $faker->dateTimeThisYear
            ]);
        }

    }
}
