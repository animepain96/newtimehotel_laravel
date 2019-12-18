<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $i){
            DB::table('loaiphongs')->insert([
                'ten' => 'Loại phòng ' . $i
            ]);
        }
    }
}
