<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class LaporanLabaRugiController extends Controller
{
    public function index(Request $request)
    {
        $monthYear = $request->bulan ? Carbon::create($request->bulan) : Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunPendapatan = Akun::getAkunWithCallback(Akun::where('kode_akun', '400')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });
        $akunBiaya = Akun::getAkunWithCallback(Akun::where('kode_akun', '500')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });

        return view('pages.laporan.labaRugi.index', [
            'akunPendapatan' => $akunPendapatan,
            'akunBiaya' => $akunBiaya
        ]);
    }

    public function printPdf()
    {
        $date = Carbon::now()->translatedFormat('F Y');
        $monthYear = Carbon::now();
        $month = $monthYear->format('m');
        $year = $monthYear->format('Y');
        $akunPendapatan = Akun::getAkunWithCallback(Akun::where('kode_akun', '400')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });
        $akunBiaya = Akun::getAkunWithCallback(Akun::where('kode_akun', '500')->first(), function ($akun) use ($month, $year) {
            $akun->saldo_calculate_month($month, $year);
            return $akun;
        });


        return view('pages.laporan.labaRugi.pdf', [
            'date' => $date,
            'akunPendapatan' => $akunPendapatan,
            'akunBiaya' => $akunBiaya
        ]);

        // return $pdf->stream();
    }
}
