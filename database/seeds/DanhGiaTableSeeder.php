<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DanhGiaTableSeeder extends Seeder
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
            DB::table('danhgias')->insert([
                'idkhachhang' => $faker->numberBetween(1, 10),
                'noidung' => $faker->paragraph,
                'hienthi' => $faker->boolean,
            ]);
        }

    }
}
