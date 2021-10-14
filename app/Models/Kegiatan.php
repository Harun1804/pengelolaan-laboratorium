<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan',
        'kelompok_kegiatan',
        'kategori',
        'periode'
    ];

    public function alat()
    {
        return $this->belongsToMany(Alat::class,'alat_kegiatan','kegiatan_id','alat_id')->withPivot('personil_id','kegiatan_id','tanggal_cek','keterangan')->withTimestamps();
    }
}
