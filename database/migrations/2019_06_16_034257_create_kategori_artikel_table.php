<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('artikel', function (Blueprint $table) {
            $table->unsignedInteger('kategori')->after('deskripsi');
            $table->foreign('kategori')->references('id')->on('kategori_artikel')->onChange('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropForeign(['kategori']);
        });
        Schema::dropIfExists('kategori_artikel');
    }
}
