<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agunan extends Model
{
    use HasFactory;

    protected $table = 'jaminan_agunans';

    protected $fillable = [
        'nominal_jaminan',
        'jaminan',
        'keterangan'
    ];

    public function pinjamans()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
