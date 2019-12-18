<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BangGiaTableSeeder extends Seeder
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
            DB::table('banggias')->insert([
                'idphong' => $i,
                'gia' => $faker->numberBetween(10, 1000),
                'batdau' => $faker->dateTimeThisYear('2019-12-01'),
                'ketthuc' => $faker->dateTimeBetween('2019-12-31', '2020-01-01'),
            ]);
        }

    }
}
