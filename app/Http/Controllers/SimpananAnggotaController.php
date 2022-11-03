<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningSimpanan\SimpananAnggota\StoreSimpananAnggotaRequest;
use App\Models\Anggota;
use App\Models\Memorial;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
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

            // $simpananAnggotas = SimpananAnggota::latest()->get('id')->take(1);

            // foreach ($simpananAnggotas as $simpananAnggota) {
            //     $anggota = $simpananAnggota->id;

            //     if ($request->transaksi == 'Setor') {
            //         Memorial::insert([
            //             'simpanan_anggota_id' => $anggota,
            //             'tanggal' => $request->tgl_transaksi,
            //             'debet' => $request->saldo
            //         ]);
            //     } else {
            //         Memorial::insert([
            //             'simpanan_anggota_id' => $anggota,
            //             'tanggal' => $request->tgl_transaksi,
            //             'kredit' => $request->saldo
            //         ]);
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
