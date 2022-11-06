<?php

namespace App\Models;

use App\Enums\MaritalStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $fillable = [
        'tgl_daftar',
        'nama_anggota',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'pekerjaan',
        'agama',
        'status_perkawinan',
        'no_tlp',
        'alamat',
        'simpanan_pokok',
    ];

    protected $casts = [
        'status_perkawinan' => MaritalStatusEnum::class,
    ];

    public function simpanan_anggotas()
    {
        return $this->hasMany(SimpananAnggota::class);
    }

    public function pinjamans()
    {
        return $this->hasMany(Pinjaman::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function rekening_simpanan()
    {
        return $this->hasOne(RekeningSimpanan::class);
    }
}
