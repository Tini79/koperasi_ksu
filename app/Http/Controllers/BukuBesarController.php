<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\DetailMemorial;
use App\Models\Memorial;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index(Request $request)
    {
        $monthYear = $request->month ? Carbon::create($request->month) : Carbon::now();
        $akuns = Akun::all();

        $search = $request->akun && $request->bulan ?
            DetailMemorial::with(['memorial' => function ($query) use ($monthYear) {
                return $query->whereMonth('tanggal', $monthYear->format('m'))
                    ->whereYear('tanggal', $monthYear->format('Y'));
            }], 'memorial')
            ->where('akun_id', 'like', '%' . $request->akun . '%')
            ->get()
            : null;

        return view('/pages.pembukuan.bukuBesar.index', [
            'akuns' => $akuns,
            'search' => $search
        ]);
    }

    public function printPdf()
    {
        $month = Carbon::now();
        $bukuBesars = DetailMemorial::with(['memorial' => function ($query) use ($month) {
            $query->whereMonth('tanggal', $month);
        }], 'memorial')->get();
        $date = Carbon::now();

        $pdf = PDF::loadView('pages.pembukuan.bukuBesar.pdf', ['bukuBesars' => $bukuBesars, 'date' => $date]);

        return $pdf->stream();
    }
}
