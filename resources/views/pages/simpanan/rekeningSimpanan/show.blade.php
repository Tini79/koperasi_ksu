@extends('layouts.app')

@section('title', 'Profile')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.rekeningSimpanan') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Detail Rekening Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.rekeningSimpanan') }}">Data Rekening Simpanan</a></div>
                <div class="breadcrumb-item">Detail Rekening Simpanan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ $rekeningSimpanan->anggota->nama_anggota}}</h4>
                            <div class="d-flex">
                                <a href="{{ route('edit.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" class="btn btn-outline-primary mr-2">Ubah</a>
                                <form action="{{ route('destroy.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-4">Nomor Rekening</p>
                                <p>:</p>
                                <p class="col" id="nama">{{ $rekeningSimpanan->no_rekening }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nama Anggota</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $rekeningSimpanan->anggota->nama_anggota }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Tanggal Daftar</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $rekeningSimpanan->tgl_daftar }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Rekening Simpanan</h4>
                            <div class="">
                                <a href="{{ route('datarekeningsimpanan.simpanananggota.create', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <!-- <th>Admin</th> -->
                                            <th>Tanggal Transaksi</th>
                                            <th>Jenis Simpanan</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rekeningSimpanan->simpanan_anggotas as $key => $simpananAnggota)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <!-- <td></td> -->
                                            <td>{{ $simpananAnggota->tgl_transaksi }}</td>
                                            <td>{{ $simpananAnggota->produk_simpanan->produk }}</td>
                                            <td>{{ $simpananAnggota->transaksi }}</td>
                                            <td>@currency($simpananAnggota->saldo)</td>
                                        </tr>
                                        @endforeach
                                        <tr class="bg-secondary">
                                            <td colspan="4">Total Saldo</td>
                                            <td>@currency($rekeningSimpanan->totalSaldo())</td>
                                        </tr>
                                    </tbody>
                                </table>
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
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->
@endpush