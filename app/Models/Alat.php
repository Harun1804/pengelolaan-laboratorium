<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $fillable = [
        'nama_alat',
        'gambar',
        'serial_number'
    ];

    public function getGambarAttribute($value)
    {
        return url('storage/'.$value);
    }

    public function kehiatan()
    {
        return $this->belongsToMany(Kegiatan::class,'alat_kegiatan','alat_id','kegiatan_id');
    }
}
