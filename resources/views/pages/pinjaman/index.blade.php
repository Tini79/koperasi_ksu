@extends('layouts.app')

@section('title', 'Koperasi KSU')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Pinjaman</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Pinjaman</h4>
                            <div class="">
                                <a href="/datapinjaman/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nomor Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Jumlah Pinjaman</th>
                                            <th>Tanggal Pinjaman</th>
                                            <th>Jangka Waktu</th>
                                            <th>Jenis Pinjaman</th>
                                            <!-- <th>Status</th> -->
                                            <!-- Masih bingung pada bagian berapa peminjaman dan jenis peminjaman tahun/bulan -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pinjamans as $key => $pinjaman)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('show.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" class="text-decoration-none font-weight-bold">{{ $pinjaman->no_pinjaman }}</a>
                                            </td>
                                            <td>{{ $pinjaman->anggota->nama_anggota }}</td>
                                            <td>@currency($pinjaman->jumlah_pinjaman)</td>
                                            <td>{{ $pinjaman->tgl_pinjaman }}</td>
                                            <td>{{ $pinjaman->jangka_waktu_pinjaman }} bulan</td>
                                            <td>{{ $pinjaman->agunan }}</td>
                                            <!-- <td>{{ $pinjaman->status }}</td> -->
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
<script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush