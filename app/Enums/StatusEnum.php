<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Menunggu  = 'Menunggu';
    case Disetujui = 'Disetujui';
    case Ditolak   = 'Ditolak';
}
