@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus me-1"></i> Tambah Data User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('store-user') }}" method="POST">
                                @method("put")
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Level</label>
                                    <select class="form-select" name="level" required>
                                        <option selected>---Open this select menu---</option>
                                        <option value="Pegawai">Pegawai</option>
                                        <option value="Admin">Admin</option>
                                      </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah User</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Level</th>
                        <th class="text-center"><i class="fas fa-gear me-1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataUser)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataUser->name}}</td>
                        <td>{{ $dataUser->email}}</td>
                        <td>{{ $dataUser->level}}</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataUser->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataUser->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @include('pages.users.edit')
                    @include('pages.users.delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
