@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Pengeluaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengeluaran</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pengeluaran
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus me-1"></i> Tambah Pengeluaran
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengeluaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('store-pengeluaran') }}" method="POST">
                                @method("put")
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Pengeluaran</label>
                                    <input type="text" class="form-control" name="jenis_pengeluaran" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Biaya Yang Dikeluarkan</label>
                                    <input type="number" class="form-control" name="biaya" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah Pengeluaran</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Jenis Pengeluaran</th>
                        <th class="text-center">Biaya</th>
                        <th class="text-center"><i class="fas fa-gear me-1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataPengeluaran)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataPengeluaran->jenis_pengeluaran}}</td>
                        <td>{{ "Rp".number_format($dataPengeluaran->biaya,2,',','.') }}</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataPengeluaran->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataPengeluaran->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                        @include('pages.pengeluaran.edit')
                        @include('pages.pengeluaran.delete')
                    </tr>
                    @endforeach
                    <tr><th colspan="2">Total Pengeluaran : {{ "Rp".number_format($sum,2,',','.') }}</th></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
