<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyThuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thues', function (Blueprint $table) {
            $table->foreign('idkhach')->references('id')->on('khachhangs')->onDelete('cascade');
            $table->foreign('idphong')->references('id')->on('phongs')->onDelete('cascade');
            $table->foreign('idtrangthai')->references('id')->on('trangthaithues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thues', function (Blueprint $table) {
            $table->dropForeign('thues_idkhach_foreign');
            $table->dropForeign('thues_idphong_foreign');
            $table->dropForeign('thues_idtrangthai_foreign');
        });
    }
}
