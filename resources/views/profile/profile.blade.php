@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-user me-1"></i>
                Profile
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-md-6">
                        <div class="text-center">
                            <input type="hidden" name="oldFoto" value="{{ auth()->user()->foto_profile }}">
                    @if (old('foto_profile', Auth::user()->foto_profile))
                        <img src="{{ asset('storage/'. old('foto_profile', Auth::user()->foto_profile)) }}" width="150px" class="rounded-circle m-3">
                    @else
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        width="150px" class="rounded-circle m-3">
                    @endif
                    </div>
                </div>
                    <div class="col-md-6">
                        <label class="form-label">New Profile (.jpg, .jpeg, .png)</label>
                        <input class="form-control mb-0" type="file" name="foto_profile" accept="image/jpg,image/jpeg,image/png">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Ubah Profile</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
