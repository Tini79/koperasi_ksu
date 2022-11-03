<?php

namespace App\Models\Concerns;

trait nomorUrutan
{
    public static function getNumber(int $rekNumber, int $length, string $pad)
    {
        return str_pad($rekNumber + 1, $length, $pad, STR_PAD_LEFT);
    }
}
