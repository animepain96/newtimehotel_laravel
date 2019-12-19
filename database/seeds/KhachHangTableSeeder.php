<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class KhachHangTableSeeder extends Seeder
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
            DB::table('khachhangs')->insert([
                'hoten' => $faker->name,
                'tendangnhap' => $faker->userName,
                'matkhau' => Hash::make('123'),
                'email' => $faker->email,
                'sdt' => $faker->phoneNumber,
                'avatar' => '01.jpg',
                'gioitinh' => $faker->boolean,
                'kichhoat' => $faker->boolean,
                'hoatdong' => $faker->boolean,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
