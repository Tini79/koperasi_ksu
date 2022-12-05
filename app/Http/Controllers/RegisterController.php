<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anggota\StoreAnggotaRequest;
use App\Models\Anggota;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\SimpananAnggota;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $produk = ProdukSimpanan::where('produk', '=', 'Simpanan Pokok')->get();
        $rekNumber = RekeningSimpanan::count();
        $newRekNumber =  RekeningSimpanan::getNumber($rekNumber, 4, '0');

        return view('/auth.register', [
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

        return redirect()->route('login')->with('success', 'Data berhasil diinput!');
    }


    // public function store(LoginRequest $request)
    // {
    //     try {
    //         $credentials = $request->validated();
    //         $credentials['password'] = bcrypt($credentials['password']);

    //         User::create($credentials);

    //         return redirect()->route('login');
    //     } catch (Exception $th) {
    //         //throw $th;
    //     }
    // }

}
