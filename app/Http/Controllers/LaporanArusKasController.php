<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanArusKasController extends Controller
{
    public function index()
    {
        return view('pages.laporan.arusKas.index');
    }
}
