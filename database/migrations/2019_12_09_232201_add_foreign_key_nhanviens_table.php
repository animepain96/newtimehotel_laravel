<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyNhanviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhanviens', function (Blueprint $table) {
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
        Schema::table('nhanviens', function (Blueprint $table) {
            $table->dropForeign('nhanviens_idtinh_foreign');
            $table->dropForeign('nhanviens_idthanhpho_foreign');
        });
    }
}
