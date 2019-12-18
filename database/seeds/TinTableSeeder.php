<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TinTableSeeder extends Seeder
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
            DB::table('tins')->insert([
                'tieude' => $faker->sentence,
                'mota' => $faker->sentence,
                'noidung' => $faker->sentence,
                'anhdaidien' => 'assets/images/news/01.jpg',
                'idnhanvien' => $faker->numberBetween(1, 11),
                'idloaitin' => $faker->numberBetween(1, 3),
                'hoatdong' => $faker->boolean
            ]);
        }

    }
}
