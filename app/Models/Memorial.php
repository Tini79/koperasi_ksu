<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    use HasFactory;

    protected $table = 'memorials';

    protected $guarded = (['']);

    public function simpanan_anggota()
    {
        return $this->belongsTo(SimpananAnggota::class);
    }

    public function detail_memorials()
    {
        return $this->hasMany(DetailMemorial::class);
    }
}
