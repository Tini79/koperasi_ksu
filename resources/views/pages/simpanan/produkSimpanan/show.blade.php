@extends('layouts.app')

@section('title', 'Profile')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.produksimpanan') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Detail Produk Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.produksimpanan') }}">Data Produk Simpanan</a></div>
                <div class="breadcrumb-item">Detail Produk Simpanan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>{{ $produksimpanan->nama_produk}}</h4>
                            <div class="d-flex">
                                <a href="{{ route('edit.produksimpanan', ['dataproduksimpanan' => $produksimpanan->id]) }}" class="btn btn-outline-primary mr-2">Ubah</a>
                                <form action="{{ route('destroy.produksimpanan', ['dataproduksimpanan' => $produksimpanan->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-4">Nomor Produk</p>
                                <p>:</p>
                                <p class="col" id="nama">{{ $produksimpanan->no_produk }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nama Produk</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $produksimpanan->produk }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Bunga</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $produksimpanan->bunga }}</p>
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
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->
@endpush