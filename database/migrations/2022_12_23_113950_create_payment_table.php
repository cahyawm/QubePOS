<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            // $table->char('metode_pembayaran', 50)->nullable();
            $table->enum('metode_pembayaran', ['cash', 'debit', 'e-wallet']);
            $table->float('total_tagihan');
            $table->float('bayar');
            $table->float('kembalian');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('order')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
