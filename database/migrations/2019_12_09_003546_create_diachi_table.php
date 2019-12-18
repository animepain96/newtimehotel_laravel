<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiachiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idtinh')->nullable();
            $table->string('ten', 150);
            $table->boolean('hoatdong')->default(1);
            $table->string('ghichu', 500)->nullable();
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
        Schema::dropIfExists('diachis');
    }
}
