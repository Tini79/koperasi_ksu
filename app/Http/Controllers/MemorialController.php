<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemorialRequest;
use App\Models\Akun;
use App\Models\DetailMemorial;
use App\Models\Memorial;
use App\Models\SimpananAnggota;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MemorialController extends Controller
{
    public function index()
    {
        $memorials = Memorial::with('detail_memorials')->get();

        return view('pages.pembukuan.memorial.index', [
            'memorials' => $memorials
        ]);
    }

    public function create()
    {
        $akuns = Akun::all();
        $jurnal = Memorial::count();
        $date = Carbon::now();

        $noJurnal = $date->format('dmY') . str_pad($jurnal + 1, 4, '000', STR_PAD_LEFT);


        return view('pages.pembukuan.memorial.create', [
            'akuns' => $akuns,
            'no_jurnal' => $noJurnal
        ]);
    }

    public function store(MemorialRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataMemorials = $request->validated();
            $memorial = new Memorial();

            $memorial->no_jurnal = $dataMemorials['no_jurnal'];
            $memorial->keterangan = $dataMemorials['keterangan'];
            $memorial->tanggal = $dataMemorials['tanggal'];

            $detailMemorials = [];
            foreach ($dataMemorials['dataMemorial'] as $dataMemorial) {
                $detailMemorials[] = new DetailMemorial([
                    'debet' => $dataMemorial['debet'],
                    'kredit' => $dataMemorial['kredit'],
                    'akun_id' => $dataMemorial['akun_id'],
                ]);
            }

            $memorial->save();

            $memorial->detail_memorials()->saveMany($detailMemorials);

            DB::commit();
            return redirect()->route('pembukuan.datajurnalkas.index')->with('success', 'Berhasil input data!');
        } catch (Exception $th) {
            dd($th);
            DB::rollBack();

            return redirect()->back()->with('danger', 'Gagal input data!');
        }
    }

    public function printPdf()
    {
        $simpananAnggotas = SimpananAnggota::with('anggota')->get();

        $pdf = PDF::loadView('pages.laporan.memorialPdf', [
            'simpananAnggotas' => $simpananAnggotas
        ]);

        return $pdf->stream();
    }

    public function destroy($id)
    {
        try {
            DetailMemorial::destroy($id);
        } catch (Exception $th) {
            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect()->back()->with('success', 'Berhasil hapus data!');
    }
}
