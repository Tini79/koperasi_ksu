<?php

namespace App\Models\Concerns;

trait hitunganPinjaman
{
    public function sisaAngsuran()
    {
        return $this->angsuran_pinjamans()->latest()->select('sisa_angsuran')->first();
    }

    public function pinjamanCair()
    {
        return $this->pengajuanPinjaman() - $this->biayaAdmin();
    }

    public function pengajuanPinjaman()
    {
        return $this->jumlah_pinjaman;
    }

    public function biayaAdmin()
    {
        return $this->provisi + $this->materai + $this->notaris + $this->simpanan_wajib;
    }

    public function setoran($setoran)
    {
        return $setoran;
    }

    public function setCicilanPokok()
    {
        return $this->pinjamanCair() / $this->getJangkaWaktu();
    }

    public function getBunga()
    {
        return $this->bunga / 100;
    }

    public function getJangkaWaktu()
    {
        return $this->jangka_waktu_pinjaman;
    }
}
