<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pegawai\StorePegawaiRequest;
use App\Http\Requests\Pegawai\UpdatePegawaiRequest;
use App\Models\Pegawai;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::latest()->get();
        return view('/pages.pegawai.index', [
            'pegawais' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countPegawai = Pegawai::count();
        $noPegawai = Pegawai::getNumber($countPegawai, 5, '00000');

        return view('/pages.pegawai.create', [
            'noPegawai' => $noPegawai
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        DB::beginTransaction();
        try {
            Pegawai::create($request->safe()->only([
                'no_pegawai',
                'nama_pegawai',
                'nik',
                'jenis_kelamin',
                'tempat_lahir',
                'tgl_lahir',
                'no_tlp',
                'alamat',
                'divisi',
            ]));

            $pegawaiIds = Pegawai::latest()->get('id')->take(1);

            foreach ($pegawaiIds as $pegawaiId) {
                $id = $pegawaiId->id;

                User::insert([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'pegawai_id' => $id,
                    'level' => $request->divisi,
                ]);
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return back()->with('danger', 'Gagal input data!');
        }

        return redirect(route('index'))->with('success', 'Data berhasil diinput!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $datapegawai)
    {
        return view('/pages.pegawai.show', [
            'pegawai' => $datapegawai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $datapegawai)
    {
        return view('/pages.pegawai.edit', [
            'pegawai' => $datapegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $datapegawai)
    {
        DB::beginTransaction();
        try {
            $datapegawai->fill($request->safe([
                'no_pegawai',
                'nama_pegawai',
                'nik',
                'jenis_kelamin',
                'tempat_lahir',
                'tgl_lahir',
                'no_tlp',
                'alamat',
                'divisi',
            ]));

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return back()->with('danger', 'Gagal edit data!');
        }

        return redirect(route('show', ['datapegawai' => $datapegawai]))->with('success', 'Data berhasil diedit!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $datapegawai)
    {
        DB::beginTransaction();
        try {
            $datapegawai->delete();
            $datapegawai->user()->delete();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect()->route('index')->with('success', 'Berhasil hapus data!');
    }
}
