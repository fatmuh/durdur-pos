@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Produk
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus me-1"></i> Tambah Produk
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('store-produk') }}" method="POST">
                                @method("put")
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Harga Produk</label>
                                    <input type="number" class="form-control" name="harga" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah Produk</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center"><i class="fas fa-gear me-1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataProduk)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataProduk->nama}}</td>
                        <td>{{ $dataProduk->quantity}}</td>
                        <td>{{ "Rp".number_format($dataProduk->harga,2,',','.') }}</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dataProduk->id }}" class="btn btn-outline-warning"><i class="fas fa-pencil"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dataProduk->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a> <a href="" data-bs-toggle="modal" data-bs-target="#ModalStock{{ $dataProduk->id }}" class="btn btn-outline-success"><i class="fas fa-archive"></i></a></td>
                        @include('pages.produk.edit')
                        @include('pages.produk.delete')
                        @include('pages.produk.add-stock')
                    </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
