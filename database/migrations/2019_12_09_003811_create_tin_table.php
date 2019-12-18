<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude', 250);
            $table->string('mota', 250);
            $table->text('noidung');
            $table->string('anhdaidien', 500)->nullable();
            $table->unsignedBigInteger('idnhanvien');
            $table->unsignedBigInteger('idloaitin');
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
        Schema::dropIfExists('tins');
    }
}
