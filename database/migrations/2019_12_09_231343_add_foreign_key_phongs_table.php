<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPhongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phongs', function (Blueprint $table) {
            $table->foreign('idloai')->references('id')->on('loaiphongs')->onDelete('cascade');
            $table->foreign('idvitri')->references('id')->on('vitris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phongs', function (Blueprint $table) {
            $table->dropForeign('phongs_idloai_foreign');
            $table->dropForeign('phongs_idvitri_foreign');
        });
    }
}
