<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AngsuranPinjaman;
use App\Models\Pegawai;
use App\Models\Pinjaman;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardKetuaController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all()->count();
        $anggota = Anggota::all()->count();
        $jumlahTarikTunai = SimpananAnggota::where('transaksi', '=', 'Tarik')->sum('saldo');
        $jumlahSetoranAnggota = AngsuranPinjaman::sum('nominal_setoran');
        $jumlahSaldo = SimpananAnggota::where('transaksi', '=', 'Setor')->sum('saldo');
        $pinjaman = AngsuranPinjaman::sum('sisa_angsuran');

        return view('/pages.dashboard.index', [
            'pegawai' => $pegawai,
            'anggota' => $anggota,
            'jumlahTarikTunai' => $jumlahTarikTunai,
            'jumlahSaldo' => $jumlahSaldo,
            'pinjaman' => $pinjaman,
            'jumlahSetoranAnggota' => $jumlahSetoranAnggota
        ]);
    }
}
