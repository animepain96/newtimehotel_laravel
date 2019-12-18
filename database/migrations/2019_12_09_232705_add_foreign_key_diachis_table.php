<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDiachisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diachis', function (Blueprint $table) {
            $table->foreign('idtinh')->references('id')->on('diachis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diachis', function (Blueprint $table) {
            $table->dropForeign('diachis_idtinh_foreign');
        });
    }
}
