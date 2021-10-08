<?php

namespace App\Models;

use App\Models\Alat;
use App\Models\User;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatKegiatan extends Model
{
    use HasFactory;

    protected $table = 'alat_kegiatan';
    protected $fillable = [
        'user_id',
        'alat_id',
        'kegiatan_id',
        'tanggal_cek',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
