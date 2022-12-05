<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunPegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'username',
        'password',

    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
