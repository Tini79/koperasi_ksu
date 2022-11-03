<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pegawai;
use App\Models\Pinjaman;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all()->count();
        $anggota = Anggota::all()->count();
        $jumlahTarikTunai = SimpananAnggota::where('transaksi', '=', 'Tarik')->sum('saldo');
        $jumlahSaldo = SimpananAnggota::where('transaksi', '=', 'Setor')->sum('saldo');
        $pinjaman = Pinjaman::sum('jumlah_pinjaman');

        return view('/pages.dashboard.index', [
            'pegawai' => $pegawai,
            'anggota' => $anggota,
            'jumlahTarikTunai' => $jumlahTarikTunai,
            'jumlahSaldo' => $jumlahSaldo,
            'pinjaman' => $pinjaman,
        ]);
    }
}
