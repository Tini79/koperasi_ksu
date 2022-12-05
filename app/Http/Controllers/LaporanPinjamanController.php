<?php

namespace App\Http\Controllers;

use App\Models\AngsuranPinjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanPinjamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->tanggal ?
            AngsuranPinjaman::with('pinjaman')->where('tanggal_pembayaran', 'like', '%' . $request->tanggal . '%')
            ->get()
            : null;

        return view('pages.laporan.pinjaman.index', ['search' => $search]);
    }

    public function printPdf()
    {
        $date = Carbon::now();
        $today = $date->toDateString();
        $laporanpinjaman = AngsuranPinjaman::with('pinjaman')
            ->where('tanggal_pembayaran', '=', $today)
            ->get();

        $pdf = PDF::loadView('pages.laporan.pinjaman.pdf', ['laporanPinjaman' => $laporanpinjaman, 'date' => $date]);

        return $pdf->stream();
    }
}
