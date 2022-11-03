<?php

namespace App\Models\Concerns;

trait bungaMenurun
{
    // tampilin di bagian bayar create.blade
    public function setBungaMenurun()
    {
        return ceil($this->setCicilanPokok() + $this->setPinjamanBungaMenurun());
    }

    public function setPinjamanBungaMenurun()
    {
        return ($this->sisaAngsuran()->sisa_angsuran * $this->getBunga()) / $this->getJangkaWaktu();
    }
}
