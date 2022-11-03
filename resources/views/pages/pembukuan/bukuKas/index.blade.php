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
            <h1>Buku Kas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Buku Kas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pembukuan.databukukas.index') }}" method="get">
                                @csrf
                                <fieldset>
                                    <legend>Buku Kas</legend>
                                    <div class="form-group">
                                        <select name="akun" class="form-control select2">
                                            <option value="" disabled selected></option>
                                            @foreach($akuns as $akun)
                                            @if(old('akun_id') == $akun->id)
                                            <option value="{{ $akun->id }}" selected>{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                            @else
                                            <option value="{{ $akun->id }}">{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input name="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror datepicker">
                                        @error('tanggal')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary">Cari</button>
                                    <a href="{{ route('pembukuan.databukukas.pdf') }}" target="blank" class="btn btn-info">Print</a>
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
                            <h4>Pencatatan Buku Kas</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($search)
                                        @foreach($search as $dataBukuKas)
                                        @foreach($dataBukuKas->detail_memorials as $detailMemorial)
                                        <tr>
                                            <td>{{ $dataBukuKas->tanggal }}</td>
                                            <td>@currency($detailMemorial->debet)</td>
                                            <td>@currency($detailMemorial->kredit)</td>
                                        </tr>
                                        @endforeach
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