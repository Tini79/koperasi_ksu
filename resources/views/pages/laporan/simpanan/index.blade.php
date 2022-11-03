@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">

<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Laporan Simpanan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('laporan.simpanan.index') }}" method="get">
                                @csrf
                                <fieldset>
                                    <legend>Simpanan</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input name="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror datepicker">
                                        @error('tanggal')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary">Cari</button>
                                    <a href="{{ route('laporan.simpanan.pdf') }}" target="blank" class="btn btn-info">Print</a>
                                </fieldset>
                            </form>
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
                            <h4>Laporan Simpanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Rekening Simpanan</th>
                                            <th>Produk Simpanan</th>
                                            <th>Transaksi</th>
                                            <th>Jumlah Setor/Tarik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($search)
                                        @foreach($search as $simpananAnggota)
                                        <tr>
                                            <td>{{ $simpananAnggota->tgl_transaksi }}</td>
                                            <td>{{ $simpananAnggota->anggota->nama_anggota }}</td>
                                            <td>{{ $simpananAnggota->rekening_simpanan->no_rekening }}</td>
                                            <td>{{ $simpananAnggota->produk_simpanan->produk }}</td>
                                            <td>{{ $simpananAnggota->transaksi }}</td>
                                            <td>@currency($simpananAnggota->saldo)</td>
                                        </tr>
                                        @endforeach
                                        @endif
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

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>

<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush