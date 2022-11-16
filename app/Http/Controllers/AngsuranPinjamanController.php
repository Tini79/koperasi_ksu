<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjaman\Angsuran\StoreAngsuranRequest;
use App\Models\Anggota;
use App\Models\AngsuranPinjaman;
use App\Models\Pinjaman;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AngsuranPinjamanController extends Controller
{
    public function create($id)
    {
        $anggota = Anggota::all();
        $datapinjaman = Pinjaman::with('jaminan_agunan', 'angsuran_pinjamans')->find($id);

        return view('pages.pinjaman.angsuran.create', [
            'pinjaman' => $datapinjaman,
            'anggotas' => $anggota,
        ]);
    }

    public function store(StoreAngsuranRequest $request, $id)
    {
        try {
            $dataAngsuran = $request->validated();
            $angsuranPinjaman = new AngsuranPinjaman;
            $pinjaman = Pinjaman::with('angsuran_pinjamans')->find($id);
            $sisaAngsuran = $dataAngsuran['sisa_angsuran'] - $dataAngsuran['nominal_setoran'];

            $angsuranPinjaman['pinjaman_id'] = $request->pinjaman_id;
            // $angsuranPinjaman['tanggal_pembayaran'] = Carbon::now()->format('Y-m-d');
            $angsuranPinjaman['tanggal_pembayaran'] = $request->tanggal_pembayaran;
            $angsuranPinjaman['nominal_setoran'] = $dataAngsuran['nominal_setoran'];
            $angsuranPinjaman['sisa_angsuran'] = $sisaAngsuran;

            if ($sisaAngsuran == 0 || $sisaAngsuran < 0) {
                $angsuranPinjaman['status'] = 1;
            }

            $angsuranPinjaman->save();

            return redirect()->route('show.pinjaman', ['datapinjaman' => $pinjaman->id])->with('success', 'Berhasil bayar setoran pinjaman!');
        } catch (Exception $th) {
            return redirect()->back()->with('danger', 'Gagal bayar setoran pinjaman!');
        }
    }

    public function update($id)
    {
        # code...
    }
}
