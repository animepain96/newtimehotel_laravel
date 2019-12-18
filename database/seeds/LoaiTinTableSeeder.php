<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,3) as $i){
            DB::table('loaitins')->insert([
                'ten' => 'Loại tin ' . $i
            ]);
        }
    }
}
