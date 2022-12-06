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
            <h1>Data Rekening Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Rekening Simpanan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Simpanan</h4>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Anggota</th>
                                            <th>Admin</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rekeningSimpanans as $key => $rekeningSimpanan)
                                        <tr>
                                            <td class="text-center">{{ $key + 1}}</td>
                                            <td>
                                                <a href="{{ route('show.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" class="text-decoration-none font-weight-bold">{{ $rekeningSimpanan->no_rekening }}</a>
                                            </td>
                                            <td>{{ $rekeningSimpanan->anggota->nama_anggota }}</td>
                                            <td></td>
                                            <td>{{ $rekeningSimpanan->tgl_daftar }}</td>
                                            <td>@currency($rekeningSimpanan->totalSaldo())</td>
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