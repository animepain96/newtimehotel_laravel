<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DiaChiTableSeeder::class,
            NhanVienTableSeeder::class,
            KhachHangTableSeeder::class,
            ViTriTableSeeder::class,
            LoaiPhongTableSeeder::class,
            SlideShowTableSeeder::class,
            PhongTableSeeder::class,
            LoaiTinTableSeeder::class,
            TinTableSeeder::class,
            NhanTinTableSeeder::class,
            BangGiaTableSeeder::class,
            TrangThaiThueTableSeeder::class,
            BoDemTableSeeder::class,
            ThueTableSeeder::class,
            DanhGiaTableSeeder::class,
        ]);
    }
}
