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
                            <h4>{{ $pinjaman->anggota->nama_anggota }}</h4>
                            <div class="d-flex">
                                <form action="{{ route('destroy.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            @if($pinjaman->status == 1)
                            <h6 class="text-info">Disetujui</h6>
                            @elseif($pinjaman->status == null)
                            <h6 class="text-warning">Menunggu</h6>
                            @else
                            <h6 class="text-danger">Tidak Disetujui</h6>
                            @endif
                            <div class="row">
                                <p class="col-4">Nomor Pinjaman</p>
                                <p>:</p>
                                <p class="col">{{ $pinjaman->no_pinjaman }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nama Anggota</p>
                                <p>:</p>
                                <p class="col">{{ $pinjaman->anggota->nama_anggota }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Jumlah Pinjaman Cair</p>
                                <p>:</p>
                                <p class="col">@currency($pinjaman->pinjamanCair())</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Tanggal Pinjaman</p>
                                <p>:</p>
                                <p class="col">{{ $pinjaman->tgl_pinjaman }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Jangka Waktu Pinjaman (hari)</p>
                                <p>:</p>
                                <p class="col">{{ $pinjaman->jangka_waktu_pinjaman }} hari</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Jenis Pinjaman</p>
                                <p>:</p>
                                <p class="col">{{ $pinjaman->agunan }}</p>
                            </div>
                            @if($pinjaman->status == null)
                            <div class="d-flex justify-content-end" id="butonConfirm">
                                <div class="row">
                                    <div class="mr-2">
                                        <form action="{{ route('update.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="1">
                                            <button class="btn confirmBtn btn-info" onclick="clickConfirmBtn()">Setuju</button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{ route('update.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="0">
                                            <button class="btn confirmBtn btn-outline-danger" onclick="clickConfirmBtn()">Tidak Setuju</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                @if($pinjaman->status == 1)
                                <a href="{{ route('datarekeningpinjaman.pinjamananggota.create', ['datarekeningpinjaman' => $pinjaman->id]) }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Bayar</a>
                                @else
                                <a href="{{ route('datarekeningpinjaman.pinjamananggota.create', ['datarekeningpinjaman' => $pinjaman->id]) }}" class="btn btn-secondary disabled"><i class="fas fa-plus"></i> Bayar</a>
                                @endif
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
                                            <td class="text-center">{{ $key + 1 }}</td>
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