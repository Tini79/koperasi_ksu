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
            <h1>Data Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Pegawai</h4>
                            <div class="">
                                <a href="{{ route('create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.session')
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nomor Pegawai</th>
                                            <th>Nama Pegawai</th>
                                            <th>NIK</th>
                                            <th>Nomor Telepon</th>
                                            <!-- <th>Email</th> -->
                                            <th>Alamat</th>
                                            <th>Divisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawais as $key => $pegawai)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('show', ['datapegawai' => $pegawai->id]) }}" class="text-decoration-none font-weight-bold">{{ $pegawai->no_pegawai }}</a>
                                            </td>
                                            <td>{{ $pegawai->nama_pegawai }}</td>
                                            <td>{{ $pegawai->nik }}</td>
                                            <td>{{ $pegawai->no_tlp }}</td>
                                            <td>{{ $pegawai->alamat }}</td>
                                            <td>{{ $pegawai->divisi->value }}</td>
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