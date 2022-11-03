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
                <a href="{{ route('index.pinjaman') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Detail Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.pinjaman') }}">Data Pinjaman</a></div>
                <div class="breadcrumb-item">Detail Pinjaman</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ $pinjaman->anggota->nama_anggota}}</h4>
                            <div class="d-flex">
                                <!-- anggota -->
                                <form action="{{ route('destroy.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-4">Nomor Pinjaman</p>
                                <p>:</p>
                                <p class="col" id="nama">{{ $pinjaman->no_pinjaman }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nama Anggota</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pinjaman->anggota->nama_anggota }}</p>
                            </div>
                            <!-- <div class="row">
                                <p class="col-4">Jumlah Pinjaman</p>
                                <p>:</p>
                                <p class="col" id="alamat">@currency($pinjaman->jumlah_pinjaman)</p>
                            </div> -->
                            <div class="row">
                                <p class="col-4">Jumlah Pinjaman Cair</p>
                                <p>:</p>
                                <p class="col" id="alamat">@currency($pinjaman->pinjamanCair())</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Tanggal Pinjaman</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pinjaman->tgl_pinjaman }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Jangka Waktu Pinjaman (hari)</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pinjaman->jangka_waktu_pinjaman }} hari</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Agunan</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $pinjaman->agunan }}</p>
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
                            <h4>Data Angsuran Pinjaman</h4>
                            <div class="">
                                @if($sisaAngsuran->status == 0)
                                <a href="{{ route('datarekeningpinjaman.pinjamananggota.create', ['datarekeningpinjaman' => $pinjaman->id]) }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Bayar</a>
                                @else
                                <button type="button" class="btn btn-secondary">Sudah lunas</button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Nominal Setoran</th>
                                            <th>Sisa Angsuran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pinjaman->angsuran_pinjamans as $key => $angsuranPinjaman)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $angsuranPinjaman->tanggal_pembayaran }}</td>
                                            <td>@currency($angsuranPinjaman->nominal_setoran)</td>
                                            <td>@currency($angsuranPinjaman->sisa_angsuran)</td>
                                            <td>{{ $angsuranPinjaman->status == 0 ? 'Belum Lunas' : 'Lunas' }}</td>
                                        </tr>
                                        @endforeach
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