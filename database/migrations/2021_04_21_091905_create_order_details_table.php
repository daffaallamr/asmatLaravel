<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('produk_id')->index();

            $table->integer('harga');
            $table->integer('berat')->default(500);
            $table->integer('jumlah_berat');
            $table->integer('jumlah_barang');
            $table->integer('jumlah_harga');   

            $table->foreign('produk_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
