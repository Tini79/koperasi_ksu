@extends('layouts.auth')

@section('title', 'Login')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">username</label>
                <input id="username" type="username" class="form-control @error('username', 'login') is-invalid @enderror" name="username" tabindex="1" autofocus>
                @error('username', 'login')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control @error('password', 'login') is-invalid @enderror" name="password" tabindex="2">
                @error('password', 'login')
                <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush