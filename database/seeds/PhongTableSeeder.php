<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PhongTableSeeder extends Seeder
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
            DB::table('phongs')->insert([
                'tenphong' => 'Phòng ' . $i,
                'tienich' => 'Tiện ích',
                'songuoilon' => $faker->numberBetween(1,5),
                'sotreem' => $faker->numberBetween(0,5),
                'dientich' => $faker->numberBetween(10, 50),
                'sogiuong' => $faker->numberBetween(1, 3),
                'idloai' => $faker->numberBetween(1,5),
                'idvitri' => $faker->numberBetween(1,3),
                'hinhdaidien' => '01.jpg',
                'hoatdong' => $faker->boolean
            ]);
        }
    }
}
