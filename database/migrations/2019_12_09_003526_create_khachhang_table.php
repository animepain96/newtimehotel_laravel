<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten', 150);
            $table->string('tendangnhap', 50);
            $table->string('matkhau', 500);
            $table->string('email', 500);
            $table->date('ngaysinh')->nullable();
            $table->string('sdt', 30)->nullable();
            $table->boolean('gioitinh')->default(1);
            $table->unsignedBigInteger('idtinh')->nullable();
            $table->unsignedBigInteger('idthanhpho')->nullable();
            $table->string('diachi', 250)->nullable();
            $table->string('avatar', 500)->nullable();
            $table->boolean('kichhoat')->default(0);
            $table->boolean('hoatdong')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhangs');
    }
}
