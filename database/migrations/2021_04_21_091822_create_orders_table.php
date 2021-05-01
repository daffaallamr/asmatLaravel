<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            $table->string('order_unique_id')->unique()->nullable();;
            $table->unsignedBigInteger('customer_id')->index();
            $table->boolean('is_checkout')->nullable();
            $table->string('ekspedisi')->nullable();
            $table->integer('ongkir')->nullable();;
            $table->integer('jumlah_harga_barang')->nullable();
            $table->integer('jumlah_pembayaran_akhir')->nullable();
            $table->boolean('is_paid')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->string('status_payment')->nullable();
            $table->string('snap_token')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
