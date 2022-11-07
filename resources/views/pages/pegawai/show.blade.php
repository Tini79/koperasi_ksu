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
                <a href="{{ route('index') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Detail Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index') }}">Data Pegawai</a></div>
                <div class="breadcrumb-item">Detail Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ $pegawai->nama_pegawai}}</h4>
                            <div class="d-flex">
                                <a href="{{ route('edit', ['datapegawai' => $pegawai->id]) }}" class="btn btn-outline-primary mr-2">Ubah</a>
                                <form action="{{ route('destroy', ['datapegawai' => $pegawai->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            <div class="row">
                                <p class="col-4">Nomor Pegawai</p>
                                <p>:</p>
                                <p class="col" id="nama">{{ $pegawai->no_pegawai }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">NIK</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->nik }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Jenis Kelamin</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->jenis_kelamin }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Tempat Lahir</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->tempat_lahir }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Tanggal Lahir</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->tgl_lahir }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nomor Telepon</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->no_tlp }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Alamat</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->alamat }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Divisi</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pegawai->divisi->value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body">
                    <div class="mb-5">
                        <h5>Riwayat Transaksi</h5>
                        <hr>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Riwayat Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Riwayat
                                Pembayaran</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table id="riwayat-peminjaman" class="myTable display table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nominal Peminjaman</th>
                                        <th>Bunga</th>
                                        <th>Tanggal Peminjaman</th>
                                    </tr>
                                </thead>
                                <tbody id="table-riwayat-pinjaman">

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table id="riwayat-transaksi" class="myTable display table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nominal Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody id="table-riwayat-transaksi">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

    </section>
</div>

@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->
@endpush