<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanShuController extends Controller
{
    public function index(Request $request)
    {
        $monthYear = $request->bulan ? Carbon::create($request->bulan) : Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunSaldoModalAwal = Akun::getAkunWithCallback(Akun::where('kode_akun', '700')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });

        return view('pages.laporan.shu.index', [
            'akunSaldoModalAwal' => $akunSaldoModalAwal,
        ]);
    }

    public function printPdf()
    {
        $date = Carbon::now()->translatedFormat('F Y');
        $monthYear = Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunSaldoModalAwal = Akun::getAkunWithCallback(Akun::where('kode_akun', '700')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });

        return view('pages.laporan.shu.pdf', [
            'date' => $date,
            'akunSaldoModalAwal' => $akunSaldoModalAwal,
        ]);

        // return $pdf->stream();
    }
}
