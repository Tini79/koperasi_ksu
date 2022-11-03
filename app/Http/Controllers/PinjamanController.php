<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjaman\StorePinjamanRequest;
use App\Http\Requests\Pinjaman\UpdatePinjamanRequest;
use App\Models\Agunan;
use App\Models\Anggota;
use App\Models\AngsuranPinjaman;
use App\Models\Pinjaman;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::latest()->get();

        return view('/pages.pinjaman.index', [
            'pinjamans' => $pinjaman
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
        $countPinjaman = Pinjaman::count('id');
        $pinjamanNumber = Pinjaman::getNumber($countPinjaman, 5, '00000');

        return view('/pages.pinjaman.create', [
            'anggotas' => $anggota,
            'pinjamanNumber' => $pinjamanNumber
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePinjamanRequest $request)
    {
        DB::beginTransaction();
        try {
            $dataPinjaman = $request->validated();

            Pinjaman::create($dataPinjaman);

            $dataPinjamans = Pinjaman::latest()->select('*')->get()->take(1);

            if ($request->agunan == 'Dengan Agunan') {
                foreach ($dataPinjamans as $pinjaman) {
                    $pinjamanId = $pinjaman->id;
                    Agunan::insert([
                        'pinjaman_id' => $pinjamanId,
                        'nominal_jaminan' => $request->nominal_jaminan,
                        'jaminan' => $request->jaminan,
                        'keterangan' => $request->keterangan,
                    ]);
                }
            }

            foreach ($dataPinjamans as $pinjaman) {
                AngsuranPinjaman::insert([
                    'pinjaman_id' => $pinjaman->id,
                    'tanggal_pembayaran' => $pinjaman->tgl_pinjaman,
                    'nominal_setoran' => 0,
                    'sisa_angsuran' => $pinjaman->pinjamanCair(),
                ]);
            }

            DB::commit();
        } catch (Exception $th) {
            dd($th);
            DB::rollBack();

            return back()->with('danger', 'Gagal input data!');
        }

        return redirect(route('index.pinjaman'))->with('success', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datapinjaman = Pinjaman::with('anggota', 'angsuran_pinjamans')->find($id);
        $sisaAngsuran = $datapinjaman->angsuran_pinjamans()->latest()->first();

        return view('/pages.pinjaman.show', [
            'pinjaman' => $datapinjaman,
            'sisaAngsuran' => $sisaAngsuran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjaman $datapinjaman)
    {
        try {
            $datapinjaman->delete();
            $datapinjaman->angsuran_pinjamans()->delete();
        } catch (Exception $th) {
            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect()->route('index.pinjaman')->with('success', 'Data berhasil diedit!');
    }
}
