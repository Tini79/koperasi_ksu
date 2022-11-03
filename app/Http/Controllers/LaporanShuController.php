<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanShuController extends Controller
{
    public function index()
    {
        return view('pages.laporan.shu.index');
    }
}
