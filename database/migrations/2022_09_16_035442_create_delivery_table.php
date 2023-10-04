<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama_produk',50);
            $table->unsignedInteger('kategori_id')->nullable();
            $table->float('harga_normal');
            $table->float('harga_grabfood');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onUpdate('cascade');
        });
    }
    // {
    //     Schema::create('delivery', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery');
    }
}
