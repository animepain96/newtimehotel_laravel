<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinnhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinnhans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten', 100);
            $table->string('email', 500);
            $table->string('tieude', 250);
            $table->string('noidung', 1000);
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
        Schema::dropIfExists('tinnhans');
    }
}
