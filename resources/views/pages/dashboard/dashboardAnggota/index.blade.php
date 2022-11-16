@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard Anggota</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ Auth::user()->anggota->nama_anggota}}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pinjaman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Simpanan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @if($pinjaman)
                                    @if($pinjaman)
                                    <h6>Pinjaman</h6>
                                    <div class="row">
                                        <p class="col-4">Nomor Pinjaman</p>
                                        <p>:</p>
                                        <p class="col">{{ $pinjaman->no_pinjaman }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Nominal Pengajuan</p>
                                        <p>:</p>
                                        <p class="col">{{ $pinjaman->jumlah_pinjaman }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Agunan</p>
                                        <p>:</p>
                                        <p class="col">{{ $pinjaman->agunan }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Bunga</p>
                                        <p>:</p>
                                        <p class="col">{{ $pinjaman->bunga }}%</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Status</p>
                                        <p>:</p>
                                        <div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" value="{{ $pinjaman->status == 1 ? 'Disetujui' : 'Tidak Disetujui' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Pinjaman Cair</p>
                                        <p>:</p>
                                        @if($pinjaman->status == 1)
                                        <p class="col">@currency($pinjaman->pinjamanCair())</p>
                                        @else
                                        <p class="col">-</p>
                                        @endif
                                    </div>
                                    @endif
                                    @if($pinjaman->status == 1)
                                    <div class="card-body">
                                        <hr>
                                        <h6>Angsuran Pinjaman</h6>
                                        <div class="row">
                                            <p class="col-4">Nominal Angsuran</p>
                                            <p>:</p>
                                            @if($pinjaman->agunan == 'Tanpa Agunan')
                                            <p class="col">@currency($pinjaman->setBungaFlat())</p>
                                            @else
                                            <p class="col">@currency($pinjaman->setBungaMenurun())</p>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Sisa Angsuran</p>
                                            <p>:</p>
                                            <p class="col">@currency($pinjaman->sisaAngsuran()->sisa_angsuran)</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Jangka Waktu</p>
                                            <p>:</p>
                                            <p class="col">{{ $pinjaman->jangka_waktu_pinjaman }} bulan</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Transaksi Terakhir</p>
                                            <p>:</p>
                                            <p class="col">{{ $angsuranTerakhir->tanggal_pembayaran }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Status</p>
                                            <p>:</p>
                                            <div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" value="{{ $pinjaman->status == 0 ? 'Lunas' : 'Belum Lunas' }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <h6>Belum Ada Pinjaman</h6>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @if($simpanan)
                                    @if($simpanan)
                                    <h6>Simpanan</h6>
                                    <div class="row">
                                        <p class="col-4">Nomor Simpanan</p>
                                        <p>:</p>
                                        <p class="col">{{ $simpanan->no_rekening }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Saldo Simpanan</p>
                                        <p>:</p>
                                        <p class="col">@currency($simpanan->setor() - $simpanan->tarik())</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Total Penarikan</p>
                                        <p>:</p>
                                        <p class="col">@currency($simpanan->tarik())</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4">Tanggal Transaksi Terakhir</p>
                                        <p>:</p>
                                        <p class="col">{{ $transaksiSimpananTerakhir->tgl_transaksi }}</p>
                                    </div>
                                    <div class="card-body">
                                        <hr>
                                        <h6>Detail Simpanan</h6>
                                        @foreach($detailSimpanans as $detailSimpanan)
                                        <div class="row">
                                            <p class="col-4">Jenis Simpanan</p>
                                            <p>:</p>
                                            <p class="col">{{ $detailSimpanan->produk_simpanan->produk }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Saldo Simpanan</p>
                                            <p>:</p>
                                            <p class="col">@currency($detailSimpanan->saldo)</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Transaksi</p>
                                            <p>:</p>
                                            <p class="col">{{ $detailSimpanan->transaksi }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Tanggal Transaksi Terakhir</p>
                                            <p>:</p>
                                            <p class="col">{{ $detailSimpanan->tgl_transaksi }}</p>
                                        </div>
                                        <hr>r
                                        @endforeach
                                        @endif
                                        @else
                                        <h6>Belum Ada Simpanan</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush