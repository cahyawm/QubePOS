<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('produk_id');
            // $table->char('metode_pembayaran', 50)->nullable();
            $table->integer('jumlah');
            $table->double('total', 8, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('order')->onUpdate('cascade');
            $table->foreign('produk_id')->references('id')->on('produk')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
