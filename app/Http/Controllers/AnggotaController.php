<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anggota\StoreAnggotaRequest;
use App\Http\Requests\Anggota\UpdateAnggotaRequest;
use App\Models\Anggota;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();
        return view('/pages.nasabah.anggota.index', [
            'anggotas' => $anggota
        ]);
    }

    public function create()
    {
        $produk = ProdukSimpanan::where('produk', '=', 'Simpanan Pokok')->get();
        $rekNumber = RekeningSimpanan::count();
        $newRekNumber =  RekeningSimpanan::getNumber($rekNumber, 4, '0');

        return view('/pages.nasabah.anggota.create', [
            'produkSimpanans' => $produk,
            'newRekNumber' => $newRekNumber
        ]);
    }

    public function store(StoreAnggotaRequest $request)
    {
        DB::beginTransaction();
        try {
            Anggota::create($request->safe()->only([
                'tgl_daftar',
                'nama_anggota',
                'nik',
                'jenis_kelamin',
                'tempat_lahir',
                'tgl_lahir',
                'pekerjaan',
                'agama',
                'status_perkawinan',
                'no_tlp',
                'alamat',
                'nama_gadis_ibu',
                'ahli_waris',
                'simpanan_pokok',
            ]));

            $anggotaIds = Anggota::latest()->get('id')->take(1);

            foreach ($anggotaIds as $anggotaId) {
                $anggota = $anggotaId->id;

                RekeningSimpanan::insert([
                    'anggota_id' => $anggota,
                    'no_rekening' => $request->no_rekening_simpanan,
                    'tgl_daftar' => $request->tgl_daftar,
                ]);

                $rekeningIds = RekeningSimpanan::orderBy('id', 'DESC')->get('id')->take(1);

                foreach ($rekeningIds as $rekeningId) {
                    SimpananAnggota::insert([
                        'anggota_id' => $anggota,
                        'produk_simpanan_id' => $request->produk_id,
                        'rekening_simpanan_id' => $rekeningId->id,
                        'tgl_transaksi' => $request->tgl_daftar,
                        'saldo' => 10000,
                    ]);
                }

                User::insert([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'anggota_id' => $anggota,
                ]);
            }

            DB::commit();
        } catch (Exception $exception) {
            throw $exception;
            DB::rollBack();

            return back()->with('danger', 'Gagal input data!');
        }

        return redirect(route('index.dataanggota'))->with('success', 'Data berhasil diinput!');
    }

    public function show(Anggota $dataanggota)
    {
        return view('/pages.nasabah.anggota.show', [
            'anggota' => $dataanggota
        ]);
    }

    public function edit(Anggota $dataanggota)
    {
        $produk = ProdukSimpanan::where('produk', '=', 'Simpanan Pokok')->get();

        return view("/pages.nasabah.anggota.edit", [
            'anggota' => $dataanggota,
            'produkSimpanans' => $produk,
        ]);
    }

    public function update(UpdateAnggotaRequest $request, Anggota $dataanggota)
    {
        try {
            $dataanggota->fill($request->safe([
                'tgl_daftar',
                'nama_anggota',
                'nik',
                'jenis_kelamin',
                'tempat_lahir',
                'tgl_lahir',
                'pekerjaan',
                'agama',
                'status_perkawinan',
                'no_tlp',
                'alamat',
                'nama_gadis_ibu',
                'ahli_waris',
            ]));

            $dataanggota->save();
        } catch (Exception $th) {

            return back()->with('danger', 'Gagal edit data!');
        }

        return redirect(route('show.dataanggota', ['dataanggota' => $dataanggota->id]))->with('success', 'Data berhasil diedit!');
    }

    public function destroy(Anggota $dataanggota)
    {
        try {
            $dataanggota->delete();
        } catch (Exception $th) {

            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect(route('index.dataanggota'))->with('success', 'Berhasil hapus data!');
    }
}
