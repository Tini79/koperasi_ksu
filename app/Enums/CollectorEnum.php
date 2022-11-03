<?php

namespace App\Enums;

use Spatie\LaravelOptions\Options;

enum CollectorEnum: string
{
    case DebtCollectorKredit    = 'Debt Collector Kredit';
    case DebtCollectorTabungan  = 'Debt Collector Tabungan';
}
