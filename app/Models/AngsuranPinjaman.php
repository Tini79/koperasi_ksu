<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AngsuranPinjaman extends Model
{
    use HasFactory;

    protected $table = 'angsuran_pinjamans';

    protected $guarded = [''];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
