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
                <a href="{{ route('show.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Bayar Angsuran Pinjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.pinjaman') }}">Data Pinjaman</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('show.pinjaman', ['datapinjaman' => $pinjaman->id]) }}">Detail Pinjaman</a></div>
                <div class="breadcrumb-item">Bayar Angsuran Pinjaman</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('components.session')
                            <fieldset>
                                <legend>Detail Pinjaman Anggota</legend>
                                <form action="{{ route('datarekeningpinjaman.pinjamananggota.store', ['datarekeningpinjaman' => $pinjaman->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Nomor Pinjaman</label>
                                        <input type="text" name="no_pinjaman" class="form-control @error('no_pinjaman') is-invalid @enderror" value="{{ old('no_pinjaman', $pinjaman->no_pinjaman) }}" readonly>
                                        @error('no_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama Anggota</label>
                                        <input type="text" name="anggota_id" value="{{ $pinjaman->anggota->id }}" hidden>
                                        <input type="text" class="form-control @error('anggota_id') is-invalid @enderror" value="{{ $pinjaman->anggota->nama_anggota }}" readonly>
                                        @error('anggota_id')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Pinjaman</label>
                                        <input type="text" name="tgl_pinjaman" class="form-control @error('tgl_pinjaman') is-invalid @enderror datepicker" value="{{ old('tgl_pinjaman', $pinjaman->tgl_pinjaman) }}" readonly>
                                        @error('tgl_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jumlah Pinjaman Cair</label>
                                        <input type="text" name="jumlah_pinjaman" class="form-control currency @error('jumlah_pinjaman') is-invalid @enderror" value="{{ $pinjaman->pinjamanCair() }}" readonly>
                                        @error('jumlah_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jangka Waktu Pinjaman (hari)</label>
                                        <input type="number" name="jangka_waktu_pinjaman" class="form-control @error('jangka_waktu_pinjaman') is-invalid @enderror" value="{{ old('jangka_waktu_pinjaman', $pinjaman->jangka_waktu_pinjaman) }}" readonly>
                                        @error('jangka_waktu_pinjaman')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                            </fieldset>
                            <hr>

                            <fieldset>
                                <legend>Bayar Angsuran Pinjaman</legend>
                                <input type="text" name="pinjaman_id" value="{{ $pinjaman->id }}" hidden>
                                <div class="form-group">
                                    <label class="form-label">Sisa Angsuran</label>
                                    <input type="text" name="sisa_angsuran" class="form-control currency @error('sisa_angsuran') is-invalid @enderror" value="{{ $pinjaman->sisaAngsuran()->sisa_angsuran }}" readonly>
                                    @error('sisa_angsuran')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nominal Setoran</label>
                                    @if($pinjaman->agunan == 'Tanpa Agunan')
                                    <input type="text" value="{{ $pinjaman->setBungaFlat() }}" name="nominal_setoran" id="simpananWajib" class="form-control currency @error('nominal_setoran') is-invalid @enderror" readonly>
                                    @else
                                    <input type="text" value="{{ $pinjaman->setBungaMenurun() }}" name="nominal_setoran" class="form-control currency @error('nominal_setoran') is-invalid @enderror" readonly>
                                    @endif
                                    @error('nominal_setoran')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </fieldset>
                            <button class="btn btn-primary">Setor</button>
                            <a href="{{ route('show.pinjaman', ['datapinjaman' => $pinjaman->id]) }}" class="btn btn-outline-info">Kembali</a>
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
    $(document).ready(function() {
        if ($('#agunan').val() == 'Tanpa Agunan') {
            $('#agunanDetail .form-group .form-control').attr('disabled', true)
            $('#simpananWajib').attr('disabled', true)
        }

        $('#agunan').change(function() {
            const agunan = $(this).val()
            if (agunan == 'Tanpa Agunan') {
                $('#agunanDetail .form-group .form-control').attr('disabled', true)
                $('#simpananWajib').attr('disabled', true)
            } else {
                $('#agunanDetail .form-group .form-control').attr('disabled', false)
                $('#simpananWajib').attr('disabled', false)
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
@endpush