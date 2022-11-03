@extends('layouts.app')

@section('title', 'Form')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.rekeningSimpanan') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.rekeningSimpanan') }}">Data Rekening Simpanan</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('show.rekeningSimpanan', $rekeningSimpanan->id) }}">Detail Rekening Simpanan</a></div>
                <div class="breadcrumb-item">Tambah Simpanan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('datarekeningsimpanan.simpanananggota.store', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="rekening_simpanan_id" value="{{ $rekeningSimpanan->id }}">
                                <input type="hidden" name="anggota_id" value="{{ $rekeningSimpanan->anggota_id }}">
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Transaksi</label>
                                    <input type="text" name="tgl_transaksi" class="form-control @error('tgl_transaksi') is-invalid @enderror datepicker" value="{{ old('') }}">
                                    @error('tgl_transaksi')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Produk Simpanan</label>
                                    <select name="produk_simpanan_id" id="" class="form-control select2 @error('produk_simpanan_id') is-invalid @enderror">
                                        <option value="" disabled selected></option>
                                        @foreach($produkSimpanans as $produkSimpanan)
                                        @if(old('produk_simpanan_id') == $produkSimpanan->id)
                                        <option value="{{ $produkSimpanan->id }}" selected>{{ $produkSimpanan->produk }}</option>
                                        @else
                                        <option value="{{ $produkSimpanan->id }}">{{ $produkSimpanan->produk }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('produk_simpanan_id')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Transaksi</label>
                                    @if($rekeningSimpanan->totalSaldo() == 10000)
                                    <input type="text" name="transaksi" class="form-control" value="Setor" readonly>
                                    @else
                                    <select name="transaksi" id="" class="form-control select2 @error('transaksi') is-invalid @enderror">
                                        <option value="" disabled selected></option>
                                        @foreach(App\Enums\TransaksiEnum::cases() as $transaksi)
                                        <option value="{{ $transaksi->value }}">{{ $transaksi->value }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    @error('transaksi')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Jumlah</label>
                                    <input type="text" name="saldo" id="saldo" class="form-control @error('saldo') is-invalid @enderror" value="{{ old('saldo') }}">
                                    @error('saldo')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Tambah</button>
                                <a href="{{ route('show.rekeningSimpanan', $rekeningSimpanan->id) }}" class="btn btn-outline-info">Kembali</a>
                            </form>
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
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

<script>
    var configNumeric = {
        'decimalCharacter': ',',
        'decimalPlaces': 0,
        'digitGroupSeparator': '.',
        'currencySymbol': 'Rp',
    }

    new AutoNumeric(document.getElementById('saldo'), configNumeric);
</script>
<!-- Page Specific JS File -->
@endpush