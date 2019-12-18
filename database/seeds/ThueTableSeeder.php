<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ThueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $kh_id = DB::table('khachhangs')->get()->pluck('id');
        $phong_id = DB::table('phongs')->get()->pluck('id');
        foreach ($kh_id as $id){
            DB::table('thues')->insert([
                'idkhach' => $id,
                'idphong' => $faker->numberBetween(1, count($phong_id)),
                'ngaydat' => $faker->dateTimeBetween('2019-01-01', '2019-10-01'),
                'batdau' => $faker->dateTimeBetween('2019-10-01', '2019-12-01'),
                'ketthuc' => $faker->dateTimeBetween('2019-12-01', '2019-12-10'),
                'idtrangthai' => $faker->numberBetween(1, 5)
            ]);
        }

    }
}
