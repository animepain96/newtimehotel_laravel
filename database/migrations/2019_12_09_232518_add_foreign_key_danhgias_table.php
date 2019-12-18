<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDanhgiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhgias', function (Blueprint $table) {
            $table->foreign('idkhachhang')->references('id')->on('khachhangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhgias', function (Blueprint $table) {
            $table->dropForeign('danhgias_idkhachhang_foreign');
        });
    }
}
