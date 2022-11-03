<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\RekeningPinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPinjamanController extends Controller
{
    public function confirm(Pinjaman $datapinjaman)
    {
        return view('/pages.admin.pinjamanAnggota.confirm', [
            'pinjaman' => $datapinjaman,
        ]);
    }
}
