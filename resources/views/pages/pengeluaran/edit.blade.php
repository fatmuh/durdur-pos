<div class="modal fade" id="ModalEdit{{ $dataPengeluaran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengeluaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/update-pengeluaran/'.$dataPengeluaran->id) }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Jenis Pengeluaran</label>
                        <input type="text" class="form-control" name="jenis_pengeluaran" value="{{ old('jenis_pengeluaran', $dataPengeluaran->jenis_pengeluaran) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Biaya</label>
                        <input type="number" class="form-control" name="biaya" value="{{ old('biaya', $dataPengeluaran->biaya) }}">
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
