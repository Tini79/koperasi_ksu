<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunAnggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id',
        'username',
        'password',

    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
