<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrangThaiThueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('trangthaithues')->insert([
            [
                'mota' => 'Đặt phòng'
            ],
            [
                'mota' => 'Xác nhận'
            ],
            [
                'mota' => 'Nhận phòng'
            ],
            [
                'mota' => 'Hủy'
            ],
            [
                'mota' => 'Đã thanh toán'
            ]
        ]);

    }
}
