@extends('layouts.app')

@section('title', 'Form')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.user') }}" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
            </div>
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('index.user') }}">Data User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('show.user', ['datauser' => $user]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <fieldset>
                                    <legend>Akun User</legend>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Username</label>
                                            <input name="username" type="text" value="{{ old('username', $user->username)}}" class="form-control @error('username') is-invalid @enderror">
                                            @error('username')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Password</label>
                                            <input name="password" type="password" value="" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Level</label>
                                            <select name="level" id="" class="form-control select2 @error('divisi') is-invalid @enderror">
                                                <option value="" disabled selected></option>
                                                @foreach(\App\Enums\LevelEnum::cases() as $level)
                                                @if(old('level', $user->level) == $level->value)
                                                <option value="{{ $level->value }}" selected>{{ $level->value }}</option>
                                                @else
                                                <option value="{{ $level->value }}">{{ $level->value }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('level')
                                            <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-primary">Simpan</button>
                                <a href="/dataanggota" class="btn btn-outline-info">Kembali</a>
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
<!-- Page Specific JS File -->
@endpush