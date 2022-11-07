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
                <a href="{{ route('show.dataanggota', ['dataanggota' => $anggota->id]) }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.dataanggota') }}">Data Anggota</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('show.dataanggota', ['dataanggota' => $anggota->id]) }}">Detail Anggota</a></div>
                <div class="breadcrumb-item">Edit Anggota</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('components.session')
                            <form action="{{ route('update.dataanggota', ['dataanggota' => $anggota->id]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <fieldset>
                                    <legend>Detail Anggota</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama Anggota</label>
                                        <input name="nama_anggota" type="text" value="{{ old('nama_anggota', $anggota->nama_anggota) }}" class="form-control @error('nama_anggota') is-invalid @enderror">
                                        @error('nama_anggota')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">NIK</label>
                                        <input name="nik" type="text" value="{{ old('nik', $anggota->nik) }}" class="form-control @error('nik') is-invalid @enderror">
                                        @error('nik')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            @foreach(\App\Enums\SexEnum::cases() as $sex)
                                            <div class="form-check form-check-inline">
                                                @if(old('jenis_kelamin', $anggota->jenis_kelamin) == $sex->value)
                                                <input name="jenis_kelamin" value="{{ $sex->value }}" type="radio" class="form-check-input" checked>
                                                @else
                                                <input name="jenis_kelamin" value="{{ $sex->value }}" type="radio" class="form-check-input">
                                                @endif
                                                <label for="" class="form-check-label">{{ $sex->value }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Daftar</label>
                                        <input name="tgl_daftar" type="text" value="{{ old('tgl_daftar', $anggota->tgl_daftar) }}" class="form-control @error('tgl_daftar') is-invalid @enderror datepicker" disabled>
                                        @error('tgl_daftar')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}" class="form-control @error('tempat_lahir') is-invalid @enderror">
                                        @error('tempat_lahir')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Lahir</label>
                                        <input name="tgl_lahir" type="text" value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}" class="form-control @error('tgl_lahir') is-invalid @enderror datepicker">
                                        @error('tgl_lahir')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Pekerjaan</label>
                                        <input name="pekerjaan" type="text" value="{{ old('pekerjaan', $anggota->pekerjaan) }}" class="form-control @error('pekerjaan') is-invalid @enderror">
                                        @error('pekerjaan')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Agama</label>
                                        <input name="agama" type="text" value="{{ old('agama', $anggota->agama) }}" class="form-control @error('agama') is-invalid @enderror">
                                        @error('agama')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Satus Perkawinan</label>
                                        <select name="status_perkawinan" id="" class="form-control @error('status_perkawinan') is-invalid @enderror select2">
                                            <option value="" disabled selected></option>
                                            @foreach(\App\Enums\MaritalStatusEnum::cases() as $status)
                                            @if(old('status_perkawinan', $anggota->status_perkawinan->value) == $status->value)
                                            <option value="{{ $status->value }}" selected>{{ $status->value }}</option>
                                            @else
                                            <option value="{{ $status->value }}">{{ $status->value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('status_perkawinan')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Telepon</label>
                                        <input name="no_tlp" type="text" value="{{ old('no_tlp', $anggota->no_tlp) }}" class="form-control @error('no_tlp') is-invalid @enderror">
                                        @error('no_tlp')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Alamat</label>
                                        <input name="alamat" type="text" value="{{ old('alamat', $anggota->alamat) }}" class="form-control @error('alamat') is-invalid @enderror">
                                        @error('alamat')
                                        <p class="text-danger create">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </fieldset>

                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{ route('show.dataanggota', ['dataanggota' => $anggota->id]) }}" class="btn btn-outline-info">Kembali</a>
                            </form>
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
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Page Specific JS File -->
@endpush