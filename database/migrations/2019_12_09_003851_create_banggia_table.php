<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanggiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banggias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idphong');
            $table->decimal('gia');
            $table->date('batdau');
            $table->date('ketthuc');
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
        Schema::dropIfExists('banggias');
    }
}
