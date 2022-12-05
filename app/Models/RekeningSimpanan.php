<?php

namespace App\Models;

use App\Models\Concerns\nomorUrutan;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningSimpanan extends Model
{
    use HasFactory, nomorUrutan;

    protected $table = 'rekening_simpanans';

    protected $fillable = [
        'no_rekening',
        'anggota_id',
        'tgl_daftar',
        'produk_simpanan_id',
        'bunga',
        'saldo',
    ];

    public function totalSaldo()
    {
        return $this->setor() - $this->tarik();
    }

    public function tarik()
    {
        $tarik = $this->simpanan_anggotas()->where('transaksi', '=', 'Tarik')->sum('saldo');

        return $tarik;
    }

    public function setor()
    {
        $setor = $this->simpanan_anggotas()->where('transaksi', '=', 'Setor')->sum('saldo');

        return $setor;
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Pegawai::class);
    }

    public function simpanan_anggotas()
    {
        return $this->hasMany(SimpananAnggota::class);
    }
}
