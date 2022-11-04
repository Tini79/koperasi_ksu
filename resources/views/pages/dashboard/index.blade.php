@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-primary">
                    <!-- <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap"> -->
                    <div class="card-header">
                        <h4>Anggota</h4>
                    </div>
                    <div class="card-body">
                        {{ $anggota }}
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-danger">
                    <!-- <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div> -->
                    <!-- <div class="card-wrap"> -->
                    <div class="card-header">
                        <h4>Pegawai</h4>
                    </div>
                    <div class="card-body">
                        {{ $pegawai }}
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-warning">
                    <!-- <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div> -->
                    <!-- <div class="card-wrap"> -->
                    <div class="card-header">
                        <h4>Pinjaman</h4>
                    </div>
                    <div class="card-body">
                        <!-- <p>Sisa Tagihan</p> -->
                        @currency($pinjaman)
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-success">
                    <!-- <div class="card-wrap"> -->
                    <div class="card-header">
                        <!-- <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div> -->
                        <h4>Simpanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p class="col-6">Penarikan Tunai</p>
                            <p class="col-1">:</p>
                            <p>{{ $jumlahTarikTunai }}</p>
                        </div>
                        <div class="row">
                            <p class="col-6">Jumlah Simpanan</p>
                            <p class="col-1">:</p>
                            <p>{{ $jumlahSaldo }}</p>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush