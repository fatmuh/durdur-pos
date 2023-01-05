<div class="modal fade" id="ModalDelete{{ $dataUser->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <form class="row g-3" action="{{ url('/delete-user/'.$dataUser->id) }}" method="POST">
                    @method("put")
                    @csrf
                    You sure you want to delete user <b>{{ $dataUser->name }}</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus User</button>
            </div>
            </form>
        </div>
    </div>
</div>
