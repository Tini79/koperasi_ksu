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
                <a href="{{ route('index.user') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.user') }}">Data User</a></div>
                <div class="breadcrumb-item">Detail User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>
                                @if($user->anggota_id == null)
                                {{ $user->pegawai->nama_pegawai }}
                                @endif

                                @if($user->pegawai_id == null)
                                {{ $user->anggota->nama_anggota }}
                                @endif
                            </h4>
                            <div class="d-flex">
                                <a href="{{ route('edit.user', ['datauser' => $user]) }}" class="btn btn-outline-primary mr-2">Ubah</a>
                                <form action="{{ route('destroy.user', ['datauser' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-4">Nomor</p>
                                <p>:</p>
                                <p class="col" id="alamat">
                                    @if($user->anggota_id == null)
                                    {{ $user->pegawai->no_pegawai }}
                                    @endif
                                    @if($user->pegawai_id == null)
                                    {{ $user->anggota->no_anggota }}
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-4">Nama</p>
                                <p>:</p>
                                <p class="col" id="alamat">
                                    @if($user->anggota_id == null)
                                    {{ $user->pegawai->nama_pegawai }}
                                    @endif

                                    @if($user->pegawai_id == null)
                                    {{ $user->anggota->nama_anggota }}
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-4">Username</p>
                                <p>:</p>
                                <p class="col" id="alamat">{{ $user->username }}</p>
                            </div>
                            <div class="row">
                                <p class="col-4">Divisi</p>
                                <p>:</p>
                                <p class="col" id="alamat">
                                    @if($user->anggota_id == null)
                                    {{ $user->pegawai->divisi->value }}
                                    @endif

                                    @if($user->pegawai_id == null)
                                    {{ "Anggota" }}
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-4">Level</p>
                                <p>:</p>
                                <p class="col" id="alamat">
                                    @if($user->anggota_id == null)
                                    {{ $user->level->value }}
                                    @endif

                                    @if($user->pegawai_id == null)
                                    {{ "Anggota" }}
                                    @endif
                                </p>
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