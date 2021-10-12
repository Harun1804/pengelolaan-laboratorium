<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('alat_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personil_id')->constrained('personil');
            $table->foreignId('alat_id')->constrained('alat');
            $table->foreignId('kegiatan_id')->constrained('kegiatan');
            $table->date('tanggal_cek');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alat_kegiatan');
    }
}
