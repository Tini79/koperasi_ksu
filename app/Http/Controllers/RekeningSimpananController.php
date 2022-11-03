<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningSimpanan\StoreRekeningSimpananRequest;
use App\Http\Requests\RekeningSimpanan\UpdateRekeningSimpananRequest;
use App\Models\Anggota;
use App\Models\Pegawai;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekeningSimpanan = RekeningSimpanan::with('anggota')->orderBy('anggota_id', 'DESC')->get();

        return view('/pages.simpanan.rekeningSimpanan.index', [
            'rekeningSimpanans' => $rekeningSimpanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::all();
        $produkSimpanan = ProdukSimpanan::all();

        return view('/pages.simpanan.rekeningSimpanan.create', [
            'anggotas' => $anggota,
            'produkSimpanans' => $produkSimpanan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekeningSimpananRequest $request, RekeningSimpanan $datarekeningsimpanan)
    {
        DB::beginTransaction();

        try {
            RekeningSimpanan::create($request->safe([
                'no_rekening',
                'anggota_id',
                'tgl_daftar',
                'produk_simpanan_id',
                'bunga',
                'saldo',
            ]));

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal input data!');
        }

        return redirect(route('index.rekeningSimpanan'))->with('success', 'Data berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datarekeningsimpanan = RekeningSimpanan::with('simpanan_anggotas')->find($id);

        return view('/pages.simpanan.rekeningSimpanan.show', [
            'rekeningSimpanan' => $datarekeningsimpanan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningSimpanan $datarekeningsimpanan)
    {
        $anggota = Anggota::all();
        $produkSimpanan = ProdukSimpanan::all();

        return view('/pages.simpanan.rekeningsimpanan.edit', [
            'rekeningSimpanan' => $datarekeningsimpanan,
            'anggotas' => $anggota,
            'produkSimpanans' => $produkSimpanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekeningSimpananRequest $request, RekeningSimpanan $datarekeningsimpanan)
    {
        DB::beginTransaction();
        try {
            $datarekeningsimpanan->fill($request->safe([
                'no_rekening',
                'anggota_id',
                'tgl_daftar',
            ]));

            $datarekeningsimpanan->save();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal edit data!');
        }

        return redirect(route('show.rekeningSimpanan', ['datarekeningsimpanan' => $datarekeningsimpanan->id]))->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningSimpanan $datarekeningsimpanan)
    {
        DB::beginTransaction();
        try {
            $datarekeningsimpanan->delete();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect(route('index.rekeningSimpanan'))->with('success', 'Berhasil hapus data!');
    }
}
