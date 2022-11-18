<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SimpananAnggota extends Model
{
    use HasFactory;

    protected $table = 'simpanan_anggotas';

    protected $guarded = [''];

    public function tarikTunaiAnggota()
    {
        return $this->where('transaksi', '=', 'Tarik')->sum('saldo');
    }

    public function setorTunaiAnggota()
    {
        return $this->where('transaksi', '=', 'Setor')->sum('saldo');
    }

    public function produk_simpanan()
    {
        return $this->belongsTo(ProdukSimpanan::class);
    }

    public function rekening_simpanan()
    {
        return $this->belongsTo(RekeningSimpanan::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function memorials()
    {
        return $this->hasMany(SimpananAnggota::class);
    }
}
