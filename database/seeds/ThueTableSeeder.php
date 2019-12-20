<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
                'batdau' => $faker->dateTimeBetween('2019-10-01', '2019-12-01'),
                'ketthuc' => $faker->dateTimeBetween('2019-12-01', '2020-01-01'),
                'idtrangthai' => $faker->numberBetween(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
