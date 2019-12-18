<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAnhmotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anhmotas', function (Blueprint $table) {
            $table->foreign('idphong')->references('id')->on('phongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anhmotas', function (Blueprint $table) {
            $table->dropForeign('anhmotas_idphong_foreign');
        });
    }
}
