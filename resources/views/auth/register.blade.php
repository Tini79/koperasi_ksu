@extends('layouts.auth')

@section('title', 'Login')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Daftar</h4>
    </div>

    <div class="card-body">
        @include('components.session')
        <form action="{{ route('auth.register') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Detail Anggota</legend>
                        <div class="form-group">
                            <label for="" class="form-label">Nama anggota</label>
                            <input name="nama_anggota" type="text" value="{{ old('nama_anggota')}}" class="form-control @error('nama_anggota') is-invalid @enderror">
                            @error('nama_anggota')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">NIK</label>
                            <input name="nik" type="text" value="{{ old('nik')}}" class="form-control @error('nik') is-invalid @enderror">
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
                            <label for="" class="form-label">Tanggal Daftar</label>
                            <input name="tgl_daftar" type="text" value="{{ old('tgl_daftar')}}" class="form-control @error('tgl_daftar') is-invalid @enderror datepicker">
                            @error('tgl_daftar')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" value="{{ old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror">
                            @error('tempat_lahir')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input name="tgl_lahir" type="text" value="{{ old('tgl_lahir')}}" class="form-control @error('tgl_lahir') is-invalid @enderror datepicker">
                            @error('tgl_lahir')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Pekerjaan</label>
                            <input name="pekerjaan" type="text" value="{{ old('pekerjaan')}}" class="form-control @error('pekerjaan') is-invalid @enderror">
                            @error('pekerjaan')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Agama</label>
                            <input name="agama" type="text" value="{{ old('agama')}}" class="form-control @error('agama') is-invalid @enderror">
                            @error('agama')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Satus Perkawinan</label>
                            <select name="status_perkawinan" id="" class="form-control @error('status_perkawinan') is-invalid @enderror select2">
                                <option value="" disabled selected></option>
                                @foreach(\App\Enums\MaritalStatusEnum::cases() as $status)
                                @if(old('status_perkawinan') == $status->value)
                                <option value="{{ $status->value }}" selected>{{ $status->value }}</option>
                                @else
                                <option value="{{ $status->value }}">{{ $status->value }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('status_perkawinan')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input name="no_tlp" type="text" value="{{ old('no_tlp')}}" class="form-control @error('no_tlp') is-invalid @enderror">
                            @error('no_tlp')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <input name="alamat" type="text" value="{{ old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat sesuai KTP">
                            <!-- <p class="text-muted font-italic">*alamat sesui KTP</p> -->
                            @error('alamat')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                </div>
                <!-- <hr> -->
                <!-- Area simpanan pokok -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Rekening Simpanan</legend>
                        <div class="form-group">
                            <label for="" class="form-label">Nomor Rekening Simpanan</label>
                            <!-- ini bikin disabled nanti -->
                            <input name="no_rekening_simpanan" type="text" value="{{ $newRekNumber }}" class="form-control @error('no_rekening_simpanan') is-invalid @enderror" readonly>
                            @error('no_rekening_simpanan')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Produk Simpanan</label>
                            @foreach($produkSimpanans as $produk)
                            <input name="produk_id" type="hidden" value="{{ $produk->id }}" class="form-control @error('produk_id') is-invalid @enderror">
                            <input name="produk_id" type="text" value="{{ $produk->produk }}" class="form-control @error('produk_id') is-invalid @enderror" disabled>
                            @endforeach
                            @error('produk_id')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Jumlah Setoran</label>
                            <input name="simpanan_pokok" id="simpanan_pokok" type="text" value="10000" class="form-control @error('simpanan_pokok') is-invalid @enderror" disabled>
                            @error('simpanan_pokok')
                            <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <hr>
                    <fieldset>
                        <legend>Akun Anggota</legend>
                        <div class="mt-4">
                            <div class="form-group">
                                <label for="" class="form-label">Username</label>
                                <input name="username" type="text" value="{{ old('username')}}" class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Daftar
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('login') }}">Sudah punya akun? Login!</a>
            </div>
        </form>

    </div>
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

    new AutoNumeric(document.getElementById('simpanan_pokok'), configNumeric);
</script>

<!-- Page Specific JS File -->
@endpush