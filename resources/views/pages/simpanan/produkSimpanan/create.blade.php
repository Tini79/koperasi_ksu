@extends('layouts.app')

@section('title', 'Form')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.produksimpanan') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Produk Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.produksimpanan') }}">Data Produk Simpanan</a></div>
                <div class="breadcrumb-item">Tambah Produk Simpanan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('index.produksimpanan') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Nomor Produk</label>
                                    <input name="no_produk" type="text" value="{{ $produkSimpananNumber }}" class="form-control @error('no_produk') is-invalid @enderror" readonly>
                                    @error('no_produk')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Produk</label>
                                    <input name="produk" type="text" value="{{ old('produk') }}" class="form-control @error('produk') is-invalid @enderror">
                                    @error('produk')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Tambah</button>
                                <a href="{{ route('index.produksimpanan') }}" class="btn btn-outline-info">Kembali</a>
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
<!-- Page Specific JS File -->
@endpush