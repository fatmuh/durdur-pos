<div class="modal fade" id="ModalEdit{{ $dPemasukan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengeluaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/update-pemasukan/'.$dPemasukan->id) }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Nama Produk</label>
                        <select class="form-select" name="id_produk" required>
                            <option value="{{ $dPemasukan->id_produk}}">{{ $dPemasukan->produk->nama}} - {{ "Rp".number_format($dPemasukan->produk->harga,2,',','.') }}/pcs (current)</option>
                            @foreach ($dataProduk as $dP)
                            <option value="{{ $dP->id}}">{{ $dP->nama}} - {{ "Rp".number_format($dP->harga,2,',','.') }}/pcs</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label">Jumlah Pembelian</label>
                        <input type="text" class="form-control" name="jumlah_pembelian" value="{{ old('jumlah_pembelian', $dPemasukan->jumlah_pembelian) }}">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label">Uang Yang Diterima</label>
                        <input type="text" class="form-control" name="uang_terima" value="{{ old('uang_terima', $dPemasukan->uang_terima) }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Pengeluaran</button>
            </div>
            </form>
        </div>
    </div>
</div>
