<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukSimpanan\StoreProdukSimpananRequest;
use App\Http\Requests\UpdateProdukSimpananRequest;
use App\Models\ProdukSimpanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukSimpananController extends Controller
{
    public function index()
    {
        $produkSimpanan = ProdukSimpanan::latest()->get();

        return view('/pages.simpanan.produksimpanan.index', [
            'produkSimpanans' => $produkSimpanan
        ]);
    }

    public function create()
    {
        $countProdukSimpanan = ProdukSimpanan::count('id');
        $produkSimpananNumber = ProdukSimpanan::getNumber($countProdukSimpanan, 5, '00000');

        return view('/pages.simpanan.produksimpanan.create', [
            'produkSimpananNumber' => $produkSimpananNumber
        ]);
    }

    public function store(StoreProdukSimpananRequest $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->safe()->only([
                'no_produk',
                'produk',
            ]);

            ProdukSimpanan::create($validatedData);

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal input data!');
        }

        return redirect(route('index.produksimpanan'))->with('success', 'Data berhasil diinput!');
    }

    public function show(ProdukSimpanan $dataproduksimpanan)
    {
        return view('/pages.simpanan.produksimpanan.show', [
            'produksimpanan' => $dataproduksimpanan
        ]);
    }

    public function edit(ProdukSimpanan $dataproduksimpanan)
    {
        $countProdukSimpanan = ProdukSimpanan::count('id');
        $produkSimpananNumber = ProdukSimpanan::getNumber($countProdukSimpanan, 5, '00000');

        return view('/pages.simpanan.produksimpanan.edit', [
            'produksimpanan' => $dataproduksimpanan,
            'produkSimpananNumber' => $produkSimpananNumber
        ]);
    }

    public function update(UpdateProdukSimpananRequest $request, ProdukSimpanan $dataproduksimpanan)
    {
        DB::beginTransaction();
        try {
            $dataproduksimpanan->fill($request->safe([
                'no_produk',
                'produk',
            ]));

            $dataproduksimpanan->save();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal edit data!');
        }

        return redirect(route('show.produksimpanan', ['dataproduksimpanan' => $dataproduksimpanan->id]))->with('success', 'Berhasil edit data!');
    }

    public function destroy(ProdukSimpanan $dataproduksimpanan)
    {
        DB::beginTransaction();
        try {
            $dataproduksimpanan->delete();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal hapus data!');
        }

        return redirect(route('index.produksimpanan', ['dataproduksimpanan' => $dataproduksimpanan->id]));
    }
}
