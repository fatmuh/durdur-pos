<div class="modal fade" id="ModalStock{{ $dataProduk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok {{ $dataProduk->nama }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/update-stock/'.$dataProduk->id) }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Stok</button>
            </div>
            </form>
        </div>
    </div>
</div>
