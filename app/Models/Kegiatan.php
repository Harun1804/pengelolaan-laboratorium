<?php

namespace App\Models;

use App\Models\KategoriKegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan',
        'periode',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriKegiatan::class,'kategori_id');
    }
}
