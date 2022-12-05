@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sisa Hasil Usaha</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Sisa Hasil Usaha</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('laporan.shu.index') }}" method="get">
                                @csrf
                                <fieldset>
                                    <legend>Sisa Hasil Usaha</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Bulan</label>
                                        <input name="bulan" type="month" value="{{Request::get('bulan') ? : date('Y-m')}}" class="form-control @error('tanggal') is-invalid @enderror">
                                    </div>
                                    <button class="btn btn-primary">Cari</button>
                                    <a href="{{ route('laporan.shu.pdf') }}" target="blank" class="btn btn-info">Print</a>
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
                            <h4>Sisa Hasil Usaha</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" border="1">
                                    <thead>
                                        <tr>
                                            <th>Uraian</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('pages.laporan.shu.child' , ['akun'=> $akunSaldoModalAwal])
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
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush