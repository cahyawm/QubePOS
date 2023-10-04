<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama',50);
            $table->unsignedInteger('jenisdiskon_id')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir')->nullable();
            $table->integer('besar_diskon');
            $table->timestamps();

            $table->foreign('jenisdiskon_id')->references('id')->on('jenis_diskon')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskon');
    }
}
