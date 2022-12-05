<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMemorial extends Model
{
    use HasFactory;
    public $akunId = 0;

    protected $table = "detail_memorials";

    protected $guarded = [''];

    public function memorial()
    {
        return $this->belongsTo(Memorial::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
}
