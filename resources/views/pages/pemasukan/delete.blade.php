<div class="modal fade" id="ModalDelete{{ $dPemasukan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pemasukan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <form class="row g-3" action="{{ url('/delete-pemasukan/'.$dPemasukan->id) }}" method="POST">
                    @method("put")
                    @csrf
                    You sure you want to delete income item <b>{{ $dPemasukan->produk->nama }}</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus Pemasukan</button>
            </div>
            </form>
        </div>
    </div>
</div>
