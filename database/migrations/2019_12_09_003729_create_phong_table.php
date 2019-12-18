<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenphong', 250);
            $table->string('tienich', 250);
            $table->integer('songuoilon');
            $table->integer('sotreem');
            $table->decimal('dientich');
            $table->integer('sogiuong');
            $table->unsignedBigInteger('idloai')->nullable();
            $table->unsignedBigInteger('idvitri')->nullable();
            $table->string('hinhdaidien', 500)->nullable();
            $table->boolean('hoatdong')->default(1);
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
        Schema::dropIfExists('phongs');
    }
}
