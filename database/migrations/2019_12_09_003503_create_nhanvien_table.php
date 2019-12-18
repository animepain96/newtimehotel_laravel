<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanviens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten', 150);
            $table->string('tendangnhap', 50);
            $table->string('matkhau', 500);
            $table->rememberToken();
            $table->boolean('isAdmin');
            $table->string('email', 500);
            $table->string('sdt', 30);
            $table->date('ngaysinh')->nullable();
            $table->boolean('gioitinh')->nullable();
            $table->unsignedBigInteger('idtinh')->nullable();
            $table->unsignedBigInteger('idthanhpho')->nullable();
            $table->string('diachi', 250)->nullable();
            $table->string('avatar', 500)->nullable();
            $table->boolean('hoatdong')->default(0);
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
        Schema::dropIfExists('nhanviens');
    }
}
