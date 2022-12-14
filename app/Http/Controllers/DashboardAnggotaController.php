<?php

namespace App\Http\Controllers;

use App\Models\AngsuranPinjaman;
use App\Models\Pinjaman;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardAnggotaController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->anggota_id;
        $pinjaman = Pinjaman::where('anggota_id', $userId)->with('anggota', 'angsuran_pinjamans')->first();
        $statusPinjaman = AngsuranPinjaman::latest()->get()->first();
        $simpanan = RekeningSimpanan::where('anggota_id', $userId)->with('simpanan_anggotas')->first();
        $detailSimpanans = SimpananAnggota::where('anggota_id', $userId)
            ->get();

        return view('pages.dashboard.dashboardAnggota.index', [
            'pinjaman' => $pinjaman,
            'simpanan' => $simpanan,
            'statusPinjaman' => $statusPinjaman,
            'detailSimpanans' => $detailSimpanans,
        ]);
    }
}
