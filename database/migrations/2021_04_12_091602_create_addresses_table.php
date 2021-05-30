<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            $table->unsignedBigInteger('customer_id')->index();

            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat_lengkap');
            $table->integer('provinsi_id');
            $table->string('provinsi');
            $table->integer('kota_id');
            $table->string('kota');
            $table->integer('kecamatan_id');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->boolean('is_main');

            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
