<?php

namespace App\Http\Controllers;

use App\Http\Requests\AkunRequest;
use App\Models\Akun;
use Exception;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function create()
    {
        $akuns = Akun::all();

        return view('pages.pembukuan.akun.create', [
            'akuns' => $akuns
        ]);
    }

    public function store(AkunRequest $request)
    {
        try {
            $dataAkun = $request->validated();

            Akun::create($dataAkun);

            return redirect()->back()->with('success', 'Berhasil input data!');
        } catch (Exception $th) {
            // dd($th);
            return redirect()->back()->with('danger', 'Gagal input data!');
        }
    }
}
