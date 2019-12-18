<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tins', function (Blueprint $table) {
            $table->foreign('idloaitin')->references('id')->on('loaitins')->onDelete('cascade');
            $table->foreign('idnhanvien')->references('id')->on('nhanviens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tins', function (Blueprint $table) {
            $table->dropForeign('tins_idloaitin_foreign');
            $table->dropForeign('tins_idnhanvien_foreign');
        });
    }
}
