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
                <a href="{{ route('show.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Rekening Simpanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.rekeningSimpanan') }}">Data Rekening Simpanan</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('show.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}">Detail Rekening Simpanan</a></div>
                <div class="breadcrumb-item">Edit Rekening Simpanan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('show.rekeningSimpanan', ['datarekeningsimpanan' => $rekeningSimpanan->id]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <!-- auto generate nad readonly -->
                                    <label for="" class="form-label">Nomor Rekening</label>
                                    <input type="text" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ old('no_rekening', $rekeningSimpanan->no_rekening) }}" readonly>
                                    @error('no_rekening')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Anggota</label>
                                    <select name="anggota_id" id="" class="form-control select2 @error('no_anggota') is-invalid @enderror">
                                        <option value="" disabled selected></option>
                                        @foreach($anggotas as $anggota)
                                        @if(old('anggota_id', $rekeningSimpanan->anggota_id) == $anggota->id)
                                        <option value="{{ $anggota->id }}" selected>{{ $anggota->nama_anggota }}</option>
                                        @else
                                        <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('anggota_id')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Daftar</label>
                                    <input type="text" name="tgl_daftar" class="form-control @error('tgl_daftar') is-invalid @enderror datepicker" value="{{ old('tgl_daftar', $rekeningSimpanan->tgl_daftar) }}">
                                    @error('tgl_daftar')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Simpan</button>
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
<!-- Page Specific JS File -->
@endpush