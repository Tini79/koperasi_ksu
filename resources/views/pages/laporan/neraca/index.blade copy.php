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
                                <table class="table" id="table" border="1">
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
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunBebanOperasional])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunTransaksi])
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <th class="text-right">Jumlah</th> -->
                                    <!-- <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td>
                                            <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td> -->
                                    <!-- <td id="totalDebit"></td>
                                            <td id="totalKredit"></td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                                <table class="table">
                                    <tfoot class="bg-secondary">
                                        <th class="text-right col-md-5">Jumlah</th>
                                        <td id="totalDebit" class="col-md-3"></td>
                                        <td id="totalKredit" class="col-md-3"></td>
                                    </tfoot>
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
<script>
    var table = document.getElementById("table"),
        sumValDebit = 0,
        sumValKredit = 0;
    for (var i = 1; i < table.rows.length; i++) {
        var cellValue = table.rows[i].cells[1].innerHTML;
        var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
        sumValDebit = parseFloat(sumValDebit) + parseFloat(replaceVal);
    }

    for (var i = 1; i < table.rows.length; i++) {
        var cellValue = table.rows[i].cells[2].innerHTML;
        var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
        sumValKredit = parseFloat(sumValKredit) + parseFloat(replaceVal);
    }

    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    })

    document.getElementById("totalDebit").innerHTML = formatter.format(sumValDebit)
    document.getElementById("totalKredit").innerHTML = formatter.format(sumValKredit)
</script>
@endpush