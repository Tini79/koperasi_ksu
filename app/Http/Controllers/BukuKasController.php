<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\DetailMemorial;
use App\Models\Memorial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class BukuKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $akuns = Akun::all();
        $search = $request->akun && $request->tanggal ?
            Memorial::with(['detail_memorials' => function ($query) use ($request) {
                $query->where('akun_id', 'like', '%' . $request->akun . '%');
            }], 'detail_memorials')
            ->where('tanggal', 'like', '%' . $request->tanggal . '%')
            ->get()
            : null;

        return view('/pages.pembukuan.bukuKas.index', [
            'akuns' => $akuns,
            'search' => $search
        ]);
    }

    public function printPdf()
    {
        $date = Carbon::now();
        $today = $date->toDateString();
        $bukuKas = DetailMemorial::with(['memorial' => function ($query) use ($today) {
            $query->whereDate('tanggal', '=', $today);
        }], 'memorial')->get();

        $pdf = PDF::loadView('pages.pembukuan.bukuKas.pdf', ['bukuKas' => $bukuKas, 'date' => $date]);

        return $pdf->stream();
    }
}
