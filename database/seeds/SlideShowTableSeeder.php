<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlideShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slideshows')->insert([
            [
                'urlanh' => '01.jpg',
                'tieude' => 'NewTime Hotel',
                'mota' => 'Mang đến sự sang trọng cho bạn',
                'lienket' => url('/'),
                'hoatdong' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'urlanh' => '02.jpg',
                'tieude' => 'Châu Khá Bảnh',
                'mota' => 'Tôi đẹp trai vì tôi thấy thế',
                'lienket' => url('/'),
                'hoatdong' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'urlanh' => '03.jpg',
                'tieude' => 'Lorem Ipsum',
                'mota' => 'Lorem Ipsum Lorem Ipsum',
                'lienket' => url('/'),
                'hoatdong' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'urlanh' => '04.jpg',
                'tieude' => 'Cao đẳng Công nghiệp Huế',
                'mota' => 'Hướng đến thành công',
                'lienket' => url('/'),
                'hoatdong' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]]);
    }
}
