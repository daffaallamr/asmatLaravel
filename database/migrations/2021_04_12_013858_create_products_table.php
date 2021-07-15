<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->string('berat')->default(500);
            $table->integer('harga');
            $table->text('deskripsi');
            $table->string('gambar_1');
            $table->string('gambar_2')->nullable();
            $table->integer('stok');
            $table->string('produsen');
            $table->string('nomer_izin')->nullable();
            $table->string('link_video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
