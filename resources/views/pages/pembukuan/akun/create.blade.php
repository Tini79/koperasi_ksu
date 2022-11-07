@extends('layouts.app')

@section('title', 'Form')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">

<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Chart of Account</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Chart of Account</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('components.session')
                            <form action="{{ route('pembukuan.akun.store') }}" method="post">
                                @csrf
                                <fieldset>
                                    <legend>Chart of Account</legend>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nama Akun</label>
                                            <input name="nama_akun" type="text" value="{{ old('nama_akun')}}" class="form-control @error('nama_akun') is-invalid @enderror">
                                            @error('nama_akun')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Kelompok Akun</label>
                                            <select name="akun_id" id="kelompokAkun" class="form-control @error('akun_id') is-invalid @enderror select2">
                                                <option value="" disabled selected></option>
                                                @foreach($akuns as $akun)
                                                @if(old('akun_id') == $akun->id)
                                                <option value="{{ $akun->id }}" selected>{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                                @else
                                                <option value="{{ $akun->id }}">{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('akun_id')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Kategori</label>
                                            <select name="kategori" id="" class="form-control @error('kategori') is-invalid @enderror select2">
                                                <option value="" disabled selected></option>
                                                @foreach(\App\Enums\KategoriEnum::cases() as $kategori)
                                                @if(old('kategori') == $kategori->value)
                                                <option value="{{ $kategori->value }}" selected>{{ $kategori->value }}</option>
                                                @else
                                                <option value="{{ $kategori->value }}">{{ $kategori->value }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Saldo</label>
                                            <input name="saldo" type="text" id="saldo" value="{{ old('saldo')}}" class="form-control @error('saldo') is-invalid @enderror">
                                            @error('saldo')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Kode Akun</label>
                                            <input name="kode_akun" type="text" id="kodeAkun" value="{{ old('kode_akun')}}" class="form-control @error('kode_akun') is-invalid @enderror">
                                            @error('kode_akun')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Chart of Account</h4>
                            <div class="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nama Akun</th>
                                            <th>Kode</th>
                                            <th>Kategori</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($akuns as $key => $akun) <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $akun->nama_akun }}</td>
                                            <td>{{ $akun->kode_akun }}</td>
                                            <td>{{ $akun->kategori }}</td>
                                            <td>@currency($akun->saldo)</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
<script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

<script>
    var configNumeric = {
        'decimalCharacter': ',',
        'decimalPlaces': 0,
        'digitGroupSeparator': '.',
        'currencySymbol': 'Rp',
    }

    logKey = (event) => {
        inputCode(kelompokAkun.value, inputKode.value)
    }

    inputCode = (a, b) => {
        kodeAkun.value = `${a}.${b}`
    }

    new AutoNumeric(document.getElementById('saldo'), configNumeric);
    // kode akun 100, child satuan
</script>
<!-- Page Specific JS File -->
@endpush