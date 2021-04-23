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

            $table->unsignedBigInteger('customer_id')->index();
            
            $table->boolean('is_checkout');

            $table->unsignedBigInteger('payment_id')->index()->nullable();
            $table->unsignedBigInteger('shipper_id')->index()->nullable();

            $table->boolean('is_paid')->nullable();
            $table->integer('jumlah_pembayaran')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');
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
