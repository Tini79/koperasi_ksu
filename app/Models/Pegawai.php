<?php

namespace App\Models;

use App\Enums\DivisionEnum;
use App\Models\Concerns\nomorUrutan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, nomorUrutan;

    protected $table = 'pegawais';

    protected $fillable = [
        'no_pegawai',
        'nama_pegawai',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'no_tlp',
        'alamat',
        'divisi',
    ];

    protected $casts = [
        'divisi' => DivisionEnum::class,
    ];

    public function akun_pegawai()
    {
        return $this->hasOne(AkunPegawai::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function rekening_simpanans()
    {
        return $this->hasMany(RekeningSimpanan::class);
    }
}
