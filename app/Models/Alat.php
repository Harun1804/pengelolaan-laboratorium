<?php

namespace App\Models;

use App\Models\DetailAlat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $fillable = [
        'nama_alat',
        'gambar',
        'serial_number',
        'jenis'
    ];

    public function getGambarAttribute($value)
    {
        return url('storage/'.$value);
    }

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class,'alat_kegiatan','alat_id','kegiatan_id')->withPivot('personil_id','kegiatan_id','tanggal_cek','keterangan')->withTimestamps();
    }

    public function detailAlat()
    {
        return $this->hasOne(DetailAlat::class);
    }
}
