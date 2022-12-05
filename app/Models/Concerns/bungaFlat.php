<?php

namespace App\Models\Concerns;

trait bungaFlat
{
    // tampilin di bagian bayar create.blade
    public function setBungaFlat()
    {
        return ceil($this->setCicilanPokok() + $this->setPinjamanBungaFlat());
    }

    public function setPinjamanBungaFlat()
    {
        return ($this->pinjamanCair() * $this->getBunga()) / $this->getJangkaWaktu();
    }
}
