<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';

    protected $guarded = [''];

    public function memorials()
    {
        return $this->hasMany(Memorial::class);
    }

    public function detail_memorials()
    {
        return $this->hasMany(DetailMemorial::class);
    }
}
