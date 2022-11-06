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
            <h1>Jurnal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Jurnal</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Jurnal</h4>
                            <div class="">
                                <a href="{{ route('pembukuan.datajurnalkas.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center col-1">#</th>
                                            <th>Tanggal</th>
                                            <th>Akun</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($memorials as $key => $memorial)
                                        @foreach($memorial->detail_memorials as $detail_memorial)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $memorial->tanggal }}</td>
                                            <td>{{ $detail_memorial->akun->nama_akun }}</td>
                                            <td>@currency($detail_memorial->debet)</td>
                                            <td>@currency($detail_memorial->kredit)</td>
                                            <td>{{ $memorial->keterangan }}</td>
                                        </tr>
                                        @endforeach
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