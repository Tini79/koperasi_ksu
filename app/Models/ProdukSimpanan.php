<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSimpanan extends Model
{
    use HasFactory;

    protected $fillable = ['no_produk', 'produk', 'bunga'];

    public function simpanan_anggotas()
    {
        return $this->hasMany(RekeningSimpanan::class);
    }
}
