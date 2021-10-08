<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;

    protected $table = 'katergori_kegiatan';
    protected $fillable = [
        'nama_kategori'
    ];
}
