<?php

namespace App\Enums;

use Spatie\LaravelOptions\Options;

enum MaritalStatusEnum: string
{
    case BelumKawin = 'Belum Kawin';
    case Kawin      = 'Kawin';
    case CeraiHidup = 'Cerai Hidup';
    case CeraiMati  = 'Cerai Mati';
}
