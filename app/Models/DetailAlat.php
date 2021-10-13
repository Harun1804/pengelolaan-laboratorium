<?php

namespace App\Models;

use App\Models\Alat;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailAlat extends Model
{
    use HasFactory;

    protected $table = 'detail_alat';
    protected $fillable = [
        'alat_id',
        'kegiatan_id'
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
