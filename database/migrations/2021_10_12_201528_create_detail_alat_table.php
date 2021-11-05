<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_alat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alat_id')->constrained('alat');
            $table->foreignId('kegiatan_id')->constrained('kegiatan');
            $table->enum('kelompok_kegiatan',['pre_on','pre_off','pre_run','post_run'])->nullable();
            $table->enum('periode',['harian','mingguan','bulanan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_alat');
    }
}
