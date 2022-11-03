<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanNeracaController extends Controller
{
    public function index()
    {
        return view('pages.laporan.neraca.index');
    }
}
