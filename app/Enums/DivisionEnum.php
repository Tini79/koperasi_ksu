<?php

namespace App\Enums;

use Spatie\LaravelOptions\Options;

enum DivisionEnum: string
{
    case Ketua      = 'Ketua';
    case Sekretaris = 'Sekretaris';
    case Bendahara  = 'Bendahara';
    case Admin      = 'Admin';
    case Kasir      = 'Kasir';
}
