<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyKhachhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khachhangs', function (Blueprint $table) {
            $table->foreign('idtinh')->references('id')->on('diachis')->onDelete('cascade');
            $table->foreign('idthanhpho')->references('id')->on('diachis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khachhangs', function (Blueprint $table) {
            $table->dropForeign('khachhangs_idtinh_foreign');
            $table->dropForeign('khachhangs_idthanhpho_foreign');
        });
    }
}
