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
            <h1>Neraca</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Neraca</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('laporan.neraca.index') }}" method="get">
                                @csrf
                                <fieldset>
                                    <legend>Neraca</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Awal</label>
                                        <input name="tanggal_awal" type="text" value="{{Request::get('tanggal_awal') ? : date('Y-m-d')}}" class="form-control @error('tanggal') is-invalid @enderror datepicker">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Akhir</label>
                                        <input name="tanggal_akhir" type="text" value="{{Request::get('tanggal_akhir') ? : date('Y-m-d')}}" class="form-control @error('tanggal') is-invalid @enderror datepicker">
                                    </div>
                                    <button class="btn btn-primary">Cari</button>
                                    <a href="{{ route('laporan.neraca.pdf') }}" target="blank" class="btn btn-info">Print</a>
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
                            <h4>Neraca</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" border="1">
                                    <thead>
                                        <tr>
                                            <th>Uraian</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunAset])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunKewajiban])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunPendapatan])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunBebanOperasional])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunArusKas])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunSaldoModalAwal])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunTransaksi])
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-right">Jumlah</th>
                                            <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td>
                                            <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                @dd($akunAset->childs)
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