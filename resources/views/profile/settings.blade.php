@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Settings</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Settings</li>
    </ol>
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-gear me-1"></i>
                Settings
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('settings') }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">Password Lama</label>
                        <input type="password" class="form-control" name="current_password">
                        @error('current_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
