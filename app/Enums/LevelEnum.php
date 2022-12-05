<?php

namespace App\Enums;

enum LevelEnum: string
{
    case Anggota   = 'Anggota';
    case Admin     = 'Admin';
    case Ketua     = 'Ketua';
    case Bendahara = 'Bendahara';
}
