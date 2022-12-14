<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use PDF;

class LaporanNeracaController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->tanggal_awal ?: Carbon::now()->format('Y-m-d');
        $end = $request->tanggal_akhir ?: Carbon::now()->format('Y-m-d');

        $akunAset = Akun::getAkunWithCallback(Akun::where('kode_akun', '100')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunKewajiban = Akun::getAkunWithCallback(Akun::where('kode_akun', '200')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunPendapatan = Akun::getAkunWithCallback(Akun::where('kode_akun', '400')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunEkuitas = Akun::getAkunWithCallback(Akun::where('kode_akun', '300')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunArusKas = Akun::getAkunWithCallback(Akun::where('kode_akun', '600')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunSaldoModalAwal = Akun::getAkunWithCallback(Akun::where('kode_akun', '700')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunTransaksi = Akun::getAkunWithCallback(Akun::where('kode_akun', '800')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });

        return view('pages.laporan.neraca.index', [
            'akunAset' => $akunAset,
            'akunKewajiban' => $akunKewajiban,
            'akunPendapatan' => $akunPendapatan,
            'akunEkuitas' => $akunEkuitas,
            'akunArusKas' => $akunArusKas,
            'akunSaldoModalAwal' => $akunSaldoModalAwal,
            'akunTransaksi' => $akunTransaksi,
        ]);
    }

    public function printPdf()
    {
        $fullOneMonth = Carbon::now()->daysInMonth;
        $date = Carbon::now()->addDays($fullOneMonth)->translatedFormat('F Y');
        $start = Carbon::now()->format('Y-m-d');
        $end = Carbon::now()->addDays($fullOneMonth)->format('Y-m-d');

        $akunAset = Akun::getAkunWithCallback(Akun::where('kode_akun', '100')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunKewajiban = Akun::getAkunWithCallback(Akun::where('kode_akun', '200')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunEkuitas = Akun::getAkunWithCallback(Akun::where('kode_akun', '300')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });
        $akunTransaksi = Akun::getAkunWithCallback(Akun::where('kode_akun', '800')->first(), function ($akun)  use ($start, $end) {
            $akun->saldo_calculate_date_between($start, $end);
            return $akun;
        });

        return view('pages.laporan.neraca.pdf', [
            'date' => $date,
            'akunAset' => $akunAset,
            'akunKewajiban' => $akunKewajiban,
            'akunEkuitas' => $akunEkuitas,
            'akunTransaksi' => $akunTransaksi,
        ]);

        return $pdf->stream();
    }
}
