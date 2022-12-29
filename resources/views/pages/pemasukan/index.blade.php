@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Pemasukan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pemasukan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pemasukan
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus me-1"></i> Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemasukan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="{{ route('store-pemasukan') }}" method="POST">
                                @method("put")
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Nama Produk</label>
                                    <select class="form-select" name="id_produk" required>
                                        <option selected>---Open this select menu---</option>
                                        @foreach ($dataProduk as $dP)
                                        <option value="{{ $dP->id}}">{{ $dP->nama}} - {{ "Rp".number_format($dP->harga,2,',','.') }}/pcs</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Pembelian</label>
                                    <input type="number" class="form-control" name="jumlah_pembelian" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Uang Yang Diterima</label>
                                    <input type="number" class="form-control" name="uang_terima" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah Pemasukan</button>
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
                        <th class="text-center">Jumlah Pembelian</th>
                        <th class="text-center">Total Pembayaran</th>
                        <th class="text-center">Uang Terima</th>
                        <th class="text-center">Uang Kembali</th>
                        <th class="text-center"><i class="fas fa-gear me-1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPemasukan as $dPemasukan)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dPemasukan->produk->nama }}</td>
                        <td>{{ $dPemasukan->jumlah_pembelian }}</td>
                        <td>{{ "Rp".number_format($dPemasukan->total_pembayaran,2,',','.') }}</td>
                        <td>{{ "Rp".number_format($dPemasukan->uang_terima,2,',','.') }}</td>
                        <td>{{ "Rp".number_format($dPemasukan->uang_kembali,2,',','.') }}</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $dPemasukan->id }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                        @include('pages.pemasukan.delete')
                    </tr>
                    @endforeach
                    <tr><th colspan="2">Total Pemasukan : {{ "Rp".number_format($sum,2,',','.') }}</th></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
