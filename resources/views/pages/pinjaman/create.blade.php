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
                <a href="{{ route('index.pinjaman') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.pinjaman') }}">Data Pinjaman</a></div>
                <div class="breadcrumb-item">Tambah Pinjaman</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('index.pinjaman') }}" method="post">
                                @csrf
                                <fieldset>
                                    <legend>Detail Pinjaman</legend>
                                    <div class="form-group">
                                        <label class="form-label">Nomor Pinjaman</label>
                                        <input type="text" name="no_pinjaman" class="form-control @error('no_pinjaman') is-invalid @enderror" value="{{ $pinjamanNumber }}" readonly>
                                        @error('no_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama Anggota</label>
                                        <select name="anggota_id" id="" class="form-control @error('anggota_id') is-invalid @enderror select2">
                                            <option value="" disabled selected></option>
                                            @foreach($anggotas as $anggota)
                                            @if(old('anggota_id') == $anggota->id)
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
                                        <label class="form-label">Tanggal Pinjaman</label>
                                        <input type="text" name="tgl_pinjaman" class="form-control @error('tgl_pinjaman') is-invalid @enderror datepicker">
                                        @error('tgl_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jumlah Pinjaman</label>
                                        <input type="text" name="jumlah_pinjaman" class="form-control currency @error('jumlah_pinjaman') is-invalid @enderror" value="{{ old('jumlah_pinjaman') }}">
                                        @error('jumlah_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jangka Waktu Pinjaman (bulan)</label>
                                        <input type="number" name="jangka_waktu_pinjaman" class="form-control @error('jangka_waktu_pinjaman') is-invalid @enderror" value="{{ old('jangka_waktu_pinjaman') }}">
                                        @error('jangka_waktu_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </fieldset>
                                <hr>

                                <!-- area agunan -->
                                <fieldset>
                                    <legend>Agunan</legend>
                                    <div class="form-group">
                                        <label class="form-label">Agunan</label>
                                        <select name="agunan" value="{{ old('agunan') }}" id="agunan" class="form-control @error('agunan') is-invalid @enderror select2">
                                            <option value="" disabled selected></option>
                                            @foreach(\App\Enums\AgunanEnum::cases() as $agunan)
                                            @if(old('agunan') == $agunan->value)
                                            <option value="{{ $agunan->value }}" selected>{{ $agunan->value }}</option>
                                            @else
                                            <option value="{{ $agunan->value }}">{{ $agunan->value }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('agunan')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Bunga (%)</label>
                                        <input type="text" name="bunga" id="bunga" class="form-control @error('bunga') is-invalid @enderror">
                                        @error('bunga')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div id="agunanDetail">
                                        <div class="form-group">
                                            <label class="form-label">Nominal Jaminan</label>
                                            <input type="text" value="{{ old('nominal_jaminan') }}" name="nominal_jaminan" class="form-control currency @error('nominal_jaminan') is-invalid @enderror">
                                            @error('nominal_jaminan')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jaminan</label>
                                            <input type="text" value="{{ old('jaminan') }}" name="jaminan" class="form-control @error('jaminan') is-invalid @enderror">
                                            @error('jaminan')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group myDiv">
                                            <label name="keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>

                                <!-- area admin -->
                                <fieldset>
                                    <legend>Biaya Admin</legend>
                                    <div class="form-group">
                                        <label class="form-label">Admin Provisi</label>
                                        <input type="text" value="{{ old('provisi') }}" name="provisi" id="provisi" class="form-control currency @error('provisi') is-invalid @enderror">
                                        @error('provisi')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Materai</label>
                                        <input type="text" value="{{ old('materai') }}" name="materai" id="materai" class="form-control currency @error('materai') is-invalid @enderror">
                                        @error('materai')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Notaris</label>
                                        <input type="text" value="{{ old('notaris') }}" name="notaris" class="form-control currency @error('notaris') is-invalid @enderror">
                                        @error('notaris')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Simpanan Wajib</label>
                                        <input type="text" value="{{ old('simpanan_wajib') }}" name="simpanan_wajib" id="simpananWajib" class="form-control currency @error('simpanan_wajib') is-invalid @enderror">
                                        @error('simpanan_wajib')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </fieldset>

                                <button class="btn btn-primary">Tambah</button>
                                <a href="{{ route('index.pinjaman') }}" class="btn btn-outline-info">Kembali</a>
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
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

<script>
    $(document).ready(function() {
        $('#agunan').change(function() {
            const agunan = $(this).val()
            if (agunan == 'Tanpa Agunan') {
                $('#agunanDetail .form-group .form-control').attr('disabled', true)
                $('#simpananWajib').attr('disabled', true)
                $('#bunga').val(2.5)
            } else {
                $('#agunanDetail .form-group .form-control').attr('disabled', false)
                $('#simpananWajib').attr('disabled', false)
                $('#bunga').val(3)
            }
        })
    })

    var configNumeric = {
        'decimalCharacter': ',',
        'decimalPlaces': 0,
        'digitGroupSeparator': '.',
        'currencySymbol': 'Rp',
    }

    new AutoNumeric.multiple('.currency', configNumeric);
</script>

<!-- Page Specific JS File -->
@endpush