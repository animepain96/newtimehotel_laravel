<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'mota' => 'Đặt phòng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mota' => 'Xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mota' => 'Nhận phòng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mota' => 'Hủy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mota' => 'Đã thanh toán',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

    }
}
