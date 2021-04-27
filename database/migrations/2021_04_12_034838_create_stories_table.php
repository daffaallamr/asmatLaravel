<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id()->autoIncrement();;
            $table->timestamps();

            $table->unsignedBigInteger('admin_id')->index();

            $table->string('judul')->unique();
            $table->string('judul_paragraf_1');
            $table->text('paragraf_1');
            $table->string('judul_paragraf_2')->nullable();
            $table->text('paragraf_2')->nullable();;
            $table->string('judul_paragraf_3')->nullable();;
            $table->text('paragraf_3')->nullable();;
            $table->text('gambar_1');
            $table->text('gambar_2')->nullable();;
            $table->text('gambar_3')->nullable();;

            $table->foreign('admin_id')->references('id')->on('admins');

        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}
