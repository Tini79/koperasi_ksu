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
                <a href="{{ route('index') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Pegawai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index') }}">Data Pegawai</a></div>
                <div class="breadcrumb-item">Tambah Pegawai</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('index') }}" method="post">
                                @csrf
                                <fieldset>
                                    <legend>Detail Pegawai</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Pegawai</label>
                                        <input name="no_pegawai" type="text" value="{{ $noPegawai }}" class="form-control @error('no_pegawai') is-invalid @enderror" readonly>
                                        @error('no_pegawai')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama Pegawai</label>
                                        <input name="nama_pegawai" type="text" value="{{ old('nama_pegawai') }}" class="form-control @error('nama_pegawai') is-invalid @enderror">
                                        @error('nama_pegawai')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">NIK</label>
                                        <input name="nik" type="text" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror">
                                        @error('nik')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            @foreach(\App\Enums\SexEnum::cases() as $sex)
                                            <div class="form-check form-check-inline">
                                                @if(old('jenis_kelamin') == $sex->value)
                                                <input name="jenis_kelamin" value="{{ $sex->value }}" type="radio" class="form-check-input" checked>
                                                @else
                                                <input name="jenis_kelamin" value="{{ $sex->value }}" type="radio" class="form-check-input">
                                                @endif
                                                <label for="" class="form-check-label">{{ $sex->value }}</label>
                                            </div>
                                            @endforeach
                                            @error('jenis_kelamin')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" value="{{ old('tempat_lahir') }}" class="form-control @error('tempat_lahir') is-invalid @enderror">
                                        @error('tempat_lahir')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Lahir</label>
                                        <input name="tgl_lahir" type="text" value="{{ old('tgl_lahir') }}" value="{{ old('tgl_lahir')}}" class="form-control @error('tgl_lahir') is-invalid @enderror datepicker">
                                        @error('tgl_lahir')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Telepon</label>
                                        <input name="no_tlp" type="text" value="{{ old('no_tlp') }}" class="form-control @error('no_tlp') is-invalid @enderror">
                                        @error('no_tlp')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Alamat</label>
                                        <input name="alamat" type="text" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
                                        @error('alamat')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Divisi</label>
                                        <select name="divisi" id="" class="form-control select2 @error('divisi') is-invalid @enderror">
                                            <option value="" disabled selected></option>
                                            @foreach(\App\Enums\DivisionEnum::cases() as $divisi)
                                            @if(old('divisi') == $divisi->value)
                                            <option value="{{ $divisi->value }}" selected>{{ $divisi->value }}</option>
                                            @else
                                            <option value="{{ $divisi->value }}">{{ $divisi->value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('divisi')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </fieldset>
                                <hr>
                                <fieldset>
                                    <legend>Akun Pegawai</legend>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                                            @error('username')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-primary">Tambah</button>
                                <a href="/datapegawai" class="btn btn-outline-info">Kembali</a>
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
<!-- Page Specific JS File -->
@endpush