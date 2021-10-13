<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan',50);
            $table->enum('kelompok_kegiatan',['pre_on','pre_off','pre_run','post_run'])->nullable();
            $table->enum('kategori',['maintenance','monitoring dan evaluasi','penggunaan alat','pemeliharaan']);
            $table->enum('periode',['harian','mingguan','bulanan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
