<?php

namespace App\Models;

use App\Models\Concerns\bungaMenurun;
use App\Models\Concerns\hitunganPinjaman;
use App\Models\Concerns\nomorUrutan;
use App\Models\Concerns\bungaFlat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory, nomorUrutan, hitunganPinjaman, bungaMenurun, bungaFlat;

    protected $table = 'pinjamans';

    protected $guarded = [''];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function jaminan_agunan()
    {
        return $this->hasOne(Agunan::class);
    }

    public function angsuran_pinjamans()
    {
        return $this->hasMany(AngsuranPinjaman::class);
    }
}
