@extends('layouts.app')

@section('title', 'DataTables')

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
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('pembukuan.datamemorial.index') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Jurnal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('pembukuan.datamemorial.index') }}">Jurnal</a></div>
                <div class="breadcrumb-item">Tambah Jurnal</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pembukuan.datamemorial.store') }}" method="post">
                                @csrf
                                <fieldset>
                                    <legend>Tambah Jurnal</legend>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input name="tanggal" type="text" class="form-control datepicker">
                                    </div>
                                    <div class="form-group myDiv">
                                        <label class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                        <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </fieldset>
                                <div class="card-header justify-content-between">
                                    <h4>Pencatatan Jurnal</h4>
                                    <button type="button" class="btn btn-outline-primary float-right" onclick="addData()"><i class="fas fa-plus"></i> Tambah </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th class="col-3">Akun</th>
                                                <th>Debet</th>
                                                <th>Kredit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body">
                                            <tr id="key_0" class="table-memorial">
                                                <td class="col-3">
                                                    <select name="dataMemorial[0][akun_id]" id="akunMemorial_0" class="form-control">
                                                        <option value="" disabled selected></option>
                                                        @foreach($akuns as $akun)
                                                        @if(old('akun_id') == $akun->id)
                                                        <option value="{{ $akun->id }}" selected>{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                                        @else
                                                        <option value="{{ $akun->id }}">{{ $akun->nama_akun }} - {{ $akun->kode_akun }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" value="{{ old('debet') }}" id="memorialDebet_0" class="form-control" name="dataMemorial[0][debet]">
                                                </td>
                                                <td>
                                                    <input type="text" value="{{ old('kredit') }}" id="memorialKredit_0" class="form-control" name="dataMemorial[0][kredit]">
                                                </td>
                                                <td>
                                                    <button disabled="disabled" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
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
<script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>

<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

<script>
    var $select = $('');
    var akuns = JSON.parse('{!! json_encode($akuns) !!}');
    var id = 1
    var configNumeric = {
        'decimalCharacter': ',',
        'decimalPlaces': 0,
        'digitGroupSeparator': '.',
        'currencySymbol': 'Rp',
    }

    var placement = document.getElementById('body');
    setupLibrary('akunMemorial_0', 'memorialDebet_0', 'memorialKredit_0');

    function setupLibrary(id_selectize, id_debet, id_kredit) {
        new AutoNumeric(document.getElementById(id_debet), configNumeric);
        new AutoNumeric(document.getElementById(id_kredit), configNumeric);
    }

    function addData() {
        let tr = document.createElement('tr');
        tr.setAttribute('id', `key_${id}`)
        tr.classList.add('table-memorial')
        tr.innerHTML = `<td>
                            <select name="dataMemorial[${id}][akun_id]" id="akunMemorial_${id}" class="form-control">
                                <option></option>

                                ${dataAkuns() }
                            </select>
                        </td>
                        <td>
                            <input type="text" id="memorialDebet_${id}" class="form-control" name="dataMemorial[${id}][debet]">
                        </td>
                        <td>
                            <input type="text" id="memorialKredit_${id}" class="form-control" name="dataMemorial[${id}][kredit]">
                        </td>
                        <td>
                            <button onClick="removeData('key_${id}')" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </td>`

        placement.appendChild(tr);
        setupLibrary(`akunMemorial_${id}`, `memorialDebet_${id}`, `memorialKredit_${id}`)
        id += 1;
    }

    function removeData(id) {
        let node = document.getElementById(id);
        placement.removeChild(node);
    }

    function dataAkuns() {
        let result = ""
        akuns.forEach(function(dt) {
            result += `<option value="${dt.id}">${dt.nama_akun} - ${dt.kode_akun}</option>`
        })
        return result;
    }
</script>
@endpush