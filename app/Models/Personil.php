<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personil extends Model
{
    use HasFactory;

    protected $table = 'personil';
    protected $fillable = [
        'nama_petugas',
        'jabatan',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
