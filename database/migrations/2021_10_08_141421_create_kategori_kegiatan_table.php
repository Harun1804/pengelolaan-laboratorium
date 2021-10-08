<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori',50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_kegiatan');
    }
}
