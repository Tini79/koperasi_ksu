<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningSimpanan\SimpananAnggota\StoreSimpananAnggotaRequest;
use App\Models\Anggota;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SimpananAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $anggota = Anggota::all();
        $produkSimpanan = ProdukSimpanan::all();
        $rekeningSimpanan = RekeningSimpanan::with('simpanan_anggotas')->find($id);

        return view('/pages.simpanan.rekeningSimpanan.simpananAnggota.create', [
            'anggotas' => $anggota,
            'produkSimpanans' => $produkSimpanan,
            'rekeningSimpanan' => $rekeningSimpanan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimpananAnggotaRequest $request, $id)
    {
        $rekeningSimpanan = RekeningSimpanan::find($id);

        try {
            $datasimpanan = $request->validated();

            if ($rekeningSimpanan->totalSaldo() < $request->saldo && ($request->transaksi == 'Tarik')) {
                return redirect()->back()->with('danger', 'Maaf saldo Anda tidak cukup untuk melakukan penarikan!');
            } else {
                SimpananAnggota::create($datasimpanan);
            }

            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();

            // if ($startDate <= $request->tgl_transaksi && $endDate >= $request->tgl_transaksi) {
            //     if ($rekeningSimpanan->produk_simpanan_id == 1) {
            //         dd('t');
            //         return [
            //             'rekeningSimpanan' => 'unique:rekening_simpanans'
            //         ];
            //     }
            // }


            return redirect()->route('show.rekeningSimpanan', $rekeningSimpanan->id)->with('success', 'Berhasil input data!');
        } catch (Exception $th) {
            throw $th;

            return redirect()->back()->with('danger', 'Gagal input data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
