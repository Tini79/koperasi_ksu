<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanArusKasController extends Controller
{
    public function index(Request $request)
    {
        $monthYear = $request->bulan ? Carbon::create($request->bulan) : Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunArusKas = Akun::getAkunWithCallback(Akun::where('kode_akun', '600')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });

        return view('pages.laporan.aruskas.index', [
            'akunArusKas' => $akunArusKas,
        ]);
    }

    public function printPdf()
    {
        $date = Carbon::now()->translatedFormat('F Y');
        $monthYear = Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunArusKas = Akun::getAkunWithCallback(Akun::where('kode_akun', '600')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });

        $pdf = PDF::loadView('pages.laporan.arusKas.pdf', [
            'date' => $date,
            'akunArusKas' => $akunArusKas
        ]);

        return $pdf->stream();
    }
}
