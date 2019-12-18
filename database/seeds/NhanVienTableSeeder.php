<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class NhanVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //generate user
        $faker = Faker::create();

        //admin
        DB::table('nhanviens')->insert([
            'tendangnhap' => 'admin',
            'matkhau' => Hash::make('123'),
            'isAdmin' => 1,
            'hoten' => 'Admin',
            'email' => 'admin@localhost',
            'sdt' => $faker->phoneNumber,
            'gioitinh' => 1,
            'hoatdong' => 1
        ]);

        foreach (range(1, 10) as $i){
            DB::table('nhanviens')->insert([
                'tendangnhap' => $faker->userName,
                'matkhau' => Hash::make('123'),
                'isAdmin' => 0,
                'hoten' => $faker->name,
                'email' => $faker->email,
                'sdt' => $faker->phoneNumber,
                'gioitinh' => $faker->boolean,
                'hoatdong' => $faker->boolean
            ]);
        }
    }
}
