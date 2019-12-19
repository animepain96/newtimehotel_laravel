<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idkhach');
            $table->unsignedBigInteger('idphong');
            $table->date('batdau');
            $table->date('ketthuc');
            $table->unsignedBigInteger('idtrangthai');
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
        Schema::dropIfExists('thues');
    }
}
