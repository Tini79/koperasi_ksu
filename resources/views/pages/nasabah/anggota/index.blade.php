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
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Anggota</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Anggota</h4>
                            <div class="">
                                <a href="/dataanggota/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NIK Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($anggotas as $key => $anggota)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('show.dataanggota', ['dataanggota' => $anggota->id]) }}" class="text-decoration-none font-weight-bold">{{ $anggota->nik }}</a>
                                            </td>
                                            <td>{{ $anggota->nama_anggota }}</td>
                                            <td>{{ $anggota->tgl_daftar }}</td>
                                            <td>{{ $anggota->jenis_kelamin }}</td>
                                            <td>{{ $anggota->no_tlp }}</td>
                                            <td>{{ $anggota->alamat }}</td>
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

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush