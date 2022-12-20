<?php

namespace App\Http\Controllers;

use App\Models\SimpananAnggota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanSimpananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->tanggal ?
            SimpananAnggota::with('anggota', 'rekening_simpanan', 'produk_simpanan')->where('tgl_transaksi', 'like', '%' . $request->tanggal . '%')
            ->get()
            : null;

        return view('pages.laporan.simpanan.index', ['search' => $search]);
    }

    public function printPdf()
    {
        $date = Carbon::now()->translatedFormat('d F Y');
        $today = Carbon::now()->toDateString();
        $laporanSimpanan = SimpananAnggota::with('anggota', 'rekening_simpanan', 'produk_simpanan')
            ->where('tgl_transaksi', '=', $today)
            ->get();

        return view('pages.laporan.simpanan.pdf', ['laporanSimpanan' => $laporanSimpanan, 'date' => $date]);

        // return $pdf->stream();
    }
}
