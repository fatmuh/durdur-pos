<div class="modal fade" id="ModalEdit{{ $dataUser->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ url('/update-user/'.$dataUser->id) }}" method="POST">
                    @method("put")
                    @csrf
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $dataUser->name) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $dataUser->email) }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level" required>
                            <option value="{{ $dataUser->level}}">{{ $dataUser->level}} (current)</option>
                            <option value="Pegawai">Pegawai</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit User</button>
            </div>
            </form>
        </div>
    </div>
</div>
